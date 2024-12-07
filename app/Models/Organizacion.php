<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizacion extends Model
{
    use HasFactory;

    protected $primaryKey = 'idOrganizacion';
    protected $fillable = [
        'nombreOrganizacion',
        'tipoOrganizacion',
        'logoOrganizacion',
        'sedeOrganizacion',
        'mesaDirectiva',
        'mesaDirectivaMotoclubIdPresidente'
    ];

    public function mesaDirectivaMotoclub()
    {
        return $this->belongsTo(MesaDirectivaMotoclub::class, 'mesaDirectivaMotoclubIdPresidente');
    }
}
