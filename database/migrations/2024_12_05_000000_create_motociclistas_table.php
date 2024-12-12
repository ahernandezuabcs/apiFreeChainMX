<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotociclistasTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('motociclistas', function (Blueprint $table) {
            $table->increments('idMotociclistas')->primary(); // Define explícitamente como unsignedBigInteger
            $table->string('nombreMotociclista', 45);
            $table->string('primerApellidoMotociclista', 45);
            $table->string('segundoApellidoMotociclista', 45)->nullable();
            $table->date('fechaNacimientoMotociclista');
            $table->string('direccionMotociclista', 45)->nullable();
            $table->string('colonia', 45)->nullable();
            $table->unsignedBigInteger('motocicletasIdMotocicleta')->nullable(); // Hacer nullable
            $table->unsignedBigInteger('puntosDeInteresIdPuntoInteres')->nullable(); // Hacer nullable
            $table->foreign('motocicletasIdMotocicleta')->references('idMotocicleta')->on('motocicletas');
            $table->foreign('puntosDeInteresIdPuntoInteres')->references('idPuntoInteres')->on('puntos_interes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('motociclistas');
    }
};
