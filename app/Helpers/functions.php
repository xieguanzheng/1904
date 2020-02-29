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

function addTree($data,$p_id=0,$level=0){
        if(!$data){
            return;
        }
        static $newarray=[];
        foreach($data as $k=>$v){
            if($v->p_id == $p_id){
                $v->level=$level;
                $newarray[]=$v;

                //调用自身
                addTree($data,$v->g_id,$level+1);
            }
        }
        return $newarray;
    }
   //文件上传
    function uploads($filename){

        if (request()->file($filename)->isValid()){
            $photo = request()->file($filename);

            $store_result = $photo->store('uploads');
            return $store_result;
        }
        exit('未获取到上传文件或上传过程出错');

    }
//多个文件上传
    function Moreuploads($filename){
       $photo = request()->file($filename);
       if(!is_array($photo)){
         return;
       } 
      
       foreach( $photo as $v ){
          if ($v->isValid()){
            $store_result[] = $v->store('uploads');
          }
       }
         
       return $store_result;
    }
