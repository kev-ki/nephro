<?php

namespace App\Http\Controllers;

use App\AffTumoraleMaligne;
use App\Consultation;
use App\Dossier;
use App\GinecoObstetrique;
use App\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class GenicoObstetriqueController extends Controller
{
    public function index()
    {

        return view('ginecoObstetrique.index');
    }

    public function create()
    {
        return view('ginecoObstetrique.create');
    }

    public function store(Request $request)
    {
        $validation =Validator::make($request->all(), [
            'datepremierregle' => ['required', 'date'],
            'datedernierregle' => ['required', 'date'],
        ]);
        if ($validation->fails()) {
            return redirect()->Back()->withInput()->withErrors($validation);
        }

        $genicoObstetrique=new GinecoObstetrique();
        $genicoObstetrique->datepremierregle=$request->datepremierregle;
        $genicoObstetrique->datedernierregle=$request->datedernierregle;
        $genicoObstetrique->datemenopause=$request->datemenopose;
        $genicoObstetrique->duree_contraception=$request->durecontraception;
        $genicoObstetrique->type_contraception=$request->typecontraception;
        $genicoObstetrique->gestite=$request->gestite;
        $genicoObstetrique->ev=$request->EV;
        $genicoObstetrique->dcd=$request->DCD;
        $genicoObstetrique->datederniergrossesse=$request->datederniergrosse;

        $genicoObstetrique->avortement_spontane=$request->spontane;
        $genicoObstetrique->nombre_avortement_spontane=$request->nombrespont;
        $genicoObstetrique->annee_avortement_spontane=$request->anneespont;

        $genicoObstetrique->avortement_provoque=$request->provoque;
        $genicoObstetrique->nombre_avortement_provoque=$request->nombreprovoque;
        $genicoObstetrique->annee_avortement_provoque=$request->anneeprovoque;

        $genicoObstetrique->cesarienne=$request->cesarienne;
        $genicoObstetrique->nombre_cesarienne=$request->nombrecesarienne;
        $genicoObstetrique->annee_cesarienne=$request->anneecesarienne;
        $genicoObstetrique->motif_cesarienne=$request->motifcesarienne;

        $genicoObstetrique->albumine=$request->albuminependantgrossesse;
        $genicoObstetrique->hta=$request->HTApendantgrossesse;

        $genicoObstetrique->grossesse=$request->grosesse;
        $genicoObstetrique->issue_grossesse=$request->issues;

        $genicoObstetrique->autreginecoobs=$request->autre;

        if ($genicoObstetrique->save())
        {
            $consult = Consultation::where('id', Session::get('idconsultation'))->first();
            $consult->id_genicoobs = $genicoObstetrique->id;
            $consult->update();
            Session::flash('message', 'informations Gineco-Obstetriques enregistrées.');
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
        $gyneco= GinecoObstetrique::where('id', $consult->id_genicoobs)
            ->first();
        $doc = Dossier::select('id_patient')
            ->where('numD', $consult->num_dossier)
            ->first();
        $patient = Patient::where('idpatient', $doc->id_patient)
            ->first();

        if ($gyneco){
            return view('ginecoObstetrique.show', compact('consult', 'gyneco', 'patient'));
        }else {
            Session::flash('message', 'données non existantes pour cette consultation!');
            Session::flash('alert-class', 'alert-danger');

            return back();
        }
    }

    public function edit(GinecoObstetrique $genicoObstetrique)
    {
        return view('ginecoObstetrique.edit',['ginecoObstetrique'=>$genicoObstetrique]);
    }

    public function update(Request $request, GinecoObstetrique $genicoObstetrique)
    {
        /*$genicoObstetrique->datepremierregle=$request->datepremierregle;
        $genicoObstetrique->datedernierregle=$request->datedernierregle;
        $genicoObstetrique->datemenopose=$request->datemenopose;
        $genicoObstetrique->durecontraception=$request->durecontraception;
        $genicoObstetrique->typecontraception=$request->typecontraception;
        $genicoObstetrique->gestite=$request->gestite;
        $genicoObstetrique->EV=$request->EV;
        $genicoObstetrique->DCD=$request->DCD;
        $genicoObstetrique->datederniergrosse=$request->datederniergrosse;
        $genicoObstetrique->nombreavortementspontane=$request->nombreavortementspontane;
        $genicoObstetrique->dateavortementspontane=$request->nombreavortementspontane;
        $genicoObstetrique->nombreavortementprovoque=$request->nombreavortementprovoque;
        $genicoObstetrique->dateavortementprovoque=$request->dateavortementprovoque;
        $genicoObstetrique->nombredecesarienne=$request->nombredecesarienne;
        $genicoObstetrique->datecesarienne=$request->datecesarienne;
        $genicoObstetrique->motifcesarienne=$request->motifcesarienne;
        $genicoObstetrique->albuminependantgrossesse=$request->albuminependantgrossesse;
        $genicoObstetrique->HTApendantgrossesse=$request->HTApendantgrossesse;
        $genicoObstetrique->precision=$request->precision;*/

        if ($genicoObstetrique->update())
        {
            Session::flash('message', 'Modifications enregistrées.');
            Session::flash('alert-class', 'alert-success');
            return back();
        }
        else{
            Session::flash('message', 'Verifier tous les champs SVP!');
            Session::flash('alert-class', 'alert-danger');
            return back();
        }
    }

    public function destroy(GinecoObstetrique $ginecoObstetrique)
    {
        $ginecoObstetrique->delete();
        return back();
    }
}
