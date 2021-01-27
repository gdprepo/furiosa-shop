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
Route::get('/shop/{id}', 'App\Http\Controllers\HomeController@show')->name('shop.show');



Route::get('/contact', 'App\Http\Controllers\HomeController@contact')->name('contact');

Route::get('/about', 'App\Http\Controllers\HomeController@about')->name('about');


Route::get('/admin', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
Route::get('/admin/home', 'App\Http\Controllers\DashboardController@home')->name('dashboard.home');


Route::get('/admin/slider/show/{id}', 'App\Http\Controllers\DashboardController@sliderEdit')->name('slider.show');
Route::post('/admin/slider/update/{id}', 'App\Http\Controllers\DashboardController@sliderStore')->name('slider.update');

Route::get('/admin/slider/new', 'App\Http\Controllers\DashboardController@sliderNew')->name('slider.new');
Route::post('/admin/slider/add', 'App\Http\Controllers\DashboardController@sliderAdd')->name('slider.add');
Route::post('/admin/slider/delete/{id}', 'App\Http\Controllers\DashboardController@sliderDelete')->name('slider.delete');



Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

// Route::get('/shop', 'HomeController@shop')->name('shop');


// Route::get('/shop', function () {
//     return view('shop.index');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
