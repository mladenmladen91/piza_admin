<?php

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



Auth::routes([
  'register' => false, // Registration Routes...
  'reset' => false, // Password Reset Routes...
  'verify' => false, // Email Verification Routes...
]);





 Route::group(['middleware' => 'auth'],
            function () {
				Route::get('/', 'UsersController@index');
				Route::resource('admin/users', 'UsersController');
				Route::get('/home', 'UsersController@index')->name('home');
				Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
            });
// Pizza routes
Route::resource('admin/pizza', 'PizzaController');
Route::get('getAll', 'PizzaController@showPizzas');

//Order routes
Route::resource('admin/order', 'OrderController');
