<?php

namespace App\Http\Controllers;

use App\Constante;
use App\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ConstanteController extends Controller
{
    public function index()
    {

        return view('constante.index');
    }

    public function create()
    {
        $patient = Patient::all();
        return view('constante.create', compact('patient'));
    }

    public function store(Request $request)
    {
        $donnees = $request->except('_method', '_token', 'submit');
        $validation = Validator::make($request->all(), [
            'poids' => 'required',
            'taille' => 'required',
            'pouls' => 'required',
            'pulsation' => 'required',
            'tension' => 'required',
            'patientid' => 'required',
            'statuts' => 'required',
        ]);

        if ($validation->fails()) {
            return redirect()->Back()->withInput()->withErrors($validation);
        }

        $constant= new Constante();
        $constant->dateprise = now();
        $constant->poids = $request->poids;
        $constant->taille = $request->taille;
        $constant->pouls = $request->pouls;
        $constant->pulsation = $request->pulsation;
        $constant->tension = $request->tension;
        $constant->iduser = auth()->user()->id;
        $constant->idpatient = $request->patientid;
        $constant->statut = $request->statuts;

        if ($constant->save($donnees))
        {
            Session::flash('message', 'Constantes enregistrées.');
            Session::flash('alert-class', 'alert-success');
            return back();
        }
        else{
            Session::flash('message', 'Constantes non enregistrées.');
            Session::flash('alert-class', 'alert-warning');
            return back();
        }

    }


    public function show(Constante $constant)
    {
        return view('constante.show',['constant'=>$constant]);
    }


    public function edit($id)
    {
        $constante = Constante::where('id',$id)->first();
        $patient=Patient::where('idpatient',$constante->idpatient)->first();
        $liste_patients = Patient::all();

        return view('constante.edit', compact('constante', 'patient', 'liste_patients'));
    }

    public function update(Request $request, $id)
    {
        $donnees = $request->except('_method', '_token', 'submit');
        $validation = Validator::make($request->all(), [
            'poids' => 'required',
            'taille' => 'required',
            'pulsation' => 'required',
            'tension' => 'required',
            'pouls' => 'required',
            'idpatient' => 'required',
            'statut' => 'required',
        ]);

        if ($validation->fails()) {
            return redirect()->Back()->withInput()->withErrors($validation);
        }

        $constante = Constante::find($id);

        if ($constante->update($donnees))
        {
            Session::flash('message', 'Constante mise à jour.');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('infirmier.constante', $id);
        }
        else{
            Session::flash('message', 'Modifications non effectuées. Veuillez verifier tous les champs.');
            Session::flash('alert-class', 'alert-success');
            $request->session()->flash('alert-warning','constantes non modifiées');
            return back();
        }

    }

    public function destroy(Constant $constant)
    {
        $constant->delete();
        return back();
    }
}
