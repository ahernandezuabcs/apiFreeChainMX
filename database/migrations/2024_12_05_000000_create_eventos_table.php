<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventosTable extends Migration
{
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->string('nombreEvento', 255);
            $table->date('fechaEvento');
            $table->text('descripcionEvento');
            $table->unsignedBigInteger('organizacionId');
            $table->foreign('organizacionId')->references('id')->on('organizaciones')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('eventos');
    }
}