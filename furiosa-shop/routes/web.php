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



Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/shop', 'App\Http\Controllers\HomeController@shop')->name('shop');


Route::get('/contact', 'App\Http\Controllers\HomeController@contact')->name('contact');

Route::get('/about', 'App\Http\Controllers\HomeController@about')->name('about');


Route::get('/admin', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
Route::get('/admin/home', 'App\Http\Controllers\DashboardController@home')->name('dashboard.home');

Route::post('/admin/home/update', 'App\Http\Controllers\DashboardController@homeStore')->name('home.update');



Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

// Route::get('/shop', 'HomeController@shop')->name('shop');


// Route::get('/shop', function () {
//     return view('shop.index');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
