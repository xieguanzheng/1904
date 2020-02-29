<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h2>添加页面</h2>
<form action="{{url('/shangpin/add')}}" method="post" enctype="multipart/form-data">
	@csrf
	<table>
		<tr>
			<td>商品品牌</td>
			<td><input type="text" name="name"></td>
		</tr>
		<tr>
			<td>logo</td>
			<td><input type="file" name="img"></td>
		</tr>
		<tr>
			<td>商品网址</td>
			<td><input type="text" name="wz"></td>
		</tr>
		<tr>
			<td><input type="submit" value="添加"></td>
			<td></td>
		</tr>
	</table>
</form>
</body>
</html>