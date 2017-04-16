<!DOCTYPE html>
<html>
<head>
	<title>空教室查询</title>
	<style type="text/css">
		*{
			margin: 0;
			padding: 0;
		}
		div{
			display: inline-block;
		}
		div.container{
			width: 100%;
			text-align: center;
		}
		div.ActionForm{
			display: block;
		}
	</style>
</head>
<body>

<div class="container">
	<div class="FormHeader">
		
	</div>
	<script type="text/javascript">
		var myDate=new Date();
		var Header=document.querySelector('div.FormHeader');
		var firstDate=Date.parse('Feb 27,2017');
		var nowDate=myDate.getTime();

		var nowYear=myDate.getFullYear();
		var nowMonth=myDate.getMonth()+1;
		var nowDays=myDate.getDate();
		
		var minutes = 1000*60;
		var hours = minutes*60;
		var days = hours*24;
		var delta=parseInt((nowDate-firstDate)/days);
		var weeks=parseInt(delta/7)+1;
		var weekDay=delta%7+1;
		var cnWeekDay;
		switch(weekDay)
		{
			case 1:
				cnWeekDay='一';
				break;
			case 2:
				cnWeekDay='二';
				break;
			case 3:
				cnWeekDay='三';
				break;
			case 4:
				cnWeekDay='四';
				break;
			case 5:
				cnWeekDay='五';
				break;
			case 6:
				cnWeekDay='六';
				break;
			case 7:
				cnWeekDay='天';
				break;
		};
		Header.innerHTML='今天是'+nowYear+'年'+nowMonth+'月'+nowDays+'日<br>'+'第'+weeks+'周'+' 星期'+cnWeekDay;


	</script>
	<div class="ActionForm">
		<form method="POST">
			<select class="weeks" name="week">
				
			</select>
			<select class="weekDay" name="weekDays">
				
			</select>
			<select name="EDUbuild">
				<option value="2">二教</option>
				<option value="3">三教</option>
				<option value="4">四教</option>
				<option value="5">五教</option>
			</select>
			<br />
			<input type="checkbox" name="OneTwo" value="12" />1,2节课
			<input type="checkbox" name="ThreeFour" value="34" />3,4节课
			<input type="checkbox" name="FiveSix" value="56" />5,6节课
			<input type="checkbox" name="SevenEight" value="78" />7,8节课
			<input type="checkbox" name="NineTen" value="90" />9,10节课
			<input type="checkbox" name="ElevenTwelve" value="ab" />11,12节课
			<br />
			<input type="submit" name="submitBox" value="查询空教室" />
		</form>
		<script type="text/javascript">
			var weeksSelector=document.querySelector('div.ActionForm form select.weeks');
			for(var i=1;i<=20;i++)
			{
				var option=document.createElement('option');
				option.value=i;
				option.text='第'+i+'周';
				weeksSelector.add(option);
			}
			var weekDaySelector=document.querySelector('div.ActionForm form select.weekDay');
			var cnWeekDays='一二三四五六天';
			for(var i=1;i<=7;i++)
			{
				var sd=document.createElement('option');
				sd.value=i;
				sd.text='星期'+cnWeekDays[i-1];
				weekDaySelector.add(sd);
			}
			weeksSelector.options[weeks-1].selected=true;
			weekDaySelector.options[weekDay-1].selected=true;
		</script>
	</div>
</div>

</body>
</html>







<?php



if(!empty($_POST))
{
	var_dump($_POST);
}

if($_POST['week']&&$_POST['weekDays'])
{

	$zc=$_POST['week'];
	$xq=$_POST['weekDays'];
	if(isset($_POST['OneTwo']))
	{
		$room[0]=QueryMain($zc,$xq,12);
	}
	if (isset($_POST['ThreeFour'])) 
	{
		$room[1]=QueryMain($zc,$xq,34);
	}
	if(isset($_POST['FiveSix']))
	{
		$room[2]=QueryMain($zc,$xq,56);
	}
	if(isset($_POST['SevenEight']))
	{
		$room[3]=QueryMain($zc,$xq,78);
	}
	if(isset($_POST['NineTen']))
	{
		$room[4]=QueryMain($zc,$xq,90);
	}
	if(isset($_POST['ElevenTwelve']))
	{
		$room[5]=QueryMain($zc,$xq,'ab');
	}
	$all=QueryMain(20,7,'ab');
/*	var_dump($room);
*/	for($i=0;$i<=count($room);$i++)
	{
		if(isset($room[$i]))
			continue;
		else
			$room[$i]=$all;
	}
	$xf=array_intersect($room[0],$room[1]);
	$fg=array_intersect($room[3],$room[2]);
	$ad=array_intersect($room[4],$room[5]);
	$zxc=array_intersect($xf,$fg,$ad);
	var_dump($zxc);
}

function QueryMain($zc,$xq,$sd)
{
	$url='http://jwc.cqupt.edu.cn/weixin/showEmptyRoom.php';
	$useragent='Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36';
	$ch=curl_init();
	$data=array(
		'zc'=>$zc,
		'xq'=>$xq,
		'sd'=>$sd
		);
	$opt=array(
		CURLOPT_URL=>$url,
		CURLOPT_TIMEOUT=> 30,
		CURLOPT_FOLLOWLOCATION=>TRUE,
		CURLOPT_RETURNTRANSFER=>TRUE,
		CURLOPT_USERAGENT=>$useragent,
		CURLOPT_POSTFIELDS=>http_build_query($data),
		);
	curl_setopt_array($ch, $opt);
	$output=curl_exec($ch);

	$string=$output;
	$string=explode('<div role="main" class="ui-content" >', $string);
	$string=explode('</div>', $string[1]);
	$nums=$string[0];
	$nums=trim($nums);
	$nums=explode(' ', $nums);

	curl_close($ch);
	return $nums;
}

?>