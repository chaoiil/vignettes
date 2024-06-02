<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTailleCartesTable extends Migration
{
    public function up()
    {
        Schema::create('tailles_cartes', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->integer('largeur');
            $table->integer('hauteur');
            $table->timestamps();
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('taille_cartes');
    }
}
