<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElectrophoresesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('electrophoreses', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('type');
            $table->string('protide');
            $table->string('albumine');
            $table->string('alpha1');
            $table->string('alpha2');
            $table->string('gamma');
            $table->string('beta');

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
        Schema::dropIfExists('electrophoreses');
    }
}
