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
<!-- @if($errors->any())
<div class='alert alert-danger'>
<ul>
@foreach($errors->all() as $error)
<li>{{$error}}</li>
@endforeach
</ul>
</div>
@endif -->
<form  action="{{url('/goods/upddo/'.$res->g_id)}}" method='post' class="form-horizontal" role="form">
@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">分类名称</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name='g_name' id="firstname" value="{{$res->g_name}}">
				   <b style='color:red'>{{$errors->first('g_name')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">父级分类</label>
        <div class="col-sm-8">
			<select name="g_fl" id="">
				<option value="图书" @if($res->g_fl=='图书') selected @endif>图书</option>
				<option value="食品" @if($res->g_fl=='食品') selected @endif>食品</option>
				<option value="家具" @if($res->g_fl=='家具') selected @endif>家具</option>
				<option value="汽车" @if($res->g_fl=='汽车') selected @endif>汽车</option>
			</select>
		 
		 <b style='color:red'>{{$errors->first('g_fl')}}</b>
        </div>
    </div>
     <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">分类描述</label>
		<div class="col-sm-8">
			 <textarea name="g_desc" cols="50" rows="5">{{$res->g_desc}}</textarea>	  
			 <b style='color:red'>{{$errors->first('g_desc')}}</b>
		</div>
	</div> 
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-8">
			<input type="button" value='修改'>
		</div>
	</div>
</form>

</body>
</html>
<script>
	$('input[type="button"]').click(function(){
		var titleflag=true;
		$('input[name="g_name"]').next().html('');
		 var g_name=$('input[name="g_name"]').val();
		var reg=/^[\u4e00-\u9fa50-9A-Za-z_]+$/;
		if(!reg.test(g_name)){
			$('input[name="g_name"]').next().html('分类名称不能为空');
			return;
		} 
		if(!titleflag){
			return;
		}
		 $('form').submit();
	})
	$('input[name="g_name"]').blur(function(){
		$(this).next().html('');
		 var name=$(this).val();
		 var reg=/^[\u4e00-\u9fa50-9A-Za-z_-]+$/;
		 if(!reg.test(name)){
			 $(this).next().html('分类名称不能为空')
			 return;
		 }
	})
</script>