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

Route::get('/computers', 'App\Http\Controllers\ComputerController@index')->name("computer.index");
Route::get('/computers/create', 'App\Http\Controllers\ComputerController@create')->name("computer.create");
Route::post('/computers', 'App\Http\Controllers\ComputerController@store');
Route::get('/computers/{id}', 'App\Http\Controllers\ComputerController@show')->name("computer.show");
Route::delete('/computers/{id}', 'App\Http\Controllers\ComputerController@destroy');
