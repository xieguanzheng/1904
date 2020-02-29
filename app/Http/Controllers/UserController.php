<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
    	return view('brand.add');
    }

    
    public function adddo(Request $request){
    	//echo 123;
    	$data =$request->all();
    	dd($data);
    }
    public function add(){
        return view("brand.add");
    }
}
