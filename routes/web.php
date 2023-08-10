<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('web_push/create', 'App\Http\Controllers\WebPushController@create');
Route::post('web_push', 'App\Http\Controllers\WebPushController@store');

Route::get('web_push_test', function(){

    $users = \App\Models\User::all();
    \Notification::send($users, new \App\Notifications\EventAdded());

});
