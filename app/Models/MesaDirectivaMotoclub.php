<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MesaDirectivaMotoclub extends Model
{
    use HasFactory;

    protected $table = 'mesa_directiva_motoclubs';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = [
        'nombrePresidente',
        'idPresidente',
        'nombreVicePresidente',
        'idVicePresidente',
        'nombreSecretario',
        'idSecretario',
        'nombreSgtoArms',
        'idSgtoArms',
        'nombreCapitanRuta',
        'idCapitanRuta',
        'nombreRelacionesPublicas',
        'idRelacionesPublicas'
    ];
}