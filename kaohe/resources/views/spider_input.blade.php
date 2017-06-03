<!DOCTYPE html>
<html>
<head>
	<title>课表查询</title>
	<style type="text/css">
		div.container
		{
			text-align: center;
			width: 500px;
			height: 300px;
			margin: 0 auto;
		}
		input.Input{
			display: block;
			margin: 0 auto;
		}
	</style>
</head>
<body>
<div class="container">
	<h1>课表查询</h1>
	<p>请输入学号</p>
	<input type="text" name="stuNum" class="Input" />
	<a  href="" class="onclick">点击查询</a>
	<script type="text/javascript">
		var ABtn=document.querySelector('a.onclick');
		var Url=document.querySelector('input.Input');
		ABtn.addEventListener('click',function () {
			ABtn.setAttribute('href','spider/'+Url.value);
		});
	</script>
</div>

</body>
</html>