@extends('layouts.medlayout')

@section('content')
    <h1 class="text-center" style="background-color: #01A9CB; height: 30px; font-size: large; padding-top: 5px; font-weight: bold">Antécédents médicaux</h1>
    <div class="container-fluid p-2" style="background-color: white">
        <div class="card p-2">
            <div class="card-header text-center font-weight-bold text-uppercase">Antécédents Uronephrologiques de {{$patient->prenom}} {{$patient->nom}} [ Consultation du {{$consult->created_at}}]</div>
            <div class="card-body">
                <div class="col">
                    <div class="form-group row">
                        <label class="col-md-2 font-weight-bold text-right"  for="nom_maladie">Nom maladie:</label>
                        <input type="text" readonly name="nom" class="col-md-4 form-control" value="{{$uro->nom}}">
                        <label class="col-md-2 font-weight-bold text-right" for="datedecouverte">Date de decouverte:</label>
                        <input type="date" readonly name="datedecouverte" id="datedecouverte" class="form-control col-md-4" value="{{$uro->datedecouverte}}">
                    </div>
                </div>

                @if($uro->nom === 'oeudeme' || $uro->nom === 'proteinurie')
                    <div id="nombre_episode"  class="col" style="display: block">
                        <div class="form-group row">
                            <label class="col-md-2 font-weight-bold text-right" for="nombreepisode">Nombre épisodes:</label>
                            <input type="text" readonly name="nombreepisode" placeholder="Nombre d'épisodes" id="nombreepisode" class="col-md-10 form-control" value="{{$uro->nombreepisodes}}">
                        </div>
                    </div>

                    @if($uro->nom === 'oeudeme')
                        <div id="nombre_episode"  class="col" style="display: block">
                            <div class="form-group row">
                                <label class="col-md-2 font-weight-bold text-right">Siège:</label>
                                <input type="text" readonly name="siegeoeudeme" class="col-md-10 form-control" value="{{$uro->siegeoeudeme}}">
                            </div>
                        </div>
                    @endif

                    <div id="ifevolution"  class="col" style="display: block">
                        <div class="form-group row">
                            <label for="evolution" class="col-md-2 font-weight-bold text-right">Evolution:</label>
                            <input type="text" readonly name="evolution" class="col-md-10 form-control" value="{{$uro->evolution}}">
                        </div>
                    </div>

                    @if($uro->evolution === 'rechute')
                        <div id="ifevolution"  class="col" style="display: block">
                            <div class="form-group row">
                                <label class="col-md-2 font-weight-bold text-right">Nombre de rechute:</label>
                                <input type="text" readonly name="nombrerechute" class="col-md-10 form-control" value="{{$uro->nombrerechute}}">
                            </div>
                        </div>
                    @endif

                    <div id="traitement_recu"   class="col" style="display: block">
                        <div class="form-group row">
                            <label for="traitement" class="col-md-2 font-weight-bold text-right">Traitement reçu:</label>
                            <input type="text" readonly name="traitement" class="col-md-10 form-control" value="{{$uro->traitement}}">
                        </div>
                    </div>

                    @if($uro->traitment === 'corticoide')
                        <div id="dose_corticoide"  class="col" style="display: block">
                            <div class="form-group row">
                                <label class="col-md-2 font-weight-bold text-right">Dose traitement Corticoïdes:</label>
                                <input type="text" readonly name="dose_corticoide" class="col-md-10 form-control" value="{{$uro->dose_corticoide}}">
                            </div>
                        </div>

                        <div id="duree_corticoide"  class="col" style="display: block">
                            <div class="form-group row">
                                <label class="col-md-2 font-weight-bold text-right">Durée traitement Corticoïdes:</label>
                                <input type="text" readonly name="duree_corticoide" class="col-md-10 form-control" value="{{$uro->duree_corticoide}}">
                            </div>
                        </div>
                    @endif

                    {{--@if($uro->traitement === 'autre' && $uro->nom === 'proteinurie')
                        <div id="precision_traitement"   class="col" style="display:block;">
                            <div class="form-group row">
                                <label class="col-md-2 font-weight-bold text-right">Précision du traitement:</label>
                                <input type="text" readonly name="precisiontraitement" class="col-md-10 form-control" value="">
                            </div>
                        </div>
                    @endif--}}
                @else
                    <div id="nombre_episode"  class="col" style="display: none">
                        <div class="form-group row">
                            <label class="col-md-2 font-weight-bold text-right" for="nombreepisode">Nombre épisodes:</label>
                            <input type="text" readonly name="nombreepisode" placeholder="Nombre d'épisodes" id="nombreepisode" class="col-md-10 form-control" value="{{$uro->nombreepisodes}}">
                        </div>
                    </div>
                    <div id="nombre_episode"  class="col" style="display: none">
                        <div class="form-group row">
                            <label class="col-md-2 font-weight-bold text-right">Siège:</label>
                            <input type="text" readonly name="siegeoeudeme" class="col-md-10 form-control" value="{{$uro->siegeoeudeme}}">
                        </div>
                    </div>

                    <div id="ifevolution"  class="col" style="display: none">
                        <div class="form-group row">
                            <label for="evolution" class="col-md-2 font-weight-bold text-right">Evolution:</label>
                            <input type="text" readonly name="evolution" class="col-md-10 form-control" value="{{$uro->evolution}}">
                        </div>
                    </div>

                    <div id="ifevolution"  class="col" style="display: none">
                        <div class="form-group row">
                            <label class="col-md-2 font-weight-bold text-right">Nombre de rechute:</label>
                            <input type="text" readonly name="nombrerechute" class="col-md-10 form-control" value="{{$uro->nombrerechute}}">
                        </div>
                    </div>
                    <div id="traitement_recu"   class="col" style="display: none">
                        <div class="form-group row">
                            <label for="traitement" class="col-md-2 font-weight-bold text-right">Traitement reçu:</label>
                            <input type="text" readonly name="traitement" class="col-md-10 form-control" value="{{$uro->traitement}}">
                        </div>
                    </div>

                    <div id="precision_traitement"   class="col" style="display:none;">
                        <div class="form-group row">
                            <label class="col-md-2 font-weight-bold text-right">Précision du traitement:</label>
                            <input type="text" readonly name="precisiontraitement" class="col-md-10 form-control" value="">
                        </div>
                    </div>

                    <div id="dose_corticoide"  class="col" style="display: none">
                        <div class="form-group row">
                            <label class="col-md-2 font-weight-bold text-right">Dose traitement Corticoïdes:</label>
                            <input type="text" readonly name="dose_corticoide" class="col-md-10 form-control" value="{{$uro->dose_corticoide}}">
                        </div>
                    </div>

                    <div id="duree_corticoide"  class="col" style="display: none">
                        <div class="form-group row">
                            <label class="col-md-2 font-weight-bold text-right">Durée traitement Corticoïdes:</label>
                            <input type="text" readonly name="duree_corticoide" class="col-md-10 form-control" value="{{$uro->duree_corticoide}}">
                        </div>
                    </div>
                @endif

                @if($uro->nom === 'hematurie')
                    <div id="type_hematurie"  class="col" style="display: block">
                        <div class="form-group row">
                            <label class="col-md-2 font-weight-bold text-right">Type Hématurie:</label>
                            <input type="text" readonly name="type_hematurie" class="col-md-10 form-control" value="{{$uro->type_hematurie}}">
                        </div>
                    </div>

                    <div id="signe_accompagnement"  class="col" style="display: block">
                        <div class="form-group row">
                            <label class="col-md-2 font-weight-bold text-right">Signe d'accompagnement:</label>
                            <input type="text" readonly name="signeaccompagnement" class="col-md-10 form-control" value="{{$uro->signe_accompagnement}}">
                        </div>
                    </div>
                @else
                    <div id="type_hematurie"  class="col" style="display: none">
                        <div class="form-group row">
                            <label class="col-md-2 font-weight-bold text-right">Type Hématurie:</label>
                            <input type="text" readonly name="type_hematurie" class="col-md-10 form-control" value="{{$uro->type_hematurie}}">
                        </div>
                    </div>

                    <div id="signe_accompagnement"  class="col" style="display: none">
                        <div class="form-group row">
                            <label class="col-md-2 font-weight-bold text-right">Signe d'accompagnement:</label>
                            <input type="text" readonly name="signeaccompagnement" class="col-md-10 form-control" value="{{$uro->signe_accompagnement}}">
                        </div>
                    </div>
                @endif

                @if($uro->nom === 'troublemictiondiurese')
                    <div id="type_trouble"  class="col" style="display: block">
                        <div class="form-group row">
                            <label class="col-md-2 font-weight-bold text-right">Type Troubles de la miction et de la diurèse:</label>
                            <input type="text" readonly name="type_trouble" class="col-md-10 form-control" value="{{$uro->type_trouble}}">
                        </div>
                    </div>

                    @if($uro->type_trouble === 'autre')
                        <div id="precision_autre_trouble" class="col" style="display: block">
                            <div id="" class="form-group row">
                                <label class="col-md-2 font-weight-bold text-right">Précision du type:</label>
                                <input type="text" readonly name="precisiontype" class="col-md-10 form-control" value="{{$uro->precision_type}}">
                            </div>
                        </div>
                    @endif

                    <div id="traitement_trouble"  class="col" style="display: block">
                        <div id="" class="form-group row">
                            <label class="col-md-2 font-weight-bold text-right">Traitement du trouble:</label>
                            <input type="text" readonly name="traitement_trouble" class="col-md-10 form-control" value="{{$uro->traitement_trouble}}">
                        </div>
                    </div>
                @else
                    <div id="type_trouble"  class="col" style="display: none">
                        <div class="form-group row">
                            <label class="col-md-2 font-weight-bold text-right">Type Troubles de la miction et de la diurèse:</label>
                            <input type="text" readonly name="type_trouble" class="col-md-10 form-control" value="{{$uro->type_trouble}}">
                        </div>
                    </div>

                    <div id="precision_autre_trouble" class="col" style="display: none">
                        <div id="" class="form-group row">
                            <label class="col-md-2 font-weight-bold text-right">Précision du type:</label>
                            <input type="text" readonly name="precisiontype" class="col-md-10 form-control" value="{{$uro->precision_type}}">
                        </div>
                    </div>

                    <div id="traitement_trouble"  class="col" style="display: none">
                        <div id="" class="form-group row">
                            <label class="col-md-2 font-weight-bold text-right">Traitement du trouble:</label>
                            <input type="text" readonly name="traitement_trouble" class="col-md-10 form-control" value="{{$uro->traitement_trouble}}">
                        </div>
                    </div>
                @endif

                {{--<div class="d-flex justify-content-center">
                    <div class="btn btn-secondary"><a href="#" style="color: white">imprimer</a></div>
                </div>--}}
            </div>
        </div>
    </div>
@endsection



