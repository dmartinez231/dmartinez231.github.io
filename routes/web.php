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
  return redirect('/');
});
Route::get('/','PageController@home')->name('home');
Route::get('/productos','PageController@productos')->name('productos');
Route::get('/compras', 'PageController@compras')->name('compras');

Route::get('/formulario', 'FormularioController@index')->name('formulario');
Route::post('/formulario', 'FormularioController@store')->name('formulario');


Auth::routes();
Route::get('/home', 'HomeController@index');
Route::group(['middleware' => 'auth'], function () {

  Route::get('/perfil', 'PerfilController@index')->name('perfil');
  Route::post('/perfil','PerfilController@update')->name('actualizarPerfil');

});
