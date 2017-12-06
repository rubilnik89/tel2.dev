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

Route::get('/', 'UserController@main')->name('main');
Route::get('/single/{id}', 'UserController@single')->name('single');
Route::get('/edit/{id}', 'UserController@edit')->name('edit');
Route::get('/delete/{id}', 'UserController@delete')->name('delete');
Route::post('/edit/{id}', 'UserController@edit_post')->name('edit_post');
Route::post('/add', 'UserController@add')->name('add');
