<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamenGeneralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examen_generals', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->float('poids');
            $table->float('taille');
            $table->string('sc');
            $table->string('temperature');
            $table->string('ta');
            $table->string('pouls');
            $table->string('etatgeneral');
            $table->string('poidsperdu')->nullable();
            $table->integer('duree')->nullable();
            $table->string('conjonctive')->nullable();
            $table->string('langue');
            $table->string('oedeme')->nullable();
            $table->string('siegeoedeme')->nullable();
            $table->string('deshydratation')->nullable();

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
        Schema::dropIfExists('examen_generals');
    }
}
