<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarqueurTumoralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marqueur_tumorals', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('afproteine');
            $table->string('ldh');
            $table->string('ace');
            $table->string('psa');
            $table->string('ca');
            $table->string('calcitonine');

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
        Schema::dropIfExists('marqueur_tumorals');
    }
}
