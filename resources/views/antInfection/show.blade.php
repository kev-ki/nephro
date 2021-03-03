@extends('layouts.medlayout')

@section('content')
    <h1 class="text-center" style="background-color: #01A9CB; height: 30px; font-size: large; padding-top: 5px; font-weight: bold">Antécédents médicaux</h1>
    <div class="container-fluid p-2" style="background-color: white">
        <div class="card p-2">
            <div class="card-header text-center font-weight-bold text-uppercase">Antécédent Infectieux de {{$patient->prenom}} {{$patient->nom}} [ Consultation du {{$consult->created_at}}]</div>
            <div class="card-body">
                <div class="col">
                    <div class="form-group row">
                        <label for="infection" class="text-right font-weight-bold col-md-2">Nom infection:</label>
                        <input readonly  type="text"  name="nom" class="form-control col-md-10" id="infection" value="{{$infection->nom_infection}}">
                    </div>
                </div>

                @if($infection->nom_infection === 'infectionfocale' || $infection->nom_infection === 'infectionurinaire' || $infection->nom_infection === 'infectionvirale')
                    <div id="typeInfection" style="display: block" class="col">
                        <div class="form-group row">
                            <label for="type" class="text-right col-md-2 font-weight-bold">Type infection:</label>
                            <input readonly  type="text"  class="form-control col-md-10" id="type" value="{{$infection->type_infection}}">
                        </div>
                    </div>

                    @if($infection->type_infection === 'autre')
                        <div id="precision_autre" style="display: block"  class="col">
                            <div class="form-group row">
                                <label class="text-right col-md-2 font-weight-bold">Précision type:</label>
                                <input readonly  type="text" name="precision" class="col-md-10 form-control" value="{{$infection->precision_type}}">
                            </div>
                        </div>
                    @endif

                    @if($infection->type_infection === 'vih')
                        <div id="type_vih" style="display: block" class="col">
                            <div class="form-group row">
                                <label class="text-right col-md-2 font-weight-bold">Type VIH:</label>
                                <input readonly  type="text" name="type_vih" class="col-md-10 form-control" value="{{$infection->typeVIH}}">
                            </div>
                        </div>
                    @endif

                    <div id="episode" style="display: block" class="col">
                        <div class="form-group row">
                            <label class="text-right col-md-2 font-weight-bold">Nombres d'épisode:</label>
                            <input readonly  type="text" name="nombreepisode" class="col-md-10 form-control" value="{{$infection->nombreepisode}}">
                        </div>
                    </div>
                    @if($infection->nom_infection != 'infectionvirale')
                        <div id="datedernierepisode" style="display: block" class="col">
                            <div class="form-group row">
                                <label class="text-right font-weight-bold col-md-2">Date du dernier épisode:</label>
                                <input readonly  type="date" name="datedernierepisode" class="form-control col-md-10" value="{{$infection->date_last_episode}}">
                            </div>
                        </div>
                    @endif

                @else
                    <div id="typeInfection" style="display: none" class="col">
                        <div class="form-group row">
                            <label for="type" class="text-right col-md-2 font-weight-bold">Type infection:</label>
                            <input readonly  type="text"  class="form-control col-md-10" id="type" value="{{$infection->type_infection}}">
                        </div>
                    </div>
                    <div id="precision_autre" style="display: none"  class="col">
                        <div class="form-group row">
                            <label class="text-right col-md-2 font-weight-bold">Précision type:</label>
                            <input readonly  type="text" name="precision" class="col-md-10 form-control" value="{{$infection->precision_type}}">
                        </div>
                    </div>
                    <div id="type_vih" style="display: none" class="col">
                        <div class="form-group row">
                            <label class="text-right col-md-2 font-weight-bold">Type VIH:</label>
                            <input readonly  type="text" name="type_vih" class="col-md-10 form-control" value="{{$infection->typeVIH}}">
                        </div>
                    </div>
                    <div id="episode" style="display: none" class="col">
                        <div class="form-group row">
                            <label class="text-right col-md-2 font-weight-bold">Nombres d'épisode:</label>
                            <input readonly  type="text" name="nombreepisode" class="col-md-10 form-control" value="{{$infection->nombreepisode}}">
                        </div>
                    </div>
                    <div id="datedernierepisode" style="display: none" class="col">
                        <div class="form-group row">
                            <label class="text-right font-weight-bold col-md-2">Date du dernier épisode:</label>
                            <input readonly  type="date" name="datedernierepisode" class="form-control col-md-10" value="{{$infection->date_last_episode}}">
                        </div>
                    </div>
                @endif

                @if($infection->nom_infection === 'infectionvirale' || $infection->nom_infection === 'bilharziose' || $infection->nom_infection === 'tuberculose')
                    <div id="siege_infection" style="display: block" class="col">
                        <div class="form-group row">
                            <label class="text-right font-weight-bold col-md-2">Siège infection:</label>
                            <input readonly  type="text" name="siegeinfection" class="form-control col-md-10" value="{{$infection->siege_infection}}">
                        </div>
                    </div>
                    <div id="decouverte" style="display: block" class="col">
                        <div class="form-group row">
                            <label class="text-right font-weight-bold col-md-2">Date de découverte:</label>
                            <input readonly  type="date" name="datedecouverte" class="form-control col-md-10" value="{{$infection->datedecouverte}}">
                        </div>
                    </div>
                @else
                    <div id="siege_infection" style="display: none" class="col">
                        <div class="form-group row">
                            <label class="text-right font-weight-bold col-md-2">Siège infection:</label>
                            <input readonly  type="text" name="siegeinfection" class="form-control col-md-10" value="{{$infection->siege_infection}}">
                        </div>
                    </div>
                    <div id="decouverte" style="display: none" class="col">
                        <div class="form-group row">
                            <label class="text-right font-weight-bold col-md-2">Date de découverte:</label>
                            <input readonly  type="date" name="datedecouverte" class="form-control col-md-10" value="{{$infection->datedecouverte}}">
                        </div>
                    </div>
                @endif

                @if($infection->nom_infection === 'paludisme')
                    <div id="nombreacces" style="display: block" class="col">
                        <div class="form-group row">
                            <label class="text-right col-md-2 font-weight-bold">Nombres d'accès par an:</label>
                            <input readonly  type="text" name="nombreacces" class="col-md-10 form-control" value="{{$infection->nb_acces_par_an}}">
                        </div>
                    </div>
                @else
                    <div id="nombreacces" style="display: none" class="col">
                        <div class="form-group row">
                            <label class="text-right col-md-2 font-weight-bold">Nombres d'accès par an:</label>
                            <input readonly  type="text" name="nombreacces" class="col-md-10 form-control" value="{{$infection->nb_acces_par_an}}">
                        </div>
                    </div>
                @endif


                <div id="traitement" class="col">
                    <div class="form-group row">
                        <label class="text-right col-md-2 font-weight-bold">Traitement reçu:</label>
                        <input readonly  type="text" name="traitement" class="col-md-10 form-control" value="{{$infection->traitement}}">
                    </div>
                </div>

                @if($infection->nom_infection === 'tuberculose')
                    <div id="duree_tuberculose" style="display: block" class="col">
                        <div class="form-group row">
                            <label class="text-right font-weight-bold col-md-2">Durée traitement tuberculose:</label>
                            <input readonly  type="text" name="duree" class="form-control col-md-10" value="{{$infection->duree_tuberculose}}">
                        </div>
                    </div>
                @else
                    <div id="duree_tuberculose" style="display: none" class="col">
                        <div class="form-group row">
                            <label class="text-right font-weight-bold col-md-2">Durée traitement tuberculose:</label>
                            <input readonly  type="text" name="duree" class="form-control col-md-10" value="{{$infection->duree_tuberculose}}">
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
