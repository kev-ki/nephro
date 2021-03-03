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

        if ($affectiontumorale->save())
        {
            $consult = Consultation::where('id', Session::get('idconsultation'))->first();
            $consult->id_affectiontumorale = $affectiontumorale->id;
            $consult->update();
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
        $consult = Consultation::where('id', $id)
            ->first();
        //die($consult);
        $tumorale= AffTumoraleMaligne::where('id', $consult->id_affectiontumorale)
            ->first();
        $doc = Dossier::select('id_patient')
            ->where('numD', $consult->num_dossier)
            ->first();
        $patient = Patient::where('idpatient', $doc->id_patient)
            ->first();

        if ($tumorale){
            return view('affectiontum.show', compact('consult', 'tumorale', 'patient'));
        }else {
            Session::flash('message', 'données non existantes pour cette consultation!');
            Session::flash('alert-class', 'alert-danger');

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
