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

/* Route::get('/', function () {
    return view('welcome');
}); */

/* Route::get('/aboutUs/{id}/{nombre}', function ($id,$nom) {//paso de parametros en la url si ponemos /aboutUs/2, veremos un 2 en el return que se asocia al $id de la funcion
    return "Este es el post n°: $id y es de: $nom";//http://localhost:8000/aboutUs/2/johan
})->where('nombre','[a-zA-Z]+');//metodo para evaluar con expresiones regulares, aqui seria que el nombre sea solo letras de la a la z, con el + indicamos que pueden ser una o mas letras  */

//Route::get('/home','ExampleController@inicio');

//Route::get('/home',[ExampleController::class,'inicio']);

/* Route::get('/home', 'App\Http\Controllers\ExampleController@inicio');//de estas 3 solo me sirvio esta que da la ruta entera

Route::get('/home3/{id}', 'App\Http\Controllers\Example3Controller@index'); */

/* Route::get('/','App\Http\Controllers\PaginasController@inicio');//esta usando el controlador que cree que tiene el return view('welcome');
Route::get('/inicio','App\Http\Controllers\PaginasController@inicio');
Route::get('/contacto','App\Http\Controllers\PaginasController@contacto');
Route::get('/quienesSomos','App\Http\Controllers\PaginasController@quienesSomos'); */

Route::resource('post','App\Http\Controllers\Example3Controller');//crea rutas de forma automatica, sin tener que indicar cada metodo, se pueden ver las rutas en la consola con el comando route:list