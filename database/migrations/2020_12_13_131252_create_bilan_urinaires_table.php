<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBilanUrinairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bilan_urinaires', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('proteinurie');
            $table->string('volume');
            $table->string('leucyte');
            $table->string('hematie');
            $table->string('creatinurie');
            $table->string('ureecrati');
            $table->string('albuminecrati');
            $table->string('uraturie');
            $table->string('natriurese');
            $table->string('kaliurrse');
            $table->string('caliciturie');
            $table->string('phosphaturie');
            $table->string('cristallurie');
            $table->string('autreburinaire1');
            $table->string('autreburinaire2');
            $table->string('autreburinaire3');
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
        Schema::dropIfExists('bilan_urinaires');
    }
}
