<?php

namespace App\Http\Controllers;

use App\Consultation;
use App\Dossier;
use App\LiquideBioSelle;
use App\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LiquideBioSelleController extends Controller
{
    public function index()
    {
        $liquideBioSelle=LiquideBioSelle::all();
        return view('liquideBioSelle.index',['liquideBioSelle'=>$liquideBioSelle]);
    }

    public function create()
    {
        return view('liquideBioSelle.create');
    }

    public function store(Request $request)
    {
        $validation =Validator::make($request->all(), [
            'date' => ['required', 'date'],
            'nature' => ['required'],
            'analyse' => ['required'],
            'antibiogramme' => ['required'],
        ]);
        if ($validation->fails()) {
            return redirect()->Back()->withInput()->withErrors($validation);
        }

        $liquideBioSelle=new LiquideBioSelle();
        $liquideBioSelle->date=$request->date;
        $liquideBioSelle->analyse=$request->analyse;
        $liquideBioSelle->antibiogramme=$request->antibiogramme;
        $liquideBioSelle->nature=$request->nature;

        if ($liquideBioSelle->save())
        {
            $consult = Consultation::where('id', Session::get('idconsultation'))->first();
            $consult->id_bioselle = $liquideBioSelle->id;
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
        $liquide= LiquideBioSelle::where('id', $consult->id_bioselle)
            ->first();
        $doc = Dossier::select('id_patient')
            ->where('numD', $consult->num_dossier)
            ->first();
        $patient = Patient::where('idpatient', $doc->id_patient)
            ->first();

        if ($liquide){
            return view('liquideBioSelle.show', compact('consult', 'liquide', 'patient'));
        }else {
            Session::flash('message', 'données non existantes pour cette consultation!');
            Session::flash('alert-class', 'alert-danger');

            return back();
        }
    }

    public function edit(LiquideBioSelle $liquideBioSelle)
    {
        return view('liquideBioSelle.edit',['liquideBioSelle'=>$liquideBioSelle]);
    }

    public function update(Request $request, LiquideBioSelle $liquideBioSelle)
    {
        $validation =Validator::make($request->all(), [
            'date' => ['required', 'date'],
            'nature' => ['required'],
            'analyse' => ['required'],
            'antibiogramme' => ['required'],
        ]);
        if ($validation->fails()) {
            return redirect()->Back()->withInput()->withErrors($validation);
        }

        /*$liquideBioSelle=new LiquideBioSelle();
        $liquideBioSelle->date=$request->date;
        $liquideBioSelle->analyse=$request->analyse;
        $liquideBioSelle->antibiogramme=$request->antibiogramme;
        $liquideBioSelle->nature=$request->nature;*/

        if ($liquideBioSelle->update())
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

    public function destroy(LiquideBioSelle $liquideBioSelle)
    {
        $liquideBioSelle->delete();
        return back();
    }
}
