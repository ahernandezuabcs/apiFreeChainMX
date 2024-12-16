<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePuntosInteresTable extends Migration
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

    public function down()
    {
        Schema::dropIfExists('puntos_interes');
    }
}