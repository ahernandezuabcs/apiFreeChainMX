<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizaciones', function (Blueprint $table) {
            $table->id();
            $table->string('nombreOrganizacion');
            $table->string('tipoOrganizacion');
            $table->string('sedeOrganizacion');
            $table->boolean('mesaDirectiva');
            $table->unsignedBigInteger('mesaDirectivaMotoclubId');
            $table->timestamps();

            $table->foreign('mesaDirectivaMotoclubId')->references('id')->on('mesa_directiva_motoclubs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organizaciones');
    }
}