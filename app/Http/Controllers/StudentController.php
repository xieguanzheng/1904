<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Student;
use App\Http\Requests\StoreStudentPost;
use Validator;
class StudentController extends Controller
{
    public function index(){
    	return view('student.index');
    }
    public function add(Request $request){
        $data =$request->except('_token');
        //dd($data);
        
        $validator = Validator::make($data,[
            'name' => 'required|unique:student|regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9]{2,12}$/u',
            'sex'=>'required|numeric',
            'cj' => 'required|integer|between:1,100',
        ],[
            'name.required'=>'名字必填',
            'name.unique'=>'名字已存在',
            'name.regex'=>'须为中文，字母，数字，下划线，且不能少于2位或大于12位',
            'sex.required'=>'性别必填',
            'sex.numeric'=>'必须是数值',
            'cj.required'=>'成绩必填',
            'cj.integer'=>'必须是数值',
            'cj.between'=>'值不能超过100',
        ]);
        if ($validator->fails()){
            return redirect('student/index')
                ->withErrors($validator)
                ->withInput();
        }

        $res=DB::table("student")->insert($data);
        if($res){
            return redirect("/student/list");
        }
    }
    public function list(){
        $name=request()->name??'';
        $where=[];
        if($name){
            $where[]=['name','like',"%$name%"];
        }
        $pageSize=config('app.pageSize');
        $data=student::where($where)->paginate($pageSize);
        return view("student.list",['data'=>$data,'name'=>$name]);
    }



    public function update($id){
        $user=DB::table("student")->where('id',$id)->first();
        return view("student.update",['user'=>$user]);
    }
    public function upddo(Request $request,$id){
        $user =$request->except('_token');
        $validator = Validator::make($user,[
            'name' => 'required|unique:student|regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9]{2,12}$/u',
            'sex'=>'required|numeric',
            'cj' => 'required|integer|between:1,100',
        ],[
            'name.required'=>'名字必填',
            'name.unique'=>'名字已存在',
            'name.regex'=>'须为中文，字母，数字，下划线，且不能少于2位或大于12位',
            'sex.required'=>'性别必填',
            'sex.numeric'=>'必须是数值',
            'cj.required'=>'成绩必填',
            'cj.integer'=>'必须是数值',
            'cj.between'=>'值不能超过100',
        ]);
        if ($validator->fails()){
            return redirect('student/update/'.$id)
                ->withErrors($validator)
                ->withInput();
        }
        $res=DB::table("student")->where('id',$id)->update($user);
        if($res!==false){
            return redirect("/student/list");
        }
    }
    public function delete($id){
        $res=DB::table("student")->where('id',$id)->delete();
        if($res){
            return redirect("/student/list");
        }
    }
}
