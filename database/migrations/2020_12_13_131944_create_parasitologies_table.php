<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParasitologiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parasitologies', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('goutteepaisse');
            $table->string('selle');
            $table->string('bmr');
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
        Schema::dropIfExists('parasitologies');
    }
}
