<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventosTable extends Migration
{
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id('idEvento');
            $table->string('sedeEvento', 45);
            $table->string('organizadorEvento', 45);
            $table->string('ubicacionEvento', 45);
            $table->foreignId('organizacionIdOrganizacion')->constrained('organizaciones', 'idOrganizacion');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('eventos');
    }
}