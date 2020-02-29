<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style>
        ul li{
            float: left;
            margin-left: 20px;
            list-style: none;
            color: orange;
        }
    </style>
<body>
		<form>
			<input type="text" name="name" value="{{$name}}" placeholder="请输入">
			<input type="submit" value="搜索">
		</form>
	<table border="1">
		<tr>
			<td>id</td>
			<td>学生姓名</td>
			<td>学生性别</td>
			<td>成绩</td>
			<td>操作</td>
		</tr>
		@foreach($data as $k=>$v)
		<tr>
			<td>{{$v->id}}</td>
			<td>{{$v->name}}</td>
			<td>{{$v->sex==1?'男':'女'}}</td>
			<td>{{$v->cj}}</td>
			<td>
				<a href="{{url('student/update/'.$v->id)}}">编辑</a>
				<a href="{{url('student/delete/'.$v->id)}}">删除</a>
			</td>
		</tr>
		@endforeach
	</table>
	{{$data->appends(['name'=>$name])->links()}}
</body>
</html>