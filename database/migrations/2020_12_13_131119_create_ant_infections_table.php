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
            $table->string('nominffocale');
            $table->integer('nbepisode');
            $table->date('datelastep');
            $table->string('traitement');
            $table->string('type');
            $table->string('type_urinaire');
            $table->integer('nbaccesparans');
            $table->string('siege');
            $table->date('datedecouverteinf');
            $table->string('duree');
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
