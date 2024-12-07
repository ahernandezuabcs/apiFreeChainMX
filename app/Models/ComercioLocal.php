<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComercioLocal extends Model
{
    use HasFactory;

    protected $primaryKey = 'idComercioLocal';
    protected $fillable = [
        'localidadComercio',
        'tipoComercio',
        'ubicacionComercio',
        'imagenComercio'
    ];
}