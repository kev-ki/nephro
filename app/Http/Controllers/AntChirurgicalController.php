<?php

namespace App\Http\Controllers;

use App\AntChirurgical;
use App\Consultation;
use App\Dossier;
use App\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AntChirurgicalController extends Controller
{
    public function index()
    {
        return view('chirurgical.index');
    }

    public function liste_chirurgie($id)
    {
        $donnees = AntChirurgical::where('id_consultation', $id)
            ->paginate(7);
        $consult = Consultation::where('id', $id)
            ->first();

        $lignes = count($donnees);

        if ($lignes) {
            return view('chirurgical.index', compact('donnees', 'consult'));
        } else{
            Session::flash('message', 'Données non existantes pour cette consultation!');
            Session::flash('alert-class', 'alert-danger');

            return back();
        }
    }

    public function create()
    {
        return view('chirurgical.create');
    }

    public function store(Request $request)
    {
        $validation =Validator::make($request->all(), [
            'date' => ['required', 'date'],
            'chirurgical' => ['required'],
        ]);
        if ($validation->fails()) {
            return redirect()->Back()->withInput()->withErrors($validation);
        }

        $antChirurgical= new AntChirurgical();
        $antChirurgical->date= $request->date;
        $antChirurgical->infochirurgie= $request->chirurgical;

        $consult = Consultation::where('id', Session::get('idconsultation'))->first();
        $antChirurgical->id_consultation = $consult;

        if ($antChirurgical->save())
        {
            Session::flash('message', 'informations Chirurgicaux enregistrées.');
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
        $chirurgie= AntChirurgical::where('id', $id)
            ->first();
        $consult = Consultation::where('id', $chirurgie->id_consultation)
            ->first();
        $doc = Dossier::select('id_patient')
            ->where('numD', $consult->num_dossier)
            ->first();
        $patient = Patient::where('idpatient', $doc->id_patient)
            ->first();

        if ($chirurgie){
            return view('chirurgical.show', compact('consult', 'chirurgie', 'patient'));
        }else {
            return back();
        }
    }

    public function edit(AntChirurgical $antChirurgical)
    {
        return view('chirurgical.edit',['antChirurgical'=>$antChirurgical]);
    }


    public function update(Request $request, AntChirurgical $antChirurgical)
    {
        $antChirurgical->date= $request->date;
        $antChirurgical->infochirurgie= $request->chirurgical;

        if ($antChirurgical->save())
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

    public function destroy(AntChirurgical $antChirurgical)
    {
        $antChirurgical->delete();
        return back();
    }
}
