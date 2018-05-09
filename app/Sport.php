<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    public $table = 'sports_tbl';
    protected $primaryKey = 'sp_id';
	public function borrow(){
    	return $this->hasMany('App\Borrow','br_id');
    }

    protected $fillable=[
    	'sp_name',
    	'sp_type',
    	'type_id',
    	'sp_brand',
    	'sp_price',
    	'sp_img',
    ];

}
