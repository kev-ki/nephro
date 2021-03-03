<?php

namespace App\Exports;

use App\Activitesocioprofessionnelle;
use App\Consultation;
use App\Dossier;
use App\Patient;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
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
        $medicaux = '';
        $autre_medicaux = ''; $examen = '';
        //die($consultation);
        foreach ($consultation as $consult){
            if ($dossier == $consult->num_dossier){
                if (!empty($consult->id_uronephro))
                {
                    $uro = "uronephrologique";
                    if (!empty($medicaux)){
                        $medicaux = $medicaux.', '.$uro;
                    }else{
                        $medicaux = $uro;
                    }
                }
                //die($uro);
                if ($consult->id_infection)
                {
                    $infection = "infectieux";
                    if (!empty($medicaux)){
                        $medicaux = $medicaux.', '.$infection;
                    }else{
                        $medicaux = $infection;
                    }
                }
                if ($consult->id_maladiegenerale)
                {
                    $maladieg = "maladie générale";
                    if (!empty($medicaux)){
                        $medicaux = $medicaux.', '.$maladieg;
                    }else{
                        $medicaux = $maladieg;
                    }
                }
                if ($consult->id_affectionimm)
                {
                    $imm = "affection immunologique";
                    if (!empty($medicaux)){
                        $medicaux = $medicaux.', '.$imm;
                    }else{
                        $medicaux = $imm;
                    }
                }
                if ($consult->id_affectiontumorale)
                {
                    $tumorale = "affection maligne tumorale";
                    if (!empty($medicaux)){
                        $medicaux = $medicaux.', '.$tumorale;
                    }else{
                        $medicaux = $tumorale;
                    }
                }
                if ($consult->id_autre_ant_medical)
                {
                    $autre_medicaux =$autre_medicaux."Oui";
                }
//===========================================================================
                if ($consult->id_examgeneral)
                {
                    $general = "examen général";
                    if (!empty($examen)){
                        $examen = $examen.', '.$general;
                    }else{
                        $examen = $general;
                    }
                }

                if ($consult->id_examappareil) {
                    $appareil = "examen appareil";
                    if (!empty($examen)){
                        $examen = $examen.', '.$appareil;
                    }else{
                        $examen = $appareil;
                    }
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
            }
        }

        if (empty($medicaux)) {
            $medicaux = "aucun antécédent";
        }
        if (empty($autre_medicaux)) {
            $autre_medicaux = "pas d'autres antécédents médicaux";
        }
        if (empty($examen)) {
            $examen = "aucun examen";
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
        }


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
            $chirurgie,
            $gyneco,
            $habitude,
            $familial,
            $examen,
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
