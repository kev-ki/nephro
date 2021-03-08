<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBilanUrinairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bilan_urinaires', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('proteinurie');
            $table->string('volume');
            $table->string('leucyte');
            $table->string('hematie');
            $table->string('creatinurie');
            $table->string('ureecrati');
            $table->string('albuminecrati');
            $table->string('uraturie');
            $table->string('natriurese');
            $table->string('kaliurrse');
            $table->string('caliciturie');
            $table->string('phosphaturie');
            $table->string('cristallurie');

            $table->string('nom_autre');
            $table->string('resultat');
            $table->string('nom_autre1');
            $table->string('resultat1');

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
        Schema::dropIfExists('bilan_urinaires');
    }
}
