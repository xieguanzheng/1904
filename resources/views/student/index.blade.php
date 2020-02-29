<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h2>添加页面</h2>
	@if ($errors->any())
<div class="alert alert-danger">
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif
<form action="{{url('/student/add')}}" method="post">
	@csrf
	<table>
		<tr>
			<td>学生姓名</td>
			<td><input type="text" name="name"><b style="color: red">{{$errors->first('name')}}</b></td>
		</tr>
		<tr>
			<td>学生性别</td>
			<td>
				<input type="radio" value="1" name="sex" checked>男
				<input type="radio" value="2" name="sex">女
			</td>
		</tr>
		<!-- <tr>
			<td>班级</td>
			<td><input type="text" name="class"></td>
		</tr> -->
		<tr>
			<td>成绩</td>
			<td><input type="text" name="cj"><b style="color: red">{{$errors->first('cj')}}</b></td>
		</tr>
		<tr>
			<td><input type="submit" value="添加"></td>
			<td></td>
		</tr>
	</table>
</form>
</body>
</html>