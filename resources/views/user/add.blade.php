<form action="{{url('/adddo')}}" method="post">
@csrf
<input type="text" name="name"/>
<input type="number" name="age"/>
<input type="submit" value="添加"/>
</form>