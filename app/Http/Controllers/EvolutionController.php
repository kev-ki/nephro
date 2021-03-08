<?php

namespace App\Http\Controllers;

use App\Consultation;
use App\Evolution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class EvolutionController extends Controller
{
    public function index()
    {
        return view('evolution.index');
    }

    public function liste_evolution($id)
    {
        $donnees =  Evolution::where('id_consultation', $id)
            ->paginate(7);

        return view('evolution.index', compact('donnees'));
    }

    public function create()
    {
        return view('evolution.create');
    }

    public function store(Request $request)
    {
        $validation =Validator::make($request->all(), [
            /*'date' => ['required', 'date'],*/
            'evolution' => ['required'],
        ]);
        if ($validation->fails()) {
            return redirect()->Back()->withInput()->withErrors($validation);
        }

        $evolution= new Evolution();
        $evolution->date= $request->date('Y-m-d');
        $evolution->infos_evolution= $request->evolution;

        /*$consult = Consultation::where('id', Session::get('idconsultation'))->first();
        $evolution->id_consultation = $consult;*/

        if ($evolution->save())
        {
            $consult = Consultation::where('id', Session::get('idconsultation'))->first();
            $consult->id_evolution = $evolution->id;
            $consult->update();
            Session::flash('message', 'informations évolution enregistrées.');
            Session::flash('alert-class', 'alert-success');

            return back();
        }
        else{
            Session::flash('message', 'Verifier tous les champs SVP!');
            Session::flash('alert-class', 'alert-danger');

            return back();
        }
    }

    public function show(Evolution $evolution)
    {
        return view('evolution.show',['evolution'=>$evolution]);
    }

    public function edit(Evolution $evolution)
    {
        return view('evolution.edit',['evolution'=>$evolution]);
    }

    public function update(Request $request, Evolution $evolution)
    {
        /*evolution->date= $request->date;
        $evolution->evolution=$request->evolution;*/

        if ($evolution->update())
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

    public function destroy(Evolution $evolution)
    {
        $evolution->delete();
        return back();
    }
}
