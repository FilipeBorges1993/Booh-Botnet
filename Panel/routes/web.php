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

Route::group(['middleware' => 'web'], function () {

    Route::get('/', function () { return view('Login_Admin.Login'); })->middleware('publicGuard')->name('login');
    Route::post('/loginSubmit', 'Auth_Controller@login')->name('loginSubmit')->middleware('publicGuard');
    Route::get('/logout','Auth_Controller@logout')->name('logout')->middleware('auth');

    //Create user
    Route::get('/createUser/{username}/{password}', 'Auth_Controller@createUser');

    //Ajax
    Route::post('/ajax', 'AjaxController@getAjax')->name('ajax')->middleware('auth');

    Route::get('/home', function () { return view('Panel.Home',['nav'=>1,'auth'=>\Illuminate\Support\Facades\Auth::user()->id]); })->name('home')->middleware('auth');
    Route::get('/bots', function(){return view('Panel.Bots',['nav'=>2,'auth'=>\Illuminate\Support\Facades\Auth::user()->id]);})->name('bots')->middleware('auth');
    Route::get('/orders', function(){return view('Panel.Orders',['nav'=>3,'auth'=>\Illuminate\Support\Facades\Auth::user()->id]); })->name('orders')->middleware('auth');
    Route::get('/connections', function(){return view('Panel.Connections',['nav'=>4,'auth'=>\Illuminate\Support\Facades\Auth::user()->id]); })->name('connections')->middleware('auth');
    Route::get('/shop', function(){return view('Panel.Shop',['nav'=>5,'auth'=>\Illuminate\Support\Facades\Auth::user()->id]); })->name('shop')->middleware('auth');

    //Admin
    Route::get('/accounts', function(){return view('Panel.Accounts',['nav'=>6,'auth'=>\Illuminate\Support\Facades\Auth::user()->id]); })->name('accounts')->middleware('admin');

});

//Api
Route::group(['namespace' => 'Api'],function(){
    Route::get('/Api/{panelKey}/{data}', 'ApiController@apiRequestConstructor');
});
