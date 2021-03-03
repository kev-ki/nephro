@extends('layouts.medlayout')

@section('content')
    <h1 class="text-center" style="background-color: #01A9CB; height: 30px; font-size: large; padding-top: 5px; font-weight: bold">Antécédents Paracliniques</h1>
    <div class="container-fluid p-2" style="background-color: white">
        <div class="card p-2">
            <div class="card-header text-center font-weight-bold text-uppercase">Résultat Electrophorère des proteines de {{$patient->prenom}} {{$patient->nom}} [ Consultation du {{$consult->created_at}}]</div>
            <div class="card-body">
                <div class="col">
                    <div class="form-group row">
                        <label class="text-right col-form-label col-2 font-weight-bold">Date:</label>
                        <input type="date" readonly name="date" class="form-control col-4" value="{{$electrophorese->date}}">
                        <label class="text-right col-form-label col-2 font-weight-bold">Type Electrophorèse:</label>
                        <input type="text" readonly name="type" class="form-control col-4" value="{{$electrophorese->type}}">
                    </div>
                </div>

                <div class="col">
                    <div class="form-group row">
                        <label class="text-right col-form-label col-2 font-weight-bold">Protide:</label>
                        <input type="text" readonly name="protide" class="form-control col-4" value="{{$electrophorese->protide}}">
                        <label class="text-right col-form-label col-2 font-weight-bold">Albumine: </label>
                        <input type="text" readonly name="albumine" class="form-control col-4" value="{{$electrophorese->albumine}}">
                    </div>
                </div>

                <div class="col">
                    <div class="form-group row">
                        <label class="text-right col-form-label col-2 font-weight-bold">Alpha 1:</label>
                        <input type="text" readonly name="alpha1" class="form-control col-4" value="{{$electrophorese->alpha1}}">
                        <label class="text-right col-form-label col-2 font-weight-bold">Alpha 2:</label>
                        <input type="text" readonly name="alpha2" class="form-control col-4" value="{{$electrophorese->alpha2}}">
                    </div>
                </div>

                <div class="col">
                    <div class="form-group row">
                        <label class="text-right col-form-label col-2 font-weight-bold">Gamma:</label>
                        <input type="text" readonly name="gamma" class="form-control col-4" value="{{$electrophorese->gamma}}">
                        <label class="text-right col-form-label col-2 font-weight-bold">Beta:</label>
                        <input type="text" readonly name="beta" class="form-control col-4" value="{{$electrophorese->beta}}">
                    </div>
                </div>


                {{--<div class="d-flex justify-content-center">
                    <div class="btn btn-secondary"><a href="#" style="color: white">imprimer</a></div>
                </div>--}}
            </div>
        </div>
    </div>
@endsection
