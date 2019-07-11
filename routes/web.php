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
Route::get('/install', function(){
  Artisan::call('storage:link');
  Artisan::call('migrate');
  Artisan::call('db:seed');
});
Route::get('/','PageController@home')->name('home');
Route::get('/productos','PageController@productos')->name('productos');
Route::get('/compras', 'PageController@compras')->name('compras');
Route::get('/perfil', 'PageController@perfil')->name('perfil');

Auth::routes();
Route::get('/home', 'HomeController@index');
