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
Auth::routes();
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('newRegistration', 'registrationController@showRegistrationForm')->name('new_reg');
Route::post('newRegistration', 'registrationController@create');
Route::get('merchant/login',function(){
  return view('merchant.login');
});
Route::get('logout',function(){
    Auth::logout();
    return redirect('merchant/login');
});
Route::get('/',function(){
    $user = Auth::user();
    if(@$user->usertype == 1){
        return redirect('merchant/buyer');
    } else if(@$user->usertype == 2){
      return redirect('merchant/seller');
    } else{
        return redirect('merchant/login');
    }
});
Route::group(['middleware'=>['auth','buyer']],function(){ 
  Route::get('buyer',function(){ 
        return redirect('merchant/buyer');
    });
  Route::get('merchant/buyer', 'HomeController@index');
});
Route::group(['middleware'=>['auth','seller']],function(){
	Route::get('seller',function(){
        return redirect('merchant/buyer');
    });
  Route::get('merchant/seller', 'HomeController@index');
});

//Route::get('/home', 'HomeController@index')->name('home');
//Route::get('mmerchant/buyer', 'HomeController@buyer');
//Route::get('merchant/seller', 'HomeController@seller');


