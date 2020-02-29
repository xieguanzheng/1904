<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h2>修改页面</h2>
<form action="{{url('/shangpin/upddo/'.$data->id)}}" method="post" enctype="multipart/form-data">
	@csrf
	<table>
		<tr>
			<td>商品品牌</td>
			<td><input type="text" name="name" value="{{$data->name}}"></td>
		</tr>
		<tr>
			<td>logo</td>
			<td><img src="{{env('UPLOAD_URL')}}{{$data->img}}" width="50" height="50"><input type="file" name="img"></td>
		</tr>
		<tr>
			<td>商品网址</td>
			<td><input type="text" name="wz" value="{{$data->wz}}"></td>
		</tr>
		<tr>
			<td><input type="submit" value="修改"></td>
			<td></td>
		</tr>
	</table>
</form>
</body>
</html>