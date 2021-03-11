<?php

namespace App\Http\Controllers;

use App\Hospitalisation;
use App\Patient;
use App\Rdv;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MedecinController extends Controller
{
    public function index()
    {
        $rdv = Rdv::where('medecin',auth()->user()->id)->paginate(7);
        $date = date('Y-m-d');
        $heure = date('H:i:s');

        return view('medecin.rdv', compact('rdv', 'date', 'heure'));
    }
}
