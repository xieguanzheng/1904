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
<h1>编辑外来人口</h1><hr>
<form class="form-horizontal" role="form" method="post" action="{{url('/people/update/'.$user->p_id)}}" enctype="multipart/form-data">
	@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">名字</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="firstname" name="username" placeholder="请输入名字" value="{{$user->username}}">
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">年龄</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="lastname" name="age" placeholder="请输入年龄" value="{{$user->age}}">
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">身份证号</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="firstname" name="card" placeholder="请输入身份证号" value="{{$user->card}}">
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">是否是湖北人</label>
		<div class="radio">
    <label>
        <input type="radio" name="is_hunbei" id="optionsRadios1" value="1" @if($user->is_hunbei==1) checked @endif>是
    </label>
    <label>
        <input type="radio" name="is_hunbei" id="optionsRadios1" value="2" @if($user->is_hunbei==2) checked @endif>否
    </label>
</div>
	</div><div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">头像</label>
		<div class="col-sm-10">
			<input type="file" class="form-control" id="firstname" name="head"><img src="{{env('UPLOAD_URL')}}{{$user->head}}" width="50" height="50">
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">修改</button>
		</div>
	</div>
</form>

</body>
</html>