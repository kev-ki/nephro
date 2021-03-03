<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarqueurTumoralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marqueur_tumorals', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('afproteine');
            $table->string('ldh');
            $table->string('ace');
            $table->string('psa');
            $table->string('ca');
            $table->string('calcitonine');
            $table->string('autre1')->nullable();
            $table->string('autre2')->nullable();
            $table->string('autre3')->nullable();
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
        Schema::dropIfExists('marqueur_tumorals');
    }
}
