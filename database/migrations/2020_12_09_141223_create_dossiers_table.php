<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDossiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dossiers', function (Blueprint $table) {
            $table->string('numD')->primary();
            $table->unsignedBigInteger('iduser')->index();
            $table->string('id_patient')->index();
            $table->string('medecinresp');
            $table->string('chefservice');
            $table->string('DES');

            $table->foreign('id_patient')->references('idpatient')->on('patients');
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
        Schema::dropIfExists('dossiers');
    }
}
