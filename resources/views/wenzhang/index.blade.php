<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<script src="/static/js/jquery.min.js"></script>
<meta name="csrf-token" content="{{csrf_token()}}">
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
	<form action="{{url('/wenzhang/adddo')}}" method="post" enctype="multipart/form-data">
		@csrf
		<table>
			<tr>
				<td>文章标题</td>
				<td><input type="text" name="bname"><b style="color:red">{{$errors->first('bname')}}</b></td>
			</tr>
			<tr>
				<td>文章分类</td>
				<td>
					<select name="bfl">
						<option value="文学">文学</option>
						<option value="天学">天学</option>
						<option value="励志">励志</option>
						<option value="普通">普通</option>
					</select>
					<b style="color:red">{{$errors->first('bfl')}}</b>
				</td>
			</tr>
			<tr>
				<td>文章重要性</td>
				<td>
					<input type="radio" name="bzyx" value="1" checked>普通
					<input type="radio" name="bzyx" value="2">置顶
				</td>
			</tr>
			<tr>
				<td>是否显示</td>
				<td>
					<input type="radio" name="bxs" value="1" checked>显示
					<input type="radio" name="bxs" value="2">不显示
				</td>
			</tr>
			<tr>
				<td>文章作者</td>
				<td><input type="text" name="bzz"><b style="color:red">{{$errors->first('bzz')}}</b></td>
			</tr>
			<tr>
				<td>作者email</td>
				<td><input type="text" name="bemail"></td>
			</tr>
			<tr>
				<td>关键字</td>
				<td><input type="text" name="bgjz"></td>
			</tr>
			<tr>
				<td>网页描述</td>
				<td><textarea name="bdesc"></textarea></td>
			</tr>
			<tr>
				<td>上传文件</td>
				<td><input type="file" name="bimg"></td>
			</tr>
			<tr>
				<td><input type="button" value="添加"></td>
				<td><input type="reset" value="重置"></td>
			</tr>
		</table>
	</form>
	<script>
		$.ajaxSetup({ headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')}});
	// $('input[name="bzz"]').blur(function(){
	// 	$(this).next().html('');
	// 	var bzz=$(this).val();
	// 	var reg=/^[\u4e00-\u9fa50-9A-Za-z_]{2,8}$/;
	// 	if(!reg.test(bzz)){
	// 		$(this).next().html('文章作者由中文字幕数字组成切不能为空长度为2-8');
	// 		return;
	// 	}
	// })
$('input[type="button"]').click(function(){
	var titleflage=true;
	$('input[name="bname"]').next().html('');
	//标题验证
	var bname =$('input[name="bname"]').val();
	var reg=/^[\u4e00-\u9fa50-9A-Za-z_]+$/;
	if(!reg.test(bname)){
		$('input[name="bname"]').next().html('文章标题由中文字母数字组成且不能为空');
		return;
	}

	//验证唯一性
	$.ajax({
			type:'post',
			url:"/wenzhang/checkOnly",
			data:{bname:bname},
			asyuc:false,
			dataType:'json',
			success:function(result){
				if(result.count>0){
					$('input[name="bname"]').next().html('标题存在');
					titleflage=false;
				}
			}
		});
	if(!titleflage){
		return;
	}

	//作者验证
	var bzz=$('input[name="bzz"]').val();
	var reg=/^[\u4e00-\u9fa50-9A-Za-z_]{2,8}$/;
	if(!reg.test(bzz)){
		$('input[name="bzz"]').next().html('文章作者由中文字幕数字组成切不能为空长度为2-8');
		return;
	}
	//form提交
	$('form').submit();
})
	// $('input[name="bname"]').blur(function(){
	// 	$(this).next().html('');
	// 	var bname =$(this).val();
	// 	var reg=/^[\u4e00-\u9fa50-9A-Za-z_]+$/;
	// 	if(!reg.test(bname)){
	// 		$(this).next().html('文章标题由中文字母数字组成且不能为空');
	// 		return;
	// 	}
	// 	$.ajaxSetup({ headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')}});
	// 	$.ajax({
	// 		type:'post',
	// 		url:"wenzhang/checkOnly",
	// 		data:{bname:bname},
	// 		dataType:'json',
	// 		success:function(result){
	// 			if(result.count>0){
	// 				$('input[name="bname"]').next().html('标题存在');
	// 			}
	// 		}
	// 	});
	// })
</script>
</body>
</html>
​
