<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Driver;
use App\Customer;
use Session;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Session::get('driver_email')){
            $User = DB::table('users')->where('email', Session::get('driver_email'))->update(['driver' => 1]);
            $u_name = DB::table('users')->where('email', Session::get('driver_email'))->first();
            $driver = new Driver;
            $driver->email = Session::get('driver_email');
            $driver->driver_profile = "Pending";
            $driver->save();
            Session::put('driver_email', 0);                             
        }         
        
        if(Session::get('user_email')){
            $user = DB::table('users')->where('email', Session::get('user_email'))->first();
            $customer = new Customer;
            $customer->email = Session::get('user_email');
            $customer->save(); 
            Session::put('user_email', 0);                             
        }   


        if(Session::get('admin_value')){
            $admins = DB::table('admins')->where('email', Auth::user()->email)->first();  
            return view('admin/home',compact('admins'));
        }

        if(Session::get('driver_value')){           
                return view('driver/home');
        }  

        if(Session::get('user_value')){
            $users = User::all(); 
            $drivers = Driver::all(); 
            return view('home',compact('drivers','users'));
        } 

        return redirect()->route('login');      

    }
 
    public function admin_index()
    {
        if(Session::get('admin_value')){
            $admins = DB::table('admins')->where('email', Auth::user()->email)->first();  
            return view('admin/home',compact('admins'));
        }

        if(Session::get('driver_value')){           
                return view('driver/home');
        }  

        if(Session::get('user_value')){
            $users = User::all(); 
            $drivers = Driver::all(); 
            return view('home',compact('drivers','users'));
        } 

        return redirect()->route('login');     
    }
    
    public function driver_index()
    {
        if(Session::get('admin_value')){
            $admins = DB::table('admins')->where('email', Auth::user()->email)->first();  
            return view('admin/home',compact('admins'));
        }

        if(Session::get('driver_value')){           
                return view('driver/home');
        }  

        if(Session::get('user_value')){
            $users = User::all(); 
            $drivers = Driver::all(); 
            return view('home',compact('drivers','users'));
        } 

        return redirect()->route('login');  
    } 
          

    public function welcome()
    {

        $users = User::all(); 
        $drivers = Driver::all(); 

        if(Session::get('admin_value')){
            $admins = DB::table('admins')->where('email', Auth::user()->email)->first();  
            return view('admin/home',compact('admins'));
        }

        if(Session::get('driver_value')){           
                return view('driver/home');
        }  

        if(Session::get('user_value')){
            $users = User::all(); 
            $drivers = Driver::all(); 
            return view('home',compact('drivers','users'));
        } 
        
        return view('welcome',compact('admins','users'));
    }    

  
}
