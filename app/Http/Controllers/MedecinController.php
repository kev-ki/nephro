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

    public function index_hospi()
    {
        $patients = Patient::all();
        $patients_hospi = Hospitalisation::where('date_sortie', '>=', date('Y-m-d'))
            ->paginate(7);
        return view('medecin.indexhospitalisation', compact('patients', 'patients_hospi'));
    }

    public function show_hospi($id)
    {
        $hospi = Hospitalisation::find($id);

        return view('medecin.showhospi', compact('hospi'));
    }

    public function search_hospi($req)
    {
        $patients = Patient::all();
        if ($req->option) {
            if ($req->option === 'id'){
                $patients_hospi = Hospitalisation::select('*')->where('id_patient', 'LIKE', '%'.$req->rechercher.'%')
                    ->where('date_sortie', '>=', date('Y-m-d'))
                    ->paginate(6);
            }elseif ($req->option === 'date_entree') {
                $patients_hospi = Hospitalisation::select('*')->where('date_entree', 'LIKE', '%'.$req->rechercher.'%')
                    ->where('date_sortie', '>=', date('Y-m-d'))
                    ->paginate(6);
            }elseif ($req->option === 'date_sortie') {
                $patients_hospi = Hospitalisation::select('*')->where('date_sortie', 'LIKE', '%'.$req->rechercher.'%')
                    ->where('date_sortie', '>=', date('Y-m-d'))
                    ->paginate(6);
            }elseif ($req->option === 'domicile') {
                $patients_hospi = Hospitalisation::select('*')->where('numerochambre', 'LIKE', '%'.$req->rechercher.'%')
                    ->where('date_sortie', '>=', date('Y-m-d'))
                    ->paginate(6);
            }

            if ($patients_hospi)
            {
                return view('medecin.indexhospitalisation', compact('patients', 'patients_hospi'));
            } else{
                Session::flash('message', 'Hospitalision non trouvé.');
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
