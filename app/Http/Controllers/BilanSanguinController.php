<?php

namespace App\Http\Controllers;

use App\BilanSanguin;
use App\Consultation;
use App\Dossier;
use App\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class BilanSanguinController extends Controller
{
    public function index()
    {
        return view('bilanSanguin.index');
    }

    public function liste_sanguin($id)
    {
        $donnees =  BilanSanguin::where('id_consultation', $id)
            ->paginate(7);

        return view('bilanSanguin.index', compact('donnees'));
    }

    public function create()
    {
        return view('bilanSanguin.create');
    }

    public function store(Request $request)
    {
        $validation =Validator::make($request->all(), [
            'date' => ['required', 'date'],
        ]);
        if ($validation->fails()) {
            return redirect()->Back()->withInput()->withErrors($validation);
        }

        $bilanSanguin=new BilanSanguin();
        $bilanSanguin->nom_autre=$request->nom_autre;
        $bilanSanguin->resultat=$request->resultat;
        $bilanSanguin->nom_autre1=$request->nom_autre1;
        $bilanSanguin->resultat1=$request->resultat1;
        $bilanSanguin->folatesanguin=$request->folatesanguin;
        $bilanSanguin->b12sanguin=$request->b12sanguin;
        $bilanSanguin->sattetranferrine=$request->satetranferine;
        $bilanSanguin->ferserique=$request->ferserique;
        $bilanSanguin->crp=$request->crp;
        $bilanSanguin->reticulocyte=$request->reticulocyte;
        $bilanSanguin->leu=$request->leu;
        $bilanSanguin->plaquette=$request->plaquette;
        $bilanSanguin->gb=$request->gb;
        $bilanSanguin->hb=$request->hb;
        $bilanSanguin->hdl=$request->hd;
        $bilanSanguin->vgm=$request->vgm;
        $bilanSanguin->triglycederide=$request->triglycederide;
        $bilanSanguin->cholesterol=$request->cholesterol;
        $bilanSanguin->glycemie=$request->glycemie;
        $bilanSanguin->amylas=$request->amylas;
        $bilanSanguin->myoglobine=$request->myoglobine;
        $bilanSanguin->troponine=$request->troponine;
        $bilanSanguin->ldh=$request->ldh;
        $bilanSanguin->cpk=$request->cpk;
        $bilanSanguin->gammagt=$request->gammagt;
        $bilanSanguin->biltotal=$request->biltotal;
        $bilanSanguin->asat=$request->asat;
        $bilanSanguin->pu=$request->pu;
        $bilanSanguin->date=$request->date;
        $bilanSanguin->azotemie=$request->azotemie;
        $bilanSanguin->creatinemie=$request->creatinemie;
        $bilanSanguin->clairance=$request->clairance;
        $bilanSanguin->calcemie=$request->calcemie;
        $bilanSanguin->uricemie=$request->uricemie;
        $bilanSanguin->natremie=$request->natremie;
        $bilanSanguin->kaliemie=$request->kaliemie;
        $bilanSanguin->chloremie=$request->choremie;
        $bilanSanguin->phosphoremie=$request->phosphoremie;
        $bilanSanguin->magnesemie=$request->magnesemie;
        $bilanSanguin->bicarbonatemie=$request->bicarbonatemie;
        $bilanSanguin->protidemie=$request->protidemie;
        $bilanSanguin->phosphatase=$request->phosphatase;
        $bilanSanguin->pth=$request->pth;

        $consult = Consultation::where('id', Session::get('idconsultation'))->first();
        $bilanSanguin->id_consultation = $consult;

        if ($bilanSanguin->save())
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
        $sanguin= BilanSanguin::where('id', $consult->id_bilansanguin)
            ->first();
        $doc = Dossier::select('id_patient')
            ->where('numD', $consult->num_dossier)
            ->first();
        $patient = Patient::where('idpatient', $doc->id_patient)
            ->first();

        if ($sanguin){
            return view('bilanSanguin.show', compact('consult', 'sanguin', 'patient'));
        }else {
            Session::flash('message', 'données non existantes pour cette consultation!');
            Session::flash('alert-class', 'alert-danger');

            return back();
        }
    }

    public function edit(BilanSanguin $bilanSanguin)
    {
        return view('bilanSanguin.edit',['bilanSanguin'=>$bilanSanguin]);
    }

    public function update(Request $request, BilanSanguin $bilanSanguin)
    {
        $bilanSanguin->folatesanguin=$request->folatesanguin;
        $bilanSanguin->b12sanguin=$request->b12sanguin;
        $bilanSanguin->sattetranferrine=$request->satetranferine;
        $bilanSanguin->ferserique=$request->ferserique;
        $bilanSanguin->crp=$request->crp;
        $bilanSanguin->reticulocyte=$request->reticulocyte;
        $bilanSanguin->leu=$request->leu;
        $bilanSanguin->plaquette=$request->plaquette;
        $bilanSanguin->gb=$request->gb;
        $bilanSanguin->hb=$request->hb;
        $bilanSanguin->hdl=$request->hd;
        $bilanSanguin->vgm=$request->vgm;
        $bilanSanguin->triglycederide=$request->triglycederide;
        $bilanSanguin->cholesterol=$request->cholesterol;
        $bilanSanguin->glycemie=$request->glycemie;
        $bilanSanguin->amylas=$request->amylas;
        $bilanSanguin->myoglobine=$request->myoglobine;
        $bilanSanguin->troponine=$request->troponine;
        $bilanSanguin->ldh=$request->ldh;
        $bilanSanguin->cpk=$request->cpk;
        $bilanSanguin->gammagt=$request->gammagt;
        $bilanSanguin->biltotal=$request->biltotal;
        $bilanSanguin->asat=$request->asat;
        $bilanSanguin->pu=$request->pu;
        $bilanSanguin->date=$request->date;
        $bilanSanguin->azotemie=$request->azotemie;
        $bilanSanguin->creatinemie=$request->creatinemie;
        $bilanSanguin->clairance=$request->clairance;
        $bilanSanguin->calcemie=$request->calcemie;
        $bilanSanguin->uricemie=$request->uricemie;
        //$bilanSanguin->=$request->;
        $bilanSanguin->natremie=$request->natremie;
        $bilanSanguin->kaliemie=$request->kaliemie;
        $bilanSanguin->chloremie=$request->choremie;
        $bilanSanguin->phosphoremie=$request->phosphoremie;
        $bilanSanguin->magnesemie=$request->magnesemie;
        $bilanSanguin->bicarbonatemie=$request->bicarbonatemie;
        $bilanSanguin->protidemie=$request->protidemie;
        $bilanSanguin->phosphatase=$request->phosphatase;
        $bilanSanguin->pth=$request->pth;

        if ($bilanSanguin->save())
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

    public function destroy(BilanSanguin $bilanSanguin)
    {
        $bilanSanguin->delete();
        return back();
    }
}
