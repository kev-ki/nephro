<?php

namespace App\Http\Controllers;

use App\Consultation;
use App\Dossier;
use App\Hemostase;
use App\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class HemostaseController extends Controller
{
    public function index()
    {
        return view('hemostase.index');
    }

    public function liste_hemostase($id)
    {
        $donnees =  Hemostase::where('id_consultation', $id)
            ->paginate(7);

        $consult = Consultation::where('id', $id)
            ->first();

        if (!empty($donnees)) {
            return view('hemostase.index', compact('donnees', 'consult'));
        } else{
            Session::flash('message', 'Données non existantes pour cette consultation!');
            Session::flash('alert-class', 'alert-danger');

            return back();
        }
    }

    public function create()
    {
        return view('hemostase.create');
    }

    public function store(Request $request)
    {
        $validation =Validator::make($request->all(), [
            'date' => ['required', 'date'],
        ]);
        if ($validation->fails()) {
            return redirect()->Back()->withInput()->withErrors($validation);
        }

        $hemostase= new Hemostase();
        $hemostase->date=$request->date;
        $hemostase->tp=$request->tp;
        $hemostase->tca=$request->tck;
        $hemostase->tck=$request->tck;
        $hemostase->dimere=$request->dimere;

        $consult = Consultation::where('id', Session::get('idconsultation'))->first();
        $hemostase->id_consultation = $consult;

        if ($hemostase->save())
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
        $hemostase= Hemostase::where('id', $id)
            ->first();
        $consult = Consultation::where('id', $hemostase->id_consultation)
        ->first();
        $doc = Dossier::select('id_patient')
            ->where('numD', $consult->num_dossier)
            ->first();
        $patient = Patient::where('idpatient', $doc->id_patient)
            ->first();

        if ($hemostase){
            return view('hemostase.show', compact('consult', 'hemostase', 'patient'));
        }else {
            return back();
        }
    }

    public function edit(Hemostase $hemostase)
    {
        return view('hemostase.edit',['hemostase'=>$hemostase]);
    }


    public function update(Request $request, Hemostase $hemostase)
    {
       /* $hemostase->tp=$request->tp;
        $hemostase->tca=$request->tck;
        $hemostase->tck=$request->tck;
        $hemostase->dimere=$request->dimere;*/

        if ($hemostase->update())
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

    public function destroy(Hemostase $hemostase)
    {
        $hemostase->delete();
        return back();
    }
}
