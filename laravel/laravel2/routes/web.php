<?php

use Illuminate\Support\Facades\Route;
use App\Models\articulo;//colocar el namespace en donde esta la clase modelo, o de otra manera no lo agarra
use App\Models\cliente;
use App\Models\Calificaciones;

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

Route::get('/','App\Http\Controllers\miControlador@index');
Route::get('/crear','App\Http\Controllers\miControlador@create');
Route::get('/articulos','App\Http\Controllers\miControlador@store');
Route::get('/mostrar','App\Http\Controllers\miControlador@show');
Route::get('/contacto','App\Http\Controllers\miControlador@contactar');
Route::get('/galeria','App\Http\Controllers\miControlador@galeria');

/* Route::get('/insertar',function(){
    DB::insert("INSERT INTO articulos(nombre_articulo,precio,pais_origen,observaciones,seccion) VALUES(?,?,?,?,?)",['Jarron',15.2,'Japón','Ganga','Cerámica']);
});//en la ruta insertar se ejecutara este script sql, con la instruccion insert

Route::get('/leer',function(){
    $resultados= DB::select("SELECT * FROM articulos WHERE id=?",[1]);//llega un array con valores asociativos
    foreach($resultados as $articulo){
        return "Artículo:" . $articulo->nombre_articulo . "<br>";
    }
});

Route::get('/actualizar',function(){
    DB::update("UPDATE articulos SET seccion='Decoración' WHERE id=?",[1]);
});
Route::get('/borrar',function(){
    DB::delete("DELETE FROM articulos WHERE id=?",[1]);
}); */



Route::get('/leer',function(){
    /* $articulos= articulo::all();//olvide ponerle mayusculas al modelo, por cierto all trae todos los registros en un array asi de simple es un metodo que hereda de la clase model

    foreach($articulos as $articulo){
        echo $articulo['nombre_articulo'] . " Precio:" . $articulo['precio'] . "<br>";
    } */

    /* $articulos= articulo::where('seccion','videojuegos')->take(2)->orderBy("nombre_articulo","desc")->get();//devuelve un objeto json, en este caso con el take trae solo 2 resultados, estos metodos restricciones van antes del get de eloquent */
    /* $articulos= articulo::where('seccion','videojuegos')->max('precio');//el mayor precio de los articulos videojuegos, en este caso no es necesario terminar con el metodo get, y asi varios metodos en la pagina de laravel */

    /* $articulos= articulo::where('id','5')->get();//mas abajo le hize un softDelete a este registro por lo que si lo busca, no lo "encontrara" mandara un objeto json vacio */


   /*  $articulos = articulo::withTrashed()->where('id', 5)->get();//con el withTrashed si que buscara registros que hayan tenido un softDelete o no, sin el where traeria todos los registros asi tengan null en el deleteat */

    $articulos = articulo::onlyTrashed()->get();//lo mismo que el anterior pero solo valores con softDelete y sin tener que especificar con un where

    //$articulos = articulo::withTrashed()->where('id', 5)->restore();//si restauramos pondra null en el campo deleteat del registro haciendo que este ya no este "eliminado"

    return $articulos;
});

Route::get('/insertar',function(){
    $articulos= new articulo();

    $articulos->nombre_articulo="pantalones";
    $articulos->precio=60;
    $articulos->pais_origen="ecuador";
    $articulos->observaciones="pantalones azules";
    $articulos->seccion="ropa";

    $articulos->save();//--esto es como magia negra rara, asi se hacen inserts con laravel, cada campo de una tabla es como una propiedad de instancia, asignamos los valores que queremos y luego le damos a save
});

Route::get('/actualizar',function(){

    /* $articulos= articulo::find(7);//parece que el se guia de la primarykey en este caso el id

    $articulos->nombre_articulo="pantalones";
    $articulos->precio=120;//cambie el precio
    $articulos->pais_origen="ecuador";
    $articulos->observaciones="pantalones azules";
    $articulos->seccion="ropa";//ademas de estos datos el campo update en la tabla de la base de datos laravel lo actualiza solo, peor cuidado, fijarnos en la zona horaria de laravel en el archivo config/app.php esta para cambiarlo

    $articulos->save(); */

    /* articulo::where('seccion','ropa')->update(['seccion'=>'clothes']);//actualiza varios, en este caso los de la seccion ropa con el metodo update que pide un array asociativo */

    articulo::where('seccion','clothes')->where('pais_origen','brazil')->update(['precio'=>90]);//varios criterios varios where

    echo "exito";
});

Route::get('/borrar',function(){

    /* $articulo=articulo::find(3);//registro con id 3 
       $articulo->delete();//ahora ya no existe
    */

    $articulo= articulo::where('seccion','zapatos')->delete();

    
});

Route::get('/insercionVarios', function(){

    articulo::create(['nombre_articulo'=>'mario tennis','precio'=>70,'pais_origen'=>'japon','observaciones'=>'juego de 3ds','seccion'=>'videojuegos']);//revisar el modelo y la variable fillable

    echo "exito";

});

Route::get('/softDelete', function(){
    articulo::find(5)->delete(); //como ahora el modelo tiene habilitado el softDelete, lo que hace es darle valor de fecha y hora al campo deleteAt, es como si estuviera borrado, de tener null, significa que el registro "existe"
});

Route::get('/hardDelete', function(){
    $articulos = articulo::withTrashed()->where('id', 5)->forceDelete();//con forceDelete eliminamos permanentemente los registros con valor distinto de null en su deleteat
});

Route::get('/cliente/{id}/articulo', function($id){
    
    return cliente::find($id)->articulo;//busca el articulo que tenga como id del cliente el del parametro, por cierto ese articulo creo hace referencia a un atributo creado por laravel con el nombre del metodo articulo que esta en el modelo cliente
});

Route::get('/articulo/{id}/cliente', function($id){
    
    return articulo::find($id)->cliente->nombre;
});

Route::get('/articulos', function(){
    
    $articulos= cliente::find(1)->articulos->where('pais_origen','japon');//los articulos comprados por el cliente 1 y quesean japoneses

    foreach($articulos as $articulo){
        echo $articulo->nombre_articulo . "<br>";
    }
});

Route::get('/cliente/{id}/perfil', function($id){
    
   $cliente= cliente::find($id);

   foreach($cliente->perfils as $perfil){
        echo $perfil->nombre;//el profe uso aqui un return y sirvio igual pero si hubieran varios registros eso no haria que solo diera un resultado que el return nos saca
   }
    
});

Route::get('/calificaciones', function(){
    
    $cliente= cliente::find(2);

    foreach($cliente->calificaciones as $calificacion){
        echo "Nota cliente: " . $calificacion->calificacion . "<br>";//este ultimo 'calificacion' correponde al campo en la tabla calificaciones
    }

    $articulo= articulo::find(8);

    foreach($articulo->calificaciones as $calificacion){
        echo "Nota articulo: " . $calificacion->calificacion;//este ultimo 'calificacion' correponde al campo en la tabla calificaciones
    }
     
     //como sospechaba el profe uso return en los foreach, pero de hacer eso con el primero no habria enviado el resto de codigo, asi que use echo, asi poder ver el de los articulos tambien
 });