@extends('layouts.medlayout')

@section('content')
    <h1 class="text-center" style="background-color: #01A9CB; height: 30px; font-weight: bold; padding-top: 5px; font-size: large">Statistiques du Service de Nephro-Dialyse</h1>
    <div class="container-fluid p-2" style="background-color: white">
        <div class="card bg-white mb-2">
            <div class="card-header text-center font-weight-bold">
                <ul class="nav nav-tabs mb-1  d-flex justify-content-center" id="table" role="tablist">
                    <li class="nav-item bouton-forme"><a style="font-size: 15px;" class="nav-link active" id="general_tab" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true">Statistiques Générales</a></li>
                    <li class="nav-item ml-md-5 bouton-forme" style="font-size: 15px"><a style="font-size: 15px;" class="nav-link" id="stat_tab" data-toggle="tab" href="#stat" role="tab" aria-controls="stat" aria-selected="false">Statistiques de {{$annee}}</a></li>
                    <li class="nav-item bouton-forme" style="font-size: 15px"><a style="font-size: 15px;" class="nav-link" id="graphe_tab" data-toggle="tab" href="#graphe" role="tab" aria-controls="graphe" aria-selected="false">Représentation graphique</a></li>
                </ul>
            </div>
            <div class="tab-content" id="big_content">
                <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="general_tab" id="general">
                    <div class="card-body tab-content" id="pages_content">
                        <div class="row">
                            <div class="row p-2">
                                <div class="col-6">
                                    <div class="row form-group">
                                        <label class="font-weight-bold col-8 text-right">nombre de patients:</label>
                                        <div class=" col-4">{{$nombrepatient}}</div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="font-weight-bold col-8 text-right">Nombre d'hommes:</label>
                                        <div class=" col-4">{{$homme}}</div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="font-weight-bold col-8 text-right">Nombre de femmes:</label>
                                        <div class=" col-4">{{$femme}}</div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="font-weight-bold col-8 text-right">Pourcentage des hommes:</label>
                                        <div class=" col-4">{{$poucentagehomme}} %</div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="font-weight-bold col-8 text-right">Pourcentage des femmes:</label>
                                        <div class=" col-4">{{$poucentagefemme}} %</div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="font-weight-bold col-8 text-right">Nombre de patients depassant 18 ans:</label>
                                        <div class=" col-4">{{$sup18}} personne(s)</div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="font-weight-bold col-8 text-right">Pourcentage des patients depassant 18 ans:</label>
                                        <div class=" col-4">{{$pourcentagesup18}} %</div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="font-weight-bold col-8 text-right">Patients de moins de 5 ans:</label>
                                        <div class=" col-4">{{$inf5}} personne(s)</div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="font-weight-bold col-8 text-right">Pourcentage des patients de moins de 5 ans (ceux de 5 ans y compris):</label>
                                        <div class=" col-4">({{$pourcentageinf5}} %)</div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row form-group">
                                        <label class="font-weight-bold col-8 text-right">Patients compris entre 5 et 18 ans:</label>
                                        <div class=" col-4">{{$compris518}} personne (s)</div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="font-weight-bold col-8 text-right">Pourcentage des Patients compris entre 5 à 18 ans:</label>
                                        <div class=" col-4">{{$pourcentagecompris518}} %</div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="font-weight-bold col-8 text-right">L'âge maximal:</label>
                                        <div class=" col-4">{{$maxage}} ans</div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="font-weight-bold col-8 text-right">L'âge minimal:</label>
                                        <div class=" col-4">{{$minage}} ans</div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="font-weight-bold col-8 text-right">L'âge moyen:</label>
                                        <div class=" col-4">{{$moyage}} ans</div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="font-weight-bold col-8 text-right">La variance:</label>
                                        <div class=" col-4">{{$variance}}</div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="font-weight-bold col-8 text-right">L'ecart type:</label>
                                        <div class=" col-4">{{$ecartype}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade p-2" role="tabpanel" aria-labelledby="stat_tab" id="stat">
                    <div class="card-body tab-content" id="pages_content">
                        <div class="row">
                            <div class="row p-2">
                                <div class="col-6">
                                    <div class="row form-group">
                                        <label class="font-weight-bold col-8 text-right">nombre de patients:</label>
                                        <div class=" col-4">{{$nouveaupatient}}</div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="font-weight-bold col-8 text-right">Nombre d'hommes:</label>
                                        <div class=" col-4">{{$nouveauhomme}}</div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="font-weight-bold col-8 text-right">Nombre de femmes:</label>
                                        <div class=" col-4">{{$nouveaufemme}}</div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="font-weight-bold col-8 text-right">Pourcentage des hommes:</label>
                                        <div class=" col-4">{{$pourcentagenouveauhomme}} %</div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="font-weight-bold col-8 text-right">Pourcentage des femmes:</label>
                                        <div class=" col-4">{{$pourcentagenouveaufemme}} %</div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="font-weight-bold col-8 text-right">Nombre de patients depassant 18 ans:</label>
                                        <div class=" col-4">{{$nouveausup18}} personne(s)</div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="font-weight-bold col-8 text-right">Pourcentage des patients depassant 18 ans:</label>
                                        <div class=" col-4">{{$pourcentagenouveausup18}} %</div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="font-weight-bold col-8 text-right">Patients de moins de 5 ans:</label>
                                        <div class=" col-4">{{$nouveauinf5}} personne(s)</div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="font-weight-bold col-8 text-right">Pourcentage des patients de moins de 5 ans  (ceux de 5 ans y compris):</label>
                                        <div class=" col-4">{{$pourcentagenouveauinf5}} %</div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row form-group">
                                        <label class="font-weight-bold col-8 text-right">Patients compris entre 5 et 18 ans:</label>
                                        <div class=" col-4">{{$nouveaucompris518}} personne (s)</div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="font-weight-bold col-8 text-right">Pourcentage des Patients compris entre 5 à 18 ans:</label>
                                        <div class=" col-4">{{$pourcentagenouveaucompris518}} %</div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="font-weight-bold col-8 text-right">L'âge maximal:</label>
                                        <div class=" col-4">{{$nouveaumaxage}} ans</div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="font-weight-bold col-8 text-right">L'âge minimal:</label>
                                        <div class=" col-4">{{$nouveauminage}} ans</div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="font-weight-bold col-8 text-right">L'âge moyen:</label>
                                        <div class=" col-4">{{$nouveaumoyage}} ans</div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="font-weight-bold col-8 text-right">La variance:</label>
                                        <div class=" col-4">{{$nouveauvariance}}</div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="font-weight-bold col-8 text-right">L'ecart type:</label>
                                        <div class=" col-4">{{$nouveauecartype}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" role="tabpanel" aria-labelledby="graphe_tab" id="graphe">
                    <div>
                        <main class="py-2 p-3">
                            @yield('graphes')
                        </main>
                    </div>
                </div>

                <div class="d-flex justify-content-center mb-1"><a href="{{route('medecin.pdf')}}" class="btn btn-primary">imprimer</a></div>
            </div>
        </div>
    </div>
@endsection
