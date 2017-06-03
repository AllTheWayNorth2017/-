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

	</script>
</head>
<body>
<div class="loginParent">
	<div class="LoginForm">
		<form action="{{route('reg')}}" method="post" >
			<div>
				用户名<input type="text" name="UserName" class="UserName" />
			</div>
			<div>
				密码<input type="password" name="UserPwd" class="UserPwd" />
			</div>
<!-- 			<div>
	密码确认<input type="password" name="PwdSure" class="PwdSure" />
</div> -->
			<div>
				您是：老师<input type="radio" name="power" value="1"  />
				学生<input type="radio" name="power" value="0" checked="checked"/>
			</div>
			<input type="hidden" name="reg" value="1" />
			<div class="warning">{{$wrong or ''}}</div>
			<div>
				<button type="submit">注册</button><a href="{{route('loginView')}}">登陆</a>
			</div>

		</form>
	</div>
</div>
</body>
</html>