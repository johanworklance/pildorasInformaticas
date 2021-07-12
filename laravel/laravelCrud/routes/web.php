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

/* Route::get('/crear', 'App\Http\Controllers\productosController@create');

Route::get('/inicio','App\Http\Controllers\productosController@index');//como no use las tecnologias del profe, entonces debo colocar la ruta entera del controlador

Route::get('/insertar', 'App\Http\Controllers\productosController@store');
Route::get('/actualizar', 'App\Http\Controllers\productosController@update');
Route::get('/eliminar', 'App\Http\Controllers\productosController@destroy'); */

Route::resource('/productos','App\Http\Controllers\productosController');//este crea todas las rutas automaticamente, en el primer parametro va la carpeta de las views y en el segundo el controlador