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
<center><h1>库存管理后台</h1></center>
<meta name="csrf-token" content="{{ csrf_token()}}">
<a href="{{url('/gly/login')}}">进入库存添加页面</a>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>用户名称</th>
            <th>用户身份</th>
            <th>操作</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $k=>$v)
        <tr @if($k%2==0) class="active" @else class="success" @endif gid="{{$v->gid}}">
            <th>{{$v->gid}}</th>
            <th>{{$v->gname}}</th>
            <th>@if($v->gly==1)主管员 @else 库管员 @endif</th>
            <th>
                <a href="javascript:void(0)" class="del" gid="{{$v->gid}}">删除</a>
                <a href="{{url('gly/edit/'.$v->gid)}}">修改</a>
            </th>
        </tr>
        @endforeach
    </tbody>
</table>
<script>
    $.ajaxSetup({headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')}});
    $(document).on('click','.del',function(){
      var _this=$(this);
       var gid= _this.attr('gid');
        if (confirm('确定删除吗?')) {
            $.post(
                    "/gly/destroy/"+gid,
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