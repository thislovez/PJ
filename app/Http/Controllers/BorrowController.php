<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sport; //product
use App\Borrow;
use App\Cart;

use Auth;
use Session;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        $objs = Sport::paginate(5);
        return view('user.borrow',['objs' => $objs]);
    }

    public function getAddToCart(Request $request, $sp_id){
        $obj = Sport::find($sp_id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($obj, $obj->sp_id);

        $request->session()->put('cart',$cart);

        return redirect()->route('user.borrow');
    }

    public function getReduceByOne($sp_id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($sp_id);
        if (count($cart->item) > 0){
            Session::put('cart',$cart);
        }
        else{
            Session::forget('cart');
        }
        return redirect()->route('user.sportCart');
    }

    public function getRemoveItem($sp_id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($sp_id);

        if (count($cart->items) > 0){
            Session::put('cart',$cart);
        }
        else{
            Session::forget('cart');
        }

        return redirect()->route('user.sportCart');
    }

    public function getCart(){
        if (!Session::has('cart')){
            return view('user.sport-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('user.sport-cart', ['objs' => $cart->items ]);
    }

    public function getCheckout(){
        // $borrow = new Borrow();
        // $borrow->sp_id = 1;
        // $borrow->id = 3;
        // $borrow->br_fine = 0;
        // $borrow->save();
        $objs = Sport::all();
        $obj = new Sport();
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        

      for ($i=0; $i < count($cart->items) ; $i++) { 
          # code...
      
            $borrow = new Borrow();
            $borrow->sp_id = 1;
            $borrow->id =  Auth::user()->id;
            $borrow->br_fine = 0;
            $borrow->br_date = date('Y-m-d H:i:s');
            $borrow->br_return = date('Y-m-d H:i:s');
            $borrow->br_cart = serialize($cart);
            $borrow->save();
        }    

        Session::forget('cart');

        $objs = Sport::all();

        
        // Mail::send('emails.auth.sendmail',function($message){
        //     $message->to(Input::get('email'))->subject('PSU Sport Center');
        // });



        return view('user.borrow',['objs' => $objs]);


                
    }

    public function getRepost(){
        $borrows = Auth::user()->borrow;

        
        $borrows->transform(function($borrow,$key){
            $borrow->br_cart = unserialize($borrow->br_cart);
            return $borrow ;
        });
        return view('user.report',['borrows' => $borrows ]);
    }


}
