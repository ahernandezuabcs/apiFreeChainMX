<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motocicleta extends Model
{
    use HasFactory;

    protected $fillable = [
        'marcaMotocicleta',
        'modeloMotocicleta',
        'imagenMotocicleta'
    ];
}
