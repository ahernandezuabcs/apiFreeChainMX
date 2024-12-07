<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motociclista extends Model
{
    use HasFactory;

    protected $primaryKey = 'idMotociclistas';
    protected $fillable = [
        'idMotociclistas',
        'nombreMotociclista',
        'primerApellidoMotociclista',
        'segundoApellidoMotociclista',
        'fechaNacimientoMotociclista',
        'direccionMotociclista',
        'colonia',
        'motocicletasIdMotocicleta',
        'puntosDeInteresIdPuntoInteres'
    ];

    public function motocicleta()
    {
        return $this->belongsTo(Motocicleta::class, 'motocicletasIdMotocicleta');
    }

    public function puntoInteres()
    {
        return $this->belongsTo(PuntoInteres::class, 'puntosDeInteresIdPuntoInteres');
    }
}
