<?php

namespace App\Http\Controllers;

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

    public function liste_appareil($id)
    {
        $donnees =  ExamenAppareil::where('id_consultation', $id)
            ->get();
        $consult = Consultation::where('id', $id)
            ->first();
        $lignes = count($donnees);

        if ($lignes) {
            return view('examenappareil.index', compact('donnees', 'consult'));
        } else{
            Session::flash('message', 'Données non existantes pour cette consultation!');
            Session::flash('alert-class', 'alert-danger');

            return back();
        }
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
            Session::flash('message', 'Vérifier que tous les champs ont été renseignés SVP!');
            Session::flash('alert-class', 'alert-danger');
            return back();
        }

        if ($request->dateexamen <= date('Y-m-d')) {
            $examenAppareil= new ExamenAppareil();
            $examenAppareil->nom_examen=$request->nomexamen;
            $examenAppareil->details=$request->infoexamen;
            $examenAppareil->date_examen=$request->dateexamen;

            if ($request->nom_examen === 'autre') {
                $examenAppareil->nom_autre = $request->nom_autre;
            }else {
                $examenAppareil->nom_autre = Null;
            }

            $consult = Consultation::where('id', Session::get('idconsultation'))->first();
            $examenAppareil->id_consultation = $consult->id;

            if ($examenAppareil->save())
            {
                Session::flash('message', 'informations enregistrées.');
                Session::flash('alert-class', 'alert-success');
                return back();
            }
            else{
                Session::flash('message', 'Verifier que tous les champs ont été renseignés SVP!');
                Session::flash('alert-class', 'alert-danger');
                return back();
            }
        }else {
            Session::flash('message', 'Date examen invalide!');
            Session::flash('alert-class', 'alert-danger');
            return back();
        }
    }

    public function show($id)
    {
        $appareil= ExamenAppareil::where('id', $id)
            ->first();
        $consult = Consultation::where('id', $appareil->id_consultation)
        ->first();
        $doc = Dossier::select('id_patient')
            ->where('numD', $consult->num_dossier)
            ->first();
        $patient = Patient::where('idpatient', $doc->id_patient)
            ->first();

        if ($appareil){
            return view('examenappareil.show',compact('appareil', 'patient', 'consult'));
        }else {
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
