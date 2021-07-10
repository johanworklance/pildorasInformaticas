<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
    use HasFactory;

    public function articulo(){//con nombre de la segunda tabla a asociar, aqui articulos pero se pone en singular
        
        return $this->hasOne("App\Models\articulo");//con este metodo ya asociamos el cliente con su articulo, es bastante asbtracto al verdad
    }
    public function articulos(){
        
        return $this->hasMany("App\Models\articulo");//en una relacion de uno a varios se usa hasMany y el metodo va en plural
    }

    public function perfils(){
        return $this->belongsToMany("App\Models\perfil");//esta relacion de varios a varios laravel lo logro siguiendo la convencion de cliente_perfil, es decir el realiza la relacion buscando en la base de datos las tablas clientes y perfils y su tabla pivote cliente_perfil, si no se siguiera la convencion hay que indicar que nombre tienen la tabla, en la documentacion se ve como se hace, es pasar un parametro no mas
    }

    public function calificaciones(){
        return $this->morphMany('App\Models\Calificaciones','calificacion');//indicamos el modelo y el nombre del metodo que hace que Calificaciones sea polimorfico respecto a esta tabla clientes
    }
}
