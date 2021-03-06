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
    return view('auth.login');
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/contact', function () {
    return view('contactus');
});
Route::get('/about', function () {
    return view('about');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/message', 'MessageController@message')->name('message');
Route::get('{path}','HomeController@index')->where( 'path', '([A-z\d\-\/_.]+)?' );

Route::post('/import', 'ImportExcelController@import');