<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;   
use Illuminate\Support\Facades\Schema;  

class Evento extends Model
{
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id('idEvento');
            $table->string('sedeEvento', 45);
            $table->string('organizadorEvento', 45);
            $table->string('ubicacionEvento', 45);
            $table->foreignId('organizacionIdOrganizacion')->constrained('organizaciones', 'idOrganizacion');
            $table->timestamps();
        });
    }
    
}
