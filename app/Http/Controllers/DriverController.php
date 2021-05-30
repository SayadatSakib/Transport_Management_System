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

use App\Vehicle_category;
use App\Vehicle;
use App\City;

use App\BookRequest;
use App\BookResponse;

use File;
use DB;

class DriverController extends Controller
{
    public function driverRegistration()
    {
        return view('driver/driverRegistration');
    }

//Books
public function myBooks()
{

    if(Session::get('driver_value')){
        $book_request = BookRequest::all();
        $book_response = BookResponse::all();
        $users = User::all();
        $driver = DB::table('drivers')->where('email', Auth::user()->email)->first();
        if($driver){
            return view('driver/mybooks',compact('book_request','driver','users','book_response'));
        }   
    }  
    return redirect()->route('login');      
}
//Response
public function updateBookGet($id)
{
    if(Session::get('driver_value')){
      
        $book_request =  BookRequest::find($id);
        $book_response = DB::table('book_responses')->where('book_id', $id)->first();
        $user = DB::table('users')->where('email', $book_request->customer_email)->first();
        $customer = DB::table('customers')->where('email', $book_request->customer_email)->first();

        return view('driver/updatebooks',compact('book_request','user','customer','book_response'));
     } 
    
    return redirect()->route('login');
}
public function updateBookPost(Request $request)
{
    if(Session::get('driver_value')){
        $book_response = new BookResponse;
        $book_response->book_id = $request->book_id;
        $book_response->customer_email = $request->customer_email;
        $book_response->driver_email = $request->driver_email;
        $book_response->response_amount = $request->response_amount;
        $book_response->response_status = "Pending";
        $book_response->save();
        return redirect()->route('driver.myBooks');
     } 
    
    return redirect()->route('login');
}
//Update Book
public function updateBooking(Request $request)
{
    if(Session::get('driver_value')){
        $book_request =  BookRequest::find($request->book_id);
        $book_request->trip_status = $request->book_status;
        if($request->book_status == "Picked"){
             $driver = DB::table('drivers')->where('email', Auth::user()->email)->update(['driver_status' => 0]);
        }
        if($request->book_status == "Reached"){
            $driver = DB::table('drivers')->where('email', Auth::user()->email)->update(['driver_status' => 1]);
        }
        $book_request->save();
        return redirect()->route('driver.myBooks');
     } 
    
    return redirect()->route('login');
}

//Driver Profile
    public function d_profileGet()
    {
        if(Session::get('driver_value')){
            $user = DB::table('users')->where('email', Auth::user()->email)->first(); 
            $drivers = DB::table('drivers')->where('email', Auth::user()->email)->first();    
            $vehicles = Vehicle::all(); 
            $vehicle_category = Vehicle_category::all(); 
            $cities = City::all(); 
            if($user){
            return view('driver/profile',compact('user','drivers','vehicles','vehicle_category','cities'));  
            }  
        }
        return redirect()->route('login');          
    }

//Update Profile
    public function d_profilePost(Request $request)
    {       
        $email = $request->email;
        $drivers = DB::table('drivers')->where('email', $email)->update([ 'age' => $request->age,  'address' => $request->address, 'gender' => $request->gender, 'phone' => $request->phone, 'v_category' => $request->vehicle_category, 'vehicle' => $request->vehicle,]);
        $user = DB::table('users')->where('email', $email)->update(['name' => $request->name, 'city' => $request->city]);


        $driver = Driver::find($request->id);

        if($request->file('vehicleimage')){
            if($driver->vehicleimage){
                if(file_exists($driver->vehicleimage)){
                    unlink($driver->vehicleimage);
                }
    
            }             
            $vehicleimage = $request->file('vehicleimage');
            $vehicleimage_destination = 'driverImages/vehicleImages/'.time().'.'.$vehicleimage->extension();
            $vehicleimage->move(public_path('driverImages/vehicleImages'),$vehicleimage_destination);
            $driver->vehicleimage = $vehicleimage_destination;
            $driver->save();
        } 

        if($request->file('driving_license')){
            if($driver->driving_license){
                if(file_exists($driver->driving_license)){
                    unlink($driver->driving_license);
                }
    
            }             
            $drivinglicense = $request->file('driving_license');
            $drivinglicense_destination = 'driverImages/drivingLicense/'.time().'.'.$drivinglicense->extension();
            $drivinglicense->move(public_path('driverImages/drivingLicense'),$drivinglicense_destination);
            $driver->driving_license = $drivinglicense_destination;
            $driver->save();
        } 


        if($request->file('vehicle_license')){
            if($driver->vehicle_license){
                if(file_exists($driver->vehicle_license)){
                    unlink($driver->vehicle_license);
                }
    
            }             
            $vehicle_license = $request->file('vehicle_license');
            $vehicle_license_destination = 'driverImages/vehicleLicense/'.time().'.'.$vehicle_license->extension();
            $vehicle_license->move(public_path('driverImages/vehicleLicense'),$vehicle_license_destination);
            $driver->vehicle_license = $vehicle_license_destination;
            $driver->save();
        }        

 
       
        return redirect()->route('driver.profileGet');  
        
        
    }

//Profile pic     
public function d_storeprofile(Request $request)
{
    $driver = Driver::find($request->id);
    if($driver->profileimage){
        if(file_exists($driver->profileimage)){
            unlink($driver->profileimage);
        }
    }        
    $profile_image = $request->file('p_file');
    $profile_destination = 'driverImages/'.time().'.'.$profile_image->extension();
    $profile_image->move(public_path('driverImages'),$profile_destination);
    $driver->profileimage = $profile_destination;
    $driver->save();
    return redirect()->route('driver.profileGet');
}

//Change Password
public function changePassGet()
{
    if(Session::get('driver_value')){
        $drivers = DB::table('drivers')->where('email', Auth::user()->email)->first();  
        $user = DB::table('users')->where('email', Auth::user()->email)->first(); 
        if($user){
            return view('driver/changepassword',compact('drivers','user'));
        }   
    }        
} 


public function changePassPost(Request $request)
{
    $current_pass = $request->c_pass;
    $new_pass = Hash::make($request->n_pass);
    $drivers = DB::table('users')->where('email', Auth::user()->email)->first();
    if($drivers){
        $dbpass = $drivers->password;
    }
    if(Hash::check($current_pass, $dbpass)){
        $user = DB::table('users')->where('email', Auth::user()->email)->update(['password' => $new_pass]);
        return redirect()->back()->withErrors([' Password changed ! ']);
    }
    return redirect()->back()->withErrors([' Current password credential ! ']);   
}   



    


}
