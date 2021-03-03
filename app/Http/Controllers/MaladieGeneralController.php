<?php

namespace App\Http\Controllers;

use App\AntInfection;
use App\Consultation;
use App\Dossier;
use App\MaladieGenerale;
use App\Malagiegeneral;
use App\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class MaladieGeneralController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        return view('maladiegeneral.create');
    }

    public function store(Request $request)
    {
        $validation =Validator::make($request->all(), [
            'nom' => ['required'],
            'traitement' => ['required'],
        ]);

        if ($validation->fails()) {
            return redirect()->Back()->withInput()->withErrors($validation);
        }

        $maladie= new Malagiegeneral();

        $maladie->nom= $request->nom;
        $maladie->traitement= $request->traitement;
        $maladie->date_decouverte= $request->datedecouverte;

        if ($request->nom === 'drepanocytose') {
            $maladie->type_hemoglobine = $request->hemoglobine;
            $maladie->date_decouverte = Null;
        }else {
            $maladie->type_hemoglobine = Null;
        }

        if ($request->nom === 'hypertension_arterielle') {
            $maladie->frequence_traitement = $request->frequence;
        }else {
            $maladie->frequence_traitement = Null;
        }

        if ($request->nom === 'diabete') {
            $maladie->type_diabete = $request->typediabete;
        }else {
            $maladie->type_diabete = Null;
        }

        if ($maladie->save())
        {
            $consult = Consultation::where('id', Session::get('idconsultation'))->first();
            $consult->id_maladiegenerale = $maladie->id;
            $consult->update();
            Session::flash('message', 'Informations enregistrées.');
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
        $consult = Consultation::where('id', $id)
            ->first();
        //die($consult);
        $maladieG= Malagiegeneral::where('id', $consult->id_maladiegenerale)
            ->first();
        $doc = Dossier::select('id_patient')
            ->where('numD', $consult->num_dossier)
            ->first();
        $patient = Patient::where('idpatient', $doc->id_patient)
            ->first();

        if ($maladieG){
            return view('maladiegeneral.show', compact('consult', 'maladieG', 'patient'));
        }else {
            Session::flash('message', 'données non existantes pour cette consultation!');
            Session::flash('alert-class', 'alert-danger');

            return back();
        }
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, Malagiegeneral $maladiegenerale)
    {
        if ($maladiegenerale->update())
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

    public function destroy($id)
    {
        //
    }
}
