<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEndocrinologiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('endocrinologies', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('ft3');
            $table->string('ft4');
            $table->string('tshus');
            $table->string('cortisolomie');
            $table->string('testsynacthene');
            $table->string('prolactemie');
            $table->string('fsh');
            $table->string('lh');

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
        Schema::dropIfExists('endocrinologies');
    }
}
