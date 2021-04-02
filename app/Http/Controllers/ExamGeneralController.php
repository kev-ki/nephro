<?php

namespace App\Http\Controllers;

use App\Constante;
use App\Consultation;
use App\Dossier;
use App\ExamenGeneral;
use App\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ExamGeneralController extends Controller
{
    public function index()
    {
        return view('examenGeneral.index');
    }

    public function liste_general($id)
    {
        $donnees =  ExamenGeneral::where('id_consultation', $id)
            ->get();
        $consult = Consultation::where('id', $id)
            ->first();
        $lignes = count($donnees);

        if ($lignes) {
            return view('examenGeneral.index', compact('donnees', 'consult'));
        } else{
            Session::flash('message', 'Données non existantes pour cette consultation!');
            Session::flash('alert-class', 'alert-danger');

            return back();
        }
    }

    public function create()
    {
        $consult = Consultation::where('id', Session::get('idconsultation'))->first();
        $dossier = Dossier::where('numD', $consult->num_dossier)->first();
        $constante = Constante::where('idpatient', $dossier->id_patient)->orderBy('dateprise', 'desc')->first();
        return view('examenGeneral.create', compact('constante'));
    }

    public function store(Request $request)
    {
        $validation =Validator::make($request->all(), [
            'taille' => ['required'],
            'poids' => ['required'],
            'temperature' => ['required'],
            'sc' => ['required'],
            'pouls' => ['required'],
            'ta' => ['required'],
            'etatgeneral' => ['required'],
            'etat_langue' => ['required'],
        ]);
        if ($validation->fails()) {
            Session::flash('message', 'Vérifier que tous les champs ont été renseignés SVP!');
            Session::flash('alert-class', 'alert-danger');
            return back();
        }

        $examenGeneral= new ExamenGeneral();
        $examenGeneral->date= date('Y-m-d');
        $examenGeneral->taille=$request->taille;
        $examenGeneral->poids=$request->poids;
        $examenGeneral->sc=$request->sc;
        $examenGeneral->temperature=$request->temperature;
        $examenGeneral->pouls=$request->pouls;
        $examenGeneral->ta=$request->ta;
        $examenGeneral->etatgeneral= implode(',', $request->etatgeneral);
        $examenGeneral->poidsperdu=$request->pertepoid;
        $examenGeneral->duree_amaigrissement=$request->duree_amaigrissement;

        $consult = Consultation::where('id', Session::get('idconsultation'))->first();
        $examenGeneral->id_consultation = $consult->id;

        $examenGeneral->conjonctive= implode(',', $request->conjonctive);
        $examenGeneral->etat_langue= implode(',', $request->etat_langue);
        $examenGeneral->oeudeme= implode(',', $request->oeudeme);
        $examenGeneral->siegeoeudeme= implode(',', $request->siege);
        $examenGeneral->deshydratation=$request->deshydratation;

        if ($request->etat_langue === 'autre') {
            $examenGeneral->autre_lesion_langue=$request->lesion_langue;
        }else {
            $examenGeneral->autre_lesion_langue=NUll;
        }

        if ($examenGeneral->save())
        {
            Session::flash('message', 'informations enregistrées.');
            Session::flash('alert-class', 'alert-success');
            return back();
        }
        else{
            Session::flash('message', 'Verifier tous les champs SVP!');
            Session::flash('alert-class', 'alert-danger');
            return back();
        }

    }

    public function show($id)
    {
        $general= ExamenGeneral::where('id', $id)
            ->first();
        $consult = Consultation::where('id', $general->id_consultation)
        ->first();
        $doc = Dossier::select('id_patient')
            ->where('numD', $consult->num_dossier)
            ->first();
        $patient = Patient::where('idpatient', $doc->id_patient)
            ->first();

        if ($general){
            return view('examenGeneral.show',compact('patient','general', 'consult'));
        }else {
            return back();
        }
    }

    public function edit(ExamenGeneral $examenGeneral)
    {
        return view('examenGeneral.edit',['examenGeneral'=>$examenGeneral]);
    }

    public function update(Request $request, ExamenGeneral $examenGeneral)
    {
        /*$examenGeneral->taille=$request->taille;
        $examenGeneral->poids=$request->poids;
        $examenGeneral->sogeneral=$request->sogeneral;
        $examenGeneral->temperature=$request->temperature;
        $examenGeneral->pouls=$request->pouls;
        $examenGeneral->TA=$request->TA;
        $examenGeneral->etatgeneral=$request->etatgeneral;
        $examenGeneral->amaigrissement=$request->amaigrissement;
        $examenGeneral->poidsperdu=$request->poidsperdu;
        $examenGeneral->dureamaigrissement=$request->dureamaigrissement;
        $examenGeneral->conjonctive=$request->conjonctive;
        $examenGeneral->etatlangue=$request->etatlangue;
        $examenGeneral->oedeme=$request->oedeme;
        $examenGeneral->oedemesiege=$request->oedemesiege;
        $examenGeneral->nivaudeshydration=$request->nivaudeshydration;
        $examenGeneral->consultaionid=$request->consultaionid;*/

        if ($examenGeneral->update())
        {
            Session::flash('message', 'Modifications effectuées.');
            Session::flash('alert-class', 'alert-success');
            return back();
        }
        else{
            Session::flash('message', 'Verifier tous les champs SVP!');
            Session::flash('alert-class', 'alert-danger');
            return back();
        }

    }

    public function destroy(ExamenGeneral $examenGeneral)
    {
        $examenGeneral->delete();
        return back();
    }
}
