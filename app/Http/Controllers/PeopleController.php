<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\People;
use App\Http\Requests\StorePeoplePost;
use Validator;
class PeopleController extends Controller
{
    //展示
    public function index(){
        //搜索
        $username=request()->username??'';
        $where=[];
        if($username){
            $where[]=['username','like',"%$username%"];
        }
       $pageSize=config('app.pageSize');
       $data=people::where($where)->orderby('p_id','desc')->paginate($pageSize);
    	return view('people.index',['data'=>$data,'username'=>$username]);
    }

    public function create(){
    	return view("people.create");
    }
    //添加
    public function store(Request $request){
    //public function store(StorePeoplePost $request){
        //第一种验证
        // $request->validate([
        //     'username' => 'required|unique:posts|max:12|min:2',
        //     'age' => 'required|integer|min:2|max:3',
        // ],[
        //     'username.required'=>'名字不能为空',
        //     'username.unique'=>'名字已存在',
        //     'username.max'=>'名字长度不超过12位',
        //     'username.min'=>'名字长度不少于2位',
        //     'age.required'=>'年龄不能为空',
        //     'age.integer'=>'年龄必须为数字',
        //     'age.min'=>'年龄数据不合法',
        //     'age.required'=>'年龄数据不合法',
        // ]);


    	$data =$request->except('_token');//except 排除

        //第三种验证
        $validator = Validator::make($data,[
            'username' => 'required|unique:people|max:12|min:2',
            'age' => 'required|integer|between:1,130',
        ],[
            'username.required'=>'名字不能为空',
            'username.unique'=>'名字已存在',
            'username.max'=>'名字长度不超过12位',
            'username.min'=>'名字长度不少于2位',
            'age.required'=>'年龄不能为空',
            'age.integer'=>'年龄必须为数字',
            'age.between'=>'年龄数据不合法',
        ]);
        if ($validator->fails()){
            return redirect('people/create')
                ->withErrors($validator)
                ->withInput();
        }

    	//文件上传
        if($request->hasFile('head')){
            $data['head']=$this->upload('head');
        }
        $data['add_time']=time();
    	$res=DB::table('people')->insert($data);
    	//dd($res);
    	if($res){
    		return redirect('/people');
    	}
    }
    //文件上传
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
    //修改1
    public function edit($id){
    	//echo $id;
    	$user = DB::table('people')->where('p_id',$id)->first();
    	return view('people.edit',['user'=>$user]);
    }
    //修改2
    public function update(Request $request, $id){
    	//echo $id;
    	$user=$request->except('_token');
        if($request->hasFile('head')){
            $user['head']=$this->upload('head');
        }
    	$res=DB::table("people")->where('p_id',$id)->update($user);
    	//dd($res);
    	if($res!==false){
    		return redirect('/people');
    	}
    }
    //删除
    public function destroy($id){
    	//echo $id;
    	$res=DB::table('people')->where('p_id',$id)->delete();
    	if($res){
    		return redirect("/people");
    	}
    }
}
