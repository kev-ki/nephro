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
            $table->string('siege')->nullable();
            $table->string('type')->nullable();
            $table->string('traitementrecu')->nullable();
            $table->string('evolution')->nullable();
            $table->integer('nombrerechute')->nullable();
            $table->string('duree_traitement')->nullable();
            $table->string('dose')->nullable();
            $table->string('autre_proteinurie')->nullable();
            $table->string('precision_proteinurie')->nullable();
            $table->string('autre_trouble')->nullable();
            $table->string('precision_trouble')->nullable();
            $table->string('signe')->nullable();
            $table->string('precision_signe')->nullable();
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
