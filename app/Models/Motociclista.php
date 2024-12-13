<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motociclista extends Model
{
    use HasFactory;

    protected $primaryKey = 'idMotociclistas';
    public $incrementing = true;
    protected $fillable = [
        'nombreMotociclista',
        'primerApellidoMotociclista',
        'segundoApellidoMotociclista',
        'fechaNacimientoMotociclista',
        'direccionMotociclista',
        'colonia',
        'motocicletasIdMotocicleta',
        'puntosDeInteresIdPuntoInteres'
    ];

    public function perfilClinico()
    {
        return $this->hasOne(PerfilClinicoMotociclista::class, 'motociclistasIdMotociclistas');
    }
    public function motocicleta()
    {
        return $this->belongsTo(Motocicleta::class, 'motocicletasIdMotocicleta');
    }
}
