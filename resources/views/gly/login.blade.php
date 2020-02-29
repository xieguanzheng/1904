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
<center><h2>库存管理后台系统</h2></center>
<form action="{{url('/gly/logindo')}}" method='post' class="form-horizontal" role="form">
@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">用户昵称</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name='gname' id="firstname">
		</div>
	</div>
     <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">用户身份</label>
		<div class="col-sm-8">
			 <input type="radio" name="gly" value="1">主管员
			 <input type="radio" name="gly" value="2" checked>库管员
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-8">
			<input type="submit" value='添加'>
		</div>
	</div>
</form>
</body>
</html>