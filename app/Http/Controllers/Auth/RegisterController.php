<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Str;
use Mail;
use App\Mail\vertifyEmail;
use Session;
use App\Profile;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        Session::flash('status','Registered! but verify your email to activate your account');
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'vertifyToken' => Str::random(40),
        ]);
        
        $thisUser = User::findOrFail($user->id);
        $this->sendEmail($thisUser);
        return $user;

    }

    public function sendEmail($thisUser){
        Mail::to($thisUser['email'])->send(new vertifyEmail($thisUser));
    }

    public function vertifyEmailFirst(){

        return view ('emails.vertifyEmailFirst');
    }

    public function sendEmailDone($email,$vertifyToken){
        $user = User::where(['email'=>$email,'vertifyToken'=>$vertifyToken])->first();
        if($user){


            return user::where(['email'=>$email,'vertifyToken'=>$vertifyToken])->update(['status'=>'1','vertifyToken'=>NULL]);
        }
        else{
            return 'user not found' ;
        }
    }

}
