<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAntInfectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ant_infections', function (Blueprint $table) {
            $table->id();
            $table->string('nom_infection');
            $table->string('type_infection');
            $table->string('precision_type');
            $table->integer('nombreepisode');
            $table->date('datedecouverte');
            $table->date('date_last_episode');
            $table->string('traitement');
            $table->string('typeVIH');
            $table->string('siege_infection');
            $table->string('duree_tuberculose');
            $table->integer('nb_acces_par_an');

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
        Schema::dropIfExists('ant_infections');
    }
}
