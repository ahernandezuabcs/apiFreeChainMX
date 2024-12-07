<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizacionesTable extends Migration
{
    public function up()
    {
        Schema::create('organizaciones', function (Blueprint $table) {
            $table->id('idOrganizacion');
            $table->string('nombreOrganizacion', 45);
            $table->string('tipoOrganizacion', 45);
            $table->binary('logoOrganizacion');
            $table->string('sedeOrganizacion', 45);
            $table->boolean('mesaDirectiva');
            $table->string('mesaDirectivaMotoclubIdPresidente', 45);
            $table->foreign('mesaDirectivaMotoclubIdPresidente')->references('nombrePresidente')->on('mesa_directiva_motoclub');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('organizaciones');
    }
}
