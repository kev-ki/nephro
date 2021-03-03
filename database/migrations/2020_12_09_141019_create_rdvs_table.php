<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRdvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rdvs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('iduser')->index();
            $table->string('medecin');
            $table->string('id_patient')->index();
            $table->string('nom');
            $table->string('prenom');
            $table->string('telephone');
            $table->date('dateRdv');
            $table->time('heureRdv');
            $table->string('motif');

            $table->foreign('iduser')->references('id')->on('users');
            $table->foreign('id_patient')->references('idpatient')->on('patients');
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
        Schema::dropIfExists('rdvs');
    }
}
