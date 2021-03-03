@extends('layouts.medlayout')

@section('content')
    <h1 class="text-center" style="background-color: #01A9CB; height: 30px; font-size: large; padding-top: 5px; font-weight: bold">Examens Cliniques</h1>
    <div class="container-fluid p-2" style="background-color: white">
        <div class="card p-2">
            <div class="card-header text-center font-weight-bold text-uppercase">Antécédent Examen Général de {{$patient->prenom}} {{$patient->nom}} [ Consultation du {{$consult->created_at}}]</div>
            <div class="card-body">
                <div class="col">
                    <div class="form-group row">
                        <input type="text" readonly name="taille" placeholder="Taille" class="col-md-2 form-control" value="{{$general->taille}}">
                        <input type="text" readonly name="poids" placeholder="Poids" class="col-md-2 form-control" value="{{$general->poids}}">
                        <input type="text" readonly name="sc" placeholder="SC" class="col-md-2 form-control" value="{{$general->sc}}">
                        <input type="text" readonly name="ta" placeholder="TA" class="col-md-2 form-control" value="{{$general->ta}}">
                        <input type="text" readonly name="pouls" placeholder="Pouls" class="col-md-2 form-control" value="{{$general->pouls}}">
                        <input type="text" readonly name="temperature" placeholder="Température" class="col-md-2 form-control" value="{{$general->temperature}}">
                    </div>
                </div>

                <div class="col">
                    <div class="form-group row">
                        <label class="text-right col-md-2 font-weight-bold">Etat général</label>
                        <input type="text" readonly name="etatgeneral" class="col-md-10 form-control" value="{{$general->etatgeneral}}">
                    </div>
                </div>

                @if($general->etatgeneral === 'amaigrissement')
                    <div class="col" style="display: block">
                        <div class="form-group row" id="amaigrissement">
                            <label class="text-right col-md-2 font-weight-bold">Estimer la perte de poids:</label>
                            <input type="text" readonly name="pertepoid" class="col-md-4 form-control" value="{{$general->poidsperdu}}">
                            <label class="text-right col-md-2 font-weight-bold">Estimer la durée:</label>
                            <input type="text" readonly name="duree_amaigrissement" class="col-md-4 form-control" value="{{$general->duree_amaigrissement}}">
                        </div>
                    </div>
                @else
                    <div class="col" style="display: none">
                        <div class="form-group row" id="amaigrissement">
                            <label class="text-right col-md-2 font-weight-bold">Estimer la perte de poids:</label>
                            <input type="text" readonly name="pertepoid" class="col-md-4 form-control" value="{{$general->poidsperdu}}">
                            <label class="text-right col-md-2 font-weight-bold">Estimer la durée:</label>
                            <input type="text" readonly name="duree_amaigrissement" class="col-md-4 form-control" value="{{$general->duree_amaigrissement}}">
                        </div>
                    </div>
                @endif

                <div class="col">
                    <div class="form-group row">
                        <label class="text-right col-md-2 font-weight-bold">Conjonctives:</label>
                        <input type="text" readonly name="conjonctive"  class="col-md-4 form-control" value="{{$general->conjonctive}}">
                        <label class="text-right col-md-2 font-weight-bold">Langue:</label>
                        <input type="text" readonly name="etat_langue"  class="col-md-4 form-control" value="{{$general->etat_langue}}">
                    </div>
                </div>

                @if($general->etat_langue === 'autre')
                    <div class="col" id="lesion_langue" style="display: block">
                        <div class="form-group row">
                            <label class="text-right col-md-2 font-weight-bold">Autres lésions:</label>
                            <input type="text" readonly name="lesion_langue"  class="col-md-10 form-control" value="{{$general->autre_lesion_langue}}">
                        </div>
                    </div>
                @else
                    <div class="col" id="lesion_langue" style="display: none">
                        <div class="form-group row">
                            <label class="text-right col-md-2 font-weight-bold">Autres lésions:</label>
                            <input type="text" readonly name="lesion_langue"  class="col-md-10 form-control" value="{{$general->autre_lesion_langue}}">
                        </div>
                    </div>
                @endif

                <div class="col">
                    <div class="form-group row">
                        <label class="text-right col-md-2 font-weight-bold">Œdèmes:</label>
                        <input type="text" readonly name="oeudeme" class="col-md-4 form-control" value="{{$general->oeudeme}}">
                        <label class="text-right font-weight-bold col-md-2">Siège Œdèmes:</label>
                        <input type="text" readonly name="siege" class="col-md-4 form-control" value="{{$general->siegeoeudeme}}">
                    </div>
                </div>

                <div class="col">
                    <div class="form-group row">
                        <label class="text-right font-weight-bold col-md-2">Déshydratation:</label>
                        <input type="text" readonly name="deshydratation" class="col-md-10 form-control" value="{{$general->deshydratation}}">
                    </div>
                </div>

                {{--<div class="d-flex justify-content-center">
                    <div class="btn btn-secondary"><a href="#" style="color: white">imprimer</a></div>
                </div>--}}
            </div>
        </div>
    </div>
@endsection
