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
        return view('infirmier.indexhospitalisation', compact('patients', 'patients_hospi'));
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
            'nomjf' => 'string|min:2|max:50',
            'piecepatient' => 'required',
            'identite' => 'required|string|min:3',
            'sexualite' => 'required',
            'ethnie' => 'required|string',
            'profession' => 'required|string',
            'culte' => 'required|string',
            'assurance' => 'string',
            'type_assurance' => 'string',
            'sit_matrimoniale' => 'required|string',
            'enfant1' => 'required|integer',
            'enfant2' => 'required|integer',
            'telephone1' => 'required|string|min:8|max:12',
            'telephone2' => 'required',
            'telephone3' => 'required',
            'diagnostiqueSecondaire' => 'required',
            'diagnostiquePrincipale' => 'required',
            'numerolit' => 'required',
            'numerosalle' => 'required',
        ]);

        if ($validation->fails()) {
            return redirect()->Back()->withInput()->withErrors($validation);
        }

        $hospitalisation= Hospitalisation::where('id_patient', $request->patientid)->first();

        $hospitalisation->numerochambre=$request->numerosalle;
        $hospitalisation->numerolit=$request->numerolit;
        //$hospitalisation->id_patient=$request->patientid;
        $hospitalisation->diagnosticPrincipale=$request->diagnostiquePrincipale;
        $hospitalisation->diagnosticSecondaire=$request->diagnostiqueSecondaire;
        $hospitalisation->diagnosticAssocie=$request->diagnostiqueAssocie;
        $hospitalisation->diagnosticEntree=$request->diagnostiqueEntre;
        $hospitalisation->diagnosticSortie=$request->diagnostiqueSortie;
        $hospitalisation->date_entree = $request->dateEntre;
        $hospitalisation->date_sortie=$request->dateSortie;
        $hospitalisation->motif_hospitalisation=$request->motifhospitalisation;
        $hospitalisation->mode_entree=$request->modeentre;
        $hospitalisation->mode_sortie=$request->modesortie;

        if ($hospitalisation->save())
        {
            $request->session()->flash('alert-succes','hospitalisation enregistrée avec succès');
            return back();
        }
        else{
            $request->session()->flash('alert-warning','hospitalisation non enregistrée');
            return back();
        }
    }

    public function show($id)
    {
        $hospitalisation=Hospitalisation::find($id);
        return view('hospitalisation.show',['hospitalisation'=>$hospitalisation]);
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
                return view('infirmier.indexhospitalisation', compact('patients', 'patients_hospi'));
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
        $hospitalisation=Hospitalisation::find($id);
        return view('hospitalisation.edit',['hospitalisation'=>$hospitalisation]);
    }

    public function update(Request $request, $id)
    {
        $hospitalisation=Hospitalisation::find($id);

        $hospitalisation->numerochambre=$request->numerosalle;
        $hospitalisation->numerolit=$request->numerolit;
        $hospitalisation->diagnosticPrincipale=$request->diagnostiquePrincipale;
        $hospitalisation->diagnosticSecondaire=$request->diagnostiqueSecondaire;
        $hospitalisation->diagnosticAssocie=$request->diagnostiqueAssocie;
        $hospitalisation->diagnosticEntree=$request->diagnostiqueEntre;
        $hospitalisation->diagnosticSortie=$request->diagnostiqueSortie;
        $hospitalisation->date_entree = $request->dateEntre;
        $hospitalisation->date_sortie=$request->dateSortie;
        $hospitalisation->motif_hospitalisation=$request->motifhospitalisation;
        $hospitalisation->mode_entree=$request->modeentre;
        $hospitalisation->mode_sortie=$request->modesortie;

        if ($hospitalisation->save())
        {
            $request->session()->flash('alert-succes','hospitalisation enregistrée avec succès');
            return back();
        }
        else{
            $request->session()->flash('alert-warning','hospitalisation non enregistrée');
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
