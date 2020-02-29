<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
class LoginController extends Controller
{
    public function login(){
        return view("login.login");
    }
    public function logindo(Request $request){
    	$user=$request->except('_token');
        //dd($user);
    	$user['password']=md5(md5($user['password']));
    	//$admin=Admin::where($user)->first();
        $admin=Admin::insert($user);
    	if($admin){
    		session(['adminuser'=>$admin]);
    		$request->session()->save();
    		return redirect('/gly/list');
    	}
    	return redirect('/login')->with('msg','没有此用户');
    }
    public function list(){
        $pageSize=config('app.pageSize');
        $data=Admin::paginate($pageSize);
        return view('login.list',['data'=>$data]);
    }
    public function destroy($id){
        $res=Admin::where('admin_id',$id)->delete();
        if($res){
            echo json_encode(['code'=>'00000','msg'=>'ok']);
        }
    }

    public function edit($id){
        $data=Admin::where('admin_id',$id)->first();
        return view('login.edit',['data'=>$data]);
    }

    public function upd(Request $request, $id){
        $user=$request->except('_token');
        $res=Admin::where('admin_id',$id)->update($user);
        if($res){
            return redirect('/login/list');
        }
    }
}
