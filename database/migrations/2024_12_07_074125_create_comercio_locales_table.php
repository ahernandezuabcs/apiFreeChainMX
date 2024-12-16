<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComercioLocalesTable extends Migration
{
    public function up()
    {
        Schema::create('comercio_locales', function (Blueprint $table) {
            $table->id('idComercioLocal');
            $table->string('localidadComercio', 15);
            $table->string('tipoComercio', 45);
            $table->string('ubicacionComercio', 45);
            $table->binary('imagenComercio');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('comercio_locales');
    }
}