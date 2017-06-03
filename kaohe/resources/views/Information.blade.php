<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://cdn.bootcss.com/bootstrap/4.0.0-alpha.6/css/bootstrap-grid.css" rel="stylesheet">
	<link href="https://cdn.bootcss.com/bootstrap/4.0.0-alpha.6/css/bootstrap-grid.min.css" rel="stylesheet">
	<link href="https://cdn.bootcss.com/bootstrap/4.0.0-alpha.6/css/bootstrap-reboot.css" rel="stylesheet">
	<link href="https://cdn.bootcss.com/bootstrap/4.0.0-alpha.6/css/bootstrap-reboot.min.css" rel="stylesheet">
	<link href="https://cdn.bootcss.com/bootstrap/4.0.0-alpha.6/css/bootstrap.css" rel="stylesheet">
	<link href="https://cdn.bootcss.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="span8">
			<table class="table table-hover table-bordered">
				<thead>
					<tr>
						<th>
							姓名
						</th>
						<th>
							学号
						</th>
						<th>
							性别
						</th>
						<th>
							班级
						</th>
						<th>
							专业
						</th>
						<th>
							学院
						</th>
						<th>
							年级
						</th>
					</tr>
				</thead>
				<form action="{{route('SelfChange')}}" method="post">
				<tbody>
					<tr>
						<td>
							{{$result->StuNum}}<input type="hidden" name="StuNum" value="{{$result->StuNum}}">
						</td>
						<td>
							<input type="text" name="StuName" value="{{$result->StuName}}">
						</td>

						<td>
							<input type="text" name="StuSex" value="{{$result->StuSex}}">
						</td>
						<td>
							<input type="text" name="StuClass" value="{{$result->StuClass}}">
						</td>
						<td>
							<input type="text" name="StuMajor" value="{{$result->StuMajor}}">
						</td>
						<td>
							<input type="text" name="StuAca" value="{{$result->StuAca}}">
						<td>
							<input type="text" name="StuGrade" value="{{$result->StuGrade}}">
						</td>
					</tr>
					<button class="btn" type="submit">提交修改</button><a href="../deleteStuInfo/{{$result->StuNum}}">删除该学生信息</a>
				</tbody>

			</form>

			</table> 

		</div>
		<div class="span4">
			<p>
				<em>你好，{{session('UserName')}}</em>
			</p>
			<p>
				<em>在这里修改个人信息</em>
			</p>
		</div>
	</div>
</div>
	<script src="https://cdn.bootcss.com/bootstrap/4.0.0-alpha.6/js/bootstrap.js"></script>
	<script src="https://cdn.bootcss.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
</body>
</html>