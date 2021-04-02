<?php

namespace App\Http\Controllers;

use App\Consultation;
use App\Dossier;
use App\Endocrinologie;
use App\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class EndocrinologieController extends Controller
{
    public function index()
    {
        return  view('endocrinologie.index');
    }

    public function liste_endo($id)
    {
        $donnees =  Endocrinologie::where('id_consultation', $id)
            ->get();
        $consult = Consultation::where('id', $id)
            ->first();

        $lignes = count($donnees);

        if ($lignes) {
            return view('endocrinologie.index', compact('donnees', 'consult'));
        } else{
            Session::flash('message', 'Données non existantes pour cette consultation!');
            Session::flash('alert-class', 'alert-danger');

            return back();
        }
    }

    public function create()
    {
        return view('endocrinologie.create');
    }

    public function store(Request $request)
    {
        $validation =Validator::make($request->all(), [
            'date' => ['required', 'date'],
        ]);
        if ($validation->fails()) {
            return redirect()->Back()->withInput()->withErrors($validation);
        }

        if ($request->date < date('Y-m-d')) {
            $endocrinologie= new Endocrinologie();
            $endocrinologie->date=$request->date;

            $endocrinologie->ft3= $request->ft3;
            $endocrinologie->ft4= $request->ft4;
            $endocrinologie->cortisolomie=$request->cortisolomie;
            $endocrinologie->testsynacthene=$request->testsynacthene;
            $endocrinologie->prolactemie=$request->prolactemie;
            $endocrinologie->fsh=$request->fsh;
            $endocrinologie->lh=$request->lh;

            $endocrinologie->nom_autre=$request->nom_autre;
            $endocrinologie->resultat=$request->resultat;
            $endocrinologie->nom_autre1=$request->nom_autre1;
            $endocrinologie->resultat1=$request->resultat1;

            $consult = Consultation::where('id', Session::get('idconsultation'))->first();
            $endocrinologie->id_consultation = $consult->id;

            if ($endocrinologie->save())
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
        }else {
            Session::flash('message', 'Veuillez renseigner une date valide!');
            Session::flash('alert-class', 'alert-danger');
            return back();
        }
    }

    public function show($id)
    {
        $endo= Endocrinologie::where('id', $id)
            ->first();
        $consult = Consultation::where('id', $endo->id_consultation)
        ->first();
        $doc = Dossier::select('id_patient')
            ->where('numD', $consult->num_dossier)
            ->first();
        $patient = Patient::where('idpatient', $doc->id_patient)
            ->first();

        if ($endo){
            return view('endocrinologie.show', compact('consult', 'endo', 'patient'));
        }else {
            return back();
        }
    }

    public function edit(Endocrinologie $endocrinologie)
    {
        return view('endocrinologie.edit',['endocrinologie'=>$endocrinologie]);

    }

    public function update(Request $request, Endocrinologie $endocrinologie)
    {
        $validation =Validator::make($request->all(), [
            'date' => ['required', 'date'],
        ]);
        if ($validation->fails()) {
            return redirect()->Back()->withInput()->withErrors($validation);
        }

        /*$endocrinologie->date=$request->date;

        $endocrinologie->ft3= $request->ft3;
        $endocrinologie->ft4= $request->ft4;
        $endocrinologie->cortisolomie=$request->cortisolomie;
        $endocrinologie->testsynacthene=$request->testsynacthene;
        $endocrinologie->prolactemie=$request->prolactemie;
        $endocrinologie->fsh=$request->fsh;
        $endocrinologie->lh=$request->lh;

        $endocrinologie->nom_autre=$request->nom_autre;
        $endocrinologie->resultat=$request->resultat;
        $endocrinologie->nom_autre1=$request->nom_autre1;
        $endocrinologie->resultat1=$request->resultat1;*/

        if ($endocrinologie->update())
        {
            Session::flash('message', 'Modifications effectuées.');
            Session::flash('alert-class', 'alert-success');
        }
        else{
            Session::flash('message', 'Verifier tous les champs SVP!');
            Session::flash('alert-class', 'alert-danger');

            return back();
        }
    }

    public function destroy(Endocrinologie $endocrinologie)
    {
        $endocrinologie->delete();
        return back();
    }
}
