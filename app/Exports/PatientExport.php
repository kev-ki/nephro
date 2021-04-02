<?php

namespace App\Exports;

use App\Activitesocioprofessionnelle;
use App\AffectionIMM;
use App\AffTumoraleMaligne;
use App\AntInfection;
use App\AntUronephrologique;
use App\Consultation;
use App\Dossier;
use App\Maladiegeneral;
use App\Patient;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\withMapping;
use Maatwebsite\Excel\Events\AfterSheet;

class PatientExport implements
    ShouldAutoSize,
    WithMapping,
    WithHeadings,
    WithEvents,
    FromQuery
{
    use Exportable;

    private $fileName = "Infos_Patient.xlsx";

    public function headings(): array
    {
        return [
          'ID','Numero dossier', 'Nom', 'Prenom', 'Numero CNIB/Passport', 'Age', 'Sexe', 'Groupe Sanguin', 'Electrophorese HB', 'Profession', 'Culte', 'Telephone', 'Antécédents Médicaux', 'Autres Antécédents Médicaux', 'Antécédents Chirurgicaux',
            'Antécédents Gyneco-Obstetrique', 'Habitude alimentaire et Mode de vie', 'Antécédents Familiaux', 'Examen Clinique', 'Examen Paraclinique', 'Résumé', 'Conduite à tenir',
        ];
    }
    public function query()
    {
        return Patient::query();
    }


    public function map($patient): array {
        if ($patient->sexe == 1){
            $sexe = "Masculin";
        }else {
            $sexe = "Feminin";
        }

        $dossiers = Dossier::all();
        foreach ($dossiers as $value){
            if ($value->id_patient === $patient->idpatient)
            {
                $dossier =$value->numD;
            }
        }

        $professions = Activitesocioprofessionnelle::all();
        foreach ($professions as $work){
            if ($work->code == $patient->profession)
            {
                $profession =$work->libelle;
            }
        }

        $consultation = Consultation::all();
        //die($consultation);
        $medi = [];

        foreach ($consultation as $consult) {
            foreach (AntUronephrologique::all() as $value) {
                if ($consult->id == $value->id_consultation) {
                    $uro = "uronephrologique";
                    //$medi[] = $uro;
                }
            }
        }
        foreach ($consultation as $consult) {
            foreach (AntInfection::all() as $value) {
                if ($consult->id === $value->id_consultation) {
                    $infection = "infectieux";
                    //$medi[] = $infection;
                }
            }
        }
        foreach ($consultation as $consult) {
            foreach (Maladiegeneral::all() as $value) {
                if ($consult->id == $value->id_consultation) {
                    $maladieg = "maladie générale";
                    //$medi[] = $maladieg;
                }
            }
        }
        foreach ($consultation as $consult) {
            foreach (AffectionIMM::all() as $value) {
                if ($consult->id == $value->id_consultation) {
                    $imm = "affection immunologique";
                    //$medi[] = $imm;
                }
            }
        }
        foreach ($consultation as $consult) {
            foreach (AffTumoraleMaligne::all() as $value) {
                if ($consult->id == $value->id_consultation) {
                    $tumorale = "affection maligne tumorale";
                    //$medi[] = $tumorale;
                }
            }
        }








            /*if ($dossier == $consult->num_dossier){
                if ($consult->id_autre_ant_medical)
                {
                    $autre_medicaux ="Oui";
                }
//===========================================================================
                if ($consult->id_examgeneral)
                {
                    $general = "examen général";
                    $exam[] = $general;
                }

                if ($consult->id_examappareil) {
                    $appareil = "examen appareil";
                    $exam[] = $appareil;
                }
//===========================================================================
                if (!empty($consult->id_chirurgie))
                {
                    $chirurgie = "Oui";
                }
//===========================================================================
                if (!empty($consult->id_genicoobs))
                {
                    $gyneco = "Oui";
                }
//===========================================================================
                if ($consult->id_halimentaire)
                {
                    $habitude = "Oui";
                }
//===========================================================================
                if (!empty($consult->id_ant_famillial))
                {
                    $familial = "Oui";
                }
            }*/


        if (!empty($uro)){
            $medi[] = $uro;
        }
        if (!empty($infection)){
            $medi[] = $infection;
        }
        if (!empty($maladieg)){
            $medi[] = $maladieg;
        }
        if (!empty($imm)){
            $medi[] = $imm;
        }
        if (!empty($tumorale)){
            $medi[] = $tumorale;
        }
        /*if (!empty($uro)){
            $medi[] = $uro;
        }if (!empty($uro)){
            $medi[] = $uro;
        }if (!empty($uro)){
            $medi[] = $uro;
        }*/
        //dd($medi);
        if (empty($medi)) {
            $medicaux = "aucun antécédent";
        }else{
            $medicaux = implode(',', $medi);
        }
        if (empty($autre_medicaux)) {
            $autre_medicaux = "pas d'autres antécédents médicaux";
        }
        /*if (empty($examen)) {
            $examen = "aucun examen";
        }else{
            $examen = implode(',', $exam);
        }
        if (empty($chirurgie)){
            $chirurgie = "Non";
        }
        if (empty($gyneco)){
            $gyneco = "Non";
        }
        if (empty($habitude)){
            $habitude = "Non";
        }
        if (empty($familial)){
            $familial = "Non";
        }*/


        return [
            $patient->idpatient,
            $dossier,
            $patient->nom,
            $patient->prenom,
            $patient->num_doc_id,
            $patient->age,
            $sexe,
            $patient->rhesus,
            $patient->electrophoreseHB,
            $profession,
            $patient->culte,
            $patient->telephone1,
            $medicaux,
            $autre_medicaux,
           /* $chirurgie,
            $gyneco,
            $habitude,
            $familial,
            $examen,*/
        ];
    }

    public function registerEvents(): array
    {
        return [
          AfterSheet::class => function(AfterSheet $event) {
            /*$event->sheet->getStyle('')->applyFromArray([
               'font' => [
                 'bold' => true
               ],
            ]);*/
          }
        ];
    }


}
