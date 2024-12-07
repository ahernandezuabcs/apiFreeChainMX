<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MesaDirectivaMotoclub extends Model
{
    use HasFactory;

    protected $primaryKey = 'nombrePresidente';
    protected $fillable = [
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
