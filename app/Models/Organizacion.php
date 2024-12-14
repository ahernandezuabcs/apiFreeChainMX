<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizacion extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = [
        'nombreOrganizacion',
        'tipoOrganizacion',
        'logoOrganizacion',
        'sedeOrganizacion',
        'mesaDirectiva',
        'mesaDirectivaMotoclubId'
    ];

    public function mesaDirectivaMotoclub()
    {
        return $this->belongsTo(MesaDirectivaMotoclub::class, 'mesaDirectivaMotoclubId');
    }
}