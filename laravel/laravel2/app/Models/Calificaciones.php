<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calificaciones extends Model
{
    use HasFactory;

    public function calificacion(){
        return $this->morphTo();//este metodo indica que este modelo Calificaciones que corresponde a la tabla calificacionese en la bd, sera polimorfica
    }
}
