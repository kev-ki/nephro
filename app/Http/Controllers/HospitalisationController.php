<?php

namespace App\Http\Controllers;

use App\Hospitalisation;
use App\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class HospitalisationController extends Controller
{
    public function index()
    {
        $patients = Patient::all();
        $patients_hospi = Hospitalisation::where('date_sortie', '>=', date('Y-m-d'))
            ->paginate(7);

        if (auth()->user()->type_user === 2)
        {
            return view('infirmier.indexhospitalisation', compact('patients', 'patients_hospi'));
        }elseif (auth()->user()->type_user === 1)
        {
            return view('medecin.annuaire_hospitalisation', compact('patients', 'patients_hospi'));
        }
    }

    public function create()
    {
        $hospi = Hospitalisation::all();
        $patient = Patient::all();

        return view('hospitalisation.create', compact('patient', 'hospi'));
    }

    public function store(Request $request)
    {
        $donnees = $request->except('_method', '_token', 'submit');
        $validation = Validator::make($request->all(), [
            'modeentree' => 'required',
            'diagnosticEntree' => 'required',
            'dateEntree' => 'required | date',
            'diagnosticSecondaire' => 'required',
            'diagnosticPrincipale' => 'required',
            'numerolit' => 'required',
            'numerosalle' => 'required',
        ]);

        if ($validation->fails()) {
            return redirect()->Back()->withInput()->withErrors($validation);
        }

        $hospitalisation= Hospitalisation::where('id_patient', $request->patientid)->first();

        $hospitalisation->numerochambre=$request->numerosalle;
        $hospitalisation->numerolit=$request->numerolit;
        $hospitalisation->diagnosticPrincipale=$request->diagnosticPrincipale;
        $hospitalisation->diagnosticSecondaire=$request->diagnosticSecondaire;
        $hospitalisation->diagnosticAssocie=$request->diagnosticAssocie;
        $hospitalisation->diagnosticEntree=$request->diagnosticEntree;
        $hospitalisation->diagnosticSortie=$request->diagnosticSortie;
        $hospitalisation->date_entree = $request->dateEntree;
        $hospitalisation->date_sortie=$request->dateSortie;
        $hospitalisation->motif_hospitalisation=$request->motifhospitalisation;
        $hospitalisation->mode_entree=$request->modeentree;
        $hospitalisation->mode_sortie=$request->modesortie;

        if ($hospitalisation->save($donnees))
        {
            Session::flash('message', "Données d'hospitalisation du patient enregistrées!");
            Session::flash('alert-class', 'alert-success');

            return back();
        }
        else{
            Session::flash('message', "Erreur!! Données d'hospitalisation du patient non enregistrée!");
            Session::flash('alert-class', 'alert-danger');

            return back();
        }
    }

    public function show($id)
    {
        $hospitalisation= Hospitalisation::find($id);
        $patient = Patient::where('idpatient', $hospitalisation->id_patient)
            ->first();

        if (auth()->user()->type_user === 1)
        {
            return view('medecin.show_hospitalisation', compact('hospitalisation', 'patient'));
        }
        if (auth()->user()->type_user === 2)
        {
            return view('hospitalisation.show', compact('hospitalisation', 'patient'));
        }

    }

    public function search(Request $req)
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
                if (auth()->user()->type_user === 2)
                {
                    return view('infirmier.indexhospitalisation', compact('patients', 'patients_hospi'));
                }
                if (auth()->user()->type_user === 1)
                {
                    return view('medecin.annuaire_hospitalisation', compact('patients', 'patients_hospi'));
                }
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

    public function edit($id)
    {
        $hospitalisation= Hospitalisation::find($id);
        $hospi_all = Hospitalisation::all();
        $patients = Patient::all();
        $patient = Patient::find($hospitalisation->id_patient);

        if (auth()->user()->type_user === 2)
        {
            return view('hospitalisation.edit',compact('hospitalisation', 'hospi_all', 'patients', 'patient'));
        }
        if (auth()->user()->type_user === 1)
        {
            return view('medecin.edit_hospitalisation',compact('hospitalisation', 'hospi_all', 'patients', 'patient'));
        }
    }

    public function update(Request $request, $id)
    {
        $donnees = $request->except('_method', '_token', 'submit');
        $validation = Validator::make($request->all(), [
            'mode_entree' => 'required',
            'diagnosticEntree' => 'required',
            'date_entree' => 'required | date',
            'diagnosticSecondaire' => 'required',
            'diagnosticPrincipale' => 'required',
            'numerolit' => 'required',
            'numerochambre' => 'required',
        ]);
        if ($validation->fails()) {
            return redirect()->Back()->withInput()->withErrors($validation);
        }

        $hospitalisation= Hospitalisation::find($id);

        //$hospitalisation->id_patient=$request->id_patient;
        $hospitalisation->numerochambre=$request->numerochambre;
        $hospitalisation->numerolit=$request->numerolit;
        $hospitalisation->diagnosticPrincipale=$request->diagnosticPrincipale;
        $hospitalisation->diagnosticSecondaire=$request->diagnosticSecondaire;
        $hospitalisation->diagnosticAssocie=$request->diagnosticAssocie;
        $hospitalisation->diagnosticEntree=$request->diagnosticEntree;
        $hospitalisation->diagnosticSortie=$request->diagnosticSortie;
        $hospitalisation->date_entree = $request->date_entree;
        $hospitalisation->date_sortie=$request->date_sortie;
        //$hospitalisation->motif_hospitalisation=$request->motifhospitalisation;
        $hospitalisation->mode_entree=$request->mode_entree;
        $hospitalisation->mode_sortie=$request->mode_sortie;

        if ($hospitalisation->save($donnees))
        {
            Session::flash('message', "Données d'hospitalisation du patient mise à jour!");
            Session::flash('alert-class', 'alert-success');

            if (auth()->user()->type_user === 2) {
                return redirect()->route('hospitalisation.show', $hospitalisation->id);
            }
            if (auth()->user()->type_user === 1) {
                return redirect()->route('hospitalisation.show', $hospitalisation->id);
            }
        }
        else{
            Session::flash('message', "Mise à jour non effectuée!");
            Session::flash('alert-class', 'alert-danger');
            return back();
        }
    }

    public function destroy($id)
    {
        $hospitalisation= Hospitalisation::find($id);
        $hospitalisation->delete();
        return back();
    }
}
