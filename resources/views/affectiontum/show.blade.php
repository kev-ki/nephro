@extends('layouts.medlayout')

@section('content')
    <h1 class="text-center" style="background-color: #01A9CB; height: 30px; font-size: large; padding-top: 5px; font-weight: bold">Antécédents médicaux</h1>
    <div class="container-fluid p-2" style="background-color: white">
        <div class="card p-2">
            <div class="card-header text-center font-weight-bold text-uppercase">Antécédent Affection Tumorale Maligne de {{$patient->prenom}} {{$patient->nom}} [ Consultation du {{$consult->created_at}}]</div>
            <div class="card-body">
                <div class="col">
                    <div class="form-group row">
                        <label class="font-weight-bold col-md-2 text-right">Type:</label>
                        <input type="text" readonly name="type" class="form-control col-md-4" value="{{$tumorale->type_affection}}">
                        <label class="font-weight-bold col-md-2 text-right">Date de découverte:</label>
                        <input type="date" readonly name="datedecouverte" class="form-control col-md-4" value="{{$tumorale->date_decouverte}}">
                    </div>
                </div>

                <div class="col">
                    <div class="form-group row">
                        <label class="font-weight-bold col-md-2 text-right">Traitement:</label>
                        <input type="text" readonly name="traitement" class="form-control col-md-10" value="{{$tumorale->traitement}}">
                    </div>
                </div>

                {{--<div class="d-flex justify-content-center">
                    <div class="btn btn-secondary"><a href="#" style="color: white">imprimer</a></div>
                </div>--}}
            </div>
        </div>
    </div>
@endsection
