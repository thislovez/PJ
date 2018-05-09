<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    public $table = 'borrows';
    protected $primaryKey = 'br_id';

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function sport(){
    	return $this->belongsTo('App\Sport','sp_id');
    }

    public $timestamps = false;


}
