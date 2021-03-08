<?php

namespace App\Http\Controllers;

use App\Consultation;
use App\Dossier;
use App\Electrophorese;
use App\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ElectrophoreseController extends Controller
{
    public function index()
    {
        return view('electrophorese.index');
    }

    public function liste_electro($id)
    {
        $donnees =  Electrophorese::where('id_consultation', $id)
            ->paginate(7);

        return view('electrophorese.index', compact('donnees'));
    }

    public function create()
    {
        return view('electrophorese.create');
    }

    public function store(Request $request)
    {
        $validation =Validator::make($request->all(), [
            'date' => ['required', 'date'],
            'type' => ['required'],
            'protide' => ['required'],
            'albumine' => ['required'],
            'alpha1' => ['required'],
            'alpha2' => ['required'],
            'gamma' => ['required'],
            'beta' => ['required'],
        ]);
        if ($validation->fails()) {
            return redirect()->Back()->withInput()->withErrors($validation);
        }

        $electrophorese=new Electrophorese();
        $electrophorese->date=$request->date;
        $electrophorese->type=$request->type;
        $electrophorese->protide=$request->protide;
        $electrophorese->albumine=$request->albumine;
        $electrophorese->alpha1=$request->alpha1;
        $electrophorese->alpha2=$request->alpha2;
        $electrophorese->gamma=$request->gamma;
        $electrophorese->beta=$request->beta;

        $consult = Consultation::where('id', Session::get('idconsultation'))->first();
        $electrophorese->id_consultation = $consult;

        if ($electrophorese->save())
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
        $electrophorese= Electrophorese::where('id', $consult->id_electrophorese)
            ->first();
        $doc = Dossier::select('id_patient')
            ->where('numD', $consult->num_dossier)
            ->first();
        $patient = Patient::where('idpatient', $doc->id_patient)
            ->first();

        return view('electrophorese.show', compact('consult', 'electrophorese', 'patient'));
    }

    public function edit(Electrophorese $electrophorese)
    {
        return view('electrophorese.edit',['electrophorese'=>$electrophorese]);

    }

    public function update(Request $request, Electrophorese $electrophorese)
    {
        $validation =Validator::make($request->all(), [
            'date' => ['required', 'date'],
            'type' => ['required'],
            'protide' => ['required'],
            'albumine' => ['required'],
            'alpha1' => ['required'],
            'alpha2' => ['required'],
            'gamma' => ['required'],
            'beta' => ['required'],
        ]);
        if ($validation->fails()) {
            return redirect()->Back()->withInput()->withErrors($validation);
        }

        /*$electrophorese->type=$request->type;
        $electrophorese->protide=$request->protide;
        $electrophorese->albumine=$request->albumine;
        $electrophorese->alpha1=$request->alpha1;
        $electrophorese->alpha2=$request->alpha2;
        $electrophorese->gamma=$request->gamma;
        $electrophorese->beta=$request->beta;
        $electrophorese->date=$request->date;*/

        if ($electrophorese-> update())
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

    public function destroy(Electrophorese $electrophorese)
    {
        $electrophorese->delete();
        return back();
    }
}
