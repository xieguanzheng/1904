<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBrnadPost;
use App\Brand;
use Validator;
class BrandController extends Controller
{
	public function create(){
        return view("admin.create");
    }

    public function adddo(request $request){
        $data=$request->except('_token');
        $validator=Validator::make($data,[
                'b_name'=>'required|unique:goods_brand|max:12|min:2',
                'b_url'=>'required|unique:goods_brand|',
                ],[
             'b_name.required'=>'品牌名称不能为空',
             'b_name.unique'=>'品牌名称已存在',
             'b_name.max'=>'品牌名称长度不能超过12位',
             'b_name.min'=>'品牌名称长度不能少于2位',
             'b_url.required'=>'品牌地址不能为空',
             'b_url.unique'=>'品牌地址已存在',
        ]);
        if ($validator->fails()){
            return redirect('admin/create')
                ->withErrors($validator)
                ->withInput();
        }
        //文件上传
        if($request->hasFile('b_img')){
            $data['b_img']=$this->upload('b_img');
        }
        
        //dd($data);
        $res=Brand::insert($data);
        if($res){
            return redirect('/admin');
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

    public function index(){
        $pageSize=config('app.pageSize');
        $data=Brand::paginate($pageSize);
        return view('admin.index',['data'=>$data]);
    }
    
    public function destroy($id){
        $res=Brand::where('b_id',$id)->delete();
        if($res){
            echo json_encode(['code'=>'00000','msg'=>'ok']);
        }
    }

    public function edit($id){
        $data=Brand::where('b_id',$id)->first();
        return view('admin.edit',['data'=>$data]);
    }

    public function upd(request $request, $id){
        $data=$request->except('_token');
        //文件上传
        if($request->hasFile('b_img')){
            $data['b_img']=$this->upload('b_img');
        }
        //dd($data);
        $res=Brand::where('b_id',$id)->update($data);
        if($res){
            return redirect('/admin');
        }
    }
}
