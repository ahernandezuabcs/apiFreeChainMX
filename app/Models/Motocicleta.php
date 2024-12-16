<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motocicleta extends Model
{
    use HasFactory;

    protected $primaryKey = 'idMotocicleta';
    public $incrementing = true;
    protected $fillable = [
        'marcaMotocicleta',
        'modeloMotocicleta',
        'imagenMotocicleta',
        'anio',
        'cilindrada',
        'placas',
        'motociclistasIdMotociclistas'
    ];

    public function motociclista()
    {
        return $this->belongsTo(Motociclista::class, 'motociclistasIdMotociclistas');
    }
}