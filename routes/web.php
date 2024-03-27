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
// use Auth;
// Route::get('/', function () {
//     // DBFController;
//     return view('welcome');
// });

Route::get('/',function() {
    return view('welcome');
});

Route::middleware(['auth'])->group(function ()  {
    Route::get('/home', 'HomeController@index')->name('home');
    
    Route::middleware(['isAdmin'])->group(function () {    
        Route::get('/dashboard', function (){
            return view('layouts.contentNavbarLayout');
        });    
        Route::get('/users', 'HomeController@users');
        Route::get('/log', 'HomeController@log');
        Route::get('/electricity', 'HomeController@electricity');
        Route::get('/parkingspaces', 'HomeController@parking');
        Route::get('/vehicles', 'HomeController@vehicles');
        Route::post('/deletemodel','HomeController@deletemodel');
        Route::post('/savemodel','HomeController@savemodel');

        Route::get('/getLog','HomeController@getLog');
    });

    Route::get('/myprofile','HomeController@myprofile');
    Route::get('/recharge','HomeController@recharge');
    Route::get('/saveLog','HomeController@saveLog');
    Route::get('/deleteLog','HomeController@deleteLog');


});

Auth::routes();

