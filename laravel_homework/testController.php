<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;

class testController extends Controller
{
	    public function test($stuNum)
		{
			if (isset($stuNum)) 
			{
			    $requirement=DB::select('SELECT * FROM classtable WHERE stuNum = ?',[$stuNum]);
			        if(!$requirement)
			        {
				        ClassTableQuery($stuNum);
				        $requirement=DB::select('SELECT * FROM classtable WHERE stuNum = ?',[$stuNum]);
				        dd($requirement);
			        }
			        else
			        {
			        	dd($requirement);
			        }
			}
			else
			{
			    echo "hello world";
			}
		}

		public function ClassTableQuery($stuNum)
		 {
		  	/*爬课表部分*/
		      $url="http://jwc.cqupt.edu.cn/weixin/search.php";
		      $useragent="Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36";
		      $ch = curl_init();
		      $arr=array(
		        'action'=>'kebiao',
		        'searchKebiaoKey'=>$stuNum,
		        'kebiaoTarget'=>'student'
		        );
		      $opt =  array(
		                CURLOPT_URL => $url,
		                CURLOPT_TIMEOUT => 30,
		                CURLOPT_FOLLOWLOCATION  => TRUE,
		                CURLOPT_USERAGENT => $useragent,
		                CURLOPT_RETURNTRANSFER => 1,
		                CURLOPT_POSTFIELDS=>http_build_query($arr),
		                CURLOPT_COOKIE=>'PHPSESSID=3cm0e191inpv3p95n8d27fgpu0; PHPSESSID=3cm0e191inpv3p95n8d27fgpu0; UM_distinctid=15b70f76f6d35e-0273548bbb3f1a-57e1b3c-144000-15b70f76f6e5ae'
		              );
		      curl_setopt_array($ch, $opt);
		      $output = curl_exec($ch);
		      $string = $output;

		      /*使用explode将包含课表的部分从网页中切割出来*/
		      $result=explode('<ul data-role="listview" data-inset="true">', $string);
		      $result=explode('</ul>', $result[1]);
		      $result=explode('<li data-role="list-divider">', $result[0]);

		      /*由于课表在html中，使用的是li来输出，这里使用正则表达式将li标签内的内容匹配出来，并且将每节课的信息也找出来*/
		    for($i=1;$i<count($result);$i++)
		    {
		        $pattern=explode('<span', $result[$i]);
		        if($pattern[0]=='星期一')
		          $weekDay=1;
		        else if ($pattern[0]=='星期二') 
		          $weekDay=2;
		        else if ($pattern[0]=='星期三')
		          $weekDay=3;
		        else if ($pattern[0]=='星期四')
		          $weekDay=4;
		        else if ($pattern[0]=='星期五')
		          $weekDay=5;
		        else if ($pattern[0]=='星期六')
		          $weekDay=6;
		        else
		          $weekDay=7;
		        $temp=explode('</li><li>', $result[$i]);

		        for ($j=1; $j <count($temp) ; $j++) 
		        { 
		        	preg_match('/<strong>.*<\/strong>/', $temp[$j], $ClassTitle);
			        $ClassTitle=HtmlReplaceInPreg($ClassTitle[0]);
			        preg_match('/<h2>.*<\/h2>/', $temp[$j],$ClassOrder);
			        $ClassOrder=HtmlReplaceInPreg($ClassOrder[0]);
			        preg_match('/<p>地点：[\s\S]*<\/p>/', $temp[$j],$ClassInfo);

			        $ClassInfo=trimall($ClassInfo[0]);
			        preg_match('/教师：\S*/', $ClassInfo,$ClassTeacher);;
			        $ClassTeacher=implode($ClassTeacher);
			        preg_match('/地点：\S*/', $ClassInfo,$ClassRoom);
			        $ClassRoom=implode($ClassRoom);
			        preg_match('/课程类别：\S*<br>/', $ClassInfo,$ClassCategory);
			        $ClassCategory=HtmlReplaceInPreg($ClassCategory[0]);
			        preg_match('/<p class="ui-li-aside">\S*<\/p>/', $ClassInfo,$ClassWeeks);
			        $ClassWeeks=HtmlReplaceInPreg($ClassWeeks[0]);
			        $ClassTeacher=normalDelete($ClassTeacher);
			        $ClassRoom=normalDelete($ClassRoom);
			        $ClassCategory=normalDelete($ClassCategory);
			        $ClassTitle=normalDelete($ClassTitle);
			        $ClassOrder=normalDelete($ClassOrder);

		        /*插入数据库*/
		        	DB::insert('INSERT INTO classtable (stuNum,classTitle,classTeacher,classRoom,classWeeks,classCategory,classOrder,classWeekDay) VALUES (?,?,?,?,?,?,?,?)',[$stuNum,$ClassTitle,$ClassTeacher,$ClassRoom,$ClassWeeks,$ClassCategory,$ClassOrder,$weekDay]);
		        }
		        
		    }
		}

		public function HtmlReplaceInPreg($value)
		{
		  $value=preg_replace("/<([a-zA-Z]+)[^>]*>/","",$value);
		  $value=preg_replace("/<\/([a-zA-Z]+)[^>]*>/","",$value);
		  return $value;
		}

		public function trimall($str)
		{
		    $qian=array("\t","\n","\r");
		    $hou=array("","","","","");
		    return str_replace($qian,$hou,$str); 
		}

		public function normalDelete($str)
		{
		  $result=preg_replace('/\S*：/', '', $str);
		  return $result;
		}
}
