<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sport;
use App\News;
use App\file;

use Illuminate\Support\Facades\Input;

class UserNewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $objs = News::paginate(6);
        $data['objs'] = $objs;
        return view('user/all_news',$data);   
    }

    public function show($n_id)
    {
        $obj = News::find($n_id);
        //load view
    }

}
