<?php

namespace App\Http\Controllers;
use Auth;

use Illuminate\Http\Request;

class CheckstatusController extends Controller
{
    public static function checkstatus(){
        if(Auth::user()->status_user != 'Admin')
            abort(403);

    }
}
