@extends('layouts.medlayout')

@section('content')
    <h1 class="text-center" style="background-color: #01A9CB; height: 30px; font-size: large; padding-top: 5px; font-weight: bold">Antécédents chirurgicaux</h1>
    <div class="container-fluid p-2" style="background-color: white">
        <div class="card p-2">
            <div class="card-header text-center font-weight-bold text-uppercase">Antécédent Chirurgical de {{$patient->prenom}} {{$patient->nom}} [ Consultation du {{$consult->created_at}}]</div>
            <div class="card-body">
                <div class="col">
                    <div class="form-group row">
                        <label class="col-md-2 font-weight-bold text-right">Date:</label>
                        <input type="date" readonly name="date" class="col-md-10 form-control" value="{{$chirurgie->date}}">
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 font-weight-bold text-right">Informations des antécédents:</label>
                        <textarea readonly type="text" class="form-control col-md-10" style="height: 200px;" name="chirurgical">{{$chirurgie->infochirurgie}}</textarea>
                    </div>
                </div>

                {{--<div class="d-flex justify-content-center">
                    <div class="btn btn-secondary"><a href="#" style="color: white">imprimer</a></div>
                </div>--}}
            </div>
        </div>
    </div>
@endsection
