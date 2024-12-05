<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Motociclista extends Model
{
    public function up()
    {
        Schema::create('motociclistas', function (Blueprint $table) {
            $table->string('idMotociclistas', 10)->primary();
            $table->string('nombreMotociclista', 45);
            $table->string('primerApellidoMotociclista', 45);
            $table->string('segundoApellidoMotociclista', 45);
            $table->date('fechaNacimientoMotociclista');
            $table->string('direccionMotociclista', 45);
            $table->string('colonia', 45);
            $table->foreignId('motocicletasIdMotocicleta')->constrained('motocicletas', 'idMotocicleta');
            $table->foreignId('puntosDeInteresIdPuntoInteres')->constrained('puntos_interes', 'idPuntoInteres');
            $table->timestamps();
                
        });
    }   
}
