<?php

namespace App\Http\Controllers;

use App\Patient;
use App\Rdv;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class RdvController extends Controller
{
    public function index()
    {
        $rdv = Rdv::where('dateRdv','>=',date('Y-m-d'))->paginate(6);
        $users = User::where('type_user',1)->get();
        $date = date('Y-m-d');
        $heure = date('H:i:s');
        //die($heure);

        return view('secretaire.index',compact('rdv','users', 'date', 'heure'));
    }

    public function create()
    {   $medecin = User::where('type_user','1')->where('status','1')->get();
        $patient = Patient::all();

        return view('secretaire.create',['liste_medecin' => $medecin,'liste_patient' => $patient]);
    }

    public function store(Request $request)
    {
        $donnees = $request->except('_method', '_token', 'submit');

        $validation = Validator::make($request->all(), [
            'id_patient' => 'required',
            'nom' => 'required|min:2|max:50',
            'prenom' => 'required|min:3|max:255',
            'date_rendezvous' => 'required|date',
            'heure_rendezvous' => 'required',
            'telephone' => 'required|min:8|max:12',
            'medecin' => 'required',
            'motif' => 'required',
        ]);

        if ($validation->fails()) {
            return redirect()->Back()->withInput()->withErrors($validation);
        }

        if (Request('date_rendezvous') && Request('heure_rendezvous'))
        {
            if (Request('date_rendezvous') === date('Y-m-d')) {
                if (Request('heure_rendezvous') >= date('H:i:s')) {
                    $data = new Rdv();

                    $data->id_patient =Request('id_patient');
                    $data->nom =Request('nom');
                    $data->prenom =Request('prenom');
                    $data->dateRdv =Request('date_rendezvous');
                    $data->medecin = Request('medecin');
                    $data->heureRdv =Request('heure_rendezvous');
                    $data->motif = Request('motif');
                    $data->telephone =Request('telephone');
                    $data->iduser = auth()->user()->id;

                    //die($data);

                    if ($data->save($donnees)) {
                        Session::flash('message', 'Rendez-Vous enregistrer.');
                        Session::flash('alert-class', 'alert-success');

                        return back();
                    }else{
                        Session::flash('message', 'Rendez-Vous non enregistrer.');
                        Session::flash('alert-class', 'alert-danger');
                        return back();
                    }

                    return Back();
                }else {
                    Session::flash('message', 'Veuillez verifier l\'heure du rendez-vous.');
                    Session::flash('alert-class', 'alert-danger');
                    return back();
                }
            }else{
                if (Request('date_rendezvous') > date('Y-m-d')) {
                    $data = new Rdv();

                    $data->id_patient =Request('id_patient');
                    $data->nom =Request('nom');
                    $data->prenom =Request('prenom');
                    $data->dateRdv =Request('date_rendezvous');
                    $data->medecin = Request('medecin');
                    $data->heureRdv =Request('heure_rendezvous');
                    $data->motif = Request('motif');
                    $data->telephone =Request('telephone');
                    $data->iduser = auth()->user()->id;

                    //die($data);

                    if ($data->save($donnees)) {
                        Session::flash('message', 'Rendez-Vous enregistrer.');
                        Session::flash('alert-class', 'alert-success');

                        return back();
                    }else{
                        Session::flash('message', 'Rendez-Vous non enregistrer.');
                        Session::flash('alert-class', 'alert-danger');
                    }

                    return Back();
                }else {
                    Session::flash('message', 'Veuillez verifier la date du rendez-vous.');
                    Session::flash('alert-class', 'alert-danger');
                    return back();
                }
            }
        }else {
            Session::flash('message', 'Veuillez renseigner tous les champs.');
            Session::flash('alert-class', 'alert-danger');
            return back();
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {   $rendezvous = Rdv::find($id);
        $medecinliste = User::where('type_user','1')->where('status','1')->get();
        $patient = Patient::all();

        return view('secretaire.edit',['rdv'=>$rendezvous,'medecin_liste'=>$medecinliste, 'liste_patient'=>$patient]);
    }

    public function update(Request $request, $id)
    {
        $donnees = $request->except('_method', '_token', 'submit');

        $validation = Validator::make($request->all(), [
            'id_patient' => 'required',
            'nom' => 'required|min:2|max:50',
            'prenom' => 'required|min:3|max:255',
            'daterdv' => 'required|date',
            'heurerdv' => 'required',
            'telephone' => 'required|min:8|max:12',
            'medecin' => 'required',
            'motif' => 'required',
        ]);

        if ($validation->fails()) {
            return redirect()->Back()->withInput()->withErrors($validation);
        }

        /*if ((Request('date_rendezvous') < date('Y-m-d'))) {
            Session::flash('message', 'Veuillez verifier la date et l\'heure du rendez-vous.');
            Session::flash('alert-class', 'alert-danger');
            return back();
        }*/

        $data = Rdv::find($id);
        //die($data);

        if ($data->update($donnees))
        {
            Session::flash('message', 'Rendez-Vous modifier.');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('rdv.index');
        }
        else{
            Session::flash('message', 'Modifications non effectué.');
            Session::flash('alert-class', 'alert-warning');
            return back();
        }

    }

    /*public function destroy($id)
    {
        $delete = Rdv::find($id);

        if ($delete->delete()) {
            Session::flash('message', 'Rendez-Vous supprimer.');
            Session::flash('alert-class', 'alert-success');
            return back();
        }else{
            Session::flash('message', 'Suppression non effectué.');
            Session::flash('alert-class', 'alert-warning');
            return back();
        }
    }*/
}
