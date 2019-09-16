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
  return redirect('/');
});
Route::bind('product',function($id){
  return App\Product::where('id',$id)->first();
});

Route::get('/','PageController@home')->name('home');
Route::get('/productos','PageController@productos')->name('productos');
Route::get('/detalleProductos/{id}','PageController@detalleProductos')->name('detalleproducto');
Route::get('/compras/show', 'CartController@show')->name('compras-show');
Route::get('/compras/add/{product}', 'CartController@add')->name('compras-add');
Route::get('/compras/delete/{product}', 'CartController@delete')->name('compras-delete');
Route::get('/compras/trash', 'CartController@trash')->name('compras-trash');
Route::get('/compras/update/{product}/{quantity?}', 'CartController@update')->name('compras-update');





Auth::routes();
Route::get('/home', 'HomeController@index');
Route::group(['middleware' => 'auth'], function () {

  //Carga de Productos
  Route::get('/formulario', 'FormularioController@index')->name('formulario');
  Route::post('/formulario', 'FormularioController@store')->name('formulario_post');
  //Validar Perfil
  Route::get('/perfil', 'PerfilController@index')->name('perfil');
  Route::post('/perfil/{id}','PerfilController@update')->name('actualizarPerfil');
  //Validar Compra
  Route::get('/detalle','CartController@detalle')->name('compras-detalle');
  Route::get('/thanks','CartController@thanks')->name('thanks');

});
