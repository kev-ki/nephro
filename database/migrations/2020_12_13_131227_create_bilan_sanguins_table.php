<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBilanSanguinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bilan_sanguins', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('azotemie');
            $table->string('creatinemie');
            $table->string('calcemie');
            $table->string('clairance');
            $table->string('uricemie');
            $table->string('natremie');
            $table->string('kaliemie');
            $table->string('chloremie');
            $table->string('phosphoremie');
            $table->string('magnesemie');
            $table->string('bicarbonatemie');
            $table->string('protidemie');
            $table->string('phosphatase');
            $table->string('pth');
            $table->string('pu');
            $table->string('asat');
            $table->string('biltotal');
            $table->string('gammagt');
            $table->string('cpk');
            $table->string('ldh');
            $table->string('troponine');
            $table->string('myoglobine');
            $table->string('amylas');
            $table->string('glycemie');
            $table->string('cholesterol');
            $table->string('triglycederide');
            $table->string('hdl');
            $table->string('hb');
            $table->string('vgm');
            $table->string('gb');
            $table->string('plaquette');
            $table->string('leu');
            $table->string('reticulocyte');
            $table->string('crp');
            $table->string('ferserique');
            $table->string('sattetranferrine');
            $table->string('b12sanguin');
            $table->string('folatesanguin');

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
        Schema::dropIfExists('bilan_sanguins');
    }
}
