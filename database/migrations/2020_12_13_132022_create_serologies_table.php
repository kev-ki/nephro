<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSerologiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serologies', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('serologie_vih');
            $table->string('cd4cv');
            $table->string('aghbs');
            $table->string('aghbe');
            $table->string('acantihbc');
            $table->string('acantihvc');
            $table->string('aslo');
            $table->string('facteur_rhumatoide');
            $table->string('widal');
            $table->string('ac_antinucleaire');
            $table->string('ac_antidna');
            $table->string('ac_antism');
            $table->string('ac_antiphospholipide');
            $table->string('tpha');
            $table->string('vdrl');
            $table->string('serologie_amibienne');
            $table->string('serologie_bilharzienne');
            $table->string('serologie_dengue');

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
        Schema::dropIfExists('serologies');
    }
}
