<?php

namespace App\Http\Controllers;

use App\AffectionIMM;
use App\AffTumoraleMaligne;
use App\Consultation;
use App\Dossier;
use App\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AffTumoraleMaligneController extends Controller
{
    public function index()
    {
        return view('affectiontum.index');
    }

    public function liste_TMaligne($id)
    {
        $donnees = AffTumoraleMaligne::where('id_consultation', $id)
            ->paginate(7);
        $consult = Consultation::where('id', $id)->first();

        if (!empty($donnees)) {
            return view('affectiontum.index', compact('donnees', 'consult'));
        } else{
            Session::flash('message', 'Données non existantes pour cette consultation!');
            Session::flash('alert-class', 'alert-danger');

            return back();
        }
    }

    public function create()
    {
        return view('affectiontum.create');
    }

    public function store(Request $request)
    {
        $validation =Validator::make($request->all(), [
            'traitement' => ['required', 'string'],
            'datedecouverte' => ['required', 'date'],
            'type' => ['required', 'string'],
        ]);
        if ($validation->fails()) {
            return redirect()->Back()->withInput()->withErrors($validation);
        }

        $affectiontumorale=new AffTumoraleMaligne();
        $affectiontumorale->type_affection= $request->type;
        $affectiontumorale->traitement=$request->traitement;
        $affectiontumorale->date_decouverte=$request->datedecouverte;

        $consult = Consultation::where('id', Session::get('idconsultation'))->first();
        $affectiontumorale->id_consultation = $consult;

        if ($affectiontumorale->save())
        {
            Session::flash('message', 'informations Affections tumorales malignes enregistrées.');
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
        $tumorale= AffTumoraleMaligne::where('id', $id)
            ->first();
        $consult = Consultation::where('id', $tumorale->id_consultation)
        ->first();
        $doc = Dossier::select('id_patient')
            ->where('numD', $consult->num_dossier)
            ->first();
        $patient = Patient::where('idpatient', $doc->id_patient)
            ->first();

        if ($tumorale){
            return view('affectiontum.show', compact('consult', 'tumorale', 'patient'));
        }else {
            return back();
        }
    }

    public function edit(AffTumoraleMaligne $affectionTum)
    {
        return view('affectiontum.edit',['affectionTum'=>$affectionTum]);
    }

    public function update(Request $request, AffTumoraleMaligne $affectionTum)
    {
        //
    }

    public function destroy(AffTumoraleMaligne $affectionTum)
    {
        //
    }
}
