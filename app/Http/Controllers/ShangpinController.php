<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ShangpinController extends Controller
{
    public function index(){
    	return view('shangpin.index');
    }
    public function add(Request $request){
        $data =$request->except('_token');
        //dd($data);
        if($request->hasFile('img')){
            $data['img']=$this->upload('img');
        }
        $res=DB::table("shangpin")->insert($data);
        if($res){
            return redirect("/shangpin/list");
        }
    }

        public function upload($filename){
        //判断上传过程有无错误
        if(request()->file($filename)->isValid()){
            //接收值
            $photo=request()->file($filename);
            //上传
            $store_result=$photo->store('uploads');
            return $store_result;
        }
        exit('未获得到上传文件或上传过程出错');
    }

    public function list(){
        $data=DB::table("shangpin")->select('*')->get();
        return view("shangpin.list",['data'=>$data]);
    }
    public function update($id){
        $data=DB::table("shangpin")->where('id',$id)->first();
        return view("shangpin.update",['data'=>$data]);
    }
    public function upddo(Request $request,$id){
        $data =$request->except('_token');
        if($request->hasFile('img')){
            $data['img']=$this->upload('img');
        }
        $res=DB::table("shangpin")->where('id',$id)->update($data);
        if($res!==false){
            return redirect("/shangpin/list");
        }
    }
    public function delete($id){
        $res=DB::table("shangpin")->where('id',$id)->delete();
        if($res){
            return redirect("/shangpin/list");
        }
    }
}
