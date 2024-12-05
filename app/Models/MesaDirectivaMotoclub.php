<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MesaDirectivaMotoclub extends Model
{
    public function up()
    {
        Schema::create('mesa_directiva_motoclub', function (Blueprint $table) {
            $table->string('nombrePresidente', 45)->primary();
            $table->string('idPresidente', 10);
            $table->string('nombreVicePresidente', 45);
            $table->string('idVicePresidente', 10);
            $table->string('nombreSecretario', 45);
            $table->string('idSecretario', 10);
            $table->string('nombreSgtoArms', 45);
            $table->string('idSgtoArms', 10);
            $table->string('nombreCapitanRuta', 45);
            $table->string('idCapitanRuta', 10);
            $table->string('nombreRelacionesPublicas', 45);
            $table->string('idRelacionesPublicas', 10);
            $table->timestamps();
        });
    }
    
}
