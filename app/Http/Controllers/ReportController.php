<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sport; //product
use App\Borrow;
use App\Cart;
use DB;
use Auth;
use Session;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

     public function index()
    {
        $con = new CheckstatusController();
        $con->checkstatus();
        $objs = Borrow::orderBy('br_return','desc')->paginate(10); //เรียงตามวันคืน
        $data['objs'] = $objs;


        return view('admin/report',$data);
    }

    public function Return($sp_id)
    {
        //กดปุ่ม return (ตอนคืน)

        $data = Sport::find($sp_id);
        $data->sp_status = 'ready';
        
        $data->save();

        DB::table('borrows')
            ->where('sp_id', $sp_id)
            ->update(['br_ever_return' => 1]);
        
        

        return redirect(url('admin/report'));

    }
    

}
