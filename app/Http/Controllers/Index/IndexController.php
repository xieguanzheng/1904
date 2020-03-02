<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Users;
use App\Goodss;
use App\Member;
use App\Admin;
use AlibabaCloud\Client\AlibabaCloud;
use AlibabaCloud\Client\Exception\ClientException;
use AlibabaCloud\Client\Exception\ServerException;
class IndexController extends Controller
{
	public function setCookie(){
		//第一种
		//return response('测试产生cookie')->cookie('name','谢观政',2);
		//第二种 cookie全局辅助函数
		//$cookie=cookie('name','mss',2);
	}
    //
    public function index(){
    	echo request()->cookie('name');
    	return view('index.index');
    }
     public function login(){
        return view('index.login');
    }
    public function logindo(){
        $data=request()->except('_token');
        $admin=Admin::where($data)->first();
        dump($admin);
        if($admin){
            return redirect('/');
        }
    }

 //列表展示
 public function prolist(){
     $data=Goodss::select('*')->get();
     return view('index.prolist',['data'=>$data]);
}
//列表详情
public function proinfo($id){
    $data=Goodss::where('shop_id',$id)->first();
    return view('index.proinfo',['data'=>$data]);
}

public function car(){
    $data=Goodss::select('*')->get();
    return view('index.car',['data'=>$data]);
}
    

    
}
