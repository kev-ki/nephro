@extends('layouts.medlayout')

@section('content')
    <h1 class="text-center" style="background-color: #01A9CB; height: 30px; font-size: large; padding-top: 5px; font-weight: bold">Examens Cliniques</h1>
    <div class="container-fluid p-2" style="background-color: white">
        <div class="card p-2">
            <div class="card-header text-center font-weight-bold text-uppercase">Antécédent Examen des Appareils de {{$patient->prenom}} {{$patient->nom}} [ Consultation du {{$consult->created_at}}]</div>
            <div class="card-body">
                <div class="col">
                    <div class="form-group row">
                        <label for="nomexamen"  class="col-2 text-right col-form-label font-weight-bold">Nom Appareil :</label>
                        <input type="text" readonly id="nomexamen" name="nomexamen" class="col-4 form-control" value="{{$appareil->nom_examen}}">
                        <label for="date"  class="col-2 text-right col-form-label font-weight-bold">Date:</label>
                        <input type="date" readonly id="date" name="dateexamen"  class="col-4 form-control" value="{{$appareil->date_examen}}">
                    </div>
                </div>

                @if($appareil->nom_examen === 'autre')
                    <div class="col" id="nom_autre" style="display: block">
                        <div class="form-group row">
                            <label  class="col-2 text-right col-form-label font-weight-bold">Nom de l'examen:</label>
                            <input type="text" readonly name="nom_autre" class="col-10 form-control" value="{{$appareil->nom_autre}}">
                        </div>
                    </div>
                @else
                    <div class="col" id="nom_autre" style="display: none">
                        <div class="form-group row">
                            <label  class="col-2 text-right col-form-label font-weight-bold">Nom de l'examen:</label>
                            <input type="text" readonly name="nom_autre" class="col-10 form-control" value="{{$appareil->nom_autre}}">
                        </div>
                    </div>
                @endif

                <div class="col">
                    <div class="form-group row">
                        <label for="examen"  class="col-2 text-right col-form-label font-weight-bold">Informations Examen:</label>
                        <textarea readonly name="infoexamen" id="examen"  class="col-10 form-control" rows="3"> {{$appareil->details}}</textarea>
                    </div>
                </div>

                {{--<div class="d-flex justify-content-center">
                    <div class="btn btn-secondary"><a href="#" style="color: white">imprimer</a></div>
                </div>--}}
            </div>
        </div>
    </div>
@endsection
