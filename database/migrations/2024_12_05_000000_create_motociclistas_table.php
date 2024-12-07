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
            $table->unsignedBigInteger('idMotociclistas')->primary(); // Define explícitamente como unsignedBigInteger
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

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('motociclistas');
    }
};
