<?php

namespace App\Http\Controllers;

use App\Consultation;
use App\Dossier;
use App\Patient;
use App\Serologie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SerologieController extends Controller
{
    public function index()
    {
        return view('serologie.index');
    }

    public function liste_serologie($id)
    {
        $donnees =  Serologie::where('id_consultation', $id)
            ->paginate(7);

        return view('serologie.index', compact('donnees'));
    }

    public function create()
    {
        return view('serologie.create');
    }

    public function store(Request $request)
    {
        $validation =Validator::make($request->all(), [
            'date' => ['required', 'date'],
        ]);
        if ($validation->fails()) {
            return redirect()->Back()->withInput()->withErrors($validation);
        }

        $serologie=new Serologie();
        $serologie->date=$request->date;
        $serologie->cd4cv=$request->cd4cb;
        $serologie->aghbs=$request->aghbs;
        $serologie->aghbe=$request->aghbe;
        $serologie->acantihvc=$request->acantihvc;
        $serologie->serologie_vih=$request->serologievih;
        $serologie->acantihbc=$request->acantihbc;
        $serologie->aslo=$request->aslo;
        $serologie->facteur_rhumatoide=$request->facteurrh;
        $serologie->widal=$request->widal;
        $serologie->ac_antinucleaire=$request->acnucleaire;
        $serologie->ac_antidna=$request->acdna;
        $serologie->ac_antism=$request->acsm;
        $serologie->ac_antiphospholipide=$request->acph;
        $serologie->tpha=$request->tpha;
        $serologie->vdrl=$request->vdrl;
        $serologie->serologie_amibienne=$request->serologieamibienne;
        $serologie->serologie_dengue=$request->serologiedengue;
        $serologie->serologie_bilharzienne=$request->serologiebilharzienne;

        $serologie->nom_autre=$request->nom_autre;
        $serologie->resultat=$request->resultat;
        $serologie->nom_autre1=$request->nom_autre1;
        $serologie->resultat1=$request->resultat1;

        $consult = Consultation::where('id', Session::get('idconsultation'))->first();
        $serologie->id_consultation = $consult;

        if ($serologie->save())
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
        $serologie= Serologie::where('id', $consult->id_serologie)
            ->first();
        $doc = Dossier::select('id_patient')
            ->where('numD', $consult->num_dossier)
            ->first();
        $patient = Patient::where('idpatient', $doc->id_patient)
            ->first();

        if ($serologie){
            return view('serologie.show', compact('consult', 'serologie', 'patient'));
        }else {
            Session::flash('message', 'données non existantes pour cette consultation!');
            Session::flash('alert-class', 'alert-danger');

            return back();
        }
    }

    public function edit(Serologie $serologie)
    {
        return view('serologie.edit',['serologie'=>$serologie]);
    }

    public function update(Request $request, Serologie $serologie)
    {
        /*$serologie->cd4cb=$request->cd4cb;
        $serologie->aghbs=$request->aghbs;
        $serologie->aghbe=$request->aghbe;
        $serologie->acantihvc=$request->acantihvc;
        $serologie->serologievih=$request->serologievih;
        $serologie->acantihbc=$request->acantihbc;
        $serologie->also=$request->also;
        $serologie->facteurrh=$request->facteurrh;
        $serologie->widal=$request->widal;
        $serologie->acnucleaire=$request->acnucleaire;
        $serologie->acdna=$request->acdna;
        $serologie->acsm=$request->acsm;
        $serologie->acph=$request->acph;
        $serologie->tpha=$request->tpha;
        $serologie->vdrl=$request->vdrl;
        $serologie->serologieamibienne=$request->serologieamibienne;
        $serologie->serologiedengue=$request->serologiedengue;
        $serologie->serologiebilharzienne=$request->serologiebilharzienne;
        $serologie->autre1=$request->autre1;
        $serologie->autre2=$request->autre2;
        $serologie->autre3=$request->autre3;*/

        if ($serologie->update())
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

    public function destroy(Serologie $serologie)
    {
        $serologie->delete();
        return back();

    }
}
