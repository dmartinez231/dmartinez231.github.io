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



Route::get('/f', function () {
    return 'Hello World';
});

Route::get('/home', 'HomeController@index');

Route::get('/home','PageController@home')->name('home');
Route::get('/productos','PageController@productos')->name('productos');
Route::get('/compras', 'PageController@compras')->name('compras');
Route::get('/perfil', 'PageController@perfil')->name('perfil'); // nombre del usuario

//Route::get('/formulario', 'PageController@formulario')->name('formulario');

Auth::routes();
