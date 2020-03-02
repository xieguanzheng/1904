<?php

/**
 * 公用的方法  返回json数据，进行信息的提示
 * @param $status 状态
 * @param string $message 提示信息
 * @param array $data 返回数据
 */
function showMsg($status,$message = '',$data = array()){
    $result = array(
        'status' => $status,
        'message' =>$message,
        'data' =>$data
    );
    exit(json_encode($result));
}

function CreateTree($data,$parent_id=0,$level=0){
    if(!$data){
        return;
    }
    static $newarray=[];
    foreach($data as $k=>$v){
        if($v->parent_id==$parent_id){
            $v->level=$level;
            $newarray[]=$v;

            CreateTree($data,$v->c_id,$level+1);
        }
    }
    return $newarray;
}
   //文件上传
   function upload($filename){
    if(request()->file($filename)->isvalid()){
        $photo = request()->file($filename);
        //上传
        $store_result=$photo->store('uploads');
        return $store_result;
    }
}

//多文件上传
function Moreupload($filename){
    $photo = request()->file($filename);
    if(!is_array($photo)){
        return;
    }

    foreach($photo as $k=>$v ){
        if($v->isvalid()){
            $store_result[]=$v->store('uploads');   
        }  
}
return $store_result;
}

