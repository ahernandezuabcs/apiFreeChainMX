<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint; 
use Illuminate\Support\Facades\Schema;

class Motocicleta extends Model
{
    public function up()
    {
        Schema::create('motocicletas', function (Blueprint $table) {
            $table->id('idMotocicleta');
            $table->string('marcaMotocicleta', 15);
            $table->string('modeloMotocicleta', 45);
            $table->binary('imagenMotocicleta');
            $table->timestamps();
        });
    }
}
