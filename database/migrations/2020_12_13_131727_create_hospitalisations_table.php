<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHospitalisationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospitalisations', function (Blueprint $table) {
            $table->id();
            $table->string('id_patient')->index();
            $table->string('numerochambre')->nullable();
            $table->string('numerolit')->nullable();
            $table->string('motif_hospitalisation');
            $table->string('diagnosticPrincipale')->nullable();
            $table->string('diagnosticSecondaire')->nullable();
            $table->string('diagnosticAssocie')->nullable();
            $table->date('date_entree')->nullable();
            $table->string('mode_entree')->nullable();
            $table->string('diagnosticEntree')->nullable();
            $table->date('date_sortie')->nullable();
            $table->string('mode_sortie')->nullable();
            $table->string('diagnosticSortie')->nullable();

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
        Schema::dropIfExists('hospitalisations');
    }
}
