<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wenzhang;
use Validator;
use App\Http\Requests\StoreWenzhangPost;
use DB;
class WenzhangController extends Controller
{
    //展示
    public function index(){
        return view("wenzhang.index");
    }
    public function checkOnly(){
            $bname=request()->bname;
            $where=[];
            if($bname){
                $where[]=['bname','=',$bname];
            }
            //排除自身
            $bid=request()->bid;
            if($bid){
                $where[]=['bid','!=',$bid];
            }
            $count =Wenzhang::where($where)->count();
            echo json_encode(['code'=>'00000','msg'=>'ok','count'=>$count]);
        //     \DB::connection()->enableQueryLog();
        // $count = News::where($where)->count();
        // $logs = \DB::getQueryLog();
        // dd($logs);

        }
    //添加
    public function adddo(Request $request){
        $data=$request->except('_token');
        //dd($data);
        $data['btime']=time();
        if($request->hasFile('bimg')){
            $data['bimg']=$this->upload('bimg');
        }
        $validator = Validator::make($data,[
            'bname' => 'required|unique:wenzhang|regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9]{2,12}$/u',
            'bfl'=>'required',
        ],[
            'bname.required'=>'文章标题字必填',
            'bname.unique'=>'文章标题已存在',
            'bname.regex'=>'文章标题须为中文，字母，数字，下划线',
            'bfl.required'=>'文章分类不能为空',
        ]);
        if ($validator->fails()){
            return redirect('/wenzhang')
                ->withErrors($validator)
                ->withInput();
        }
        
        $res=DB::table("wenzhang")->insert($data);
        if($res){
            return redirect("/wenzhang/list");
        }
    }
    //文件上传
    public function upload($filename){
        //判断上传过程有无错误
        if(request()->file($filename)->isvalid()){
            //接收值
            $photo=request()->file($filename);
            //上传
            $store_result=$photo->store('uploads');
            return $store_result;
        }
        exit('未获得到上传文件或上传过程出错');
    }
    public function list(){
        $bname=request()->bname??'';
        $where=[];
        if($bname){
            $where[]=['bname','like',"%$bname%"];
        }
        $pageSize=config('app.pageSize');
        $data=DB::table("wenzhang")->where($where)->paginate($pageSize);
        return view("wenzhang.list",['data'=>$data,'bname'=>$bname]);
    }
    public function destroy($bid){
        echo $bid;
        // $res=wenzhang::destroy($bid);
        // if($res){
        //     echo json_encode(['code'=>'00000','msg'=>'ok']);
        // }
    }

    public function upd($bid){
        $data=DB::table("wenzhang")->where('bid',$bid)->first();
        return view("wenzhang.upd",['data'=>$data]);
    }
    //修改
    public function upddo(Request $request,$bid){
        $data=$request->except('_token');
        //dd($data);
        $data['btime']=time();
        if($request->hasFile('bimg')){
            $data['bimg']=$this->upload('bimg');
        }
        $validator = Validator::make($data,[
            'bname' => 'required|unique:wenzhang|regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9]{2,12}$/u',
            'bfl'=>'required',
        ],[
            'bname.required'=>'文章标题必填',
            'bname.unique'=>'文章标题已存在',
            'bname.regex'=>'文章标题须为中文，字母，数字，下划线',
            'bfl.required'=>'文章分类不能为空',
        ]);
        if ($validator->fails()){
            return redirect('wenzhang/upd/'.$bid)
                ->withErrors($validator)
                ->withInput();
        }
        
        $res=DB::table("wenzhang")->where('bid',$bid)->update($data);
        if($res){
            return redirect("/wenzhang/list");
        }
    }
}
