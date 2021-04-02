<?php

namespace App\Http\Controllers;

use App\ArchiveHospitalisation;
use App\Hospitalisation;
use App\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ArchiveHospitalisationController extends Controller
{
    public function index() {
        $patients = Patient::all();
        $patients_hospi = ArchiveHospitalisation::orderBy('created_at', 'desc')
            ->paginate(7);

        if (auth()->user()->type_user === 2)
        {
            return view('infirmier.annuaire_archive_hospitalisation', compact('patients', 'patients_hospi'));
        }elseif (auth()->user()->type_user === 1)
        {
            return view('medecin.annuaire_archive_hospitalisation', compact('patients', 'patients_hospi'));
        }
    }

    public function search(Request $req)
    {
        $patients = \App\Patient::all();
        if ($req->option) {
            if ($req->option === 'id'){
                $patients_hospi = ArchiveHospitalisation::select('*')->where('id_patient', 'LIKE', '%'.$req->rechercher.'%')
                    ->paginate(6);
            }elseif ($req->option === 'date_entree') {
                $patients_hospi = ArchiveHospitalisation::select('*')->where('date_entree', 'LIKE', '%'.$req->rechercher.'%')
                    ->paginate(6);
            }elseif ($req->option === 'date_sortie') {
                $patients_hospi = ArchiveHospitalisation::select('*')->where('date_sortie', 'LIKE', '%'.$req->rechercher.'%')
                    ->paginate(6);
            }elseif ($req->option === 'numerochambre') {
                $patients_hospi = ArchiveHospitalisation::select('*')->where('numerochambre', 'LIKE', '%'.$req->rechercher.'%')
                    ->paginate(6);
            }

            if ($patients_hospi)
            {
                if (auth()->user()->type_user === 2)
                {
                    return view('infirmier.annuaire_archive_hospitalisation', compact('patients', 'patients_hospi'));
                }
                if (auth()->user()->type_user === 1)
                {
                    return view('medecin.annuaire_archive_hospitalisation', compact('patients', 'patients_hospi'));
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

    public function libererPatient($id) {
        $patient = Hospitalisation::find($id);
        //die($patient);

        if ($patient->date_sortie) {
            if ($patient->mode_sortie)
            {
                if ($patient->diagnosticSortie)
                {
                    $archive = new ArchiveHospitalisation();
                    $archive->id_patient = $patient->id_patient;
                    $archive->numerochambre = $patient->numerochambre;
                    $archive->numerolit = $patient->numerolit;
                    $archive->motif_hospitalisation = $patient->motif_hospitalisation;
                    $archive->diagnosticPrincipale = $patient->diagnosticPrincipale;
                    $archive->diagnosticSecondaire = $patient->diagnosticSecondaire;
                    $archive->diagnosticAssocie = $patient->diagnosticAssocie;
                    $archive->date_entree = $patient->date_entree;
                    $archive->mode_entree = $patient->mode_entree;
                    $archive->diagnosticEntree = $patient->diagnosticEntree;
                    $archive->date_sortie = $patient->date_sortie;
                    $archive->mode_sortie = $patient->mode_sortie;
                    $archive->diagnosticSortie = $patient->diagnosticSortie;

                    $donnees = \App\Patient::where('idpatient', $patient->id_patient)->first();

                    if ($archive->save()) {
                        Session::flash('message', "Vous venez de liberer le patient ".$donnees->prenom.' '.$donnees->nom.' '.". Ses données d'hospitalisation ont été archivées.");
                        Session::flash('alert-class', 'alert-success');
                        $patient->delete();

                        return back();
                    }
                }else
                    {
                    Session::flash('message', "Veuillez renseigner le diagnostic de sortie avant de continuer.");
                    Session::flash('alert-class', 'alert-danger');

                    return back();
                }
            }else
                {
                Session::flash('message', "Veuillez renseigner le mode de sortie avant de continuer.");
                Session::flash('alert-class', 'alert-danger');

                return back();
            }
        }else
            {
            Session::flash('message', "Veuillez renseigner la date de sortie avant de continuer.");
            Session::flash('alert-class', 'alert-danger');

            return back();
        }
    }
}
