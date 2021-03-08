<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAffectionIMMSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affection_i_m_m_s', function (Blueprint $table) {
            $table->id();
            $table->date('date_decouverte');
            $table->string('nom_affection');
            $table->string('precision_autre');
            $table->string('type_affection');
            $table->string('traitement');

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
        Schema::dropIfExists('affection_i_m_m_s');
    }
}
