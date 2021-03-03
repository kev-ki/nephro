@extends('layouts.medlayout')

@section('content')
    <h1 class="text-center" style="background-color: #01A9CB; height: 30px; font-size: large; padding-top: 5px; font-weight: bold">Antécédents médicaux</h1>
    <div class="container-fluid p-2" style="background-color: white">
        <div class="flash-message col-md-12">
            @if(Session::has('message'))
                <div class="alert {{Session::get('alert-class')}}">
                    {{session::get('message')}}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                </div>
            @endif
        </div>
        <div class="card p-2">
            <div class="card-header text-center font-weight-bold text-uppercase">Infections</div>
            <div class="card-body">
                <form action="{{route('infection.store')}}" method="post">
                    @csrf
                    <div class="col">
                        <div class="form-group row">
                            <label for="infection" class="text-right font-weight-bold col-md-2">Nom infection:</label>
                            <select onchange="showHideInfection(this)" id="infection" class="selectpicker form-control col-md-10" data-live-search="true" data-placeholder="Choisir une infection" data-style="btn-perso btn-outline-secondary" name="nom" >
                                <option value="infectionfocale">Infection focale</option>
                                <option value="infectionurinaire">Infection urinaire</option>
                                <option value="bilharziose">Bilharziose</option>
                                <option value="paludisme">Paludisme</option>
                                <option value="infectionvirale">Infection virale</option>
                                <option value="tuberculose">Tuberculose</option>
                            </select>
                        </div>
                    </div>

                    <div id="typeInfection" style="display: none" class="col">
                        <div class="form-group row">
                            <label class="text-right col-md-2 font-weight-bold">Type infection:</label>
                            <select class="selectpicker form-control col-md-10" onchange="infectiontype()" id="type" data-live-search="true" data-placeholder="Choisir le type d'infection" data-style="btn-perso btn-outline-secondary" name="type_infection" >
                                <option class="font-weight-bold" disabled>Type Infection focale</option>
                                <option value="angine">Angines</option>
                                <option value="otite">Otites</option>
                                <option value="rhinite">Rhinites</option>
                                <option value="sinusite">Sinusites</option>
                                <option value="cariedentaire">Caries dentaires</option>
                                <option value="furonculose">Furonculoses</option>
                                <option value="gale">Gales</option>

                                <option class="font-weight-bold" disabled>Type Infection urinaire</option>
                                <option value="uretrite">Uretrite</option>
                                <option value="prostatite">Prostatite</option>
                                <option value="cystite">Cystite</option>
                                <option value="pna">PNA</option>

                                <option class="font-weight-bold" disabled>Type Infection virale</option>
                                <option value="vih">VIH</option>
                                <option value="hepatite b">Hépatite B</option>
                                <option value="hepatite c">Hépatite C</option>

                                <option class="font-weight-bold" disabled>Autres</option>
                                <option value="autre">Autre</option>
                            </select>
                        </div>
                    </div>

                    <div id="precision_autre" style="display: none"  class="col">
                        <div class="form-group row">
                            <label class="text-right col-md-2 font-weight-bold">Précision type:</label>
                            <input type="text" name="precision" class="col-md-10 form-control">
                        </div>
                    </div>

                    <div id="type_vih" style="display: none" class="col">
                        <div class="form-group row">
                            <label class="text-right col-md-2 font-weight-bold">Type VIH:</label>
                            <input type="text" name="type_vih" class="col-md-10 form-control">
                        </div>
                    </div>

                    <div id="episode" style="display: none" class="col">
                        <div class="form-group row">
                            <label class="text-right col-md-2 font-weight-bold">Nombres d'épisode:</label>
                            <input type="text" name="nombreepisode" class="col-md-10 form-control">
                        </div>
                    </div>

                    <div id="nombreacces" style="display: none" class="col">
                        <div class="form-group row">
                            <label class="text-right col-md-2 font-weight-bold">Nombres d'accès par an:</label>
                            <input type="text" name="nombreacces" class="col-md-10 form-control">
                        </div>
                    </div>

                    <div id="datedernierepisode" style="display: none" class="col">
                        <div class="form-group row">
                            <label class="text-right font-weight-bold col-md-2">Date du dernier épisode:</label>
                            <input type="date" name="datedernierepisode" class="form-control col-md-10">
                        </div>
                    </div>

                    <div id="siege_infection" style="display: none" class="col">
                        <div class="form-group row">
                            <label class="text-right font-weight-bold col-md-2">Siège infection:</label>
                            <input type="text" name="siegeinfection" class="form-control col-md-10">
                        </div>
                    </div>

                    <div id="decouverte" style="display: none" class="col">
                        <div class="form-group row">
                            <label class="text-right font-weight-bold col-md-2">Date de découverte:</label>
                            <input type="date" name="datedecouverte" class="form-control col-md-10">
                        </div>
                    </div>

                    <div id="traitement" class="col">
                        <div class="form-group row">
                            <label class="text-right col-md-2 font-weight-bold">Traitement reçu:</label>
                            <input type="text" name="traitement" class="col-md-10 form-control">
                        </div>
                    </div>

                    <div id="duree_tuberculose" style="display: none" class="col">
                        <div class="form-group row">
                            <label class="text-right font-weight-bold col-md-2">Durée traitement tuberculose:</label>
                            <input type="text" name="duree" class="form-control col-md-10">
                        </div>
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary mr-1">Enregistrer</button>
                        <div class="btn btn-secondary"><a style="color: white" href="{{route('maladiegenerale.create')}}">Suivant</a></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection



