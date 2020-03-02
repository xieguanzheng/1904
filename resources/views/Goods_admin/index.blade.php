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
<center><h1>管理员列表</h1></center>
<form>
	<input type="text" name="user_account" value="{{$user_account}}" placeholder="请输入账号">
	<input type="submit" value="搜索">
</form>
<table class="table">
	<thead>
		<tr>
			<th>ID</th>
			<th>管理员</th>
		
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
		@foreach($data as $k=>$v)
		<tr @if($k%2==0) class="active" @else class="success" @endif>
			<th>{{$v->user_id}}</th>
			<th>{{$v->user_account}}</th>
			
			<td><a href="{{url('goods_admin/edit/'.$v->user_id)}}" class="btn btn-success">编辑</a>
				<a href="{{url('goods_admin/destroy/'.$v->user_id)}}" class="btn btn-info">删除</a>

			</td>
		</tr>
		@endforeach
		<tr><td colspan="7">{{$data->appends(['user_account'=>$user_account])->links()}}</td></tr>
	</tbody>
</table>
</body>
</html>