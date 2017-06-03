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
				<tbody>
					<tr>
						<td>
							{{$result->StuName}}
						</td>
						<td>
							{{$result->StuNum}}
						</td>
						<td>
							{{$result->StuSex}}
						</td>
						<td>
							{{$result->StuClass}}
						</td>
						<td>
							{{$result->StuMajor}}
						</td>
						<td>
							{{$result->StuAca}}
						</td>
						<td>
							{{$result->StuGrade}}
						</td>
					</tr>
				</tbody>
			</table> 
		</div>
		<div class="span4">
			<p>
				<em>你好，{{session('UserName')}}</em>
			</p>
			<p>
				<em></em>
			</p>
		</div>
	</div>
</div>
	<script src="https://cdn.bootcss.com/bootstrap/4.0.0-alpha.6/js/bootstrap.js"></script>
	<script src="https://cdn.bootcss.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
</body>
</html>