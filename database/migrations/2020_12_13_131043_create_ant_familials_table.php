<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAntFamilialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ant_familials', function (Blueprint $table) {
            $table->id();
            $table->string('pere');
            $table->string('mere');
            $table->string('frere');
            $table->string('soeur');
            $table->string('enfantfille');
            $table->string('enfantgarcon');
            $table->string('conjoint');
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
        Schema::dropIfExists('ant_familials');
    }
}
