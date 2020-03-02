<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>Bootstrap 实例 - 水平表单</title>
	<link rel="stylesheet" href="/static/css/bootstrap.min.css">  
	<script src="/static/js/jquery.min.js"></script>
	<script src="/static/js/bootstrap.min.js"></script>
</head>
<body>
<center><h1>管理员修改</h1></center>
@if ($errors->any())
<div class="alert alert-danger">
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{$error}}</li>
		@endforeach
	</ul>
</div>
@endif
<form  action="{{url('/goods_admin/update/'.$user->user_id)}}" method="post" class="form-horizontal" role="form">
@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">管理员</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" value="{{$user->user_account}}" name="user_account" id="firstname" 
				   placeholder="请输入账号">
				   <b style="color:red">{{$errors->first('user_accoun')}}</b>
		</div>
	</div>
	<!-- <div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">密码</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" value="user_pwd"  name="user_pwd" id="lastname" 
				   placeholder="请输密码">
				    <b style="color:red">{{$errors->first('user_pwd')}}</b>
		</div>
	</div> -->
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">修改</button>
		</div>
	</div>
</form>

</body>
</html>