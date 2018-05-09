<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sport;
use App\file;
use App\Borrow;
use App\Http\Controllers\CheckstatusController;

use Illuminate\Support\Facades\Input;

class ExpressController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $con = new CheckstatusController();
        $con->checkstatus();

        return view('admin/express');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['method'] = "post";
        $data['url']    = url('admin/express/');
        return view('admin/express',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $userid = Auth::user()->id;


        // object = $request->get(object)
        // user_id = $userid
        // saver

        $obj = new Borrow();
        $obj->us_id = $request['us_id'];
        $obj->sp_id = $request['sp_id'];
        $obj->br_fine = 50;
        $obj->br_date = date('Y-m-d H:i:s');
        $obj->br_return = date('Y-m-d H:i:s');


        $obj->save();
        return redirect(url('admin/express'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($sp_id)
    {
        $obj = Sport::find($sp_id);
        //load view
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($sp_id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $sp_id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($sp_id)
    {
      
    }
}
