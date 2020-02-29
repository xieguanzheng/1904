<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 // use DB;
use App\Goods;
use App\Http\Requests\StorePeoplePost;
use Validator;
use Illuminate\Validation\Rule;
use Illuminate\support\Facades\Cache;

use Illuminate\Support\Facades\Redis;
class GoodsController extends Controller
{
    
    public function index(){

        $goods=Goods::all();
       // dd($goods);
        $goods=addTree($goods);
        //dd($goods);
        return view('goods.index',['goods'=>$goods]);
    }
    

    public function add(request $request){
       // 第一种验证
        
        $data=$request->except('_token');
        $res=Goods::insert($data);
        if($res){
            return redirect('/goods/list');
        }
    }
    
    public function list(){
        $g_name=request()->g_name??'';
        $where=[];
        if($g_name){
            $where[]=['g_name','like',"%$g_name%"];
        }
        //Cache::flush();
        //dd($where);
        $page=request()->page??1;
       // echo 'goods_'.$page.'_'.$g_name;
        
        //$goods=Cache::get('goods');
        $goods = Redis::get('goods_'.$page.'_'.$g_name);
        
        //dd($goods);
        if(!$goods){
            echo "走DB==";
            $pageSize=config('app.pageSize');
            $goods=Goods::where($where)->orderby('g_id','desc')->paginate($pageSize);
           
         //cache(['goods_'.$page.'_'.$g_name=>$goods],60*60*24*30);
         //系列化结果集 将object转化
         $goods=serialize($goods);
         Redis::setex('goods_'.$page.'_'.$g_name,60,$goods);
        }
        //反序列化结果集
        $goods=unserialize($goods);
        return view('goods.list',['goods'=>$goods,'query'=>request()->all()]);
    }

    public function update($id)
    {
        $res=Goods::where('g_id',$id)->first();
        return view('goods.update',['res'=>$res]);
    }
public function checkOnly(){
            $gname=request()->gname;
            $where=[];
            if($gname){
                $where[]=['gname','=',$gname];
            }
            $count =goods::where($where)->count();
            echo json_encode(['code'=>'00000','msg'=>'ok','count'=>$count]);
        }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function upddo(Request $request, $id)
    {
        $request->validate([
            'g_name'=>'required',
            'g_fl' => 'required',
            
             
        ],[ 
            'g_name.required'=>'分类名称不能为空',
            'g_fl.required'=>'父级分类不能为空',
             
        ]);

        $data=$request->except('_token');
         
        $res=Goods::where('g_id',$id)->update($data);
        if($res!==false){
            return redirect('/goods/list');
        }
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $res=Goods::where('g_id',$id)->delete();
        if($res){
            return redirect('/goods/list');
        }
    }
}
