<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Gly;
class GlyController extends Controller
{
    public function login(){
        return view('gly.login');
    }

    public function logindo(request $request){
        $data=$request->except('_token');
        $data=Gly::insert($data);
        if($data){
            return redirect('/gly/list');
        }
    }

    public function list(){
        $data=DB::table("gly")->select('*')->get();
        return view('gly.list',['data'=>$data]);
    }

    public function destroy($id){
        //echo $id;
        $res=Gly::where('gid',$id)->delete();
        if($res){
            echo json_encode(['code'=>'00000','msg'=>'ok']);
        }
    }
    public function edit($id){
        $data=gly::where('gid',$id)->first();
        return view('gly.edit',['data'=>$data]);
    }

    public function upd(request $request,$id){
        $data=$request->except('_token');
        $data=gly::where('gid',$id)->update($data);
        if($data){
            return redirect('/gly/list');
        }
    }
}
