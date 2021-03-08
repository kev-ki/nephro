<?php

namespace App\Http\Controllers;

use App\Consultation;
use App\Dossier;
use App\MarqueurTumoral;
use App\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class MarqueurTumoralController extends Controller
{
    public function index()
    {
        return view('marqueurTumoral.index');
    }

    public function liste_marqueur($id)
    {
        $donnees =  MarqueurTumoral::where('id_consultation', $id)
            ->paginate(7);

        return view('marqueurTumoral.index', compact('donnees'));
    }

    public function create()
    {
        return view('marqueurTumoral.create');
    }

    public function store(Request $request)
    {
        $validation =Validator::make($request->all(), [
            'date' => ['required', 'date'],
        ]);
        if ($validation->fails()) {
            return redirect()->Back()->withInput()->withErrors($validation);
        }

        $marqueurTumoral=new MarqueurTumoral();

        $marqueurTumoral->date=$request->date;
        $marqueurTumoral->afproteine=$request->proteine;
        $marqueurTumoral->ldh=$request->ldh;
        $marqueurTumoral->ace=$request->ace;
        $marqueurTumoral->psa=$request->psa;
        $marqueurTumoral->ca=$request->ca;
        $marqueurTumoral->calcitonine=$request->calcitonine;

        $marqueurTumoral->nom_autre=$request->nom_autre;
        $marqueurTumoral->resultat=$request->resultat;
        $marqueurTumoral->nom_autre1=$request->nom_autre1;
        $marqueurTumoral->resultat1=$request->resultat1;

        $consult = Consultation::where('id', Session::get('idconsultation'))->first();
        $marqueurTumoral->id_consultation = $consult;

        if ($marqueurTumoral->save())
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
        $tumoral= MarqueurTumoral::where('id', $consult->id_marqueurtumoral)
            ->first();
        $doc = Dossier::select('id_patient')
            ->where('numD', $consult->num_dossier)
            ->first();
        $patient = Patient::where('idpatient', $doc->id_patient)
            ->first();

        if ($tumoral){
            return view('marqueurTumoral.show', compact('consult', 'tumoral', 'patient'));
        }else {
            Session::flash('message', 'données non existantes pour cette consultation!');
            Session::flash('alert-class', 'alert-danger');

            return back();
        }
    }

    public function edit(MarqueurTumoral $marqueurTumoral)
    {

        return view('marqueurTumoral.edit',['marqueurTumoral'=>$marqueurTumoral]);


    }

    public function update(Request $request, MarqueurTumoral $marqueurTumoral)
    {
        $validation =Validator::make($request->all(), [
            'date' => ['required', 'date'],
        ]);
        if ($validation->fails()) {
            return redirect()->Back()->withInput()->withErrors($validation);
        }

        /*$marqueurTumoral->date=$request->date;
        $marqueurTumoral->proteine=$request->proteine;
        $marqueurTumoral->idh=$request->idh;
        $marqueurTumoral->ace=$request->ace;
        $marqueurTumoral->psa=$request->psa;
        $marqueurTumoral->ca=$request->ca;
        $marqueurTumoral->calcitonine=$request->calcitonine;
        $marqueurTumoral->autre1=$request->autre1;
        $marqueurTumoral->autre2=$request->autre2;
        $marqueurTumoral->autre3=$request->autre3;
        $marqueurTumoral->consultationid=$request->consultationid;*/

        if ($marqueurTumoral->update())
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

    public function destroy(MarqueurTumoral $marqueurTumoral)
    {
        $marqueurTumoral->delete();
        return back();
    }
}
