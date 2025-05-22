<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detalles extends Model
{
     use  HasFactory;
    protected $fillable = [
        'idEvento',
        'idOrden',
        'idProducto',
        'cantidad',
        'metodo',
        'nombre',
        'precio',
        'total'
    ];
}
