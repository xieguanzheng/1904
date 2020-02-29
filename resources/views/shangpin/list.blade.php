<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<center>
	<table border="1">
		<tr>
			<td>id</td>
			<td>商品品牌</td>
			<td>logo</td>
			<td>商品网址</td>
			<td>操作</td>
		</tr>
		@foreach($data as $k=>$v)
		<tr>
			<td>{{$v->id}}</td>
			<td>{{$v->name}}</td>
			<td><img src="{{env('UPLOAD_URL')}}{{$v->img}}" width="50" height="50"></td>
			<td>{{$v->wz}}</td>
			<td>
				<a href="{{url('shangpin/update/'.$v->id)}}">编辑</a>
				<a href="{{url('shangpin/delete/'.$v->id)}}">删除</a>
			</td>
		</tr>
		@endforeach
	</table>
	</center>
</body>
</html>