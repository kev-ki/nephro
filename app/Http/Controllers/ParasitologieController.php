<?php

namespace App\Http\Controllers;

use App\Consultation;
use App\Dossier;
use App\Parasitologie;
use App\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ParasitologieController extends Controller
{
    public function index()
    {
        return view('parasitologie.index');
    }

    public function liste_parasito($id)
    {
        $donnees =  Parasitologie::where('id_consultation', $id)
            ->paginate(7);

        return view('parasitologie.index', compact('donnees'));
    }

    public function create()
    {
        return view('parasitologie.create');
    }

    public function store(Request $request)
    {
        $validation =Validator::make($request->all(), [
            'date' => ['required', 'date'],
        ]);
        if ($validation->fails()) {
            return redirect()->Back()->withInput()->withErrors($validation);
        }

        $parasitologie= new Parasitologie();
        $parasitologie->date=$request->date;
        $parasitologie->goutteepaisse=$request->goutteEpaisse;
        $parasitologie->selle_pok=$request->sellePOK;
        $parasitologie->bmr=$request->bmr;

        $parasitologie->nom_autre=$request->nom_autre;
        $parasitologie->resultat=$request->resultat;
        $parasitologie->nom_autre1=$request->nom_autre1;
        $parasitologie->resultat1=$request->resultat1;

        $consult = Consultation::where('id', Session::get('idconsultation'))->first();
        $parasitologie->id_consultation = $consult;

        if ($parasitologie->save())
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
        $parasitologie= Parasitologie::where('id', $consult->id_parasitologie)
            ->first();
        $doc = Dossier::select('id_patient')
            ->where('numD', $consult->num_dossier)
            ->first();
        $patient = Patient::where('idpatient', $doc->id_patient)
            ->first();

        if ($parasitologie){
            return view('parasitologie.show', compact('consult', 'parasitologie', 'patient'));
        }else {
            Session::flash('message', 'données non existantes pour cette consultation!');
            Session::flash('alert-class', 'alert-danger');

            return back();
        }
    }

    public function edit(Parasitologie $parasitologie)
    {
        return view('parasitologie.edit',['parasitologie'=>$parasitologie]);
    }

    public function update(Request $request, Parasitologie $parasitologie)
    {
        $validation =Validator::make($request->all(), [
            'date' => ['required', 'date'],
        ]);
        if ($validation->fails()) {
            return redirect()->Back()->withInput()->withErrors($validation);
        }

        /*$parasitologie->date=$request->date;
        $parasitologie->goutteepaisse=$request->goutteEpaisse;
        $parasitologie->selle_pok=$request->sellePOK;
        $parasitologie->bmr=$request->bmr;

        $parasitologie->nom_autre=$request->nom_autre;
        $parasitologie->resultat=$request->resultat;
        $parasitologie->nom_autre1=$request->nom_autre1;
        $parasitologie->resultat1=$request->resultat1;*/

        if ($parasitologie->update())
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

    public function destroy(Parasitologie $parasitologie)
    {
        $parasitologie->delete();
        return back();
    }
}
