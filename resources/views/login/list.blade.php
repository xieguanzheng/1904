<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>管理员列表</title>
	<link rel="stylesheet" href="/static/css/bootstrap.min.css">  
	<script src="/static/js/jquery.min.js"></script>
	<script src="/static/js/bootstrap.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token()}}">
</head>
<body>
<center>
<h1>管理员列表</h1><hr>
<table class="table">
	@csrf
	<thead>
		<tr>
			<th>id</th>
			<th>用户名</th>
			<th>手机号</th>
			<th>邮箱</th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
		@foreach($data as $k=>$v)
		<tr @if($k%2==0) class="active" @else class="success" @endif  admin_id="{{$v->admin_id}}">
			<td>{{$v->admin_id}}</td>
			<td>{{$v->username}}</td>
			<td>{{$v->tel}}</td>
			<td>{{$v->email}}</td>
			<td>
				<a href="{{url('login/edit/'.$v->admin_id)}}">编辑</a>
				<a href="javascript:void(0)" class="del" admin_id="{{$v->admin_id}}">删除</a>
			</td>
		</tr>
		@endforeach
		<tr><td colspan="7">{{$data->links()}}</td></tr>
	</tbody>
</table>
</center>
</body>
<script src="/static/js/jquery.min.js"></script>
<script>
    $.ajaxSetup({headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')}});
    $(document).on('click','.del',function(){
      var _this=$(this);
       var admin_id= _this.attr('admin_id');
        if (confirm('确定删除吗?')) {
            $.post(
                    "/login/destroy/"+admin_id,
                    function (res) {
                        if (res.code==00000){
                            location.reload();
                            alert('已删除');
                        }else{
                            alert('删除失败');
                        }
                    }, 'json'
            )
        }
   })
</script>
</html>