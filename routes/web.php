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



Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/home','PageController@home')->name('home');
Route::get('/productos','PageController@productos')->name('productos');
Route::get('/compras', 'PageController@compras')->name('compras');
route::get('/perfil', 'PageController@perfil')->name('perfil');
route::get('/formularioP', 'PageController@index')->name('formularioProductos');
