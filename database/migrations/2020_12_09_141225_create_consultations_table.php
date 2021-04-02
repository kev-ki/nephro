<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->string('num_dossier')->index();
            $table->string('numQ');
            $table->unsignedBigInteger('id_evolution')->index()->nullable();
            /*$table->unsignedBigInteger('id_examgeneral')->index()->nullable();
            $table->unsignedBigInteger('id_examappareil')->index()->nullable();
            $table->unsignedBigInteger('id_bilansanguin')->index()->nullable();
            $table->unsignedBigInteger('id_electrophorese')->index()->nullable();
            $table->unsignedBigInteger('id_bioselle')->index()->nullable();
            $table->unsignedBigInteger('id_autreresultat')->index()->nullable();
            $table->unsignedBigInteger('id_bilanurinaire')->index()->nullable();
            $table->unsignedBigInteger('id_marqueurtumoral')->index()->nullable();
            $table->unsignedBigInteger('id_hemostase')->index()->nullable();
            $table->unsignedBigInteger('id_parasitologie')->index()->nullable();
            $table->unsignedBigInteger('id_serologie')->index()->nullable();
            $table->unsignedBigInteger('id_traitement')->index()->nullable();
            $table->unsignedBigInteger('id_infection')->index()->nullable();
            $table->unsignedBigInteger('id_chirurgie')->index()->nullable();
            $table->unsignedBigInteger('id_genicoobs')->index()->nullable();
            $table->unsignedBigInteger('id_uronephro')->index()->nullable();
            $table->unsignedBigInteger('id_halimentaire')->index()->nullable();
            $table->unsignedBigInteger('id_affectionimm')->index()->nullable();
            $table->unsignedBigInteger('id_affectiontumorale')->index()->nullable();
            $table->unsignedBigInteger('id_maladiegenerale')->index()->nullable();
            $table->unsignedBigInteger('id_endocrinologie')->index()->nullable();
            $table->unsignedBigInteger('id_img_endos_anatomo')->index()->nullable();
            $table->unsignedBigInteger('id_autre_ant_medicauxes')->index()->nullable();
            $table->unsignedBigInteger('id_ant_famillial')->index()->nullable();*/

            $table->longText('histoiremaladie');
            $table->longText('adresserpar')->nullable();
            $table->longText('resume')->nullable();
            $table->longText('conduite')->nullable();
            $table->string('bilan_admission')->nullable();
            $table->string('motif_admission')->nullable();
            $table->string('diagnostic_principal')->nullable();
            $table->string('diagnostic_associe')->nullable();
            $table->timestamps();

            $table->foreign('id_evolution')->references('id')->on('evolutions');
            /*$table->foreign('id_bilansanguin')->references('id')->on('bilan_sanguins');
            $table->foreign('id_examappareil')->references('id')->on('examen_appareils');
            $table->foreign('id_examgeneral')->references('id')->on('examen_generals');
            $table->foreign('id_infection')->references('id')->on('ant_infections');
            $table->foreign('id_traitement')->references('id')->on('traitements');
            $table->foreign('id_serologie')->references('id')->on('serologies');
            $table->foreign('id_parasitologie')->references('id')->on('parasitologies');
            $table->foreign('id_hemostase')->references('id')->on('hemostases');
            $table->foreign('id_marqueurtumoral')->references('id')->on('marqueur_tumorals');
            $table->foreign('id_bilanurinaire')->references('id')->on('bilan_urinaires');
            $table->foreign('id_autreresultat')->references('id')->on('autre_resultats');
            $table->foreign('id_bioselle')->references('id')->on('liquide_bio_selles');
            $table->foreign('num_dossier')->references('numD')->on('dossiers');
            $table->foreign('id_img_endos_anatomo')->references('id')->on('i_m_g_endos_anatomopathologies');
            $table->foreign('id_endocrinologie')->references('id')->on('endocrinologies');
            $table->foreign('id_maladiegenerale')->references('id')->on('malagiegenerals');
            $table->foreign('id_affectionimm')->references('id')->on('affection_i_m_m_s');
            $table->foreign('id_affectiontumorale')->references('id')->on('aff_tumorale_malignes');
            $table->foreign('id_halimentaire')->references('id')->on('habitude_alimentaires');
            $table->foreign('id_uronephro')->references('id')->on('ant_uronephrologiques');
            $table->foreign('id_genicoobs')->references('id')->on('gineco_obstetriques');
            $table->foreign('id_chirurgie')->references('id')->on('ant_chirurgicals');
            $table->foreign('id_autre_ant_medical')->references('id')->on('autre_ant_medicauxes');
            $table->foreign('id_ant_famillial')->references('id')->on('ant_familials');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consultations');
    }
}
