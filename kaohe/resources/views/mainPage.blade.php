<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
	*{
		margin:0;
		padding: 0;
	}
	div.board{
		height: 500px;
		width: 300px;
		box-shadow: 0 0 3px #cfcfcf;
		margin-left: 200px;
		background-color: #fff;
		margin-top: 100px; 
	}
		div.container{
			height: 600px;
			width: 400px;
			box-shadow: 0 0 3px #cfcfcf;
			position: absolute;
			top: 50%;
			left: 50%;
			margin-top: -300px;
			margin-left: -200px;
			text-align: center;
		}
		div.text{
			margin: 0 auto;
			width: 75%;
			height: 90%;
		}
		li{
			list-style:none;
			margin:0 auto;
			border-bottom: 1px solid rgba(0,0,0,0.15);
			height: 50px;
			line-height: 50px;
		}

	</style>
</head>
<body>
<div class="board">
	<div class="header" style="text-align: center;border-bottom: 1px solid #000;">
		<h3>公告栏</h3>
	</div>
	<div class="text">
		{{$BBS->Content}}
	</div>
	
</div>
<div class="container">
	<div class="header">
		<h2>学生管理系统</h2>
	</div>
	<div class="ulist">
		<ul>
			<li><h4>学生功能</h4></li>
			<li><a href="{{route('SelfInfo')}}">个人信息查看与修改</a></li>
			<li><a href="{{route('ClassFormView')}}">课表查询</a></li>
			<li><h4>教师功能</h4></li>
			<li><a href="{{route('stuInfoView')}}">个人信息查看与修改</a></li>
			<li>导出信息</li>
			<li><a href="BBS">发布公告</a></li>
			<li><h4>管理员</h4></li>
			<li>增加权限</li>
		</ul>
	</div>
</div>
</body>
</html>