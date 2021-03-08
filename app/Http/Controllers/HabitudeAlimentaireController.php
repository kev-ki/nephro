<?php

namespace App\Http\Controllers;

use App\Consultation;
use App\Dossier;
use App\HabitudeAlimentaire;
use App\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class HabitudeAlimentaireController extends Controller
{
    public function index()
    {
        return view('habitudealimentaire.index');
    }

    public function liste_habitude($id)
    {
        $donnees =  HabitudeAlimentaire::where('id_consultation', $id)
            ->paginate(7);

        return view('habitudealimentaire.index', compact('donnees'));
    }

    public function create()
    {
        return view('habitudealimentaire.create');
    }

    public function store(Request $request)
    {
        $validation =Validator::make($request->all(), [
            'aliment' => ['required'],
            'type' => ['required'],
            'quantite' => ['required'],
            'frequence' => ['required'],
            'datedebut' => ['required'],
            'duree' => ['required'],
        ]);
        if ($validation->fails()) {
            return redirect()->Back()->withInput()->withErrors($validation);
        }

        $habitudeHalimentaire=new HabitudeAlimentaire();
        $habitudeHalimentaire->aliment=$request->aliment;
        $habitudeHalimentaire->type=$request->type;
        $habitudeHalimentaire->quantite=$request->quantite;
        $habitudeHalimentaire->mode_consommation=$request->frequence;
        $habitudeHalimentaire->date_debut=$request->datedebut;
        $habitudeHalimentaire->duree=$request->duree;

        $habitudeHalimentaire->medication_traditionnel = $request->traditionnelle;
        $habitudeHalimentaire->mode_administration = $request->mode_administration;
        $habitudeHalimentaire->medication_moderne = $request->moderne;
        $habitudeHalimentaire->produits = $request->produits;

        $consult = Consultation::where('id', Session::get('idconsultation'))->first();
        $habitudeHalimentaire->id_consultation = $consult;

        if ($habitudeHalimentaire->save())
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
        $consult = Consultation::where('id', $id)
            ->first();
        //die($consult);
        $habitude= HabitudeAlimentaire::where('id', $consult->id_halimentaire)
            ->first();
        $doc = Dossier::select('id_patient')
            ->where('numD', $consult->num_dossier)
            ->first();
        $patient = Patient::where('idpatient', $doc->id_patient)
            ->first();

        if ($habitude){
            return view('habitudealimentaire.show', compact('consult', 'habitude', 'patient'));
        }else {
            Session::flash('message', 'données non existantes pour cette consultation!');
            Session::flash('alert-class', 'alert-danger');

            return back();
        }
    }

    public function edit(HabitudeAlimentaire $habitudeHalimentaire)
    {
        return view('habitudealimentaire.edit',['habitudealimentaire'=>$habitudeHalimentaire]);
    }

    public function update(Request $request, HabitudeAlimentaire $habitudeHalimentaire)
    {
        $habitudeHalimentaire->typealiment=$request->typealiment;
        $habitudeHalimentaire->quantite=$request->quantite;
        $habitudeHalimentaire->datedebut=$request->datedebut;
        $habitudeHalimentaire->dure=$request->dure;
        $habitudeHalimentaire->modeconsommation=$request->modeconsommation;
        if ($habitudeHalimentaire->save())
        {
            Session::flash('message', 'Modifications effectuées.');
            Session::flash('alert-class', 'alert-danger');
            return back();
        }
        else{
            Session::flash('message', 'Verifier tous les champs SVP!');
            Session::flash('alert-class', 'alert-danger');
            return back();
        }
    }

    public function destroy(HabitudeAlimentaire $habitudeHalimentaire)
    {
        $habitudeHalimentaire->delete();
        return back();
    }
}
