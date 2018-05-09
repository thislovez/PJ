<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\file;
use App\Profile;
use App\Profile_Other;
use App\User;
use App\Http\Controllers\CheckstatusController;

use Illuminate\Support\Facades\Input;

class UserProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $objs = Profile::all();
        $objs = User::all();
        $data['objs'] = $objs;

        return view('user/edit_profile',$data);   
    }


    public function update(Request $request, $us_id)
    {
        $us_id = Auth::user()->id ;
        $obj = User::find($us_id);
        $obj->name = $request['name'];
        $obj->password = $request['password'];


        $obj = Profile::find($us_id);
        if (Input::hasFile('image'))
        {
            $file=Input::file('image');
            $file->move(public_path(). '/', $file->getClientOriginalName());
            
            $obj->us_img = $file->getClientOriginalName();
        }

        $obj->tel = $request['tel'];
         
        $obj->save();
        return redirect(url('user/edit_profile'));

    }



}
