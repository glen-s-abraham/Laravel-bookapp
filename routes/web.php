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



Route::get('/','BookController@index')->name('book.index');
Route::get('/create','BookController@create')->name('book.create');
Route::post('/store','BookController@store')->name('book.store');
Route::get('/edit/{id}','BookController@edit')->name('book.edit');
Route::post('/update/{id}','BookController@update')->name('book.update');
Route::post('/delete/{id}','BookController@delete')->name('book.delete');