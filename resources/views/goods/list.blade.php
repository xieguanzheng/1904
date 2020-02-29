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
<center><h2>商品展示列表</h2></center>
<form>
  <input type="text" name="g_name" value="{{$query['g_name']??''}}" placeholder="请输入关键字">
  <button>搜索</button>
</form>
<table class="table">
  <thead>
    <tr>
      <th>id</th>
      <th>分类名称</th>
      <th>父级分类</th>
      <th>分类描述</th>
      <th>操作</th>
      </tr>
  </thead>
  <tbody>
  @foreach($goods as $k=>$v)
    <tr>
      <td>{{$v->g_id}}</td>
      <td>{{$v->g_name}}</td>
      <td>{{str_repeat('|——',$v->level)}}{{$v->g_name}}</td> 
      <td>{{$v->g_desc}}</td>
      <td>
        <!-- <a href="{{url('goods/delete/'.$v->g_id)}}">删除</a> -->
        <a href="javascript:void(0)" class="del" g_id="{{$v->g_id}}">删除</a>
        <a href="{{url('goods/update/'.$v->g_id)}}">编辑</a>
        <a href="{{url('goods/update/'.$v->g_id)}}">预览详情</a>
      </td> 
    </tr>
    @endforeach
    <tr><td colspan="11">{{$goods->appends($query)->links()}}</td></tr>
  </tbody>
  
</table>
<script>
  //ajax分页
  $(document).on("click",'.pagination a',function(){
    var url=$(this).atrr
  }
  // $(document).on("click",'del',function(id){
  //   if(!id){
  //     return;
  //   }
  //   if(confirm('是否要删除此条记录')){
  //       $.get(
  //             '/goods/checkOnly'+id,
  //             function(res){
  //                if(res.code=='00000'){
  //                  location.reload();
  //                }
  //             },'json'
  //       )
  //   }
  // }
</script>
</body>
</html>