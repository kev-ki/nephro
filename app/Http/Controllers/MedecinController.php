<?php

namespace App\Http\Controllers;

use App\Rdv;
use Illuminate\Support\Facades\Session;

class MedecinController extends Controller
{
    public function index()
    {
        $rdv = Rdv::where('medecin',auth()->user()->id)
            ->where('dateRdv', '>=', date('Y-m-d'))
            ->paginate(9);
        $lignes = count($rdv);
        $date = date('Y-m-d');
        $heure = date('H:i:s');

        if ($lignes == null) {
            Session::flash('message', 'Vous n\'avez pas de rendez-vous pour le moment.' );
            Session::flash('alert-class', 'alert-info');
        }

        return view('medecin.rdv', compact('rdv', 'date', 'heure'));
    }
}
