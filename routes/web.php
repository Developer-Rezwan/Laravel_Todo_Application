<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
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

Route::get('/','App\Http\Controllers\TodoListController@index');
Route::post('add','App\Http\Controllers\TodoListController@store')->name('add');
Route::get('show/{id}','App\Http\Controllers\TodoListController@show')->name('show');
Route::get('edit/{id}','App\Http\Controllers\TodoListController@edit')->name('edit');
Route::post('edit/{id}','App\Http\Controllers\TodoListController@update')->name('update');
Route::get('task/{id}','App\Http\Controllers\TodoListController@delete');