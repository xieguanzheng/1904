<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goods_admin extends Model
{
   protected $table='Goods_admin';
	protected $primaryKey ='user_id';
	public $timestamps= false;
	//黑名单
	protected $guarded=[];
}
