<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //login form
    public function loginForm(){
        if(Auth::check()){
            return redirect('/dashboard');
        }
        return view('auth.login');
    }//end method


    //post login
    public function postLogin(Request $request){
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect()->route('user.dashboard');
        } else {
            return redirect()->back()->with('error','Oops! Your credentials do not match our records....');
        }
    }//end method


    //dashboard
    public function dashboard(){
        return view('panel.dashboard');
    }//end method


    //logout
    public function logout(){
        Auth::logout();
        return redirect('/');
    }//end method
}//end class
