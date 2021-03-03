<?php

namespace App\Http\Controllers;

use App\AffectionIMM;
use App\Consultation;
use App\Dossier;
use App\Malagiegeneral;
use App\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AffectionIMMController extends Controller
{
    public function index()
    {
        return view('affectionIMM.index');
    }

    public function create()
    {
        return view('affectionIMM.create');
    }

    public function store(Request $request)
    {
        $validation =Validator::make($request->all(), [
            'nom' => ['required'],
            'traitement' => ['required', 'string'],
            'datedecouverte' => ['required', 'date'],
            'type' => ['required', 'string'],
        ]);
        if ($validation->fails()) {
            return redirect()->Back()->withInput()->withErrors($validation);
        }

        $affectionIMM=new AffectionIMM();
        $affectionIMM->type_affection= $request->type;
        $affectionIMM->nom_affection=$request->nom;
        $affectionIMM->date_decouverte=$request->datedecouverte;
        $affectionIMM->traitement=$request->traitement;
        if ($request->nom === 'autre') {
            $affectionIMM->precision_autre=$request->precision;
        }else {
            $affectionIMM->precision_autre=Null;
        }

        if ($affectionIMM->save())
        {
            $consult = Consultation::where('id', Session::get('idconsultation'))->first();
            $consult->id_affectionimm = $affectionIMM->id;
            $consult->update();
            Session::flash('message', 'informations Affections Immunologiques enregistrées.');
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
        $imm= AffectionIMM::where('id', $consult->id_affectionimm)
            ->first();
        $doc = Dossier::select('id_patient')
            ->where('numD', $consult->num_dossier)
            ->first();
        $patient = Patient::where('idpatient', $doc->id_patient)
            ->first();

        if ($imm){
            return view('affectionIMM.show', compact('consult', 'imm', 'patient'));
        }else {
            Session::flash('message', 'données non existantes pour cette consultation!');
            Session::flash('alert-class', 'alert-danger');

            return back();
        }
    }

    public function edit(AffectionIMM $affectionIMM)
    {
        return view('affectionIMM.edit',['affectionIMM'=>$affectionIMM]);
    }

    public function update(Request $request, AffectionIMM $affectionIMM)
    {
        if ($affectionIMM->update())
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

    public function destroy(AffectionIMM $affectionIMM)
    {
        $affectionIMM->delete();
        return back();
    }
}
