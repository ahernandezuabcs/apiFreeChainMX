<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComercioLocal extends Model
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
    
}
