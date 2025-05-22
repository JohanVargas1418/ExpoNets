<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class imagenproducto extends Model
{
     use  HasFactory;
protected $table = 'imagenproducto';

    protected $fillable = [
        'idProducto',
        'nombreArchivo'
       
    ];
}
