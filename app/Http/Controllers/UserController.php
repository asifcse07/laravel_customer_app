<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //

    //home page load
    public function home(){
        return view('user.login');
    }

    //home page load
    public function authPostLogin(Request $request){
        $validator = \Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $credentials = [
            'username' => $request->input('username'),
            'password'=>$request->input('password')
        ];
        if (\Auth::attempt($credentials)) {

            \Session::put('email', \Auth::user()->email);
            \Session::put('last_login', Auth::user()->last_login);

            if (\Session::has('pre_login_url') ) {
                $url = \Session::get('pre_login_url');
                \Session::forget('pre_login_url');
                return redirect('/customers');

            }else {

                return redirect('/customers');
            }

        } else {
            return redirect('/')
                ->with('errormessage',"Incorrect combinations.Please try again.");
        }
    }


    public function authLogout()
    {
        if (\Auth::check()) {
            \Auth::logout();
            return \Redirect::to('/');
        } else {
            return \Redirect::to('/')->with('errormessage',"Error logout");
        }
    }


}
