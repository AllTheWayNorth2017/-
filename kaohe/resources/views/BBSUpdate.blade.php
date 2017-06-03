<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="{{route('BBSupdate')}}" method="post">
	<textarea cols="5" rows="60" style="width: 500px;height: 300px;" placeholder="输入公告内容" autofocus="autofocus" name="content">
		
	</textarea>
	<input type="hidden" name="Updater" value="{{session('UserName')}}" />
	<button>提交</button>
</form>
</body>
</html>