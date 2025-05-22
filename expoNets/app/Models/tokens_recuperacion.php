<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tokens_recuperacion extends Model
{
    
    use  HasFactory;

    protected $table = 'tokens_recuperacion'; 
    public $timestamps = false;

    protected $fillable = [
        'usuario_id',
        'fechaExpiraion',
        'token'
    ];
public function usuario()
{
    return $this->hasMany(usuarios::class, 'usuario_id');
}

}
