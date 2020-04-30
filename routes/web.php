<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::prefix('admin')->group(function(){
   Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
   Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');
   Route::get('/home','AdminController@index')->name('admin.home');
   Route::post('/logout','Auth\AdminLoginController@logout')->name('admin.logout');
   Route::get('/states','AdminController@states')->name('admin.states');
   Route::post('/states','AdminController@state_store')->name('admin.states_store');
   Route::get('/state_delete/{id}','AdminController@state_delete');
   Route::get('/state/update/{id}','AdminController@fetch_state');
   Route::patch('/state/update','AdminController@updateState');
   //cities route
   Route::get('/cities','AdminController@cities');
   Route::post('/cities','AdminController@city_store');
   Route::get('/status/{id?}','AdminController@status');
   Route::get('/check/{id}','AdminController@check');
   Route::post('/action','AdminController@action');
});
//routes for site controller
Route::get('/home','SiteController@home');
Route::get('/','SiteController@home');
Route::get('/listing','SiteController@listing');
Route::get('/data','SiteController@data');
Route::get('/detail/{id}','SiteController@detail');
Route::get('/fetchCity/{id}','SiteController@fetch_city');
Route::get('/contact','SiteController@contact');
//routes for site controller ends

//routes for UserController
Route::get('/add-to-cart/{id}','UserController@AddCart');
Route::get('/cart','UserController@cart');
Route::get('/shipping','UserController@shipping');
Route::post('/add-shipping-details','UserController@add_shipping_details');
Route::post('/checkout','UserController@checkout');
Route::get('/cart_delete/{id}','UserController@cart_delete');
Route::post('/update','UserController@update_cart');
Route::get('/user/home','UserController@home');
Route::get('/user/order_status','UserController@order_status');
//routes for UserController ends


Route::prefix('vendor')->group(function(){
    Route::get('/login','Auth\VendorLoginController@showLoginForm')->name('vendor.login');
    Route::post('/login','Auth\VendorLoginController@login')->name('vendor.login.submit');
    Route::get('/home','VendorController@index')->name('vendor.home');
    Route::post('/logout','Auth\VendorLoginController@logout')->name('vendor.logout');
    Route::get('/register','Auth\VendorRegisterController@showRegisterForm')->name('vendor.register');
    Route::post('/register','Auth\VendorRegisterController@register')->name('vendor.register.submit');
    Route::get('/create','VendorController@create_profile');
    Route::get('/fetchCity/{id}','VendorController@fetch_city');
    Route::post('/create','VendorController@store');
    Route::get('/create/menu','VendorController@create_menu');
    Route::post('/create/menu','VendorController@store_menu');
    Route::get('/update','VendorController@update_profile');
});
//Route::get('/home', 'HomeController@index')->name('home');
