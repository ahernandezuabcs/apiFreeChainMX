<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerfilClinicoMotociclistasTable extends Migration
{
    public function up()
    {
        Schema::create('perfil_clinico_motociclistas', function (Blueprint $table) {
            $table->id('idPerfilClinico'); // unsignedBigInteger y clave primaria
            $table->string('tipoSangre', 5);
            $table->string('enfermedadesCronicas', 255);
            $table->string('alergias', 255);
            $table->string('medicamentosHabituales', 255);
            $table->string('contactoEmergencia', 45);
            $table->string('telefonoEmergencia', 15);
            $table->unsignedInteger('motociclistasIdMotociclistas'); // Asegúrate de que sea unsignedInteger
        $table->foreign('motociclistasIdMotociclistas', 'fk_motociclistas_perfil')
              ->references('idMotociclistas')
              ->on('motociclistas')
              ->onDelete('cascade')
              ->onUpdate('cascade');
            $table->timestamps();
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('perfil_clinico_motociclistas');
    }
}
