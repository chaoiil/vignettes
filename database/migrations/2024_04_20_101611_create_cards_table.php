<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartesTable extends Migration
{
    public function up()
{
    Schema::create('cartes', function (Blueprint $table) {
        $table->id();
        $table->string('titre');
        $table->text('description')->nullable();
        $table->unsignedBigInteger('id_categorie');
        $table->unsignedBigInteger('id_taille_cart')->default(1); // Default taille 1*1
        $table->unsignedBigInteger('id_proprietaire');
        $table->string('image')->nullable();
        $table->string('video')->nullable();
        $table->string('musique')->nullable();
        $table->timestamps();

        $table->foreign('id_categorie')->references('id')->on('categories');
        $table->foreign('id_taille_cart')->references('id')->on('tailles_cartes');
        $table->foreign('id_proprietaire')->references('id')->on('users'); // Assuming users table exists
    });
    }

    public function down()
    {
        Schema::dropIfExists('cartes');
    }
}



