<form action="{{url('/adddo')}}" method="post">
@csrf
用户名<input type="text" name="name"/><br>
密码<input type="number" name="pwd"/><br>
<input type="submit" value="提交"/><br>
</form>