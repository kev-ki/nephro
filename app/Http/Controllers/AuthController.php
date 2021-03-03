<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response;
Use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
//use Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function postLogin(Request $request)
    {
        request()->validate([
            'pseudo' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('pseudo', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            if (auth() -> user() -> type_user === 1 && auth() -> user() -> status === 'Actif')
            {
                return redirect() -> route('medecin.index');

            }elseif (auth()->user()->type_user === 2 && auth() -> user() -> status === 'Actif')
            {
                return redirect()-> route('infirmier.index');

            }elseif (auth()->user()->type_user === 3 && auth() -> user() -> status === 'Actif')
            {
                return redirect()-> route('secret.index');
            }elseif(auth()->user()->type_user === 0 && auth() -> user() -> status === 'Actif')
            {
                return redirect() -> route('admin.acceuil');

            }
        }
        Session::flash('message', 'Utilisateur non trouvé. Veuillez verifier vos identifiants SVP!');
        Session::flash('alert-class', 'alert-danger');
        return back();
        //return Redirect::to("login")->withSuccess('Oppes! données saisies incorrectes.');
    }

    public function postRegister(Request $request)
    {
        request()->validate([
            'name' => ['required', 'string', 'max:30'],
            'prenom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'status' => ['required'],
            'telephone' => ['required','string', 'min:8', 'max:12'],
            'type_user' => ['required'],
        ]);

        $data = $request->all();

        $check = $this->create($data);

        return Redirect::to("login");
    }

   /* public function dashboard()
    {

        if(Auth::check()){
            return view('dashboard');
        }
        return Redirect::to("login")->withSuccess('Opps! You do not have access');
    }*/

    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'prenom' => $data['prenom'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'status' => $data['status'],
            'type_user' => $data['type_user'],
            'telephone' => $data['telephone'],
            'chefservice' => $data['chefservice'],
        ]);
    }

    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}
