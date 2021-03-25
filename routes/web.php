<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;

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

Route::get('/','ProductosController@index')->name('index');
Route::get('/categorias','ProductosController@categoria')->name('categoria');
Route::post('/inserts','ProductosController@inserts')->name('insert.categoria');

Route::get('/productos','ProductosController@productoIndex')->name('index.producto');
Route::post('/inserts/productos','ProductosController@insertProducto')->name('insert.producto');
Route::get('/deletes/productos/{id}','ProductosController@deleteProducto')->name('delete.producto');
Route::get('/update/productos/{id}','ProductosController@updateProducto')->name('update.producto');
Route::post('/cambiar/productos','ProductosController@cambiarProducto')->name('cambiar.producto');

Route::get('/editar/categoria/{id}','ProductosController@modificar')->name('updates.categoria');
Route::post('/update/categoria','ProductosController@update')->name('modificar.categoria');

Route::get('/eliminar/categoria/{id}','ProductosController@eliminar')->name('delete.categoria');



