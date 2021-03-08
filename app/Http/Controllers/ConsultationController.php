<?php

namespace App\Http\Controllers;

use App\Dossier;
use App\Patient;
use App\Consultation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ConsultationController extends Controller
{
    public function index()
    {
        return view('consultation.index');

    }

    public function begin_consult($id)
    {
        $patient = Patient::where('idpatient', $id)->first();
        $doc = Dossier::where('id_patient', $id)->first();
        //die($doc);
        return view('consultation.create', compact('patient', 'doc'));
    }

    public function store(Request $request)
    {
        $donnees = $request->except('_method', '_token', 'submit');
        $validation = Validator::make($request->all(), [
            'histoiremaladie' => 'required',
            'adresserpar' => 'required',
        ]);
        if ($validation->fails()) {
            return redirect()->Back()->withInput()->withErrors($validation);
        }

        $consultation= new Consultation();
        $consultation->numQ = $request->numQ;
        $consultation->histoiremaladie = $request->histoiremaladie;
        $consultation->motif_admission= $request->motifadmission;
        $consultation->bilan_admission= $request->bilan_admission;
        $consultation->adresserpar= $request->adresserpar;
        $consultation->num_dossier= $request->num_dossier;
        $consultation->motif_hospitalisation= $request->motifhospitalisation;

        if ($consultation->save($donnees))
         {
             Session::put('idconsultation', $consultation->id);
            return redirect()->route('uronephrologie.create');
         }else{
            Session::flash('message', 'Verifier tous les champs SVP!');
            Session::flash('alert-class', 'alert-danger');
            return back();
        }
    }

    public function show(Consultation $consultation)
    {
        return view('consultation.show',['consultation'=>$consultation]);
    }

    public function edit(Consultation $consultation)
    {
        return view('consultation.edit',['consultation'=>$consultation]);
    }

    public function create_fin_consult()
    {
        $idconsult = Consultation::where('id', Session::get('idconsultation'))->first();
        //die($idconsult);
        return view('consultation.finconsultation', compact('idconsult'));
    }

    public function update_consultation(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'resume' => 'required',
            'diagnostic' => 'required',
            'conduite_tenir' => 'required',
        ]);
        if ($validation->fails()) {
            return redirect()->Back()->withInput()->withErrors($validation);
        }

        $consultation = Consultation::find($id);
        /*$consultation->resume = $request->resume;
        $consultation->diagnostic = $request->diagnostic;
        $consultation->conduite = $request->conduite_tenir;
        $consultation->bilan_admission = $request->bilan_admission;
        $consultation->motif_hospitalisation= $request->motifhospitalisation;*/

        if($consultation->update())
        {
            return redirect()->route('traitement.create');
        }
        else{
            Session::flash('message', 'Verifier tous les champs SVP!');
            Session::flash('alert-class', 'alert-danger');

            return back();
        }
    }

    public function update(Request $request, Consultation $consultation)
    {
        /*$consultation->hisoiremaladie=$request->hisoiremaladie;
        $consultation->resume=$request->resume;
        $consultation->conduit=$request->conduit;
        $consultation->diagnostique=$request->diagnostique;
        $consultation->bilanadmission=$request->bilanadmission;
        $consultation->motifadmission=$request->motifadmission;
        $consultation->adresserpar=$request->adresserpar;
        $consultation->patientid=$request->patientid;
        $consultation->userid=$request->userid;*/

        if ($consultation->update())
        {
            Session::flash('message', 'Modifications effectuées.');
            Session::flash('alert-class', 'alert-danger');

            return back();
        }
        else{
            Session::flash('message', 'Verifier tous les champs SVP!');
            Session::flash('alert-class', 'alert-danger');

            return back();
        }

    }

    public function destroy(Consultation $consultation)
    {
        $consultation->delete();
        return back();
    }
}
