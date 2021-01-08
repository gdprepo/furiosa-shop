<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/shop', 'App\Http\Controllers\HomeController@shop')->name('shop');


Route::get('/contact', 'App\Http\Controllers\HomeController@contact')->name('contact');

Route::get('/about', 'App\Http\Controllers\HomeController@about')->name('about');


// Route::get('/shop', 'HomeController@shop')->name('shop');


// Route::get('/shop', function () {
//     return view('shop.index');
// });
