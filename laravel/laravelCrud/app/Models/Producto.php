<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $fillable=["nombreArticulo","seccion","precio","fecha","paisOrigen","ruta"];//para permitirnos realizar operacciones a la BD y evitar el error massassigment
}
