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
Route::get('/hello', function () {
    return "Hello";
});
Route::get('/userinfo', 'UserinfoController@index')->name('userinfo');
Route::get('/userinfo/edit', 'UserinfoController@edit')->name('edituserinfo');
Route::post('/userinfo/update', 'UserinfoController@update')->name('updateuserinfo');
Route::get('/signedstore', 'UserinfoController@signedstore')->name('signedstore');
Route::get('/likedstore', 'UserinfoController@likedstore')->name('likedstore');

Route::get('/storeinfo/{id}', 'StoreinfoController@index')->name('storeinfo');
Route::get('/likeordis/{id}/{like}', 'StoreinfoController@like')->name('likeordis');
Route::post('/cmtstore', 'StoreinfoController@cmtstore')->name('cmtstore');
Route::get('/signstore/','StoreinfoController@showsignstore')->name('signstore');
Route::post('/confirmstore', 'StoreinfoController@signstore')->name('confirmstore');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
