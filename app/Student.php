<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
	//关联到模型的数据表
    protected $table='student';
    //设置主键 默认是id
    protected $primarykey='id';
    //时间戳
    public $timestamps=false;
    //黑名单
    protected $guarded=[];
}
