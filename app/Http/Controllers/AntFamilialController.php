<?php

namespace App\Http\Controllers;

use App\AntFamilial;
use App\Consultation;
use App\Dossier;
use App\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AntFamilialController extends Controller
{
    public function index()
    {
        return view('antFamilliaux.index');
    }

    public function liste_familial($id)
    {
        $donnees =  AntFamilial::where('id_consultation', $id)
            ->paginate(7);
        $consult = Consultation::where('id', $id)
            ->first();
        if (!empty($donnees)) {
            return view('antFamilliaux.index', compact('donnees', 'consult'));
        } else{
            Session::flash('message', 'Données non existantes pour cette consultation!');
            Session::flash('alert-class', 'alert-danger');

            return back();
        }
    }

    public function create()
    {
        return view('antFamilliaux.create');
    }

    public function store(Request $request)
    {
        $antFamilliaux= new AntFamilial();
        $antFamilliaux->pere=$request->pere;
        $antFamilliaux->mere=$request->mere;
        $antFamilliaux->frere=$request->frere;
        $antFamilliaux->soeur=$request->soeur;
        $antFamilliaux->enfantfille=$request->enfantfille;
        $antFamilliaux->enfantgarcon=$request->enfantgarcon;
        $antFamilliaux->conjoint=$request->conjoint;

        $consult = Consultation::where('id', Session::get('idconsultation'))->first();
        $antFamilliaux->id_consultation = $consult;

        if ($antFamilliaux->save())
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
        $familial= AntFamilial::where('id', $id)
            ->first();
        $consult = Consultation::where('id', $familial->id_consultation)
        ->first();

        $doc = Dossier::select('id_patient')
            ->where('numD', $consult->num_dossier)
            ->first();
        $patient = Patient::where('idpatient', $doc->id_patient)
            ->first();

        if ($familial){
            return view('antFamilliaux.show', compact('consult', 'familial', 'patient'));
        }else {
            return back();
        }

    }

    public function edit(AntFamilial $antFamilliaux)
    {
        return view('antFamilliaux.edit',['antFamilliaux'=>$antFamilliaux]);
    }

    public function update(Request $request, AntFamilial $antFamilliaux)
    {
        $antFamilliaux->consultationid=$request->consultationid;
        $antFamilliaux->pere=$request->pere;
        $antFamilliaux->mere=$request->mere;
        $antFamilliaux->frere=$request->frere;
        $antFamilliaux->soeur=$request->soeur;
        $antFamilliaux->fille=$request->fille;
        $antFamilliaux->garcon=$request->garcon;
        $antFamilliaux->conjoint=$request->conjoint;
        if ($antFamilliaux->save())
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

    public function destroy(AntFamilial $antFamilliaux)
    {
        $antFamilliaux->delete();
        return back();
    }
}
