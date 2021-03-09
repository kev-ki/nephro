<?php

namespace App\Http\Controllers;

use App\AffectionIMM;
use App\Consultation;
use App\Dossier;
use App\Maladiegenerale;
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

    public function liste_Imm($id)
    {
        $donnees = AffectionIMM::where('id_consultation', $id)
            ->paginate(6);
        $consult = Consultation::where('id', $id)->first();

        if (!empty($donnees)) {
            return view('affectionIMM.index', compact('donnees', 'consult'));
        } else{
            Session::flash('message', 'Données non existantes pour cette consultation!');
            Session::flash('alert-class', 'alert-danger');

            return back();
        }
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

        $consult = Consultation::where('id', Session::get('idconsultation'))->first();
        $affectionIMM->id_consultation = $consult;

        if ($affectionIMM->save())
        {
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
        $imm= AffectionIMM::where('id', $id)
            ->first();
        $consult = Consultation::where('id', $imm->id_consultation)
            ->first();

        $doc = Dossier::select('id_patient')
            ->where('numD', $consult->num_dossier)
            ->first();
        $patient = Patient::where('idpatient', $doc->id_patient)
            ->first();

        if ($imm){
            return view('affectionIMM.show', compact('consult', 'imm', 'patient'));
        }else {
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
