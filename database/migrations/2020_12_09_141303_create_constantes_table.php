<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConstantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('constantes', function (Blueprint $table) {
            $table->id();
            $table->string('idpatient')->index();
            $table->unsignedBigInteger('iduser')->index();
            $table->date('dateprise');
            $table->float('poids');
            $table->float('taille');
            $table->string('tension');
            $table->string('pouls')->nullable();
            $table->string('temperature')->nullable();
            $table->string('saturation_oxygene')->nullable();
            $table->string('frequence_respiratoire')->nullable();
            $table->string('frequence_cardiaque')->nullable();
            $table->string('status')->nullable();

            $table->foreign('idpatient')->references('idpatient')->on('patients');
            $table->foreign('iduser')->references('id')->on('users');
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
        Schema::dropIfExists('constantes');
    }
}
