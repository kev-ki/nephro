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

        if (auth()->user()->type_user === 1) {
            return view('medecin.rdv_index',compact('rdv','users', 'date', 'heure'));
        }elseif (auth()->user()->type_user === 3) {
            return view('secretaire.index',compact('rdv','users', 'date', 'heure'));
        }
    }

    public function create()
    {   $medecin = User::where('type_user','1')->where('status','1')->get();
        $patient = Patient::all();

        if (auth()->user()->type_user === 1) {
            return view('medecin.rdv_create',['liste_medecin' => $medecin,'liste_patient' => $patient]);
        }elseif (auth()->user()->type_user === 3) {
            return view('secretaire.create',['liste_medecin' => $medecin,'liste_patient' => $patient]);
        }
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

        $rdv = Rdv::all();

        //die(Request('medecin'));

        if (!$validation->fails())
        {
            $i=0;
            if (Request('date_rendezvous') < date('Y-m-d')) {
                Session::flash('message', 'Veuillez renseigner une date valide. SVP!');
                Session::flash('alert-class', 'alert-danger');

                return back();
            }else {
                if (Request('date_rendezvous') === date('Y-m-d')) {
                    if (Request('heure_rendezvous') > date('H:i:s')) {
                        foreach ($rdv as $value) {
                            if ($value->dateRdv === Request('date_rendezvous')) {
                                if ($value->medecin == Request('medecin')) {
                                    $h1 = strtotime($value->heureRdv);
                                    $h2 = strtotime(Request('heure_rendezvous'));
                                    //dd($h1);
                                    if ($h1 == $h2) {
                                        $i = 1;
                                    }
                                }
                            }
                        }
                        if ($i === 0) {
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

                            if ($data->save($donnees)) {
                                Session::flash('message', 'Rendez-Vous enregistrer.');
                                Session::flash('alert-class', 'alert-success');

                                if (auth()->user()->type_user === 1) {
                                    return redirect()->route('medecin.rdv');
                                }elseif (auth()->user()->type_user === 3) {
                                    return redirect()->route('rdv.index');
                                }
                            }
                        }else {
                            Session::flash('message', 'Le/La docteur à un rendez-vous de prévu à la date et l\'heure demandée.');
                            Session::flash('alert-class', 'alert-danger');
                            return back();
                        }
                    }else {
                        Session::flash('message', 'Veuillez verifier l\'heure du rendez-vous.');
                        Session::flash('alert-class', 'alert-danger');
                        return back();
                    }
                }else{
                    if (Request('date_rendezvous') > date('Y-m-d')) {

                        foreach ($rdv as $value)
                        {
                            if ($value->dateRdv === Request('date_rendezvous')) {
                                if ($value->medecin == Request('medecin')) {
                                    $h1 = strtotime($value->heureRdv);
                                    $h2 = strtotime(Request('heure_rendezvous'));
                                    //dd($h1);
                                    if ($h1 == $h2) {
                                        $i = 1;
                                    }
                                }
                            }
                        }

                        if ($i == 0) {
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

                            if ($data->save($donnees)) {
                                Session::flash('message', 'Rendez-Vous enregistrer.');
                                Session::flash('alert-class', 'alert-success');

                                if (auth()->user()->type_user === 1) {
                                    return redirect()->route('medecin.rdv');
                                }elseif (auth()->user()->type_user === 3) {
                                    return redirect()->route('rdv.index');
                                }
                            }
                        }else {
                            Session::flash('message', 'Le/La docteur à un rendez-vous de prévu à la date l\'heure demandée.');
                            Session::flash('alert-class', 'alert-danger');
                            return back();
                        }
                    }
                }
            }
        }else {
            Session::flash('message', 'Veuillez renseigner tous champs.');
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

        if (auth()->user()->type_user === 1) {
            return view('medecin.rdv_edit',['rdv'=>$rendezvous,'medecin_liste'=>$medecinliste, 'liste_patient'=>$patient]);
        }elseif (auth()->user()->type_user === 3) {
            return view('secretaire.edit',['rdv'=>$rendezvous,'medecin_liste'=>$medecinliste, 'liste_patient'=>$patient]);
        }
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

        $data = Rdv::find($id);
        //die($data);

        if ($data->update($donnees))
        {
            Session::flash('message', 'Rendez-Vous modifier.');
            Session::flash('alert-class', 'alert-success');

            if (auth()->user()->type_user === 1) {
                return redirect()->route('medecin.rdv');
            }elseif (auth()->user()->type_user === 3) {
                return redirect()->route('rdv.index');
            }
        }
        else{
            Session::flash('message', 'Modifications non effectué.');
            Session::flash('alert-class', 'alert-warning');
            return back();
        }

    }

    public function destroy($id)
    {
        $suppr = Rdv::destroy($id);

        if ($suppr) {
            Session::flash('message', 'Rendez-Vous supprimer.');
            Session::flash('alert-class', 'alert-success');
            return back();
        }
    }
}
