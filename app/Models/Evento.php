<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $primaryKey = 'idEvento';
    protected $fillable = [
        'sedeEvento',
        'organizadorEvento',
        'ubicacionEvento',
        'organizacionIdOrganizacion'
    ];

    public function organizacion()
    {
        return $this->belongsTo(Organizacion::class, 'organizacionIdOrganizacion');
    }
}