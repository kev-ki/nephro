<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHemostasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hemostases', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('tp');
            $table->string('tca');
            $table->string('inr');
            $table->string('tck');
            $table->string('dimere');
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
        Schema::dropIfExists('hemostases');
    }
}
