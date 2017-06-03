<!-- <!DOCTYPE html>
<html>
<head>
  <title>班级名单查询</title>
  <style type="text/css">
  *{
    margin: 0;
    padding: 0;
  }
    div.mainQuery
    {
      margin: 0 auto;
      height: 80px;
      width: 500px;
    }
    div.mainQuery input#input
    {
      display: block;
      margin: 0 auto;
      margin-top: 20px;
      height: 30px;
      width: 300px;
      line-height: 30px;
      font-size: 20px;

    }
    div.mainQuery input#inputBtn
    {
      display: block;
      margin: 0 auto;
      margin-top: 20px;
      width: 50px;
      height: 30px;
      border:none;
      background-color: rgba(15, 136, 235,1);
      color: #eee;
      cursor: pointer;
    }
    div.mainQuery input#inputBtn:hover
    {
      background-color: rgba(15, 136, 235,0.8);
    }
    td
    {
      border:1px solid #000;
    }
  </style>
</head>
<body>
  <div class="mainQuery">
  <form method="POST">
    <input type="text" name="classid" value="" id="input" placeholder="请在此输入要查询的班级号码" />
    <input type="submit" name="queryButton" id="inputBtn" value="查询" />
  </form>
  </div>
</body>
</html>




 -->



<?php
/*if(!empty($_POST['classid']))
{
  classStusListQuery($_POST['classid']);
}*/






/*function classStusListQuery($classid)
{*/
  $classid='2016210049';
  $url = 'http://jwzx.cqupt.edu.cn/jwzxtmp/showBjStu.php?bj='.$classid;
/*  $url="http://jwc.cqupt.edu.cn/weixin/search.php";*/
/*  $useragent="Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36";*/
  $ch = curl_init();
/*  $arr=array(
    'action'=>'kebiao',
    'searchKebiaoKey'=>'2016210049',
    'kebiaoTarget'=>'student'
    );*/
  $opt =  array(
            CURLOPT_URL => $url,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_FOLLOWLOCATION  => TRUE,
/*            CURLOPT_USERAGENT => $useragent,*/
/*            CURLOPT_RETURNTRANSFER => 1,*/
/*            CURLOPT_POSTFIELDS=>http_build_query($arr),*/
/*            CURLOPT_COOKIE=>'PHPSESSID=3cm0e191inpv3p95n8d27fgpu0; PHPSESSID=3cm0e191inpv3p95n8d27fgpu0; UM_distinctid=15b70f76f6d35e-0273548bbb3f1a-57e1b3c-144000-15b70f76f6e5ae'*/
          );
  curl_setopt_array($ch, $opt);
  $output = curl_exec($ch);
  $string = $output;
/*  $pattern = '/<tbody>.*<\/tbody>/';
  preg_match($pattern,$string,$result);
  $result=str_replace(array('<tbody>','</tbody>','/'), '', $result);
  $result=explode('<tr>', $result[0]);
  $conn = new PDO("",'','');
  $conn -> setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);*/
/*  for ($i=0,$j=0,$StuInfo=array(); $i <count($result) ; $i++)
  { 
    if(empty($result[$i]))
      continue;
    else
    {
      $temp=explode('<td>', $result[$i]);
      for($j=0,$k=0,$TempInfo=array();$j<count($temp);$j++)
      {
        if(empty($temp[$j]))
          continue;
        else
        {
          $TempInfo[$k++]=$temp[$j];
        }
      }

      $insert=$conn->prepare('INSERT INTO curldemo (id,StuNum,StuName,StuSex,StuClassID,StuMajorityID,StuMajority,StuAcademy,StuGrade,StuCondition) VALUES (?,?,?,?,?,?,?,?,?,?)');
      $insert->bindParam(1,$TempInfo[0],PDO::PARAM_INT);
      $insert->bindParam(2,$TempInfo[1],PDO::PARAM_INT);
      $insert->bindParam(3,$TempInfo[2],PDO::PARAM_STR);
      $insert->bindParam(4,$TempInfo[3],PDO::PARAM_STR);
      $insert->bindParam(5,$TempInfo[4],PDO::PARAM_INT);
      $insert->bindParam(6,$TempInfo[5],PDO::PARAM_INT);
      $insert->bindParam(7,$TempInfo[6],PDO::PARAM_STR);
      $insert->bindParam(8,$TempInfo[7],PDO::PARAM_STR);
      $insert->bindParam(9,$TempInfo[8],PDO::PARAM_INT);
      $insert->bindParam(10,$TempInfo[9],PDO::PARAM_STR);
      $insert->execute();
    }
  }*/
  curl_close($ch);
/*}*/
?>