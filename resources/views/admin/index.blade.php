<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>Bootstrap 实例 - 水平表单</title>
	<link rel="stylesheet" href="/static/css/bootstrap.min.css">  
	<script src="/static/js/jquery.min.js"></script>
	<script src="/static/js/bootstrap.min.js"></script>
	<meta name="csrf-token" content="{{ csrf_token()}}">
</head>
<body>
<center>
<h1>品牌展示列表</h1><hr>
<table class="table">
	<thead>
		<tr>
			<th>品牌id</th>
			<th>品牌名称</th>
			<th>品牌logo</th>
			<th>品牌地址</th>
			<th>品牌详情</th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
		@foreach($data as $k=>$v)
		<tr b_id="{{$v->b_id}}" @if($k%2==0) class="active" @else class="success" @endif>
			<td>{{$v->b_id}}</td>
			<td>{{$v->b_name}}</td>
			<td>@if($v->b_img)<img src="{{env('UPLOAD_URL')}}{{$v->b_img}}" width="50" height="50">@endif</td>
			<td>{{$v->b_url}}</td>
			<td>{{$v->b_desc}}</td>
			<td>
            	<a href="{{url('/admin/edit/'.$v->b_id)}}" class="btn btn-info">编辑</a>
				<a href="javascript:void(0)" class="btn btn-danger del" b_id="{{$v->b_id}}">删除</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
{{$data->links()}}
</center>
</body>
<script>
    $.ajaxSetup({headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')}});
    $(document).on('click','.del',function(){
      var _this=$(this);
       var b_id= _this.attr('b_id');
        if (confirm('确定删除吗?')) {
            $.post(
                    "/admin/destroy/"+b_id,
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