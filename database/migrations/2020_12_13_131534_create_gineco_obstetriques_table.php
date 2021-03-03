<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGinecoObstetriquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gineco_obstetriques', function (Blueprint $table) {
            $table->id();
            $table->date('datepremierregle');
            $table->date('datedernierregle');
            $table->date('datemenopause')->nullable();
            $table->string('typecontraception')->nullable();
            $table->integer('durecontraception')->nullable();
            $table->string('gestite')->nullable();
            $table->string('parite')->nullable();
            $table->date('datederniergrossesse')->nullable();
            $table->string('ev')->nullable();
            $table->string('dcd')->nullable();
            $table->integer('nbavortementspontane')->nullable();
            $table->string('anneevortementspontane')->nullable();
            $table->integer('nbavortementprovoque')->nullable();
            $table->string('anneeavortementprovoque')->nullable();
            $table->integer('nombrecesarienne')->nullable();
            $table->string('anneecesarienne')->nullable();
            $table->string('motifcesarienne')->nullable();
            $table->integer('albumine')->nullable();
            $table->integer('hta')->nullable();
            $table->string('grossesse')->nullable();
            $table->string('issue_grossesse')->nullable();
            $table->longText('autreginecoobs')->nullable();
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
        Schema::dropIfExists('gineco_obstetriques');
    }
}
