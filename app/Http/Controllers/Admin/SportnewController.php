<?php

namespace App\Http\Controllers\Admin;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sport;
use App\Borrow;
use App\file;
use App\Http\Controllers\CheckstatusController;

use Illuminate\Support\Facades\Input;
use DB;

class SportnewController extends Controller
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
        $objs = Sport::orderBy('sp_id','desc')->paginate(10);
        $data['objs'] = $objs;
        return view('admin/list/manage',$data);
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['method'] = "post";
        $data['url']    = url('admin/sport/');
        return view('admin/form/sport',$data);
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
        $obj = new Sport();
        $obj->sp_name = $request['name'];
        $obj->sp_type = $request['type']; 
        $obj->sp_brand = $request['brand']; 
        $obj->sp_price = $request['price']; 
        //$obj->type_id = $request['type_id']; 
        if (Input::hasFile('image'))
        {
            $file=Input::file('image');
            $file->move(public_path(). '/', $file->getClientOriginalName());
            
            $obj->sp_img = $file->getClientOriginalName();
        }

          if($request['type'] == 'Basketball')
             $obj->type_id = 'BB';
          else if($request['type'] == 'Football')
            $obj->type_id = 'FB';
          else if($request['type'] == 'Futsal')
            $obj->type_id = 'FS';
          else if($request['type'] == 'Tennis')
            $obj->type_id = 'TN';
          else if($request['type'] == 'Volleyball')
            $obj->type_id = 'VB';
          else if($request['type'] == 'Badminton')
            $obj->type_id = 'BT';
          else
            $obj->type_id = '';
         

        $obj->save();
        return redirect(url('admin/sport'));
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

        $obj = Sport::find($sp_id);
        $data['url']    = url('admin/sport/'.$sp_id);
        $data['method'] = "put";
        $data['obj'] = $obj;
        return view('admin/form/sport',$data);
        //load view
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
        $obj = Sport::find($sp_id);
        $obj->sp_name = $request['name'];
        $obj->sp_type = $request['type']; 
        $obj->sp_brand = $request['brand']; 
        $obj->sp_price = $request['price']; 
        $obj->type_id = $request['type_id']; 
        if (Input::hasFile('image'))
        {
            $file=Input::file('image');
            $file->move(public_path(). '/', $file->getClientOriginalName());
            
            $obj->sp_img = $file->getClientOriginalName();
        }

        if($request['type'] == 'Basketball')
             $obj->type_id = 'BB';
          else if($request['type'] == 'Football')
            $obj->type_id = 'FB';
          else if($request['type'] == 'Futsal')
            $obj->type_id = 'FS';
          else if($request['type'] == 'Tennis')
            $obj->type_id = 'TN';
          else if($request['type'] == 'Volleyball')
            $obj->type_id = 'VB';
          else if($request['type'] == 'Badminton')
            $obj->type_id = 'BT';
          else
            $obj->type_id = '';

        $obj->save();
        return redirect(url('admin/sport'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($sp_id)
    {
        $obj = Sport::find($sp_id);
        $obj->delete();
        return redirect(url('admin/sport'));

    }


    public function GetExpress($sp_id)
    {
        $data = Sport::find($sp_id);
        return view('admin/express')->with('data',$data);
    }

    public function PostExpress(Request $request , $sp_id )
    {
        //ฟังก์ชันยืม 
        $data = New Borrow();

        $data->sp_id = $sp_id;
        $data->us_id = $request->us_id;
        $data->br_fine = 0;
        $data->br_date = date('Y-m-d H:i:s');
        $data->br_return = date('Y-m-d H:i:s ',strtotime("+1 day")) ;


        $data->save();


        $obj = Sport::find($sp_id);
        $obj->sp_status = 'borrow';

        $obj->save();

        return redirect(url('admin/sport'));
    }


    public function search (Request $request){
        if ($request->ajax()){
            $output = "";
            $sports = Sport::where('sp_name','LIKE','%'.$request->search.'%')
                      ->orWhere('type_id','LIKE','%'.$request->search.'%')->get();
        if ($sports){
            foreach ($sports as $key => $sport) {


            $oo1 = '<img class="img-responsive" src="'.asset($sport->sp_img).'" width="50" height="50">';
            $output.='<tr>'.
                    '<td>'.$sport->type_id.$sport->sp_id.'</td>'.
                    '<td>'. $oo1 .'</td>'.
                    '<td>'.$sport->sp_name.'</td>'.
                    '<td>'.$sport->sp_type.'</td>'.
                    '<td>'.$sport->sp_brand.'</td>'.
                    '<td>'.$sport->sp_price.'</td>'.
                    '<td>'.$sport->sp_status.'</td>'.
                    '</tr>';





            }
            return Response($output);


        }

    }
    }
  

}
