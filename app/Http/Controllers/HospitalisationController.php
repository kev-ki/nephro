<?php

namespace App\Http\Controllers;

use App\Chambre;
use App\Hospitalisation;
use App\Lit;
use App\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class HospitalisationController extends Controller
{
    public function index()
    {
        $patients = Patient::all();
        $patients_hospi = Hospitalisation::orderBy('created_at', 'desc')
            ->where('numerochambre', '!=', null)
            ->where('numerolit', '!=', null)
            ->paginate(7);

        if (auth()->user()->type_user === 2)
        {
            return view('infirmier.indexhospitalisation', compact('patients', 'patients_hospi'));
        }elseif (auth()->user()->type_user === 1)
        {
            return view('medecin.annuaire_hospitalisation', compact('patients', 'patients_hospi'));
        }
    }

    public function faire_hospitaliser()
    {
        $patients = Patient::all();
        $patients_hospi = Hospitalisation::orderBy('created_at', 'desc')
            ->where('numerochambre', null)
            ->where('numerolit', null)
            ->paginate(8);

        if (auth()->user()->type_user === 1){
            return view('medecin.attente_hospitalisation', compact('patients', 'patients_hospi'));
        }elseif (auth()->user()->type_user === 2) {
            return view('infirmier.faire_hospitaliser', compact('patients', 'patients_hospi'));
        }
    }

    public function create()
    {
        $hospi = Hospitalisation::all();
        $patient = Patient::all();
        $chambres = Chambre::where('etat_occupation', 0)->get();
        $lits = Lit::where('etat_occupation', 0)->get();

        return view('hospitalisation.create', compact('patient', 'hospi', 'chambres', 'lits'));
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
            /*'numerolit' => 'required',
            'numerosalle' => 'required',*/
        ]);

        if ($validation->fails()) {
            Session::flash('message', "Renseignez tous les champs SVP!!");
            Session::flash('alert-class', 'alert-danger');
            return redirect()->Back()->withInput()->withErrors($validation);
        }

        $hospitalisation= Hospitalisation::where('id_patient', $request->patientid)->first();

        $hospitalisation->numerochambre=$request->numerosalle;
        if ($request->numerolit == 1) {
            $lit = Lit::where('numlit', 1)->first();
            $chambre = Chambre::where('numch', 'ChA')->first();
            $lit->etat_occupation = 1;
            $chambre->etat_occupation = 1;

            $lit->save(); $chambre->save();
        }elseif ($request->numerolit == 2) {
            $lit = Lit::where('numlit', 2)->first();
            $lit->etat_occupation = 1;$lit->save();

        }elseif ($request->numerolit == 3) {
            $lit = Lit::where('numlit', 3)->first();
            $lit->etat_occupation = 1;$lit->save();

        }elseif ($request->numerolit == 4) {
            $lit = Lit::where('numlit', 4)->first();
            $lit->etat_occupation = 1;$lit->save();

        }elseif ($request->numerolit == 5) {
            $lit = Lit::where('numlit', 5)->first();
            $lit->etat_occupation = 1;$lit->save();

        }elseif ($request->numerolit == 6) {
            $lit = Lit::where('numlit', 6)->first();
            $lit->etat_occupation = 1;$lit->save();

        }elseif ($request->numerolit == 7) {
            $lit = Lit::where('numlit', 7)->first();
            $lit->etat_occupation = 1;$lit->save();

        }elseif ($request->numerolit == 8) {
            $lit = Lit::where('numlit', 8)->first();
            $lit->etat_occupation = 1;$lit->save();

        }elseif ($request->numerolit == 9) {
            $lit = Lit::where('numlit', 9)->first();
            $lit->etat_occupation = 1;$lit->save();

        }elseif ($request->numerolit == 10) {
            $lit = Lit::where('numlit', 10)->first();
            $lit->etat_occupation = 1;$lit->save();

        }elseif ($request->numerolit == 11) {
            $lit = Lit::where('numlit', 11)->first();
            $lit->etat_occupation = 1;$lit->save();

        }elseif ($request->numerolit == 12) {
            $lit = Lit::where('numlit', 12)->first();
            $lit->etat_occupation = 1;$lit->save();

        }elseif ($request->numerolit == 13) {
            $lit = Lit::where('numlit', 13)->first();
            $lit->etat_occupation = 1;$lit->save();

        }elseif ($request->numerolit == 14) {
            $lit = Lit::where('numlit', 14)->first();
            $lit->etat_occupation = 1;$lit->save();

        }elseif ($request->numerolit == 15) {
            $lit = Lit::where('numlit', 15)->first();
            $lit->etat_occupation = 1;$lit->save();

        }

        $lit2 =Lit::where('numlit', 2)->where('etat_occupation', 1)->first();
        $lit3 =Lit::where('numlit', 3)->where('etat_occupation', 1)->first();
        if ($lit2 && $lit3) {
            $chambre = Chambre::where('numch', 'ChB')->first();
            $chambre->etat_occupation = 1;
            $chambre->save();
        }

        $lit4 =Lit::where('numlit', 4)->where('etat_occupation', 1)->first();
        $lit5 =Lit::where('numlit', 5)->where('etat_occupation', 1)->first();
        if ($lit4 && $lit5) {
            $chambre = Chambre::where('numch', 'ChC')->first();
            $chambre->etat_occupation = 1;
            $chambre->save();
        }

        $lit6 =Lit::where('numlit', 6)->where('etat_occupation', 1)->first();
        $lit7 =Lit::where('numlit', 7)->where('etat_occupation', 1)->first();
        if ($lit6 && $lit7) {
            $chambre = Chambre::where('numch', 'ChD')->first();
            $chambre->etat_occupation = 1;
            $chambre->save();
        }

        $lit8 =Lit::where('numlit', 8)->where('etat_occupation', 1)->first();
        $lit9 =Lit::where('numlit', 9)->where('etat_occupation', 1)->first();
        $lit10 =Lit::where('numlit', 10)->where('etat_occupation', 1)->first();
        $lit11 =Lit::where('numlit', 11)->where('etat_occupation', 1)->first();
        if ($lit8 && $lit9 && $lit10 && $lit11) {
            $chambre = Chambre::where('numch', 'ChE')->first();
            $chambre->etat_occupation = 1;
            $chambre->save();
        }

        $lit12 =Lit::where('numlit', 12)->where('etat_occupation', 1)->first();
        $lit13 =Lit::where('numlit', 13)->where('etat_occupation', 1)->first();
        $lit14 =Lit::where('numlit', 14)->where('etat_occupation', 1)->first();
        $lit15 =Lit::where('numlit', 15)->where('etat_occupation', 1)->first();
        if ($lit12 && $lit13 && $lit14 && $lit15) {
            $chambre = Chambre::where('numch', 'ChF')->first();
            $chambre->etat_occupation = 1;
            $chambre->save();
        }

        $hospitalisation->numerolit=$request->numerolit;
        $hospitalisation->diagnosticPrincipale=$request->diagnosticPrincipale;
        $hospitalisation->diagnosticSecondaire=$request->diagnosticSecondaire;
        $hospitalisation->diagnosticAssocie=$request->diagnosticAssocie;
        $hospitalisation->diagnosticEntree=$request->diagnosticEntree;
        $hospitalisation->diagnosticSortie=$request->diagnosticSortie;

        if ($request->dateEntree > date('Y-m-d')) {
            Session::flash('message', "Entrez une date valide SVP! Merci");
            Session::flash('alert-class', 'alert-danger');

            return back();
        }else{
            $hospitalisation->date_entree = $request->dateEntree;
        }

        if ($request->dateSortie <= date('Y-m-d')) {
            Session::flash('message', "Entrez une date de sortie valide SVP! Merci");
            Session::flash('alert-class', 'alert-danger');

            return back();
        }else{
            $hospitalisation->date_sortie=$request->dateSortie;
        }

        $hospitalisation->motif_hospitalisation=$request->motifhospitalisation;
        $hospitalisation->mode_entree=$request->modeentree;
        $hospitalisation->mode_sortie=$request->modesortie;

        if ($hospitalisation->save($donnees))
        {
            Session::flash('message', "Données d'hospitalisation du patient enregistrées!");
            Session::flash('alert-class', 'alert-success');

            return redirect()->route('hospitalisations.index');
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
            }elseif ($req->option === 'numerochambre') {
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

        $chambres = Chambre::where('etat_occupation', 0)->get();
        $lits = Lit::where('etat_occupation', 0)->get();


        if (auth()->user()->type_user === 2)
        {
            return view('hospitalisation.edit',compact('hospitalisation', 'hospi_all', 'patients', 'patient', 'chambres', 'lits'));
        }
        if (auth()->user()->type_user === 1)
        {
            return view('medecin.edit_hospitalisation',compact('hospitalisation', 'hospi_all', 'patients', 'patient', 'chambres', 'lits'));
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
            Session::flash('message', "Renseignez tous les champs SVP!!");
            Session::flash('alert-class', 'alert-danger');
            return redirect()->Back()->withInput()->withErrors($validation);
        }

        $hospitalisation= Hospitalisation::find($id);

        $hospitalisation->numerochambre=$request->numerochambre;
        /*if ($request->numerolit == 1) {
            $lit = Lit::where('numlit', 1)->first();
            $chambre = Chambre::where('numch', 'ChA')->first();
            $lit->etat_occupation = 1;
            $chambre->etat_occupation = 1;

            $lit->save(); $chambre->save();
        }elseif ($request->numerolit == 2) {
            $lit = Lit::where('numlit', 2)->first();
            $lit->etat_occupation = 1;$lit->save();

        }elseif ($request->numerolit == 3) {
            $lit = Lit::where('numlit', 3)->first();
            $lit->etat_occupation = 1;$lit->save();

        }elseif ($request->numerolit == 4) {
            $lit = Lit::where('numlit', 4)->first();
            $lit->etat_occupation = 1;$lit->save();

        }elseif ($request->numerolit == 5) {
            $lit = Lit::where('numlit', 5)->first();
            $lit->etat_occupation = 1;$lit->save();

        }elseif ($request->numerolit == 6) {
            $lit = Lit::where('numlit', 6)->first();
            $lit->etat_occupation = 1;$lit->save();

        }elseif ($request->numerolit == 7) {
            $lit = Lit::where('numlit', 7)->first();
            $lit->etat_occupation = 1;$lit->save();

        }elseif ($request->numerolit == 8) {
            $lit = Lit::where('numlit', 8)->first();
            $lit->etat_occupation = 1;$lit->save();

        }elseif ($request->numerolit == 9) {
            $lit = Lit::where('numlit', 9)->first();
            $lit->etat_occupation = 1;$lit->save();

        }elseif ($request->numerolit == 10) {
            $lit = Lit::where('numlit', 10)->first();
            $lit->etat_occupation = 1;$lit->save();

        }elseif ($request->numerolit == 11) {
            $lit = Lit::where('numlit', 11)->first();
            $lit->etat_occupation = 1;$lit->save();

        }elseif ($request->numerolit == 12) {
            $lit = Lit::where('numlit', 12)->first();
            $lit->etat_occupation = 1;$lit->save();

        }elseif ($request->numerolit == 13) {
            $lit = Lit::where('numlit', 13)->first();
            $lit->etat_occupation = 1;$lit->save();

        }elseif ($request->numerolit == 14) {
            $lit = Lit::where('numlit', 14)->first();
            $lit->etat_occupation = 1;$lit->save();

        }elseif ($request->numerolit == 15) {
            $lit = Lit::where('numlit', 15)->first();
            $lit->etat_occupation = 1;$lit->save();

        }

        $lit2 =Lit::where('numlit', 2)->where('etat_occupation', 1)->first();
        $lit3 =Lit::where('numlit', 3)->where('etat_occupation', 1)->first();
        if ($lit2 && $lit3) {
            $chambre = Chambre::where('numch', 'ChB')->first();
            $chambre->etat_occupation = 1;
            $chambre->save();
        }

        $lit4 =Lit::where('numlit', 4)->where('etat_occupation', 1)->first();
        $lit5 =Lit::where('numlit', 5)->where('etat_occupation', 1)->first();
        if ($lit4 && $lit5) {
            $chambre = Chambre::where('numch', 'ChC')->first();
            $chambre->etat_occupation = 1;
            $chambre->save();
        }

        $lit6 =Lit::where('numlit', 6)->where('etat_occupation', 1)->first();
        $lit7 =Lit::where('numlit', 7)->where('etat_occupation', 1)->first();
        if ($lit6 && $lit7) {
            $chambre = Chambre::where('numch', 'ChD')->first();
            $chambre->etat_occupation = 1;
            $chambre->save();
        }

        $lit8 =Lit::where('numlit', 8)->where('etat_occupation', 1)->first();
        $lit9 =Lit::where('numlit', 9)->where('etat_occupation', 1)->first();
        $lit10 =Lit::where('numlit', 10)->where('etat_occupation', 1)->first();
        $lit11 =Lit::where('numlit', 11)->where('etat_occupation', 1)->first();
        if ($lit8 && $lit9 && $lit10 && $lit11) {
            $chambre = Chambre::where('numch', 'ChE')->first();
            $chambre->etat_occupation = 1;
            $chambre->save();
        }

        $lit12 =Lit::where('numlit', 12)->where('etat_occupation', 1)->first();
        $lit13 =Lit::where('numlit', 13)->where('etat_occupation', 1)->first();
        $lit14 =Lit::where('numlit', 14)->where('etat_occupation', 1)->first();
        $lit15 =Lit::where('numlit', 15)->where('etat_occupation', 1)->first();
        if ($lit12 && $lit13 && $lit14 && $lit15) {
            $chambre = Chambre::where('numch', 'ChF')->first();
            $chambre->etat_occupation = 1;
            $chambre->save();
        }*/

        $hospitalisation->numerolit=$request->numerolit;
        $hospitalisation->diagnosticPrincipale=$request->diagnosticPrincipale;
        $hospitalisation->diagnosticSecondaire=$request->diagnosticSecondaire;
        $hospitalisation->diagnosticAssocie=$request->diagnosticAssocie;
        $hospitalisation->diagnosticEntree=$request->diagnosticEntree;
        $hospitalisation->diagnosticSortie=$request->diagnosticSortie;

        if ($request->dateEntree > date('Y-m-d')) {
            Session::flash('message', "Entrez une date valide SVP! Merci");
            Session::flash('alert-class', 'alert-danger');

            return back();
        }else{
            $hospitalisation->date_entree = $request->date_entree;
        }

        if ($request->date_sortie) {
            if ($request->date_sortie <= date('Y-m-d')) {
                Session::flash('message', "Entrez une date de sortie valide SVP! Merci");
                Session::flash('alert-class', 'alert-danger');

                return back();
            }else{
                $hospitalisation->date_sortie=$request->date_sortie;
            }
        }

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
