@extends('layouts.medlayout')

@section('content')
    <h1 class="text-center" style="background-color: #01A9CB; height: 30px; font-size: large; padding-top: 5px; font-weight: bold">Antécédents médicaux</h1>
    <div class="container-fluid p-2" style="background-color: white">
        <div class="card p-2">
            <div class="card-header text-center font-weight-bold text-uppercase">Antécédent Maladie Générale de {{$patient->prenom}} {{$patient->nom}} [ Consultation du {{$consult->created_at}}]</div>
            <div class="card-body">
                <div class="col">
                    <div class="form-group row">
                        <label for="maladie_generale" class="col-md-2 text-right font-weight-bold">Nom maladie:</label>
                        <input type="text" readonly name="nom" class="form-control col-md-10" value="{{$maladieG->nom}}">
                    </div>
                </div>

                @if($maladieG->nom === 'drepanocytose')
                    <div id="type_hemoglobine" style="display: block" class="col">
                        <div class="row form-group">
                            <label class="col-md-2 text-right font-weight-bold">Type hémoglobine:</label>
                            <input type="text" readonly name="hemoglobine" class="form-control col-md-10" value="{{$maladieG->type_hemoglobine}}">
                        </div>
                    </div>
                    <div id="decouverte_mgenerale" style="display: none" class="col">
                        <div class="row form-group">
                            <label class="col-md-2 text-right font-weight-bold">Date de decouverte:</label>
                            <input type="date" readonly name="datedecouverte" class="form-control col-md-10" value="{{$maladieG->date_decouverte}}">
                        </div>
                    </div>
                @else
                    <div id="type_hemoglobine" style="display: none" class="col">
                        <div class="row form-group">
                            <label class="col-md-2 text-right font-weight-bold">Type hémoglobine:</label>
                            <input type="text" readonly name="hemoglobine" class="form-control col-md-10" value="{{$maladieG->type_hemoglobine}}">
                        </div>
                    </div>
                    <div id="decouverte_mgenerale" style="display: block" class="col">
                        <div class="row form-group">
                            <label class="col-md-2 text-right font-weight-bold">Date de decouverte:</label>
                            <input type="date" readonly name="datedecouverte" class="form-control col-md-10" value="{{$maladieG->date_decouverte}}">
                        </div>
                    </div>
                @endif

                @if($maladieG->nom === 'diabete')
                    <div id="type_diabete" style="display: block" class="col">
                        <div class="form-group row">
                            <label for="typediabete" class="font-weight-bold text-right col-md-2">Type diabète:</label>
                            <input type="text" readonly id="typediabete" name="typediabete" class="form-control col-md-10" value="{{$maladieG->type_diabete}}">
                        </div>
                    </div>
                @else
                    <div id="type_diabete" style="display: none" class="col">
                        <div class="form-group row">
                            <label for="typediabete" class="font-weight-bold text-right col-md-2">Type diabète:</label>
                            <input type="text" readonly id="typediabete" name="typediabete" class="form-control col-md-10" value="{{$maladieG->type_diabete}}">
                        </div>
                    </div>
                @endif

                <div id="traitement_mgenerale" class="col">
                    <div class="form-group row">
                        <label class="font-weight-bold text-right col-md-2">Traitement:</label>
                        <input type="text" readonly name="traitement" class="form-control col-md-10" value="{{$maladieG->traitement}}">
                    </div>
                </div>

                @if($maladieG->nom === 'hypertension_arterielle')
                    <div id="frequence_traitement" style="display: block" class="col">
                        <div class="form-group row">
                            <label for="frequence" class="font-weight-bold text-right col-md-2">Fréquence du traitement:</label>
                            <input type="text" readonly name="frequence" class="form-control col-md-10" value="{{$maladieG->frequence_traitement}}">
                        </div>
                    </div>
                @else
                    <div id="frequence_traitement" style="display: none" class="col">
                        <div class="form-group row">
                            <label for="frequence" class="font-weight-bold text-right col-md-2">Fréquence du traitement:</label>
                            <input type="text" readonly name="frequence" class="form-control col-md-10" value="{{$maladieG->frequence_traitement}}">
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
