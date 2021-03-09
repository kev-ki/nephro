<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTraitementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traitements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_consultation')->index();
            $table->date('date');
            $table->string('prescription');
            $table->string('posologie');
            $table->string('voie_administration');
            $table->unsignedBigInteger('prescripteur')->index();

            $table->foreign('id_consultation')->references('id')->on('consultations');
            $table->foreign('prescripteur')->references('id')->on('users');
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
        Schema::dropIfExists('traitements');
    }
}
