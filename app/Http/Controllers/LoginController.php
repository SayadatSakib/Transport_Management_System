<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Session;

class LoginController extends Controller
{  
    public function getLog(){    
        if(Session::get('user_value')){
            return view('home');
        }
        if(Session::get('driver_value')){
            return view('driver/home');
        }        
        
        if(Session::get('admin_value')){
            return view('admin/home');
        }        
        return view('newLogin');
    }
/*
    public function getRegister(){
        return view('newRegister');
    }
    
    public function forgetUser(){
        return view('newForget');
    }     
*/
    public function login(Request $request){
        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ]))
        {
            $user = User::where('email', $request->email)->first();
            if($user->is_admin()){
               Session::put('admin_value', 1); 
               return redirect()->route('admin.home');
            }
            if($user->is_driver()){
                Session::put('driver_value', 1);
                return redirect()->route('driver.home');
            }                
            Session::put('user_value', 1);          
            return redirect()->route('home');
        }
        return redirect()->back()->withErrors([' This Credential is not in our record! ']);
    }
}
