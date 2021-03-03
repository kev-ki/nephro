<?php

namespace App\Http\Controllers;

use App\Activitesocioprofessionnelle;
use App\Communeburkina;
use App\Dossier;
use App\Patient;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SecretController extends Controller
{
    public function index()
    {
        $patient=Patient::orderBy('created_at','desc')->paginate(6);

        return view('secretaire.acceuil',['patient'=>$patient]);
    }
    public function show($id)
    {
        $patient=Patient::where('idpatient',$id)->first();
        $p=Patient::find($id);
        $doc = Dossier::where('id_patient',$p->idpatient)->first();
        $medecin = User::where('id',$doc->medecinresp)->first();
        //die($medecin);
        $villenaissance= Communeburkina::where('code_postal',$p->lieunaissance)->first();
        $villeresidence= Communeburkina::where('code_postal',$p->ville_village)->first();
        $tuteur = Communeburkina::where('code_postal',$p->quartier_secteur_tuteur)->first();
        $profession = Activitesocioprofessionnelle::where('code', $p->profession)->first();
        //die($ville);
        $residence= Communeburkina::where('code_postal',$p->ville_village)->first();

        return view('secretaire.show',['patient'=>$patient,'ville'=>$villenaissance, 'villeresidence'=>$villeresidence, 'dossier'=>$doc, 'tuteur'=>$tuteur, 'medecin'=>$medecin, 'profession'=>$profession,'residence'=>$residence]);
    }

    public function editprofile($id)
    {
        $user = User::find($id);

        return view('secretaire.editprofile', compact('user'));
    }

    public function updateprofile(Request $request, $id)
    {
        $donnees = $request->except('_method', '_token', 'submit');
        $validation =Validator::make($request->all(), [
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validation->fails()) {
            return redirect()->Back()->withInput()->withErrors($validation);
        }
        $user = User::find($id);
        $user->password = Hash::make(Request('password'));

        if ($user->save($donnees)) {
            Session::flash('message', 'Mot de passe mis à jour.');
            Session::flash('alert-class', 'alert-success');

            return redirect()->route('secret.index');
        }else{
            Session::flash('message', 'Modification non effectuer.');
            Session::flash('alert-class', 'alert-danger');
        }

        return Back()->withInput();
    }

    public function search(Request $req)
    {
        if ($req->option) {
            if ($req->option === 'id'){
                $patient = Patient::select('idpatient', 'sexe', 'created_at', 'telephone3')->where('idpatient', 'LIKE', '%'.$req->rechercher.'%')->paginate(6);
            }elseif ($req->option === 'nom') {
                $patient = Patient::select('idpatient', 'sexe', 'created_at', 'telephone3')->where('nom', 'LIKE', '%'.$req->rechercher.'%')->paginate(6);
            }elseif ($req->option === 'prenom') {
                $patient = Patient::select('idpatient', 'sexe', 'created_at', 'telephone3')->where('prenom', 'LIKE', '%'.$req->rechercher.'%')->paginate(6);
            }elseif ($req->option === 'domicile') {
                $patient = Patient::select('idpatient', 'sexe', 'created_at', 'telephone3')->where('telephone2', 'LIKE', '%'.$req->rechercher.'%')->paginate(6);
            }elseif ($req->option === 'cellulaire') {
                $patient = Patient::select('idpatient', 'sexe', 'created_at', 'telephone3')->where('telephone3', 'LIKE', '%'.$req->rechercher.'%')->paginate(6);
            }

            //die($patient);
            if ($patient)
            {
                return view('secretaire.acceuil', compact('patient'));
            } else{
                Session::flash('message', 'Patient non trouvé.');
                Session::flash('alert-class', 'alert-danger');
                return Back();
            }
        }else {
            Session::flash('message', 'Veuillez choisir une option de recherche.');
            Session::flash('alert-class', 'alert-danger');
            return Back();
        }
    }
}
