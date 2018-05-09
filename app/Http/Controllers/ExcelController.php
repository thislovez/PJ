<?php

namespace App\Http\Controllers;
use Auth;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Sport;
use Input;
use DB;
use Excel;

class ExcelController extends Controller
{

    public function getImport(){
    	return view('excel.importSport');
    }

    public function postImport(){

    	Excel::load(Input::file('sport'),function($reader){
    		$reader->each(function($sheet){
    			Sport::firstOrCreate($sheet->toArray());
    		});
    		
		});
		return back();
    }
    public function getExport(){
    	$sport = Sport::all();
    	Excel::create('Export Data',function($excel) use($sport){
    		$excel->sheet('Sheet 1',function($sheet) use($sport){
    			$sheet->fromArray($sport);
    		});
    	})->export('xlsx');
    }

    public function howtoimport(){
        return view('excel.howtoimport');
    }


}
