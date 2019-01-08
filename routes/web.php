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

Route::get('/','TaskController@index')->middleware('auth');
Route::get('/inactive','TaskController@showInactive')->middleware('auth');

Route::get('/exit','TaskController@logout');
Route::resource('tasks','TaskController')->middleware('auth');
Route::post('/tasks/archive/{id}','TaskController@archive');
Route::post('/tasks/unarchive/{id}','TaskController@unarchive');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
