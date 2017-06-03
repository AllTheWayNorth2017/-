<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
	*{
		margin: 0;
		padding: 0;
	}
		div.loginParent {
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
	</style>
	<script type="text/javascript">
		
/*		function check() {
			var UserPwd=document.querySelector('input.UserPwd');
			var UserName=document.querySelector('input.UserName');
			if(UserName.innerHTML==''||UserPwd.innerHTML=='')
			{
				document.querySelector('div.warning').innerHTML='有空未填！';
				return false;
			}
			else
				return true;
		}*/
	</script>
</head>
<body>
<div class="loginParent">
	<div class="LoginForm">
		<form action="{{route('login')}}" method="post" >
			<div>
				用户名<input type="text" name="UserName" class="UserName" />
			</div>
			<div>
				密码<input type="password" name="UserPwd" class="UserPwd" />
			</div>
			<div>
				<button type="submit">登陆</button><a href="{{route('regView')}}">注册</a>
				<input type="hidden" name="log" value="1" />
			</div>
			<div class="warning">{{$wrong or ''}}</div>
		</form>
	</div>
</div>
</body>
</html>