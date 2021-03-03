<?php

namespace App\Http\Controllers;

use App\Consultation;
use App\Traitement;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class TraitementController extends Controller
{
    public function index()
    {
        return view('Traitement.index');
    }

    public function create()
    {
        $medecin = User::where('type_user','1')->where('status','1')->get();
        return view('Traitement.create',['liste_medecin'=> $medecin]);
    }

    public function store(Request $request)
    {
        $validation =Validator::make($request->all(), [
            'date' => ['required', 'date'],
            'traitement' => ['required'],
            'prescripteur' => ['required'],
        ]);
        if ($validation->fails()) {
            return redirect()->Back()->withInput()->withErrors($validation);
        }

        $traitement=new Traitement();
        $traitement->date=$request->date;
        $traitement->traitement=$request->traitement;
        /*$traitement->prescription=$request->prescription;
        $traitement->posologie=$request->posologie;
        $traitement->voie_administration= $request->administration;*/
        $traitement->prescripteur= $request->prescripteur;

        if ($traitement->save())
        {
            $consult = Consultation::where('id', Session::get('idconsultation'))->first();
            $consult->id_traitement = $traitement->id;
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

    public function show(Traitement $Traitement)
    {
        return view('Traitement.show',['Traitement'=>$Traitement]);
    }

    public function edit(Traitement $Traitement)
    {
        return view('Traitement.edit',['Traitement'=>$Traitement]);
    }

    public function update(Request $request, Traitement $traitement)
    {
        $validation =Validator::make($request->all(), [
            'date' => ['required', 'date'],
            'traitement' => ['required'],
            'prescripteur' => ['required'],
        ]);
        if ($validation->fails()) {
            return redirect()->Back()->withInput()->withErrors($validation);
        }

       /*$traitement->date=$request->date;
        $traitement->traitement=$request->traitement;
        $traitement->prescripteur= $request->prescripteur;*/

        if ($traitement->update())
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

    public function destroy(Traitement $Traitement)
    {
        $Traitement->delete();
        return back();
    }
}
