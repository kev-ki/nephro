<?php

namespace App\Http\Controllers;

use App\Activitesocioprofessionnelle;
use App\Communeburkina;
use App\Constante;
use App\Consultation;
use App\Dossier;
use App\Hospitalisation;
use App\Patient;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PatientController extends Controller
{
    public function index()
    {
        $patient=Patient::orderBy('created_at','desc')->paginate(6);

        return view('patient.index',['patient'=>$patient]);
    }

    public function edit($id)
    {
        $patient = Patient::where('idpatient',$id)->first();;
        $doc = Dossier::where('id_patient',$id)->first();;
        $medecin = User::where('type_user','1')->where('status','1')->get();
        //$chef = User::where('chefservice','1')->where('status','1')->get();
        $data = Communeburkina::all();
        //$region = Communeburkina::select("region","code_region")->distinct()->get();
        $profession = Activitesocioprofessionnelle::all();

        return view('patient.edit', compact('patient', 'doc', 'medecin', 'profession'/*, 'region', 'chef'*/, 'data'));
    }

    public function show($id)
    {
        $patient=Patient::where('idpatient',$id)->first();
        $p=Patient::find($id);
        $doc = Dossier::where('id_patient',$p->idpatient)->first();
        $medecin = User::where('id',$doc->medecinresp)->first();

        $villenaissance= Communeburkina::where('code_postal',$p->lieunaissance)->first();
        $villeresidence= Communeburkina::where('code_postal',$p->ville_village)->first();
        $tuteur = Communeburkina::where('code_postal',$p->quartier_secteur_tuteur)->first();

        $profession = Activitesocioprofessionnelle::where('code', $p->profession)->first();
        $residence= Communeburkina::where('code_postal',$p->ville_village)->first();

        Session::put('patient', $patient->idpatient);

        return view('patient.show',['patient'=>$patient,'ville'=>$villenaissance, 'villeresidence'=>$villeresidence, 'dossier'=>$doc, 'tuteur'=>$tuteur, 'medecin'=>$medecin, 'profession'=>$profession,'residence'=>$residence]);
    }

    public function index_constante($id)
    {
        $constantes = Constante::where('idpatient',$id)->orderBy('dateprise','desc')->paginate(6);
        return view('patient.listeconstante', compact('constantes'));
    }

    public function index_consultation($id)
    {
        $doc = Dossier::where('id_patient',$id)->first();
        Session::put('doc', $doc);
        $consult = Consultation::where('num_dossier',$doc->numD)->orderBy('created_at','desc')->paginate(6);

        return view('patient.listeconsultation', compact('consult', 'doc'));
    }

    public function show_constante($id)
    {
        $constante = Constante::where('id',$id)->first();
        $patient= Patient::where('idpatient',$constante->idpatient)->first();

        return view('patient.constanteshow', compact('patient', 'constante'));
    }

    public function show_consultation($id)
    {
        $consult = Consultation::where('id',$id)->first();
        $idpatient = Dossier::select('id_patient')->where('numD', $consult->num_dossier)->first();
        $infopatient = Patient::where('idpatient', $idpatient->id_patient)->first();

        Session::put('idconsult', $consult);

        return view('consultation.show', compact('consult', 'infopatient'));
    }

    public function hospitaliser($id)
    {
        $patient = Patient::where('idpatient', $id)->first();
        $hospi = new Hospitalisation();
        $hospi->id_patient = $patient->idpatient;
        $patienthospi = Hospitalisation::all();
        $i = 0;
        foreach ($patienthospi as $patienthospi)
        {
            if ($patienthospi->id_patient === $patient->idpatient) {
                $i ++;
            }
        }
        if ( $i === 0 )
        {
            $hospi->save();
            Session::flash('message', 'Hospitalisation enregistré.');
            Session::flash('alert-class', 'alert-success');
            return Back();
        }else {
            Session::flash('message', 'action refusée! le patient a une hospitalisation en cours.');
            Session::flash('alert-class', 'alert-danger');
            return Back();
        }
    }

    public function consultSearch(Request $request, $id)
    {
        Session::forget('doc');
        $numdossier = Dossier::where('id_patient', $id)->first();
        $consult = Consultation::where('num_dossier', $numdossier->numD)
            ->where('created_at', 'LIKE', '%'.$request->rechercher.'%')
            ->paginate(6);

        if ($consult)
        {
            return view('patient.listeconsultation', compact('consult'));
        } else{
            Session::flash('message', 'Consultation non trouvé.');
            Session::flash('alert-class', 'alert-danger');
            return Back();
        }
    }

    public function constanteSearch(Request $request)
    {
        Session::forget('doc');
        $consult = Constante::select('*')->where('created_at', 'LIKE', '%'.$request->rechercher.'%')->paginate(6);
        if ($consult)
        {
            return view('patient.listeconsultation', compact('consult'));
        } else{
            Session::flash('message', 'Consultation non trouvé.');
            Session::flash('alert-class', 'alert-danger');
            return Back();
        }
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

            if ($patient)
            {
                return view('patient.index', compact('patient'));
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


    public function create()
    {
        $medecin = User::where('type_user','1')->where('status','1')->get();
        $chefservice = User::where('chefservice','1')->where('status','1')->get();

        $data = Communeburkina::all();
        $region = Communeburkina::select("region","code_region")->distinct()->get();
        $profession = Activitesocioprofessionnelle::all();

        return view('patient.create', ['liste_medecin' => $medecin, 'chef' => $chefservice, 'data' => $data, 'profession' => $profession, 'region'=> $region]);
    }

    public function store(Request $request)
    {
        $donnees = $request->except('_method', '_token', 'submit');
        $validation = Validator::make($request->all(), [
            // patient folder
            'numero_dossier' => 'required',
            'chefservice' => 'required',
            'medecinresp' => 'required',

            // patient data
            'nom' => 'required|string|min:2|max:50',
            'prenom' => 'required|string|min:3|max:255',
            'nomjf' => 'max:50',
            'sexualite' => 'required',
            'datenaissance' => 'required|date',
            'lieunaissance' => 'required|string|min:2',
            'ethnie' => 'required|string',
            'rhesus' => 'required|string',
            'electrophoreseHB' => 'required|string',
            'parent1' => 'required|string|min:5',
            'parent2' => 'required|string|min:5',
            'profession' => 'required|string',
            'culte' => 'required|string',
            'assurance' => 'string',
            'type_assurance' => 'string',
            'sit_matrimoniale' => 'required|string',
            'region' => 'required|string',
            'ville_village' => 'required|string',
            'telephone1' => 'required|string|min:8|max:12',
            'telephone2' => 'required|string|min:8|max:12',
            'telephone3' => 'required|string|min:8|max:12',
            'pers_prevenir' => 'required|string',
            'tel_pers_prevenir' => 'required|string|min:8|max:12',
        ]);

        if ($validation->fails()) {
            return redirect()->Back()->withInput()->withErrors($validation);
        }
        $idpatient = $this->createID(Request('nom'),Request('prenom'),Request('sexe'),Request('datenaissance'),Request('lieunaissance'),Request('ville_village') );

        /*die($idpatient);*/
        //Folder
        $doc = new Dossier();
        $doc->numD = Request('numero_dossier');
        $doc->iduser = auth()->user()->id;
        $doc->id_patient = $idpatient;
        /*$doc->numQ = Request('numero_quittance');*/
        $doc->chefservice = Request('chefservice');
        $doc->medecinresp = Request('medecinresp');
        $doc->DES = Request('des');

        /*die($doc);*/
        //Patient
        $patient = new Patient();
        $patient->idpatient = $idpatient;
        $patient->iduser = auth()->user()->id;
        $patient->nom = Request('nom');
        $patient->prenom = Request('prenom');
        $patient->nomjeunefille = Request('nomjf');
        $patient->type_doc_id = Request('piecepatient');
        $patient->num_doc_id = Request('identite');
        $patient->sexualite = Request('sexualite');
        $patient->datenaissance = Request('datenaissance');
        $patient->lieunaissance = Request('lieunaissance');

        if (Request('datenaissance')) {
            $dateNaissance = Request('datenaissance');
            $aujourdhui = date("Y-m-d");
            $diff = date_diff(date_create($dateNaissance), date_create($aujourdhui));
            $patient->age = $diff->format('%y');
        }

        $patient->sexe = Request('sexe');
        $patient->ethnie = Request('ethnie');
        $patient->rhesus = Request('rhesus');
        $patient->electrophoreseHB = Request('electrophoreseHB');
        $patient->pere = Request('parent1');
        $patient->mere = Request('parent2');
        $patient->profession = Request('profession');
        $patient->culte = Request('culte');
        $patient->assurance = Request('assurance');
        $patient->type_assurance = Request('type_assurance');
        $patient->sit_matrimoniale = Request('sit_matrimoniale');
        $patient->nombregarcons = Request('enfant1');
        $patient->nombrefilles = Request('enfant2');
        $patient->regionorigine = Request('region');
        $patient->ville_village = Request('ville_village');
        $patient->telephone1 = Request('telephone1');
        $patient->telephone2 = Request('telephone2');
        $patient->telephone3 = Request('telephone3');
        $patient->tuteur = Request('tuteur');
        $patient->quartier_secteur_tuteur = Request('quartier_secteur_tuteur');
        $patient->pers_prevenir = Request('pers_prevenir');
        $patient->tel_pers_prevenir = Request('tel_pers_prevenir');

        $data1 = $patient->save($donnees);
        /*die($data1);*/
        $data2 = $doc->save($donnees);


        if ($data1 && $data2) {
            Session::flash('message', 'Patient enregistrer.');
            Session::flash('alert-class', 'alert-success');

            return redirect()->route('medecin.index');
        }else{
            Session::flash('message', 'Patient non enregistrer.');
            Session::flash('alert-class', 'alert-danger');
            return Back();
        }
    }

    public function update(Request $request, $id) {
        $donnees = $request->except('_method', '_token', 'submit');

        $validation = Validator::make($request->all(), [
            // patient folder
            'medecinresp' => 'required',

            // patient data
            'sexualite' => 'required',
            'ethnie' => 'required',
            'profession' => 'required',
            'culte' => 'required',
            'sit_matrimoniale' => 'required',
            'telephone1' => 'required|string|min:8|max:12',
            'pers_prevenir' => 'required|string',
            'tel_pers_prevenir' => 'required|string|min:8|max:12',
        ]);

        if ($validation->fails()) {
            return redirect()->Back()->withInput()->withErrors($validation);
        }

        //Folder
        $doc = Dossier::where('id_patient', $id)->first();
        //die($doc);
        $doc->medecinresp = Request('medecinresp');

        //Patient
        $patient = Patient::find($id);
        //die($patient);
        $patient->sexualite = $request->sexualite;
        $patient->ethnie = $request->ethnie;
        $patient->profession = $request->profession;
        $patient->culte = $request->culte;
        $patient->assurance = $request->assurance;
        $patient->type_assurance = $request->type_assurance;
        $patient->sit_matrimoniale = $request->sit_matrimoniale;
        $patient->nombregarcons = $request->enfant1;
        $patient->nombrefilles = $request->enfant2;
        $patient->telephone1 = $request->telephone1;
        $patient->telephone2 = $request->telephone2;
        $patient->telephone3 = $request->telephone3;
        $patient->tuteur = $request->tuteur;
        $patient->quartier_secteur_tuteur = $request->quartier_secteur_tuteur;
        $patient->pers_prevenir = $request->pers_prevenir;
        $patient->tel_pers_prevenir = $request->tel_pers_prevenir;

        $data2 = $doc->save($donnees);
        //die($data2);
        $data1 = $patient->save($donnees);

        if ($data1 && $data2) {
            Session::flash('message', 'Données du patient mise à jour.');
            Session::flash('alert-class', 'alert-success');

            return redirect()->route('medecin.index');
        }else{
            Session::flash('message', 'Modifications non enregistrée');
            Session::flash('alert-class', 'alert-danger');
            return back();
        }
    }

    public function editprofile($id)
    {
        $user = User::find($id);

        return view('medecin.editprofile', compact('user'));
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
            if (auth()->user()->type_user === 1)
            {
                return redirect()->route('medecin.index');
            }
        }else{
            Session::flash('message', 'Modification non effectuer.');
            Session::flash('alert-class', 'alert-danger');
        }

        return Back()->withInput();
    }


    /*=====================================function called===================================*/

    private function createID($name,$lastname,$sex,$datenaiss,$codeloc,$resid)
    {

        $nom = $name;
        $prenom = $lastname;
        $sexe = $sex;
        $dateNaiss = $datenaiss;
        $codeLoc = $codeloc;
        $residence = $resid;

        //to calcul

        $search  = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ð', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ');

        //Préférez str_replace à strtr car strtr travaille directement sur les octets, ce qui pose problème en UTF-8

        $replace = array('A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 'a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y');

        $nomprenom = str_replace(' ', '', $nom.$prenom);

        $nomprenomSansaccent = str_replace($search, $replace, $nomprenom);

        $nomprenomSansaccent = strtoupper($nomprenomSansaccent);

        $hashnomprenomSansaccent = hash('sha512', $nomprenomSansaccent);

        $datesansSlash = preg_replace('~-~', '', $dateNaiss);

        $concatTotale = $sexe.$datesansSlash.$hashnomprenomSansaccent.$codeLoc.$residence;

        $hashconcatTotale = hash('sha512', $concatTotale);

        $longueurchaine = strlen($hashconcatTotale);
        $hashconcatTotaleconvertit = '';
        for($i = 0; $i < $longueurchaine; $i ++) {
            $caractere = substr($hashconcatTotale, $i, 1);

            if(is_int($caractere)) {
                if($i == 0) {
                    $hashconcatTotaleconvertit = $caractere;
                } else {
                    $hashconcatTotaleconvertit = $hashconcatTotaleconvertit.$caractere;
                }
            } else {
                if($i == 0) {
                    $hashconcatTotaleconvertit = ord($caractere);
                } else {
                    $hashconcatTotaleconvertit = $hashconcatTotaleconvertit.ord($caractere);
                }
            }
        }

        $codepatient = substr($hashconcatTotaleconvertit, 50, 20);

        $clecontrole = $hashconcatTotaleconvertit % 97;

        $idPatient = $codepatient." ".$clecontrole;

        return $idPatient;
    }
}
