<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHabitudeAlimentairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('habitude_alimentaires', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->nullable();
            $table->string('type')->nullable();
            $table->string('quantite')->nullable();
            $table->date('datedebut')->nullable();
            $table->integer('duree')->nullable();
            $table->string('modeconsommation')->nullable();
            $table->string('type_auto_medication')->nullable();
            $table->string('precision_traditionnelle')->nullable();
            $table->string('precision_moderne')->nullable();
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
        Schema::dropIfExists('habitude_alimentaires');
    }
}
