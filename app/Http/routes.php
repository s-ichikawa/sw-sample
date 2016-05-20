<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/store', function () {
    $endpoint = Request::getContent();
    $user = \App\User::query()->firstOrNew([
        'name'     => 's-ichikawa',
        'email'    => 'ichikawa.shingo.0829@gmail.com',
        'password' => '123456789',
    ]);
    $user->registration_id = substr($endpoint, strlen('https://android.googleapis.com/gcm/send/'));
    $user->save();
});
