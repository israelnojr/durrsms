<?php

use App\CountryCode;
use Illuminate\Support\Facades\Auth;
Route::get('/', function () {
    if(Auth::check()){
        $codes = CountryCode::all();
        return view('sms', compact('codes'));
    }
    else{
        return view('auth.login');
    }

});

Auth::routes();

Route::middleware('auth')->group( function(){
Route::get('/home', 'HomeController@index')->name('home');
Route::get('sms', 'SmsController@sendSmsForm')->name('sms');
Route::post('sms', 'SmsController@sendSms')->name('post-sms');
Route::resource('messages', 'MessageController');

});

Route::namespace('Admin')->prefix('admin')->name('admin.')->group( function(){
    Route::resource('users', 'UsersController', ['except' => ['show', 'create', 'store']]);
});
