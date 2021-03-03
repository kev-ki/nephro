<?php

namespace App\Http\Controllers;

use App\AutreResultat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AutreResultatController extends Controller
{
    public function index()
    {
        $autreResultat=AutreResultat::all();
        return view('autreResultat.index',['autreResultat'=>$autreResultat]);
    }

    public function create()
    {
        return view('autreResultat.create');
    }

    public function store(Request $request)
    {
        $autreResultat=new AutreResultat();
        $autreResultat->nom=$request->nom;
        $autreResultat->resultat=$request->resultat;

        if ($autreResultat->save())
        {
            Session::flash('message', 'informations enregistrées.');
            Session::flash('alert-class', 'alert-danger');
            return back();
        }
        else{
            Session::flash('message', 'Verifier tous les champs SVP!');
            Session::flash('alert-class', 'alert-danger');

            return back();
        }
    }

    public function show(AutreResultat $autreResultat)
    {
        return view('autreResultat.show',['autreResultat0=>$autreResultat']);
    }

    public function edit(AutreResultat $autreResultat)
    {
        return view('autreResultat.edit',['autreResultat0=>$autreResultat']);
    }

    public function update(Request $request, AutreResultat $autreResultat)
    {
        $autreResultat->nom=$request->nom;
        $autreResultat->resultat=$request->resultat;

        if ($autreResultat->save())
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

    public function destroy(AutreResultat $autreResultat)
    {
        $autreResultat->delete();
        return back();
    }
}
