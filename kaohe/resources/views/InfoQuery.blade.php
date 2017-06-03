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
		<div class="span12">
			<div class="row-fluid">
				<div class="span4">
				</div>
				<div class="span4">
					<form class="form-inline" action="{{route('stuInfo')}}" method="post">
						<fieldset>
							<legend>请输入你要查询的学生学号</legend>
							<input type="text" name="stuNum" placeholder="学号" />
							<label class="checkbox"></label>
							<button class="btn" type="submit">查询</button>
						</fieldset>
					</form>
				</div>
				<div class="span4">
				</div>
			</div>
		</div>
	</div>
</div>
	<script src="https://cdn.bootcss.com/bootstrap/4.0.0-alpha.6/js/bootstrap.js"></script>
	<script src="https://cdn.bootcss.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
</body>
</html>