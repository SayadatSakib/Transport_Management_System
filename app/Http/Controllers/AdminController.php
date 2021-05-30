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
use App\Vehicle_category;
use App\Vehicle;

use File;
use DB;


class AdminController extends Controller
{


//Profile

public function a_profileGet()
{
    if(Session::get('admin_value')){
        $user = DB::table('users')->where('email', Auth::user()->email)->first(); 
        $admins = DB::table('admins')->where('email', Auth::user()->email)->first();     
        if($user){
        return view('admin/profile',compact('user','admins'));  
        }  
    }
    return redirect()->route('login');          
}


public function a_profilePost(Request $request)
{       
        $email = $request->email;
        $admins = DB::table('admins')->where('email', $email)->update([ 'age' => $request->age,  'address' => $request->address, 'gender' => $request->gender, 'phone' => $request->phone]);
        $user = DB::table('users')->where('email', $email)->update(['name' => $request->name]);
        return redirect()->route('admin.profileGet');                    
}


//Profile pic     
public function a_storeprofile(Request $request)
{
    $admin = Admin::find($request->id);
    if($admin->profileimage){
        if(file_exists($admin->profileimage)){
            unlink($admin->profileimage);
        }
    }        
    $profile_image = $request->file('p_file');
    $profile_destination = 'adminImages/'.time().'.'.$profile_image->extension();
    $profile_image->move(public_path('adminImages'),$profile_destination);
    $admin->profileimage = $profile_destination;
    $admin->save();
    return redirect()->route('admin.profileGet');
}

//Change Password
public function changePassGet()
{
    if(Session::get('admin_value')){
        $admins = DB::table('admins')->where('email', Auth::user()->email)->first();  
        $user = DB::table('users')->where('email', Auth::user()->email)->first(); 
        if($user){
            return view('admin/changepassword',compact('admins','user'));
        }   
    }        
}


public function changePassPost(Request $request)
{
    $current_pass = $request->c_pass;
    $new_pass = Hash::make($request->n_pass);
    $admins = DB::table('users')->where('email', Auth::user()->email)->first();
    if($admins){
        $dbpass = $admins->password;
    }
    if(Hash::check($current_pass, $dbpass)){
        $user = DB::table('users')->where('email', Auth::user()->email)->update(['password' => $new_pass]);
        return redirect()->back()->withErrors([' Password changed ! ']);
    }
    return redirect()->back()->withErrors([' Current password credential ! ']);   
}  


//Customers
public function GetCustomers()
{
    if(Session::get('admin_value')){
        $users = User::all(); 
        $customers = Customer::all();     
        if($users){
        return view('admin/customers',compact('users','customers'));  
        }  
    }
    return redirect()->route('login');          
}  


//Drivers
public function GetDrivers()
{
    if(Session::get('admin_value')){
        $users = User::all(); 
        $drivers = Driver::all();     
        if($users){
        return view('admin/drivers',compact('users','drivers'));  
        }  
    }
    return redirect()->route('login');          
}

//Update

public function updateDriverGet($id)
{
    if(Session::get('admin_value')){ 
        $drivers = Driver::find($id);  
        $user = DB::table('users')->where('email', $drivers->email)->first(); 
        $cities = City::all();  
        $vehicle_category = Vehicle_category::all();  
        $vehicles = Vehicle::all();  
        if($user && $drivers){
            return view('admin/updateDriver',compact('user','drivers','cities','vehicle_category','vehicles')); 
        }
         
        
    }
    return redirect()->route('login');          
}


public function updateDriverPost(Request $request)
{
    if(Session::get('admin_value')){ 
        $drivers = Driver::find($request->d_id);  
        $drivers->driver_profile = $request->d_status;
        $drivers->save();

        return redirect()->route('admin.updateDriverGet',$request->d_id);
        
    }
    return redirect()->route('login');          
}



//Cities
public function GetCities()
{
    if(Session::get('admin_value')){
        $cities = City::all();     
        if($cities){
        return view('admin/cities',compact('cities'));    
        }  
    }
    return redirect()->route('login');          
}

//Add 
public function addCities(Request $request)
{
    if(Session::get('admin_value')){
        $cities = new City;
        $cities->city = $request->city;
        $cities->save();
    }
    return redirect()->route('admin.GetCities');         
}
//Update get
public function updatCityGet($id)
{
    if(Session::get('admin_value')){
        $cities = City::find($id);
        return view('admin/updateCity',compact('cities'));
    }
    return redirect()->route('login');      
} 
//update post
public function updatCityPost(Request $request)
{
    if(Session::get('admin_value')){
        $cities = City::find($request->c_id);
        $cities->city= $request->city;
        $cities->save();
        return redirect()->route('admin.GetCities');
    }
    return redirect()->route('login');      
}
//Delate
public function delateCity($id)
{
    if(Session::get('admin_value')){
        $cities = City::find($id);
        $cities->delete();
        return redirect()->route('admin.GetCities');
    }
    return redirect()->route('login');    
}




//Vehicles Category
public function GetVehicleCategory()
{
    if(Session::get('admin_value')){
        $vehicle_category = Vehicle_category::all();     
        if($vehicle_category){
        return view('admin/vehicleCategory',compact('vehicle_category'));    
        }  
    }
    return redirect()->route('login');          
}

//Add 
public function addVehicleCategory(Request $request)
{
    if(Session::get('admin_value')){
        $vehicles = new Vehicle_category;
        $vehicles->vehicle_categories = $request->vehicleCategory;
        $vehicles->save();
    }
    return redirect()->route('admin.GetVehicleCategory');         
}
//Update get
public function updatVehicleCategoryGet($id)
{
    if(Session::get('admin_value')){
        $vehicle_category = Vehicle_category::find($id);
        return view('admin/updateVehicleCategory',compact('vehicle_category'));
    }
    return redirect()->route('login');      
} 
//update post
public function updatVehicleCategoryPost(Request $request)
{
    if(Session::get('admin_value')){
        $vehicles = Vehicle_category::find($request->v_c_id);
        $vehicles->vehicle_categories= $request->vehicleCategory;
        $vehicles->save();
        return redirect()->route('admin.GetVehicleCategory');
    }
    return redirect()->route('login');      
}
//Delate
public function delateVehicleCategory($id)
{
    if(Session::get('admin_value')){
        $vehicles = Vehicle_category::find($id);
        $vehicles->delete();
        return redirect()->route('admin.GetVehicleCategory');
    }
    return redirect()->route('login');    
}



//Vehicles
public function GetVehicles()
{
    if(Session::get('admin_value')){
        $vehicles = Vehicle::all(); 
        $vehicle_category = Vehicle_category::all();     
        if($vehicle_category){
        return view('admin/vehicles',compact('vehicles','vehicle_category'));    
        }  
    }
    return redirect()->route('login');          
}

//Add 
public function addVehicles(Request $request)
{
    if(Session::get('admin_value')){
        $vehicles = new Vehicle;
        $vehicles->vehicle = $request->vehicle;
        $vehicles->category = $request->vehicle_category;

        $vehicles->save();
    }
    return redirect()->route('admin.GetVehicles');         
}
//Update get
public function updatVehicleGet($id)
{
    if(Session::get('admin_value')){
        $vehicles = Vehicle::find($id);
        $vehicle_category = Vehicle_category::all();
        return view('admin/updateVehicles',compact('vehicles','vehicle_category'));
    }
    return redirect()->route('login');      
} 
//update post
public function updatVehiclePost(Request $request)
{
    if(Session::get('admin_value')){
        $vehicles = Vehicle::find($request->v_id);
        $vehicles->vehicle = $request->vehicleName;
        $vehicles->category= $request->vehicleCategory;
        $vehicles->save();
        return redirect()->route('admin.GetVehicles');
    }
    return redirect()->route('login');      
}
//Delate
public function delateVehicle($id)
{
    if(Session::get('admin_value')){
        $vehicles = Vehicle::find($id);
        $vehicles->delete();
        return redirect()->route('admin.GetVehicles');
    }
    return redirect()->route('login');    
}


}
