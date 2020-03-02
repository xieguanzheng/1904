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
<center><h3>品牌修改页面</h3></center>
<form class="form-horizontal" action="{{url('admin/upd/'.$data->b_id)}}" method="post" role="form" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">品牌名称</label>
        <div class="col-sm-3">
            <input type="text" name="b_name" class="form-control" id="firstname"
                   placeholder="请输入品牌名称" value="{{$data->b_name}}">
            <b style="color: red">{{$errors->first('shop_name')}}</b>
        </div>
    </div>
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">品牌logo</label>
        <div class="col-sm-3">
            <input type="file" name="b_img"  id="firstname">
            <img src="{{env('UPLOAD_URL')}}{{$data->b_img}}" width="50" height="50">
            <b style="color: red">{{$errors->first('shop_img')}}</b>
        </div>
    </div>
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">品牌地址</label>
        <div class="col-sm-3">
            <input type="text" name="b_url" class="form-control" id="firstname"
                   placeholder="请输入品牌地址" value="{{$data->b_url}}">
            <b style="color: red">{{$errors->first('shop_name')}}</b>
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">品牌详情</label>
        <div class="col-sm-10">
            <textarea name="b_desc" id="" cols="20" rows="6">{{$data->b_desc}}</textarea>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
             <input type="submit" value="修改品牌">
        </div>
    </div>
</form>
</body>
</html>