<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->string('idpatient')->primary();
            $table->unsignedBigInteger('iduser')->index();
            $table->string('nom');
            $table->string('prenom');
            $table->string('nomjeunefille')->nullable();
            $table->string('type_doc_id');
            $table->string('num_doc_id');
            $table->string('datenaissance');
            $table->string('lieunaissance');
            $table->integer('age');
            $table->char('sexe');
            $table->string('sexualite');
            $table->string('ethnie');
            $table->string('rhesus');
            $table->string('electrophoreseHB');
            $table->string('pere');
            $table->string('mere');
            $table->string('profession');
            $table->string('culte');
            $table->string('assurance')->nullable();
            $table->string('type_assurance')->nullable();
            $table->string('sit_matrimoniale');
            $table->integer('nombregarcons')->nullable();
            $table->integer('nombrefilles')->nullable();
            $table->string('regionorigine');
            $table->string('ville_village');
            $table->string('telephone1')->nullable();
            $table->string('telephone2')->nullable();
            $table->string('telephone3')->nullable();
            $table->string('tuteur')->nullable();
            $table->string('quartier_secteur_tuteur')->nullable();
            $table->string('pers_prevenir');
            $table->string('tel_pers_prevenir');

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
        Schema::dropIfExists('patients');
    }
}
