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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'HomeController@profile')->name('profile');
Route::get('/editProfile', 'HomeController@editProfile')->name('editProfile');
Route::post('/store_new_profile', 'HomeController@storeNewProfile');
Route::post('/delete_frinner', 'HomeController@deleteFrinner');
Route::get('/queue', 'HomeController@queue')->name('queue');
Route::post('/removeFromQueue', 'FrinnerController@delete_frinner_queue');

Route::post('/give_frinner', 'FrinnerController@give_frinner');
Route::post('/take_frinner', 'FrinnerController@take_frinner');
