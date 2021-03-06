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

        if ($antFamilliaux->save())
        {
            $consult = Consultation::where('id', Session::get('idconsultation'))->first();
            $consult->id_ant_famillial = $antFamilliaux->id;
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
        //die($consult);
        $familial= AntFamilial::where('id', $consult->id_ant_famillial)
            ->first();
        //die($familial);
        $doc = Dossier::select('id_patient')
            ->where('numD', $consult->num_dossier)
            ->first();
        $patient = Patient::where('idpatient', $doc->id_patient)
            ->first();

        if ($familial){
            return view('antFamilliaux.show', compact('consult', 'familial', 'patient'));
        }else {
            Session::flash('message', 'données non existantes pour cette consultation!');
            Session::flash('alert-class', 'alert-danger');

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
