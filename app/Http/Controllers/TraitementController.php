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
        return view('traitement.index');
    }

    public function liste_traitement($id)
    {
        $donnees =  Traitement::where('id_consultation', $id)
            ->paginate(7);
        $consult = Consultation::where('id', $id)
            ->first();
        $liste_medecin = User::where('type_user','1')->where('status','1')->get();

        return view('traitement.index', compact('donnees', 'liste_medecin', 'consult'));
    }

    public function create()
    {
        $medecin = User::where('type_user','1')->where('status','1')->get();
        return view('traitement.create',['liste_medecin'=> $medecin]);
    }

    public function store(Request $request)
    {
        $validation =Validator::make($request->all(), [
            'date' => ['required', 'date'],
            'prescription' => ['required'],
            'posologie' => ['required'],
            'voie_administration' => ['required'],
            'prescripteur' => ['required'],
        ]);
        if ($validation->fails()) {
            Session::flash('message', 'Renseignez tous les champs SVP!');
            Session::flash('alert-class', 'alert-danger');
            return redirect()->Back()->withInput()->withErrors($validation);
        }

        if ($request->date <= date('Y-m-d')) {
            $traitement=new Traitement();
            $traitement->date=$request->date;
            //$traitement->ordonnance=$request->ordonnance;
            $traitement->prescription=$request->prescription;
            $traitement->posologie=$request->posologie;
            $traitement->voie_administration= $request->voie_administration;
            $traitement->prescripteur= $request->prescripteur;

            $consult = Consultation::where('id', Session::get('idconsultation'))->first();
            $traitement->id_consultation = $consult->id;

            if ($traitement->save())
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
            Session::flash('message', 'Date invalide. Veuillez renseigner une date valide SVP!');
            Session::flash('alert-class', 'alert-danger');
            return back();
        }




    }

    public function show($id)
    {
        $traitement = Traitement::find($id);

        $liste_medecin = User::where('type_user','1')->where('status','1')->get();

        return view('traitement.show', compact('traitement', 'liste_medecin'));
    }

    public function edit(Traitement $Traitement)
    {
        return view('traitement.edit',['Traitement'=>$Traitement]);
    }

    public function update(Request $request, Traitement $traitement)
    {
        $validation =Validator::make($request->all(), [
            'date' => ['required', 'date'],
            'ordonnance' => ['required'],
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
