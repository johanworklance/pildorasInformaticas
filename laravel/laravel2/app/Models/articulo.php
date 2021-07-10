<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;//namespace o libreria para la papelera de reciclaje

class articulo extends Model//importante el pilla el nombre de la tabla de la base de datos con el nombre que le dimos en la consola de comandos, pero con la convencion de que en la BD el nombre esta en plural, en cambio en el modelo es en singular, de otra manera no encuentra al tabla
{
    use HasFactory;

    protected $fillable=[
        'nombre_articulo',
        'precio',
        'pais_origen',
        'observaciones',
        'seccion'

    ];//debemos sobreescribir esta variable $fillable que es un array, indicando que campos de la base de datos queremos que pemita una inseccion con el metodo create, de otra manera no nos deja y lanza un error

    /* protected $table="articulos";//si queremos usar el nombre de la tabla en la base de datos, creamos esta propiedad */

    /* protected $primaryKey="articulo_id";//si nuestra tabla no tiene una primarykey en la BD podemos indicarlo asi */

    use SoftDeletes;//directiva para hacer una especie de papelera de reciclaje

    public function cliente(){
        
        return $this->belongsTo("App\Models\cliente");//cuando buscamos partiendo de la tabla que tiene la clave foranea usamos este metodo, es decir si buscamos el producto con id 2, encontrara al cliente que compro ese articulo
    }

    public function calificaciones(){
        return $this->morphMany('App\Models\Calificaciones','calificacion');//indicamos el modelo y el nombre del metodo que hace que Calificaciones sea polimorfico respecto a esta tabla articulos
    }
}
