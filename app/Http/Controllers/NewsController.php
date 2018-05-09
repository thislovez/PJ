<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sport;
use App\News;
use App\file;
use App\Borrow;
use App\User;
use App\Http\Controllers\CheckstatusController;

use Illuminate\Support\Facades\Input;

class NewsController extends Controller
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
        $objs = News::paginate(5);
        $sp = Sport::paginate(5);
        $br = Borrow::All();
        $us = User::All();
        return view('admin/all_news') ->with('objs',$objs)
                                    ->with('sp',$sp)
                                    ->with('br',$br)
                                    ->with('us',$us); 


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['method'] = "post";
        $data['url']    = url('admin/home/');
        return view('admin/create_news',$data);
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
        $obj = new News();
        $obj->n_title = $request['title'];
        $obj->n_content = $request['content']; 

        if (Input::hasFile('image'))
        {
            $file=Input::file('image');
            $file->move(public_path(). '/', $file->getClientOriginalName());
            
            $obj->n_img = $file->getClientOriginalName();
        }
         
        $obj->save();
        return redirect(url('admin/home'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($n_id)
    {
        $obj = News::find($n_id);
        //load view
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($n_id)
    {
        $obj = News::find($n_id);
        $data['url']    = url('admin/home/'.$n_id);
        $data['method'] = "put";
        $data['obj'] = $obj;
        return view('admin/create_news',$data);
        //load view
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $n_id)
    {
        $obj = News::find($n_id);
        $obj->n_title = $request['title'];
        $obj->n_content = $request['content']; 

        if (Input::hasFile('image'))
        {
            $file=Input::file('image');
            $file->move(public_path(). '/', $file->getClientOriginalName());
            
            $obj->n_img = $file->getClientOriginalName();
        }
         
        $obj->save();
        return redirect(url('admin/home'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($n_id)
    {
        $obj = News::find($n_id);
        $obj->delete();
        return redirect(url('admin/home'));

    }

    public function countItem(){
        $sp = Sport::count();
        return $sp;
    }


}
