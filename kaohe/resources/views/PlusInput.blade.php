<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="{{route('Plus')}}" method="post">
	<input type="text" name="UserName" placeholder="请输入您想提权的用户名" />
	提权至
	<input type="radio" name="power" value="0" />学生
	<input type="radio" name="power" value="1" />老师
	<input type="radio" name="power" value="2" />管理员
	<button>提交</button>
</form>
</body>
</html>