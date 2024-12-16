<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PuntoInteres extends Model
{
    use HasFactory;

    protected $table = 'puntos_interes'; 

    protected $primaryKey = 'idPuntoInteres';

    protected $fillable = [
        'ubicacionPuntoInteres',
        'imagenPuntoInteres'
    ];
}