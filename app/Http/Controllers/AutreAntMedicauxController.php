<?php

namespace App\Http\Controllers;

use App\AffTumoraleMaligne;
use App\AutreAntMedicaux;
use App\Consultation;
use App\Dossier;
use App\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AutreAntMedicauxController extends Controller
{
    public function index()
    {
        //
    }

    public function liste_AutreMed($id)
    {
        $donnees =  AutreAntMedicaux::where('id_consultation', $id)
            ->paginate(7);
        $consult = Consultation::where('id', $id)
            ->first();
        if (!empty($donnees)) {
            return view('autreantmedical.index', compact('donnees', 'consult'));
        } else{
            Session::flash('message', 'Données non existantes pour cette consultation!');
            Session::flash('alert-class', 'alert-danger');

            return back();
        }
    }

    public function create()
    {
        return view('autreantmedical.create');
    }

    public function store(Request $request)
    {
        $validation =Validator::make($request->all(), [
            'nom' => ['required'],
            'traitement' => ['required', 'string'],
            'datedecouverte' => ['required', 'date'],
        ]);
        if ($validation->fails()) {
            return redirect()->Back()->withInput()->withErrors($validation);
        }

        $autre=new AutreAntMedicaux();
        $autre->type_antecedent= $request->type;
        $autre->nom_antecedent=$request->nom;
        $autre->date_decouverte=$request->datedecouverte;
        $autre->traitement=$request->traitement;

        $consult = Consultation::where('id', Session::get('idconsultation'))->first();
        $autre->id_consultation = $consult;

        if ($autre->save())
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

    public function update()
    {
        //
    }

    public function show($id)
    {
        $autremedical= AutreAntMedicaux::where('id', $id)
            ->first();
        $consult = Consultation::where('id', $autremedical->id_consultation)
            ->first();
        $doc = Dossier::select('id_patient')
            ->where('numD', $consult->num_dossier)
            ->first();
        $patient = Patient::where('idpatient', $doc->id_patient)
            ->first();

        if ($autremedical){
            return view('autreantmedical.show', compact('consult', 'autremedical', 'patient'));
        }else {
            return back();
        }
    }
}
