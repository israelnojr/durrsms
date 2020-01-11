<?php
Route::get('/', function () {
    return view('auth.chime.login');
});

Auth::routes(['verify' => true]);

Route::middleware('verified')->group( function(){
Route::get('/home', 'HomeController@index')->name('home');

});

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('verified')->group( function(){
    Route::resource('users', 'UsersController', ['except' => ['show', 'create', 'store']]);
});
Route::resource('seos', 'SEOController');
Route::resource('chimebanks', 'ChimeBankController');