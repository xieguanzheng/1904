<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<script src="/static/js/jquery.min.js"></script>
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
			<input type="text" name="bname" value="{{$bname}}" placeholder="请输入">
			<input type="submit" value="搜索">
		</form>
	<table border="1">
		<tr>
			<td>编号</td>
			<td>文章标题</td>
			<td>文章分类</td>
			<td>文章重要性</td>
			<td>是否显示</td>
			<td>添加日期</td>
			<td>操作</td>
		</tr>
		@foreach($data as $k=>$v)
		<tr>
			<td>{{$v->bid}}</td>
			<td>{{$v->bname}}</td>
			<td>{{$v->bfl}}</td>
			<td>{{$v->bzyx==1?'普通':'置顶'}}</td>
			<td>{{$v->bxs==1?'√':'×'}}</td>
			<td>{{date('Y-m-d H:i:s',$v->btime)}}</td>
			<td>
				<a href="javascript:void(0)" onclick="del({{$v->bid}})">删除</a>
				<a href="{{url('wenzhang/upd/'.$v->bid)}}">修改</a>
			</td>
		</tr>
		@endforeach
	</table>
	{{$data->appends(['bname'=>$bname])->links()}}
</body>
</html>
<script>
	function del(bid){
		if(!bid){
			return;
		}
		if(confirm('是否要删除此条记录')){
			//ajax删除
			$.get('/wenzhang/destroy/'+bid,function(result){
				if(result.code=='00000'){
					location.reload();
				}
			},'json')
		}
	}
</script>