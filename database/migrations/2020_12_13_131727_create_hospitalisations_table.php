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
            $table->string('numerochambre')->primary();
            $table->string('numerolit');
            $table->string('id_patient')->index();
            $table->timestamps();

       /*
            $hospitalisation->diagnosticPrincipale=$request->diagnostiquePrincipale;
            $hospitalisation->diagnosticSecondaire=$request->diagnostiqueSecondaire;
            $hospitalisation->diagnosticAssocie=$request->diagnostiqueAssocie;
            $hospitalisation->diagnosticEntre=$request->diagnostiqueEntre;
            $hospitalisation->diagnosticSortie=$request->diagnostiqueSortie;
            $hospitalisation->dateEntre = $request->dateEntre;
            $hospitalisation->dateSortie=$request->dateSortie;
            $hospitalisation->motifhospitalisation=$request->motifhospitalisation;
            $hospitalisation->modeentre=$request->modeentre;
            $hospitalisation->modesortie=$request->modesortie;*/
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
