      @extends('layouts.shop')
      @section('title','注册')

      @section('content')
     <div class="head-top">
      <img src="/static/index/images/head.jpg" />
     </div><!--head-top/-->
     <form action="{{url('/regdo')}}" method="post" class="reg-login">
      @csrf
      <h3>已经有账号了？点此<a class="orange" href="{{url('/login')}}">登陆</a></h3>
      <div class="lrBox">
       <div class="lrList"><input type="text" name="mobile" placeholder="输入手机号码或者邮箱号" /></div>
       <div class="lrList2"><input type="text" name="code" placeholder="输入短信验证码" /> <button type="button">获取验证码</button></div>
       <div class="lrList"><input type="text" name="pwd" placeholder="设置新密码（6-18位数字或字母）" /></div>
       <div class="lrList"><input type="text" name="repwd" placeholder="再次输入密码" /></div>
      </div><!--lrBox/-->
      <div class="lrSub">
       <input type="submit" value="立即注册" />
      </div>
     </form><!--reg-login/-->
     

     <script>
        $('button').click(function(){
          var mobile=$('input[name="mobile"]').val();
          //alert(mobile);
          if(!mobile){
            alert('请输入手机号或者邮箱！');
            return;
          }

          $.get(
              '/ajaxsend',
              {mobile:mobile},
              function(result){
                if(result.code=='00000'){
                  alert('发送成功！');
                }
                // alert(result);
              },'json');
        });

     </script>
@endsection