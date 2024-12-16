<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = [
        'nombreEvento',
        'fechaEvento',
        'descripcionEvento',
        'organizacionId'
    ];

    public function organizacion()
    {
        return $this->belongsTo(Organizacion::class, 'organizacionId');
    }
}