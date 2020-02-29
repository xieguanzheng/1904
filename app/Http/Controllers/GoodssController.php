<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Goodss;
use App\Http\Requests\StoreSpglPost;
use Validator;
use Illuminate\Validation\Rule;
class GoodssController extends Controller
{
    
    public function index(){
        return view('goodss.index');
    }
    public function add(request $request){
        $data=$request->except('_token');
        //dd($data);
        //文件上传
        if($request->hasFile('shop_img')){
            $data['shop_img']=$this->upload('shop_img');
        }
        //多文件上传
        if($data['shop_file']){
            $photos=Moreuploads('shop_file');
            $data['shop_file']=implode('|',$photos);
        }
        $res=Goodss::create($data);
        if($res){
            return redirect('/goodss/list');
        }
    }
    //图片上传
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
    //多文件上传
    public function up_do(Request $request)
    {
        $data = $request->file('file');
        //dd($data);die();
        foreach($data as $k => $v)
        {
            $arr[$k] = $v->store('file');
        }
        echo $arr;
    }
    public function list(){
        $pageSize=config('app.pageSize');
        $data=DB::table("goodss")->paginate($pageSize);
        return view('goodss.list',['data'=>$data]);
    }
    public function edit($id){
        $data=Goodss::where('shop_id',$id)->first();
        return view('goodss.edit',['data'=>$data]);
    }
    public function upd(Request $request, $id){
        $data=$request->except('_token');
        //dd($data);
        //文件上传
        if($request->hasFile('shop_img')){
            $data['shop_img']=$this->upload('shop_img');
        }
        //多文件上传
        if($data['shop_file']){
            $photos=Moreuploads('shop_file');
            $data['shop_file']=implode('|',$photos);
        }
        $res=Goodss::where('shop_id',$id)->update($data);
        if($res){
            return redirect('/goodss/list');
        }
    }
    public function destroy($id){
        $res=Goodss::where('shop_id',$id)->delete();
        if($res){
            echo json_encode(['code'=>'00000','msg'=>'ok']);
        }
    }
}