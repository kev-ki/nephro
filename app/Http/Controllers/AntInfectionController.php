<?php

namespace App\Http\Controllers;

use App\AntInfection;
use App\Consultation;
use App\Dossier;
use App\ExamenGeneral;
use App\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AntInfectionController extends Controller
{
    public function index()
    {
        return view('antInfection.index');
    }

    public function liste_infection($id)
    {
        $donnees =  AntInfection::where('id_consultation', $id)
            ->paginate(7);
        $consult = Consultation::where('id', $id)
            ->first();

        $lignes = count($donnees);

        if ($lignes) {
            return view('antInfection.index', compact('donnees', 'consult'));
        } else{
            Session::flash('message', 'Données non existantes pour cette consultation!');
            Session::flash('alert-class', 'alert-danger');

            return back();
        }
    }

    public function create()
    {
        return view('antInfection.create');
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

        $antInfection= new AntInfection();
        $antInfection->nom_infection= $request->nom;
        $antInfection->traitement = $request->traitement;

        if ($request->nom === 'infectionfocale' || $request->nom === 'infectionurinaire') {
            $antInfection->type_infection = $request->type_infection;
            $antInfection->nombreepisode = $request->nombreepisode;
            $antInfection->date_last_episode = $request->datedernierepisode;

        }else {
            $antInfection->type_infection = Null;
            $antInfection->nombreepisode = Null;
            $antInfection->date_last_episode = Null;
        }

        if ($request->datedecouverte){
            if ($request->datedecouverte < date('Y-m-d')) {
                if ($request->nom === 'tuberculose') {
                    $antInfection->datedecouverte = $request->datedecouverte;
                    $antInfection->siege_infection = $request->siegeinfection;
                    $antInfection->duree_tuberculose = $request->duree;
                }else {
                    $antInfection->datedecouverte = Null;
                    $antInfection->siege_infection = Null;
                    $antInfection->duree_tuberculose = Null;
                }

                if ($request->nom === 'bilharziose') {
                    $antInfection->datedecouverte = $request->datedecouverte;
                    $antInfection->siege_infection = $request->siegeinfection;
                }else {
                    $antInfection->datedecouverte = Null;
                    $antInfection->siege_infection = Null;
                }

                if ($request->nom === 'infectionvirale') {
                    $antInfection->datedecouverte = $request->datedecouverte;
                    $antInfection->type_infection = $request->type_infection;
                    $antInfection->siege_infection = $request->siegeinfection;
                    $antInfection->nombreepisode = $request->nombreepisode;
                }else {
                    $antInfection->datedecouverte = Null;
                    $antInfection->type_infection = Null;
                    $antInfection->siege_infection = Null;
                    $antInfection->nombreepisode = Null;
                }
            }else {
                Session::flash('message', 'Veuillez entrer une date valide SVP!');
                Session::flash('alert-class', 'alert-danger');
                return back();
            }
        }
        
        if ($request->nom === 'paludisme') {
            $antInfection->nb_acces_par_an = $request->nombreacces;
        }else {
            $antInfection->nb_acces_par_an = Null;
        }

        $consult = Consultation::where('id', Session::get('idconsultation'))->first();
        $antInfection->id_consultation = $consult->id;

        if ($antInfection->save())
        {
            Session::flash('message', 'Informations Infections enregistrées.');
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
        $infection= AntInfection::where('id', $id)
            ->first();
        $consult = Consultation::where('id', $infection->id_consultation)
        ->first();
        $doc = Dossier::select('id_patient')
            ->where('numD', $consult->num_dossier)
            ->first();
        $patient = Patient::where('idpatient', $doc->id_patient)
            ->first();

        if ($infection){
            return view('antInfection.show', compact('consult', 'infection', 'patient'));
        }else {
           return back();
        }
    }

    public function edit(AntInfection $antInfection)
    {
        return view('antInfection.edit',['antInfection'=>$antInfection]);
    }

    public function update(Request $request, AntInfection $antInfection)
    {
        if ($antInfection->update())
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

    public function destroy(AntInfection $antInfection)
    {
        $antInfection->delete();
        return back();
    }
}
