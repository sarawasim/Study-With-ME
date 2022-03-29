<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home/login','App\Http\Controllers\AdminController@login');
Route::post('/create_user', 'App\Http\Controllers\AdminController@createUser');
Route::post('/verify_user', 'App\Http\Controllers\AdminController@verifyLogin');


// Route::get('/{any}', 'App\Http\Controllers\PagesController@index')->where('any', '.*');
Route::get('/logout', 'AdminController@logout');

Route::group(['middleware' => 'auth'], function(){
  Route::get('/video_chat', 'App\Http\Controllers\VideoChatController@index');
  Route::post('/auth/video_chat’, ‘App\Http\Controllers\VideoChatController@auth');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
