@extends('layouts.medlayout')

@section('content')
    <h1 class="text-center" style="background-color: #01A9CB; height: 30px; font-size: large; padding-top: 5px; font-weight: bold">Antécédents médicaux</h1>
    <div class="container-fluid p-2" style="background-color: white">
        <div class="card p-2">
            <div class="card-header text-center font-weight-bold text-uppercase">Antécédent Affection Immunologique de {{$patient->prenom}} {{$patient->nom}} [ Consultation du {{$consult->created_at}}]</div>
            <div class="card-body">
                <div class="col">
                    <div class="form-group row">
                        <label class="col-md-2 font-weight-bold text-right">Nom affection:</label>
                        <input type="text" readonly name="nom" class="col-md-4 form-control" value="{{$imm->nom_affection}}">
                        <label class="col-md-2 font-weight-bold text-right">Date de découverte:</label>
                        <input type="date" readonly name="datedecouverte" class="col-md-4 form-control" value="{{$imm->date_decouverte}}">
                    </div>
                </div>

                @if($imm->nom_affection === 'autre')
                    <div id="precision_imm" style="display: block" class="col">
                        <div class="form-group row">
                            <label class="col-md-2 font-weight-bold text-right">precisez le nom:</label>
                            <input type="text" readonly name="precision" class="col-md-10 form-control" value="{{$imm->precision_autre}}">
                        </div>
                    </div>
                @else
                    <div id="precision_imm" style="display: none" class="col">
                        <div class="form-group row">
                            <label class="col-md-2 font-weight-bold text-right">precisez le nom:</label>
                            <input type="text" readonly name="precision" class="col-md-10 form-control" value="{{$imm->precision_autre}}">
                        </div>
                    </div>
                @endif

                <div class="col">
                    <div class="form-group row">
                        <label class="col-md-2 font-weight-bold text-right">Type affection:</label>
                        <input type="text" readonly name="type" class="col-md-10 form-control" value="{{$imm->type_affection}}">
                    </div>
                </div>

                <div id="traitement_imm" class="col">
                    <div class="form-group row">
                        <label class="col-md-2 font-weight-bold text-right">Traitement:</label>
                        <input type="text" readonly name="traitement" class="col-md-10 form-control" value="{{$imm->traitement}}">
                    </div>
                </div>

                {{--<div class="d-flex justify-content-center">
                    <div class="btn btn-secondary"><a href="#" style="color: white">imprimer</a></div>
                </div>--}}
            </div>
        </div>
    </div>
@endsection
