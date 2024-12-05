<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;  
use Illuminate\Support\Facades\Schema; 

class Organizacion extends Model
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
            $table->foreignId('mesaDirectivaMotoclubIdPresidente')->constrained('mesa_directiva_motoclub', 'nombrePresidente');
            $table->timestamps();
        });
    }
    
}
