<?php

namespace App\Http\Controllers;

use App\AntUronephrologique;
use App\Consultation;
use App\Dossier;
use App\ExamenAppareil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ExamAppareilController extends Controller
{
    public function index()
    {
        return view('examenappareil.index');
    }

    public function create()
    {
        return view('examenappareil.create');
    }

    public function store(Request $request)
    {
        $validation =Validator::make($request->all(), [
            'dateexamen' => ['required', 'date'],
            'nomexamen' => ['required'],
            'infoexamen' => ['required'],
        ]);
        if ($validation->fails()) {
            return redirect()->Back()->withInput()->withErrors($validation);
        }

        $examenAppareil= new ExamenAppareil();
        $examenAppareil->nom_examen=$request->nomexamen;
        $examenAppareil->details=$request->infoexamen;
        $examenAppareil->date_examen=$request->dateexamen;

        if ($request->nom_examen === 'autre') {
            $examenAppareil->nom_autre = $request->nom_autre;
        }else {
            $examenAppareil->nom_autre = Null;
        }

        if ($examenAppareil->save())
        {
            $consult = Consultation::where('id', Session::get('idconsultation'))->first();
            $consult->id_examappareil = $examenAppareil->id;
            $consult->update();
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
        $appareil= ExamenAppareil::where('id', $consult->id_examappareil)
            ->first();
        $doc = Dossier::select('id_patient')
            ->where('numD', $consult->num_dossier)
            ->first();
        $patient = \App\Patient::where('idpatient', $doc->id_patient)
            ->first();

        if ($appareil){
            return view('examenappareil.show',compact('appareil', 'patient', 'consult'));
        }else {
            Session::flash('message', 'données non existantes pour cette consultation!');
            Session::flash('alert-class', 'alert-danger');

            return back();
        }
    }

    public function edit(ExamenAppareil $examenAppareil)
    {
        return view('examenappareil.edit',['examenAppareil'=>$examenAppareil]);
    }

    public function update(Request $request, ExamenAppareil $examenAppareil)
    {
        $validation =Validator::make($request->all(), [
            'dateexamen' => ['required', 'date'],
            'nomexamen' => ['required'],
            'infoexamen' => ['required'],
        ]);
        if ($validation->fails()) {
            return redirect()->Back()->withInput()->withErrors($validation);
        }

        /*$examenAppareil= new ExamenAppareil();
        $examenAppareil->nom_examen=$request->nomexamen;
        $examenAppareil->details=$request->infoexamen;
        $examenAppareil->date_examen=$request->dateexamen;

        if ($request->nom_examen === 'autre') {
            $examenAppareil->nom_autre = $request->nom_autre;
        }else {
            $examenAppareil->nom_autre = Null;
        }*/

        if ($examenAppareil->update())
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

    public function destroy(ExamenAppareil $examenAppareil)
    {
        $examenAppareil->delete();
        return back();
    }
}
