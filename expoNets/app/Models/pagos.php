<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pagos extends Model
{
     use  HasFactory;
    protected $fillable = [
        'idUsuario',
        'numero_tarjeta',
        'fecha_vencimiento',
        'codigo_seguridad',
        'monto_a_pagar',
        'direccion_facturacion',
        'codigo_postal',
        'fecha_pago'
    ];
}
