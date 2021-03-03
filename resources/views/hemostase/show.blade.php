@extends('layouts.medlayout')

@section('content')
    <h1 class="text-center" style="background-color: #01A9CB; height: 30px; font-size: large; padding-top: 5px; font-weight: bold">Antécédents Paracliniques</h1>
    <div class="container-fluid p-2" style="background-color: white">
        <div class="card p-2">
            <div class="card-header text-center font-weight-bold text-uppercase">Résultat Hémostase de {{$patient->prenom}} {{$patient->nom}} [ Consultation du {{$consult->created_at}}]</div>
            <div class="card-body">
                <div class="col">
                    <div class="form-group row">
                        <label class="text-right col-form-label col-2 font-weight-bold">Date:</label>
                        <input type="date" readonly name="date" class="form-control col-4" value="{{$hemostase->date}}">
                        <label class="text-right col-form-label col-2 font-weight-bold">TP:</label>
                        <input type="text" readonly name="tp" class="form-control col-4" value="{{$hemostase->tp}}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label class="text-right col-form-label col-2 font-weight-bold">TCA:</label>
                        <input type="text" readonly name="tca" class="form-control col-4" value="{{$hemostase->tca}}">
                        <label class="text-right col-form-label col-2 font-weight-bold">INR:</label>
                        <input type="text" readonly name="inr" class="form-control col-4" value="{{$hemostase->inr}}">
                    </div>
                    <div class="form-group row">
                        <label class="text-right col-form-label col-2 font-weight-bold">TCK:</label>
                        <input type="text" readonly name="tck" class="form-control col-4" value="{{$hemostase->tck}}">
                        <label class="text-right col-form-label col-2 font-weight-bold">D-Dimères:</label>
                        <input type="text" readonly name="dimere" class="form-control col-4" value="{{$hemostase->dimere}}">
                    </div>
                </div>

                {{--<div class="d-flex justify-content-center">
                    <div class="btn btn-secondary"><a href="#" style="color: white">imprimer</a></div>
                </div>--}}
            </div>
        </div>
    </div>
@endsection
