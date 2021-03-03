@extends('layouts.seclayout')

@section('content')
    <h1 class="text-center" style="background-color: #01A9CB; height: 30px; font-size: large; padding-top: 5px; font-weight: bold">Dossier Administratif de {{$patient->prenom}} {{$patient->nom}} [ ID : {{$patient->idpatient}} ]</h1>
    <div class="container-fluid p-2" style="background-color: white">
        <div class="card bg-white mb-2" style="">
            <div class="card-header text-center font-weight-bold">
                <ul class="nav nav-tabs mb-1  d-flex justify-content-center" id="table" role="tablist">
                    <li class="nav-item bouton-forme"><a style="font-size: 15px;" class="nav-link active" id="identite_tab" data-toggle="tab" href="#identite" role="tab" aria-controls="identite" aria-selected="true">Identité du patient</a></li>
                    <li class="nav-item ml-md-5 bouton-forme mr-md-5" style="font-size: 15px"><a style="font-size: 15px;" class="nav-link" id="coordonnee_tab" data-toggle="tab" href="#coordonnee" role="tab" aria-controls="coordonnee" aria-selected="false">Coordonnées du patient</a></li>
                </ul>
            </div>

            <div class="tab-content" id="big_content">
                <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="identite_tab" id="identite">
                    <ul class="nav nav-tabs mb-1  d-flex justify-content-center" id="table" role="tablist">
                        <li class="nav-item  bouton-forme" style="font-size: 15px;"><a class="nav-link active" id="page1_tab" data-toggle="tab" href="#page1" role="tab" aria-controls="page1" aria-selected="true">Page 1</a></li>
                        <li class="nav-item ml-md-5 bouton-forme mr-md-5" style="font-size: 15px"><a class="nav-link" id="page2_tab" data-toggle="tab" href="#page2" role="tab" aria-controls="page2" aria-selected="false">Page 2</a></li>
                        <li class="nav-item bouton-forme" style="font-size: 15px"><a class="nav-link" id="page3_tab" data-toggle="tab" href="#page3" role="tab" aria-controls="page3" aria-selected="false">Page 3</a></li>
                    </ul>

                    <div class="card-body tab-content" id="pages_content">
                        <div class="row tab-pane fade show active" role="tabpanel" aria-labelledby="page1_tab" id="page1">
                            <div class="col">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row form-group">
                                            <label for="id" class="font-weight-bold col-md-3 text-right">ID Patient:</label>
                                            <input type="text" readonly class="form-control col-md-9" value="{{$patient->idpatient}}">
                                        </div>
                                        <div class="row form-group">
                                            <label class="font-weight-bold col-md-3 text-right">Numero dossier:</label>
                                            <input type="text" readonly class="form-control col-md-9" value="{{$dossier->numD}}">
                                        </div>
                                        <div class="row form-group">
                                            <label class="font-weight-bold col-md-3 text-right">Medecin responsable:</label>
                                            <input type="text" readonly class="form-control col-md-9" value="{{$dossier->medecinresp == $medecin->id ? 'Dr '.$medecin->prenom.' '.$medecin->name : ''}}">
                                        </div>
                                        <div class="row form-group">
                                            <label class="font-weight-bold col-md-3 text-right">Nom:</label>
                                            <input type="text" readonly class="form-control col-md-9" value="{{$patient->nom}}">
                                        </div>
                                        <div class="row form-group">
                                            <label class="font-weight-bold text-right col-md-3">Prénom:</label>
                                            <input type="text" readonly class="form-control col-md-9" value="{{$patient->prenom}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row form-group">
                                            <label class="font-weight-bold text-right col-md-3">Nom de jeune fille:</label>
                                            <input type="text" readonly class="form-control col-md-9" value="{{$patient->nomjeunefille}}">
                                        </div>
                                        <div class="row form-group">
                                            <label class="font-weight-bold col-md-3 text-right">Date de naissance:</label>
                                            <input type="date" readonly class="form-control col-md-9" value="{{$patient->datenaissance}}">
                                        </div>
                                        <div class="row form-group">
                                            <label class="font-weight-bold text-right col-md-3">Lieu de naissance:</label>
                                            <input type="text" readonly class="form-control col-md-9" value="{{$patient->lieunaissance == $ville->code_postal ? $ville->village.' ['.$ville->region.']' : 'Féminin' }}">
                                        </div>
                                        <div class="row form-group">
                                            <label class="font-weight-bold col-md-3 text-right">Age:</label>
                                            <input type="text" readonly class="form-control col-md-9" value="{{$patient->age}} ans">
                                        </div>
                                        <div class="row form-group">
                                            <label class="font-weight-bold col-md-3 text-right">Sexe:</label>
                                            <input type="text" readonly class="form-control col-md-9" value="{{$patient->sexe == 1 ? 'Masculin' : 'Féminin' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" role="tabpanel" aria-labelledby="page2_tab" id="page2">
                            <div class="col">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row form-group">
                                            <label class="font-weight-bold col-md-3 text-right">Document d'identité:</label>
                                            <input type="text" readonly class="form-control col-md-9" value="{{$patient->type_doc_id}}">
                                        </div>
                                        <div class="form-group row">
                                            <label class="font-weight-bold col-md-3 text-right">Sexualité:</label>
                                            <input type="text" readonly class="form-control col-md-9" value="{{$patient->sexualite}}">
                                        </div>
                                        <div class="row form-group">
                                            <label class="font-weight-bold col-md-3 text-right">Situation Matrimoniale:</label>
                                            <input type="text" readonly class="form-control col-md-9" value="{{$patient->sit_matrimoniale}}">
                                        </div>
                                        <div class="row form-group">
                                            <label class="font-weight-bold col-md-3 text-right">Assurance:</label>
                                            <input type="text" readonly class="form-control col-md-9" value="{{$patient->assurance}}">
                                        </div>
                                        <div class="row form-group">
                                            <label class="font-weight-bold col-md-3 text-right">Type assurance:</label>
                                            <input class="form-control col-md-9" readonly value="{{$patient->type_assurance}}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="row form-group">
                                            <label class="font-weight-bold col-md-3 text-right">Numero:</label>
                                            <input type="text" readonly class="form-control col-md-9" value="{{$patient->num_doc_id}}">
                                        </div>
                                        <div class="row form-group">
                                            <label class="font-weight-bold col-md-3 text-right">Profession:</label>
                                            <input type="text" readonly class="form-control col-md-9" value="{{$profession->libelle}}">
                                        </div>
                                        <div class="row form-group">
                                            <label class="font-weight-bold col-md-3 text-right">Garçons:</label>
                                            <input type="text" readonly class="form-control col-md-9" value="{{$patient->nombregarcons}}">
                                        </div>
                                        <div class="row form-group">
                                            <label class="font-weight-bold col-md-3 text-right">Filles:</label>
                                            <input type="text" readonly class="form-control col-md-9" value="{{$patient->nombrefilles}}">
                                        </div>
                                        <div class="row form-group">
                                            <label class="font-weight-bold col-md-3 text-right">Groupe-Rhésus:</label>
                                            <input type="text" readonly class="form-control col-md-9" value="{{$patient->rhesus}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" role="tabpanel" aria-labelledby="page3_tab" id="page3">
                            <div class="col">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row form-group">
                                            <label class="font-weight-bold col-md-3 text-right">Electrophorèse de l'HB:</label>
                                            <input type="text" readonly class="form-control col-md-9" value="{{$patient->electrophoreseHB}}">
                                        </div>
                                        <div class="row form-group">
                                            <label class="font-weight-bold col-md-3 text-right">Pere:</label>
                                            <input type="text" readonly class="form-control col-md-9" value="{{$patient->pere}}">
                                        </div>
                                        <div class="row form-group">
                                            <label class="font-weight-bold col-md-3 text-right">Mere:</label>
                                            <input type="text" readonly class="form-control col-md-9" value="{{$patient->mere}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row form-group">
                                            <label class="font-weight-bold col-md-3 text-right">Ethnie:</label>
                                            <input type="text" readonly class="form-control col-md-9" value="{{$patient->ethnie}}">
                                        </div>
                                        <div class="row form-group">
                                            <label class="font-weight-bold col-md-3 text-right">Culte:</label>
                                            <input class="form-control col-md-9" readonly value="{{$patient->culte}}">
                                        </div>
                                        <div class="row form-group">
                                            <label class="font-weight-bold col-md-3 text-right">Profession:</label>
                                            <input type="text" readonly class="form-control col-md-9" value="{{$profession->libelle}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade p-2" role="tabpanel" aria-labelledby="coordonnee_tab" id="coordonnee">
                    <div class="col">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row form-group">
                                    <label class="font-weight-bold col-md-3 text-right">Région d'origine:</label>
                                    <input type="text" readonly value="{{$ville->region}}" class="form-control col-md-9">
                                </div>
                                <div class="row form-group">
                                    <label class="font-weight-bold col-md-3 text-right">Résidence Habituelle:</label>
                                    <input type="text" readonly value="{{$villeresidence->village}}" class="form-control col-md-9">
                                </div>
                                <div class="row form-group">
                                    <label class="font-weight-bold col-md-3 text-right">Tel: Burkina:</label>
                                    <input type="text" readonly value="{{$patient->telephone1}}" class="form-control col-md-9">
                                </div>
                                <div class="row form-group">
                                    <label class="font-weight-bold col-md-3 text-right">Tel: Domicile:</label>
                                    <input type="text" readonly value="{{$patient->telephone2}}" class="form-control col-md-9">
                                </div>
                                <div class="row form-group">
                                    <label class="font-weight-bold col-md-3 text-right">Cellulaire:</label>
                                    <input type="text" readonly value="{{$patient->telephone3}}" class="form-control col-md-9">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row form-group">
                                    <label class="font-weight-bold col-md-3 text-right">Tuteur:</label>
                                    <input type="text" readonly value="{{$patient->tuteur}}" class="form-control col-md-9">
                                </div>
                                <div class="row form-group">
                                    <label class="font-weight-bold col-md-3 text-right">Résidence Tuteur:</label>
                                    <input type="text" readonly value="{{$patient->quartier_secteur_tuteur != null ? $tuteur->village : '' }}" class="form-control col-md-9">
                                </div>
                                <div class="row form-group">
                                    <label class="font-weight-bold col-md-3 text-right">Personne à prévenir:</label>
                                    <input type="text" readonly value="{{$patient->pers_prevenir}}" class="form-control col-md-9">
                                </div>
                                <div class="row form-group">
                                    <label class="font-weight-bold col-md-3 text-right">Tel Personne à prévenir:</label>
                                    <input type="text" readonly value="{{$patient->tel_pers_prevenir}}" class="form-control col-md-9">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="row d-flex justify-content-center mb-2">
                    <button class="btn btn-primary"><a style="color: #fff" href="#">imprimer</a></button>
                </div>
            </div>
        </div>
    </div>
@endsection
