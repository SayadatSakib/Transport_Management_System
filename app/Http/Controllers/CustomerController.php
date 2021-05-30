<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Auth;
use Session;

use App\User;
use App\Driver;
use App\Customer;
use App\Admin;
use App\City;
use App\BookRequest;
use App\BookResponse;




use File;
use DB;

class CustomerController extends Controller
{
    //Profile
public function c_profileGet()
{
    if(Session::get('user_value')){
        $user = DB::table('users')->where('email', Auth::user()->email)->first(); 
        $customers = DB::table('customers')->where('email', Auth::user()->email)->first(); 
        $cities = City::all();    
        if($user){
        return view('profile',compact('user','customers','cities'));  
        }  
    }
    return redirect()->route('login');          
}

public function c_profilePost(Request $request)
{       
    $email = $request->email;
    $admins = DB::table('customers')->where('email', $email)->update([ 'age' => $request->age,  'address' => $request->address, 'gender' => $request->gender, 'phone' => $request->phone]);
    $user = DB::table('users')->where('email', $email)->update(['name' => $request->name, 'city' => $request->city]);
    return redirect()->route('customer.profileGet');                    
}



//Profile pic     
public function c_storeprofile(Request $request)
{
    if(Session::get('user_value')){
    $customer = Customer::find($request->id);
    if($customer->profileimage){
        if(file_exists($customer->profileimage)){
            unlink($customer->profileimage);
        }
    }        
    $profile_image = $request->file('p_file');
    $profile_destination = 'customerImages/'.time().'.'.$profile_image->extension();
    $profile_image->move(public_path('customerImages'),$profile_destination);
    $customer->profileimage = $profile_destination;
    $customer->save();
    return redirect()->route('customer.profileGet');
    }
    return redirect()->route('login'); 
}


//Change Password
public function changePassGet()
{
    if(Session::get('user_value')){
        $customers = DB::table('customers')->where('email', Auth::user()->email)->first();  
        $user = DB::table('users')->where('email', Auth::user()->email)->first(); 
        if($user){
            return view('changepassword',compact('customers','user'));
        }   
    }  
    return redirect()->route('login');      
}


public function changePassPost(Request $request)
{
    $current_pass = $request->c_pass;
    $new_pass = Hash::make($request->n_pass);
    $customers = DB::table('users')->where('email', Auth::user()->email)->first();
    if($customers){
        $dbpass = $customers->password;
    }
    if(Hash::check($current_pass, $dbpass)){
        $user = DB::table('users')->where('email', Auth::user()->email)->update(['password' => $new_pass]);
        return redirect()->back()->withErrors([' Password changed ! ']);
    }
    return redirect()->back()->withErrors([' Current password credential ! ']);   
} 
//Driver Profile
public function getDriver($id)
{
    if(Session::get('user_value')){
      
        $drivers =  Driver::find($id);
        $v_category = DB::table('vehicle_categories')->where('id', $drivers->v_category)->first();
        $users = DB::table('users')->where('email', $drivers->email)->first();

        return view('driver',compact('drivers','users','v_category'));
     } 
    
    return redirect()->route('login');
}

//Books
public function myBooks()
{

    if(Session::get('user_value')){
        $book_request = BookRequest::all();
        $book_response = BookResponse::all();
        $drivers = Driver::all();
        $users = User::all();
        $user = DB::table('users')->where('email', Auth::user()->email)->first();
        if($user){
            return view('bookhistory',compact('book_request','user','drivers','users','book_response'));
        }   
    }  
    return redirect()->route('login');      
}

public function bookRespose(Request $request)
{
    if(Session::get('user_value')){
        $book_response =  BookResponse::find($request->response_id);
        $book_response->response_status = $request->response_status;
        $book_response->save();
        return redirect()->route('customer.myBooks');
     } 
    
    return redirect()->route('login');
}

//Add
public function bookDriverPost(Request $request)
{
    
    if(Session::get('user_value')){
        $customer = DB::table('customers')->where('email', Auth::user()->email)->first();
        $book_request = new BookRequest;
        $book_request->customer_email = Auth::user()->email;
        $book_request->driver_email = $request->driver_email;
        $book_request->customer_phone = $customer->phone;
        $book_request->driver_phone = $request->driver_phone;
        $book_request->vehicle_category = $request->v_category;
        $book_request->trip_time = $request->trip_time;
        $book_request->where_to = $request->where_to;
        $book_request->destinetion = $request->destination;
        $book_request->transport_material = $request->t_material;
        $book_request->trip_status = "Pending";
        $book_request->save();
        return redirect()->route('customer.myBooks');     

     } 
    
    return redirect()->route('login');  
}

     
    
}
