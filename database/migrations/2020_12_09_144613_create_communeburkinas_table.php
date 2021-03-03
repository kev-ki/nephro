<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommuneburkinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('communeburkinas', function (Blueprint $table) {
            $table->string('commune');
            $table->string('code_postal');
            $table->string('departement');
            $table->string('INSEE')->primary();
            $table->string('code_region');
            $table->string('region');
            $table->string('province');
            $table->string('code_village');
            $table->string('village');
            $table->string('population');
            $table->string('y_utm');
            $table->string('x_utm');
            $table->string('lat_dd');
            $table->string('long_dd');
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
        Schema::dropIfExists('communeburkinas');
    }
}
