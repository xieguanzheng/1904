<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
	//关联到模型的数据表
    protected $table='goods_brand';
    //设置主键 默认是id
    protected $primarykey='b_id';
    //时间戳
    public $timestamps=false;
    //黑名单
    protected $guarded=[];
}
