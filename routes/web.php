<?php
Route::get('/', 'WelcomeController@welcome')->name('welcom');

Auth::routes();

Route::middleware('auth')->group( function(){
Route::get('/home', 'HomeController@index')->name('home');

});

Route::namespace('Admin')->prefix('admin')->name('admin.')->group( function(){
    Route::resource('users', 'UsersController', ['except' => ['show', 'create', 'store']]);
});

Route::prefix('admin')->name('admin.')->group( function(){
    Route::resource('predictions', 'PredictionController');
    Route::put('prediction/{prediction}', 'PredictionController@premium')->name('predictions.premium');
});
Route::resource('seos', 'SEOController');
Route::resource('chimebanks', 'ChimeBankController');

Route::resource('predictions', 'PredictionController');
Route::resource('subscriptions', 'SubscriptionController');