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
<center><h2>商品添加页面</h2></center>
<form  action="{{url('/goods/add')}}" method='post' class="form-horizontal" role="form">
@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">分类名称</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name='g_name' id="firstname">
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">父级分类</label>
        <div class="col-sm-8">
			<select name="p_id" id="">
				<option value="0">--请选择--</option>
				@foreach($goods as $v)
				<option value="{{$v->g_id}}">{{str_repeat('|——',$v->level)}}{{$v->g_name}}</option>
				@endforeach
			</select>
        </div>
    </div>
     <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">分类描述</label>
		<div class="col-sm-8">
			 <textarea name="g_desc" cols="50" rows="5"></textarea>	  
			 
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