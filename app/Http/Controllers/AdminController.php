<?php

namespace App\Http\Controllers;

use App\Dossier;
use App\Patient;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class AdminController extends Controller
{
    public function index()

    {
        $user = User::paginate(6);

        /*return view('admin.index',['user'=>$user]);*/
        return view('admin.index', compact('user'));
    }

    public function acceuil() {

        $doc = Dossier::count();
        $patient = Patient::count();
        $user = User::count();
        return view('admin.acceuil', compact('user', 'doc', 'patient'));
    }

    public function create()
    {
        $user = new User();
        return view('admin.create', compact('user'));
    }

    public function store(Request $request)
    {
        $donnees = $request->except('_method', '_token', 'submit', '');
        $validation =Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'pseudo' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'telephone' => ['required','string', 'min:8', 'max:12'],
            'type_user' => ['required'],
            'statut' => ['required'],
            'chefservice' => ['required'],
        ]);

        if ($validation->fails()) {
            return redirect()->Back()->withInput()->withErrors($validation);
        }

        if (User::where('email', Request('email'))->count() >0) {
            $request->session()->flash('alert-danger','l\'email existe déjà' );
            return back();
        }
        else
        {
            $user= new User();

            $user-> name = Request('name');
            $user-> prenom = Request('prenom');
            $user-> pseudo = Request('pseudo');
            $user-> email = Request('email');;
            $user-> password = Hash::make(Request('password'));
            $user-> status = Request('statut');
            $user-> type_user = Request('type_user');
            $user-> chefservice = Request('chefservice');
            $user-> telephone = Request('telephone');

            if ($user->save())
            {
                Session::flash('message', 'Utilisateur enregistré.');
                Session::flash('alert-class', 'alert-success');
                return back();
            }
            else{
                Session::flash('message', 'Utilisateur non enregistré.');
                Session::flash('alert-class', 'alert-danger');
                return back();
            }
        }


    }

    public function show(User $user)
    {
        return view('admin.show', compact('user'));
    }

    public function edit($id) {
        $user = User::find($id);

        return view('admin.edit', compact('user'));
    }

    public function updateuser(Request $request, $id)
    {
        $donnees = $request->except('_method', '_token', 'submit', '');
        $validation =Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'pseudo' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'telephone' => ['required','string', 'min:8', 'max:12'],
            'type_user' => ['required'],
            'statut' => ['required'],
            'chefservice' => ['required'],
        ]);
        if ($validation->fails()) {
            return redirect()->Back()->withInput()->withErrors($validation);
        }

        $user = User::find($id);
        $user-> name = Request('name');
        $user-> prenom = Request('prenom');
        $user-> pseudo = Request('pseudo');
        $user-> email = Request('email');;
        $user-> password = Hash::make($request->password);
        $user-> status = Request('statut');
        $user-> type_user = Request('type_user');
        $user-> chefservice = Request('chefservice');
        $user-> telephone = Request('telephone');

        if ($user->save($donnees)) {
            Session::flash('message', 'Modification effectuer.');
            Session::flash('alert-class', 'alert-success');
            if (auth()->user()->type_user == 0){
                return redirect()->route('admin.index');
            }
        }else{
            Session::flash('message', 'Modification non effectuer.');
            Session::flash('alert-class', 'alert-danger');
        }
        return Back()->withInput();
    }

    public function update(Request $request, $id)
    {
        $donnees = $request->except('_method', '_token', 'submit', '');

        $user = User::find($id);

        if ($user-> status == 1){
            Session::flash('message', 'Compter bloqué.');
            Session::flash('alert-class', 'alert-success');
            $user-> status = 0;
            $user->update($donnees);
            return back()->withInput();
        }else{
            Session::flash('message', 'Compter activé.');
            Session::flash('alert-class', 'alert-success');
            $user-> status = 1;
            $user->update($donnees);
            return back()->withInput();
        }

        if (!($user->update($donnees))) {
            Session::flash('message', 'Modification non effectuer.');
            Session::flash('alert-class', 'alert-danger');
        }

        return redirect()->route('admin.index');
    }

    public function editprofile($id)
    {
        $user = User::find($id);

        return view('admin.editprofile', compact('user'));
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
            if (auth()->user()->type_user == 0){
                return redirect()->route('admin.index');
            }
        }else{
            Session::flash('message', 'Modification non effectuer.');
            Session::flash('alert-class', 'alert-danger');
        }

        return Back()->withInput();
    }

    public function resetpasswd(Request $request, $id)
    {
       $donnees = $request->except('_method', '_token', 'submit');
        $user = User::find($id);

        $user->password = Hash::make($user->email);

        if ($user->save($donnees)) {
            Session::flash('message', 'Mot de passe réeinitialisé.');
            Session::flash('alert-class', 'alert-success');
        }else{
            Session::flash('message', 'Mot de passe non réeinitialisé.');
            Session::flash('alert-class', 'alert-danger');
        }

        return redirect()->route('admin.index');
    }

    public function activer_desactiver(Request $request, $id)
    {
        $donnees = $request->except('_method', '_token', 'submit');
        $user = User::find($id);

        //die($user->status);

        if ($user->status == 'Bloqué')
        {
            $user->status = 1;

            $user->update($donnees);
            Session::flash('message', 'Compte activé.');
            Session::flash('alert-class', 'alert-success');

            return redirect()->route('admin.index');
        }elseif ($user->status == 'Actif'){

            $user->status = 0;

            $user->save($donnees);
            Session::flash('message', 'Compte bloqué.');
            Session::flash('alert-class', 'alert-success');

            return redirect()->route('admin.index');
        }

        Session::flash('message', 'Modification non effectué.');
        Session::flash('alert-class', 'alert-danger');
        return redirect()->route('admin.index');
    }
}
