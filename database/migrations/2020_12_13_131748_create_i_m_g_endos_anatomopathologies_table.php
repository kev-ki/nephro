<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIMGEndosAnatomopathologiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('i_m_g_endos_anatomopathologies', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('type');
            $table->string('nature');
            $table->string('nom_explorateur');
            $table->string('etablissement_explorateur');
            $table->string('commentaire');
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
        Schema::dropIfExists('i_m_g_endos_anatomopathologies');
    }
}
