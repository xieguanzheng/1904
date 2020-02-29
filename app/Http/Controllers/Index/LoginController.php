<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use AlibabaCloud\Client\AlibabaCloud;
use AlibabaCloud\Client\Exception\ClientException;
use AlibabaCloud\Client\Exception\ServerException;

use App\Member;
class LoginController extends Controller
{
    public function reg(){
    	return view('index.reg');
    }
    //发送短信
    public function ajaxsend(){
        $mobile=request()->mobile;
        $code=rand(1000,9999);
        $res=$this->sendSms($mobile,$code);
        //dd($res);
        if( $res['Code']=='OK'){
            session(['code'=>$code]);
            request()->session()->save();
            echo json_encode(['code'=>'00000','msg'=>'ok']);die;
        }
        echo json_encode(['code'=>'00001','msg'=>'短信发送失败']);die;
    }

    public function sendSms($mobile,$code){
            AlibabaCloud::accessKeyClient('LTAI4FfPxp41TZa6n6Xkpdzn', '8WwHq0KcLEriJsXY1QwozULpGuocv0')
                        ->regionId('cn-hangzhou')
                        ->asDefaultClient();

            try {
                $result = AlibabaCloud::rpc()
                          ->product('Dysmsapi')
                          // ->scheme('https') // https | http
                          ->version('2017-05-25')
                          ->action('SendSms')
                          ->method('POST')
                          ->host('dysmsapi.aliyuncs.com')
                          ->options([
                                        'query' => [
                                          'RegionId' => "cn-hangzhou",
                                          'PhoneNumbers' =>$mobile,
                                          'SignName' => "云里",
                                          'TemplateCode' => "SMS_181850271",
                                          'TemplateParam' => "{code:$code}",
                                        ],
                                    ])
                          ->request();
            return $result->toArray();
                } catch (ClientException $e) {
                    return $e->getErrorMessage();
                } catch (ServerException $e) {
                    return $e->getErrorMessage();
                }
        }

    public function regdo(){
    	$post=request()->except('_token');
    	$code=session('code');

    	//判断验证码
    	if($code!=$post['code']){
    		return redirect('/reg')->with('msg','您输入的验证码不对');
    	}

    	//密码和确认密码是否一致
    	if($post['pwd']!=$post['repwd']){
    		return redirect('/reg')->with('msg','两次密码不一致');
    	}
    	//入库
    	$user=[
    		'mobile'=>$post['mobile'],
    		'pwd'=>encrypt($post['pwd']),
    		'add_time'=>time(),
    	];
    	$res=Member::create($user);

    	if($res){
    		return redirect('/login');
    	}
    }
}
