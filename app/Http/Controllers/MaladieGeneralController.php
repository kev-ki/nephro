<?php

namespace App\Http\Controllers;

use App\AntInfection;
use App\Consultation;
use App\Dossier;
use App\Maladiegeneral;
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

    public function liste_maladieG($id)
    {
        $donnees =  Maladiegeneral::where('id_consultation', $id)
            ->paginate(7);
        $consult = Consultation::where('id', $id)
            ->first();
        $lignes = count($donnees);

        if ($lignes) {
            return view('maladiegeneral.index', compact('donnees', 'consult'));
        } else{
            Session::flash('message', 'Données non existantes pour cette consultation!');
            Session::flash('alert-class', 'alert-danger');

            return back();
        }
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

        if ($request->datedecouverte < date('Y-m-d')) {
            $maladie= new Maladiegeneral();

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

            $consult = Consultation::where('id', Session::get('idconsultation'))->first();
            $maladie->id_consultation = $consult->id;

            if ($maladie->save())
            {
                Session::flash('message', 'Informations enregistrées.');
                Session::flash('alert-class', 'alert-success');
                return back();
            }
            else{
                Session::flash('message', 'Verifier tous les champs SVP!');
                Session::flash('alert-class', 'alert-danger');
                return back();
            }
        }else {
            Session::flash('message', 'Veuillez entrer une date valide SVP!');
            Session::flash('alert-class', 'alert-danger');
            return back();
        }
    }

    public function show($id)
    {
        $maladieG= Maladiegeneral::where('id', $id)
            ->first();
        $consult = Consultation::where('id', $maladieG->id_consultation)
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

    public function update(Request $request, $id)
    {
        $maladiegenerale = Maladiegeneral::find($id);
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
