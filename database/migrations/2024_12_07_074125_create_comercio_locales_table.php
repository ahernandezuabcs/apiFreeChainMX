<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComercioLocalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comercio_locales', function (Blueprint $table) {
            $table->id('idComercioLocal');
            $table->string('localidadComercio', 15);
            $table->string('tipoComercio', 45);
            $table->string('ubicacionComercio', 45);
            $table->string('imagenComercio')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comercio_locales');
    }
}