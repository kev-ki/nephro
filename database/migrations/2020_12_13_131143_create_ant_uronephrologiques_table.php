<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAntUronephrologiquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ant_uronephrologiques', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->date('datedecouverte');
            $table->integer('nombreepisode')->nullable();
            $table->string('siegeoeudeme')->nullable();
            $table->string('type_hematurie')->nullable();
            $table->string('type_trouble')->nullable();
            $table->string('traitement')->nullable();
            $table->string('evolution')->nullable();
            $table->integer('nombrerechute')->nullable();
            $table->string('dose_corticoide')->nullable();
            $table->string('duree_corticoide')->nullable();
            $table->string('signe_accompagnement')->nullable();
            $table->string('precision_type')->nullable();
            $table->string('traitement_trouble')->nullable();

            $table->unsignedBigInteger('id_consultation');
            $table->foreign('id_consultation')->references('id')->on('consultations');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ant_uronephrologiques');
    }
}
