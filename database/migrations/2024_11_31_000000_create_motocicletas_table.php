<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotocicletasTable extends Migration
{
    public function up(): void
    {
        Schema::create('motocicletas', function (Blueprint $table) {
            $table->id('idMotocicleta'); // Autoincremental y unsigned
            $table->string('marcaMotocicleta', 15);
            $table->string('modeloMotocicleta', 45);
            $table->binary('imagenMotocicleta')->nullable();
            $table->year('anio');
            $table->integer('cilindrada');
            $table->string('placas', 10);
            $table->unsignedInteger('motociclistasIdMotociclistas'); // Asegúrate de que sea unsignedInteger
            $table->foreign('motociclistasIdMotociclistas')
                  ->references('idMotociclistas')
                  ->on('motociclistas')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('motocicletas');
    }
}