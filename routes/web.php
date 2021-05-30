<?php

use Illuminate\Support\Facades\Route;

use App\User;
use App\Driver;
use App\Customer;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Welcome Page
Route::get('/', function () {

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
        return view('home',compact('drivers','users'));
    } 

    return view('welcome',compact('drivers','users'));
});

Auth::routes();

//Login Routes
Route::get('/login', 'LoginController@getLog')->name('login');
//Route::get('/register', 'LoginController@getRegister')->name('register');
//Route::get('/forget', 'LoginController@forgetUser')->name('get.forget');
Route::post('user-login', [
    'uses' => 'LoginController@login',
    'as' => 'user.login'
]);



//Driver
Route::get('/driver-register', 'DriverController@driverRegistration')->name('driver.register');
Route::get('/driver-profile', 'DriverController@d_profileGet')->name('driver.profileGet');
Route::post('/driver-profile', 'DriverController@d_profilePost')->name('driver.profilePost');
Route::post('/driver-photo', 'DriverController@d_storeprofile')->name('driver.storeprofile');
//Driver change password
Route::get('/driver-changepassword', 'DriverController@changePassGet')->name('driver.changePassGet');
Route::post('/driver-changepassword', 'DriverController@changePassPost')->name('driver.changePassPost');
//Driver Book
Route::get('/driver-books', 'DriverController@myBooks')->name('driver.myBooks');
Route::get('/driver-update-books{id}', 'DriverController@updateBookGet')->name('driver.updateBookGet');
Route::post('/driver-update-books', 'DriverController@updateBookPost')->name('driver.updateBookPost');
Route::post('/driver-update-booking', 'DriverController@updateBooking')->name('driver.updateBooking');


//admin 
Route::get('/admin-profile', 'AdminController@a_profileGet')->name('admin.profileGet');
Route::post('/admin-profile', 'AdminController@a_profilePost')->name('admin.profilePost');
Route::post('/admin-photo', 'AdminController@a_storeprofile')->name('admin.storeprofile');
//admin change password
Route::get('/admin-changepassword', 'AdminController@changePassGet')->name('admin.changePassGet');
Route::post('/admin-changepassword', 'AdminController@changePassPost')->name('admin.changePassPost');

//Customers
Route::get('/admin-customers', 'AdminController@GetCustomers')->name('admin.GetCustomers');
//Drivers
Route::get('/admin-drivers', 'AdminController@GetDrivers')->name('admin.GetDrivers');
Route::get('/admin-driver-update{id}', 'AdminController@updateDriverGet')->name('admin.updateDriverGet');
Route::post('/admin-driver-update', 'AdminController@updateDriverPost')->name('admin.updateDriverPost');


//Cities
Route::get('/admin-cities', 'AdminController@GetCities')->name('admin.GetCities');
Route::post('/admin-cities', 'AdminController@addCities')->name('admin.addCities');
Route::get('/admin-city-update{id}', 'AdminController@updatCityGet')->name('admin.updateCityGet');
Route::post('/admin-city-update', 'AdminController@updatCityPost')->name('admin.updateCityPost');
Route::get('/admin-city-delate{id}', 'AdminController@delateCity')->name('admin.delateCity');

//Vehicle category
Route::get('/admin-vehicle-category', 'AdminController@GetVehicleCategory')->name('admin.GetVehicleCategory');
Route::post('/admin-vehicle-category', 'AdminController@addVehicleCategory')->name('admin.addVehicleCategory');
Route::get('/admin-vehicle-category-update{id}', 'AdminController@updatVehicleCategoryGet')->name('admin.updatVehicleCategoryGet');
Route::post('/admin-vehicle-category-update', 'AdminController@updatVehicleCategoryPost')->name('admin.updatVehicleCategoryPost');
Route::get('/admin-vehicle-category-delate{id}', 'AdminController@delateVehicleCategory')->name('admin.delateVehicleCategory');

//Vehicle
Route::get('/admin-vehicles', 'AdminController@GetVehicles')->name('admin.GetVehicles');
Route::post('/admin-vehicles', 'AdminController@addVehicles')->name('admin.addVehicles');
Route::get('/admin-vehicles-update{id}', 'AdminController@updatVehicleGet')->name('admin.updatVehicleGet');
Route::post('/admin-vehicles-update', 'AdminController@updatVehiclePost')->name('admin.updatVehiclePost');
Route::get('/admin-vehicles-delate{id}', 'AdminController@delateVehicle')->name('admin.delateVehicle');



//customer
Route::get('/profile', 'CustomerController@c_profileGet')->name('customer.profileGet');
Route::post('/profile', 'CustomerController@c_profilePost')->name('customer.profilePost');
Route::post('/customer-photo', 'CustomerController@c_storeprofile')->name('customer.storeprofile');
Route::get('/get-driver{id}', 'CustomerController@getDriver')->name('customer.getDriver');
Route::post('/book-driver', 'CustomerController@bookDriverPost')->name('customer.bookDriverPost');
Route::get('/my-books', 'CustomerController@myBooks')->name('customer.myBooks');
Route::post('/my-books-response', 'CustomerController@bookRespose')->name('customer.bookRespose');
//customer change password
Route::get('/changepassword', 'CustomerController@changePassGet')->name('customer.changePassGet');
Route::post('/changepassword', 'CustomerController@changePassPost')->name('customer.changePassPost');













//Home Routes
Route::group(['middleware' => 'auth'], function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/admin', 'HomeController@admin_index')->name('admin.home');
    Route::get('/driver', 'HomeController@driver_index')->name('driver.home');
    });



//Customer
Route::get('/about', 'CustomerController@aboutGet')->name('customer.aboutGet');
Route::get('/contact', 'CustomerController@contactGet')->name('customer.contactGet');

//Restaurants
Route::get('/restaurants', 'CustomerController@restaurantsGet')->name('customer.restaurantsGet');
//Shops
Route::get('/shops', 'CustomerController@shopsGet')->name('customer.shopsGet');
//Services
Route::get('/services', 'CustomerController@servicesGet')->name('customer.servicesGet');





