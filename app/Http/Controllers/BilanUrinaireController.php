<?php

namespace App\Http\Controllers;

use App\BilanUrinaire;
use App\Consultation;
use App\Dossier;
use App\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class BilanUrinaireController extends Controller
{
    public function index()
    {
        $bilanUrinaire=BilanUrinaire::all();
        return view('bilanUrinaire.index',['bilanUrinaire'=>$bilanUrinaire]);
    }

    public function liste_urinaire($id)
    {
        $donnees =  BilanUrinaire::where('id_consultation', $id)
            ->paginate(7);

        return view('bilanUrinaire.index', compact('donnees'));
    }

    public function create()
    {
        return view('bilanUrinaire.create');
    }

    public function store(Request $request)
    {
        $validation =Validator::make($request->all(), [
            'date' => ['required', 'date'],
        ]);
        if ($validation->fails()) {
            return redirect()->Back()->withInput()->withErrors($validation);
        }

        $bilanUrinaire= new BilanUrinaire();
        $bilanUrinaire->date=$request->date;
        $bilanUrinaire->volume=$request->volume;
        $bilanUrinaire->proteinurie=$request->proteinurie;
        $bilanUrinaire->leucyte=$request->leucyte;
        $bilanUrinaire->hematie=$request->hemacie;
        $bilanUrinaire->creatinurie=$request->creatinurie;
        $bilanUrinaire->ureecreati=$request->ureecreati;
        $bilanUrinaire->albuminecreati=$request->albuminecreati;
        $bilanUrinaire->uraturie=$request->uraturie;
        $bilanUrinaire->natriurese=$request->natriurese;
        $bilanUrinaire->kaliurese=$request->kaliurese;
        $bilanUrinaire->caliciturie=$request->caliciturie;
        $bilanUrinaire->phosphaturie=$request->phosphaturie;
        $bilanUrinaire->cristallurie=$request->cristallurie;

        $bilanUrinaire->nom_autre=$request->nom_autre;
        $bilanUrinaire->resultat=$request->resultat;
        $bilanUrinaire->nom_autre1=$request->nom_autre1;
        $bilanUrinaire->resultat1=$request->resultat1;

        $consult = Consultation::where('id', Session::get('idconsultation'))->first();
        $bilanUrinaire->id_consultation = $consult;

        if ($bilanUrinaire->save())
        {
            $consult = Consultation::where('id', Session::get('idconsultation'))->first();
            $consult->id_bilanurinaire = $bilanUrinaire->id;
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
        $urinaire= BilanUrinaire::where('id', $consult->id_bilanurinaire)
            ->first();
        $doc = Dossier::select('id_patient')
            ->where('numD', $consult->num_dossier)
            ->first();
        $patient = Patient::where('idpatient', $doc->id_patient)
            ->first();

        if ($urinaire){
            return view('bilanUrinaire.show', compact('consult', 'urinaire', 'patient'));
        }else {
            Session::flash('message', 'données non existantes pour cette consultation!');
            Session::flash('alert-class', 'alert-danger');

            return back();
        }
    }

    public function edit(BilanUrinaire $bilanUrinaire)
    {
        return view('bilanUrinaire.edit',['bilanUrinaire'=>$bilanUrinaire]);
    }

    public function update(Request $request, BilanUrinaire $bilanUrinaire)
    {
        $validation =Validator::make($request->all(), [
            'date' => ['required', 'date'],
        ]);
        if ($validation->fails()) {
            return redirect()->Back()->withInput()->withErrors($validation);
        }

        /*$bilanUrinaire->date=$request->date;
        $bilanUrinaire->volume=$request->volume;
        $bilanUrinaire->proteinurie=$request->proteinurie;
        $bilanUrinaire->leucyte=$request->leucyte;
        $bilanUrinaire->hematie=$request->hemacie;
        $bilanUrinaire->creatinurie=$request->creatinurie;
        $bilanUrinaire->ureecreati=$request->ureecreati;
        $bilanUrinaire->albuminecreati=$request->albuminecreati;
        $bilanUrinaire->uraturie=$request->uraturie;
        $bilanUrinaire->natriurese=$request->natriurese;
        $bilanUrinaire->kaliurese=$request->kaliurese;
        $bilanUrinaire->caliciturie=$request->caliciturie;
        $bilanUrinaire->phosphaturie=$request->phosphaturie;
        $bilanUrinaire->cristallurie=$request->cristallurie;

        $bilanUrinaire->nom_autre=$request->nom_autre;
        $bilanUrinaire->resultat=$request->resultat;
        $bilanUrinaire->nom_autre1=$request->nom_autre1;
        $bilanUrinaire->resultat1=$request->resultat1;*/

        if ($bilanUrinaire->update())
        {
            Session::flash('message', 'Modifications effectuées.');
            Session::flash('alert-class', 'alert-danger');

            return back();
        }
        else{
            Session::flash('message', 'Verifier tous les champs SVP!');
            Session::flash('alert-class', 'alert-danger');

            return back();
        }
    }

    public function destroy(BilanUrinaire $bilanUrinaire)
    {
        $bilanUrinaire->delete();
        return back();
    }
}
