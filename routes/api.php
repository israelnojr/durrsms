<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::resource('seos', 'SEOController');// Route::resource('chimebanks', 'ChimeBankController');// Route::resource('predictions', 'PredictionController');// Route::resource('subscriptions', 'SubscriptionController');// Route::resource('messages', 'MessageController');// Route::resource('messages', 'MessageController');