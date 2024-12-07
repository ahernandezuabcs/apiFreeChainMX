<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotocicletasTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('motocicletas', function (Blueprint $table) {
                    $table->id('idMotocicleta');
                    $table->string('marcaMotocicleta', 15);
                    $table->string('modeloMotocicleta', 45);
                    $table->binary('imagenMotocicleta');
                    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('motocicletas');
    }
};
