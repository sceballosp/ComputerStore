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

Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home.index");

Route::get('/categories/create', 'App\Http\Controllers\CategoryController@create')->name("category.create");
Route::post('/categories', 'App\Http\Controllers\CategoryController@save');

Route::get('/computers', 'App\Http\Controllers\ComputerController@index')->name("computer.index");
Route::post('/computers', 'App\Http\Controllers\ComputerController@save');
Route::get('/computers/create', 'App\Http\Controllers\ComputerController@create')->name("computer.create");
Route::get('/computers/{id}', 'App\Http\Controllers\ComputerController@show')->name("computer.show");

Route::get('/orders', 'App\Http\Controllers\OrderController@index')->name("order.index");
Route::post('/orders', 'App\Http\Controllers\OrderController@save');
Route::get('/orders/create', 'App\Http\Controllers\OrderController@create')->name("order.create");
Route::get('/orders/{id}', 'App\Http\Controllers\OrderController@show')->name("order.show");

