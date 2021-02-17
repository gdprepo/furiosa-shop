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
Route::get('/shop/{slug}', 'App\Http\Controllers\HomeController@show')->name('shop.show');



Route::get('/contact', 'App\Http\Controllers\HomeController@contact')->name('contact');

Route::get('/about', 'App\Http\Controllers\HomeController@about')->name('about');


Route::get('/admin', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
Route::get('/admin/home', 'App\Http\Controllers\DashboardController@home')->name('dashboard.home');
Route::get('/admin/products', 'App\Http\Controllers\DashboardController@products')->name('dashboard.products');
Route::get('/admin/categories', 'App\Http\Controllers\DashboardController@categories')->name('dashboard.categories');


Route::get('/admin/product/edit/{id}', 'App\Http\Controllers\DashboardController@productEdit')->name('produit.show');
Route::post('/admin/product/update/{id}', 'App\Http\Controllers\DashboardController@productStore')->name('product.update');
Route::post('/admin/product/delete/{id}', 'App\Http\Controllers\DashboardController@productDelete')->name('product.delete');
Route::get('/admin/product/new', 'App\Http\Controllers\DashboardController@productNew')->name('product.new');
Route::post('/admin/product/add', 'App\Http\Controllers\DashboardController@productAdd')->name('product.add');

Route::get('/admin/category/edit/{id}', 'App\Http\Controllers\DashboardController@categoryEdit')->name('category.show');
Route::post('/admin/category/update/{id}', 'App\Http\Controllers\DashboardController@categoryStore')->name('category.update');
Route::post('/admin/category/delete/{id}', 'App\Http\Controllers\DashboardController@categoryDelete')->name('category.delete');

Route::get('/admin/category/new', 'App\Http\Controllers\DashboardController@categoryNew')->name('category.new');
Route::post('/admin/category/add', 'App\Http\Controllers\DashboardController@categoryAdd')->name('category.add');






Route::get('/admin/slider/show/{id}', 'App\Http\Controllers\DashboardController@sliderEdit')->name('slider.show');
Route::post('/admin/slider/update/{id}', 'App\Http\Controllers\DashboardController@sliderStore')->name('slider.update');

Route::get('/admin/slider/new', 'App\Http\Controllers\DashboardController@sliderNew')->name('slider.new');
Route::post('/admin/slider/add', 'App\Http\Controllers\DashboardController@sliderAdd')->name('slider.add');
Route::post('/admin/slider/delete/{id}', 'App\Http\Controllers\DashboardController@sliderDelete')->name('slider.delete');



Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');



Route::get('/panier', 'App\Http\Controllers\CartController@index')->name('cart.index');
Route::post('/panier/ajouter', 'App\Http\Controllers\CartController@store')->name('cart.store');
Route::patch('/panier/{rowId}', 'App\Http\Controllers\CartController@update')->name('cart.update');
Route::delete('/panier/{rowId}', 'App\Http\Controllers\CartController@destroy')->name('cart.destroy');



Route::get('/paiement', 'App\Http\Controllers\CheckoutController@index')->name('checkout.index');
Route::post('/paiement', 'App\Http\Controllers\CheckoutController@livraisonStore')->name('livraison.check');
Route::post('/paiementCheckout', 'App\Http\Controllers\CheckoutController@store')->name('checkout.store');
Route::get('/merci', 'App\Http\Controllers\CheckoutController@thankYou')->name('checkout.thankYou');
//Route::get('/merciPaypal', 'App\Http\Controllers\PaymentController@thanks')->name('checkout.thanks');

// Route::get('/shop', 'HomeController@shop')->name('shop');


// Route::get('/shop', function () {
//     return view('shop.index');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
