<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h2>修改页面</h2>
		@if ($errors->any())
	<div class="alert alert-danger">
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif
<form action="{{url('/student/upddo/'.$user->id)}}" method="post">
	@csrf
	<table>
		<tr>
			<td>学生姓名</td>
			<td><input type="text" name="name" value="{{$user->name}}"><b style="color: red">{{$errors->first('name')}}</b></td>
		</tr>
		<tr>
			<td>学生性别</td>
			<td>
				<input type="radio" value="1" name="sex" @if($user->sex==1)checked @endif>男
				<input type="radio" value="2" name="sex" @if($user->sex==2)checked @endif>女
			</td>
		</tr>
		<tr>
			<td>成绩</td>
			<td><input type="text" name="cj" value="{{$user->cj}}"><b style="color: red">{{$errors->first('cj')}}</td>
		</tr>
		<tr>
			<td><input type="submit" value="修改"></td>
			<td></td>
		</tr>
	</table>
</form>
</body>
</html>