@extends('layouts.medlayout')

@section('content')
    <h1 class="text-center" style="background-color: #01A9CB; height: 30px; font-size: large; padding-top: 5px; font-weight: bold">Antécédents Paracliniques</h1>
    <div class="container-fluid p-2" style="background-color: white">
        <div class="card p-2">
            <div class="card-header text-center font-weight-bold text-uppercase">Résultat Liquide  Biologique et Selle de {{$patient->prenom}} {{$patient->nom}} [ Consultation du {{$consult->created_at}}]</div>
            <div class="card-body">
                <div class="col">
                    <div class="form-group row">
                        <label class="text-right col-form-label col-2 font-weight-bold">Date:</label>
                        <input type="date" readonly name="date" class="form-control col-4" value="{{$liquide->date}}">
                        <label class="text-right col-form-label col-2 font-weight-bold">Nature: </label>
                        <input type="text" readonly name="nature" class="form-control col-4" value="{{$liquide->nature}}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label class="text-right col-form-label col-2 font-weight-bold">Analyse: </label>
                        <textarea readonly class="form-control col-10" name="analyse">{{$liquide->analyse}}</textarea>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label class="text-right col-form-label col-2 font-weight-bold">Antibiogramme: </label>
                        <textarea readonly class="form-control col-10" name="antibiogramme">{{$liquide->antibiogramme}}</textarea>
                    </div>
                </div>

                {{--<div class="d-flex justify-content-center">
                    <div class="btn btn-secondary"><a href="#" style="color: white">imprimer</a></div>
                </div>--}}
            </div>
        </div>
    </div>
@endsection
