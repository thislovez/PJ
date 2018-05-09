<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public $table = 'news';
    protected $primaryKey = 'n_id';

}
