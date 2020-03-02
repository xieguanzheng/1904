<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Goods_admin;
use App\Http\Requests\StoreGoods_adminPost;
use Validator;
//use DB;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *列表页展示
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_account=request()->user_account??'';
        $where=[];
        if($user_account){
            $where[]=['user_account','like',"%$user_account%"];
        }
     // $data =DB::table('people')->select('*')->get();
     //$data=People::all();
     $pageSize=config('app.pageSize');

      $data=Goods_admin::where($where)->orderby('user_id','desc')->paginate($pageSize);
     //dd($data);
       return view('goods_admin.index',['data'=>$data,'user_account'=>$user_account]); 
    }

    /**
     * Show the form for creating a new resource.
     *添加页面
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    return view('goods_admin.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *执行添加
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    //public function store(StorePeoplePost $request)
    {
    
        $data =$request->except('_token');
        //dd($data);
        //第三章
        $validator=Validator::make($data,[
                'user_account'=>'required|unique:Goods_admin|max:12|min:2',
                
                ],[
            
             'user_account.required'=>'管理员不能为空',
             'user_account.unique'=>'管理员存在',
             'user_account.max'=>'名字长度不能错过12位',
             'user_account.min'=>'名字不长度不少于2位',
            
      
        ]);
        if($validator->fails()){
            return redirect('goods_admin/create')
            ->withErrors($validator)
            ->withInput();
        }
    
    
        
       
        $res=Goods_admin::insert($data);
       // dd($res);
        if($res){
            return redirect('/goods_admin');
        }
    }
    /**上传文件
     * [upload description]
     * @param  [type] $filename [description]
     * @return [type]           [description]
     */
        public function upload($filename){
        
        }
    /**
     * Display the specified resource.
     *预留详情页
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *编辑页面
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      //$user =DB::table('people')->where('p_id',$id)->first();
       // $user=People::find($id);
          $user=Goods_admin::where('user_id',$id)->first();
     return view('goods_admin.edit',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *执行编辑
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //echo $id;
        $user =$request->except('_token');
       // dd($user);
          if($request->hasFile('head')){
            $user['head']=$this->upload('head');
           // dd($img);
        }
      $res=Goods_admin::where('user_id',$id)->update($user);
        if($res!==false){
            return redirect('/goods_admin');
        } 
        
    }

    /**
     * Remove the specified resource from storage.
     *删除方法
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     
      $res=Goods_admin::destroy($id);
      if($res){
        return redirect('/goods_admin');
      }
    }
}

