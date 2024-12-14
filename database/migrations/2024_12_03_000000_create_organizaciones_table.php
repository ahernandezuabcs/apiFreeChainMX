<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizacionesTable extends Migration
{
    public function up()
    {
        Schema::create('organizaciones', function (Blueprint $table) {
            $table->id();
            $table->string('nombreOrganizacion', 45);
            $table->string('tipoOrganizacion', 45);
            $table->binary('logoOrganizacion')->nullable();
            $table->string('sedeOrganizacion', 45);
            $table->boolean('mesaDirectiva');
            $table->unsignedBigInteger('mesaDirectivaMotoclubId');
            $table->foreign('mesaDirectivaMotoclubId')->references('id')->on('mesa_directiva_motoclub')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('organizaciones');
    }
}