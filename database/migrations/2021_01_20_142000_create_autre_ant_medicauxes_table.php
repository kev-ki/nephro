<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutreAntMedicauxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autre_ant_medicauxes', function (Blueprint $table) {
            $table->id();
            $table->string('nom_antecedent');
            $table->string('type_antecedent')->nullable();
            $table->string('date_decouverte');
            $table->string('traitement')->nullable();
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
        Schema::dropIfExists('autre_ant_medicauxes');
    }
}
