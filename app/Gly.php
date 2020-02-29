<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gly extends Model
{
	//关联到模型的数据表
    protected $table='gly';
    //设置主键 默认是id
    protected $primarykey='gid';
    //时间戳
    public $timestamps=false;
    //黑名单
    protected $guarded=[];
}
