<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArchiveHospitalisationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archive_hospitalisations', function (Blueprint $table) {
            $table->id();
            $table->string('id_patient')->index();
            $table->string('numerochambre');
            $table->string('numerolit');
            $table->string('motif_hospitalisation');
            $table->string('diagnosticPrincipale');
            $table->string('diagnosticSecondaire')->nullable();
            $table->string('diagnosticAssocie')->nullable();
            $table->date('date_entree');
            $table->string('mode_entree');
            $table->string('diagnosticEntree');
            $table->date('date_sortie');
            $table->string('mode_sortie');
            $table->string('diagnosticSortie');

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
        Schema::dropIfExists('archive_hospitalisations');
    }
}
