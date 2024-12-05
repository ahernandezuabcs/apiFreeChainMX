<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;   
use Illuminate\Support\Facades\Schema;  

class PuntoInteres extends Model
{
    public function up()
{
    Schema::create('puntos_interes', function (Blueprint $table) {
        $table->id('idPuntoInteres');
        $table->string('ubicacionPuntoInteres', 45);
        $table->binary('imagenPuntoInteres');
        $table->timestamps();
    });
}

}
