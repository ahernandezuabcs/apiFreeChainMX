<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;   
use Illuminate\Support\Facades\Schema;

class PerfilClinicoMotociclista extends Model
{
    public function up()
    {
        Schema::create('perfil_clinico_motociclistas', function (Blueprint $table) {
            $table->string('idMotociclista', 10)->primary();
            $table->string('tipoSangre', 4);
            $table->string('enfermedadCronicoDegenerativa', 45);
            $table->string('tipoEnfermedad', 45);
            $table->string('tipoAlergia', 45);
            $table->string('donadorOrganos', 45);
            $table->string('idDonador', 45);
            $table->foreignId('motociclistasIdMotociclistas')->constrained('motociclistas', 'idMotociclistas');
            $table->timestamps();
        });
    }
    
}
