<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerfilClinicoMotociclista extends Model
{
    use HasFactory;

    protected $primaryKey = 'idPerfilClinico';
    public $incrementing = true;
    protected $fillable = [
        'tipoSangre',
        'enfermedadesCronicas',
        'alergias',
        'medicamentosHabituales',
        'contactoEmergencia',
        'telefonoEmergencia',
        'motociclistasIdMotociclistas'
    ];

    public function motociclista()
    {
        return $this->belongsTo(Motociclista::class, 'motociclistasIdMotociclistas');
    }
}