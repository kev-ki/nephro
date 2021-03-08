<?php

namespace App\Http\Controllers;

use App\AntUronephrologique;
use App\Consultation;
use App\Dossier;
use App\Http\Middleware\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\Types\Null_;

class AntUronephrologiqueController extends Controller
{
    public function index()
    {
        $uro=where('id', Session::get('idconsult'))->first();
        return view('antUronephrologique.index',['uro'=>$uro]);
    }

    public function liste_uro($id)
    {
        $donnees =  AntUronephrologique::where('id_consultation', $id)
            ->paginate(7);

        return view('antUronephrologique.index', compact('donnees'));
    }

    public function create()
    {
        return view('antUronephrologique.create');
    }

    public function store(Request $request)
    {
        $validation =Validator::make($request->all(), [
            'nom' => ['required', 'string', 'max:255'],
            'datedecouverte' => ['required', 'date'],
        ]);

        if ($validation->fails()) {
            return redirect()->Back()->withInput()->withErrors($validation);
        }

        $antUronephrologique=new AntUronephrologique();

        $antUronephrologique->nom=$request->nom;
        $antUronephrologique->datedecouverte=$request->datedecouverte;

        if ($request->nom === 'oeudeme' || $request->nom === 'proteinurie')
        {
            foreach ($request->traitement as $value)
            {
                $antUronephrologique->traitement= $antUronephrologique->traitement.','.$value;
            }
            if (isset($request->siegeoeudeme)) {
                foreach ($request->siegeoeudeme as $value)
                {
                    $antUronephrologique->siegeoeudeme= $antUronephrologique->siegeoeudeme.','.$value;
                }
            }

            $antUronephrologique->evolution=$request->evolution;
            $antUronephrologique->nombrerechute=$request->nombrerechute;
            $antUronephrologique->nombreepisode=$request->nombreepisode;
        }else {
            $antUronephrologique->traitement=Null;
            $antUronephrologique->evolution=Null;
            $antUronephrologique->nombrerechute=Null;
            $antUronephrologique->nombreepisode=Null;
            $antUronephrologique->siegeoeudeme=Null;
        }

        if ($request->nom === 'hematurie')
        {
            foreach ($request->type_hematurie as $value) {
                $antUronephrologique->type_hematurie= $antUronephrologique->type_hematurie.','.$value;
            }
            $antUronephrologique->signe_accompagnement= $request->signeaccompagnement;
        }else {
            $antUronephrologique->type_hematurie=Null;
            $antUronephrologique->signe_accompagnement=Null;
        }

        if ($request->nom === 'proteinurie')
        {
            $antUronephrologique->duree_corticoide=$request->duree_corticoide;
            $antUronephrologique->dose_corticoide =$request->dose_corticoide;
        }else {
            $antUronephrologique->duree_corticoide=Null;
            $antUronephrologique->dose_corticoide=Null;
        }

        if ($request->nom === 'troublemictiondiurese')
        {
            $antUronephrologique->type_trouble=$request->type_trouble;
            $antUronephrologique->precision_type= $request->precisiontype;
            $antUronephrologique->traitement_trouble=$request->traitement_trouble;
        }else {
            $antUronephrologique->type_trouble=Null;
            $antUronephrologique->precision_type=Null;
            $antUronephrologique->traitement_trouble=Null;
        }

        $consult = Consultation::where('id', Session::get('idconsultation'))->first();
        $antUronephrologique->id_consultation = $consult;

        if ($antUronephrologique->save())
        {
            Session::flash('message', 'informations Uronephrologique enregistrées.');
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
        $uro= AntUronephrologique::where('id', $consult->id_uronephro)
            ->first();
        $doc = Dossier::select('id_patient')
            ->where('numD', $consult->num_dossier)
            ->first();
        $patient = \App\Patient::where('idpatient', $doc->id_patient)
            ->first();

        if ($uro){
            return view('antUronephrologique.show', compact('uro', 'consult', 'patient'));
        }else {
            Session::flash('message', 'données non existantes pour cette consultation!');
            Session::flash('alert-class', 'alert-danger');

            return back();
        }
    }

    public function edit(AntUronephrologique $antUronephrologique)
    {
        return view('antUronephrologique.edit',['antUronephrologique'=>$antUronephrologique]);
    }

    public function update(Request $request, AntUronephrologique $antUronephrologique)
    {
        /*if ($request->nom === 'oeudeme' || $request->nom === 'proteinurie')
        {
            $antUronephrologique->traitement='';
            $antUronephrologique->siegeoeudeme='';
            foreach ($request->traitement as $value)
            {
                $antUronephrologique->traitement= $antUronephrologique->traitement.','.$value;
            }
            foreach ($request->siegeoeudeme as $value)
            {
                $antUronephrologique->siegeoeudeme= $antUronephrologique->siegeoeudeme.','.$value;
            }

            $antUronephrologique->evolution=$request->evolution;
            $antUronephrologique->nombrerechute=$request->nombrerechute;
            $antUronephrologique->nombreepisode=$request->nombreepisode;
        }else {
            $antUronephrologique->traitement=Null;
            $antUronephrologique->evolution=Null;
            $antUronephrologique->nombrerechute=Null;
            $antUronephrologique->nombreepisode=Null;
            $antUronephrologique->siegeoeudeme=Null;
        }

        if ($request->nom === 'hematurie')
        {
            $antUronephrologique->type_hematurie='';
            foreach ($request->type_hematurie as $value) {
                $antUronephrologique->type_hematurie= $antUronephrologique->type_hematurie.','.$value;
            }
            $antUronephrologique->signe_accompagnement= $request->signeaccompagnement;
        }else {
            $antUronephrologique->type_hematurie=Null;
            $antUronephrologique->signe_accompagnement=Null;
        }

        if ($request->nom === 'proteinurie')
        {
            $antUronephrologique->duree_corticoide=$request->duree_corticoide;
            $antUronephrologique->dose_corticoide =$request->dose_corticoide;
        }else {
            $antUronephrologique->duree_corticoide=Null;
            $antUronephrologique->dose_corticoide=Null;
        }

        if ($request->nom === 'troublemictiondiurese')
        {
            $antUronephrologique->type_trouble=$request->type_trouble;
            $antUronephrologique->precision_type= $request->precisiontype;
            $antUronephrologique->traitement_trouble=$request->traitement_trouble;
        }else {
            $antUronephrologique->type_trouble=Null;
            $antUronephrologique->precision_type=Null;
            $antUronephrologique->traitement_trouble=Null;
        }*/

        if ($antUronephrologique->update())
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

    public function destroy(AntUronephrologique $antUronephrologique)
    {
        $antUronephrologique->delete();
        return back();
    }
}
