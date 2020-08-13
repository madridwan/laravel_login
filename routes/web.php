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

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'AdminController@index');
Route::get('/admin/tambah', 'AdminController@tambah');
Route::post('/admin/store', 'AdminController@store');
Route::get('/admin/edit/{id}', 'AdminController@edit');
Route::post('/admin/update', 'AdminController@update');
Route::get('/admin/hapus/{id}', 'AdminController@hapus');
Route::get('/user', 'UserController@index');
