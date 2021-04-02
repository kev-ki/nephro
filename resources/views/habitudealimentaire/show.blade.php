@extends('layouts.medlayout')

@section('content')
    <h1 class="text-center" style="background-color: #01A9CB; height: 30px; font-size: large; padding-top: 5px; font-weight: bold"></h1>
    <div class="container-fluid p-2" style="background-color: white">
        <div class="card p-2">
            <div class="card-header text-center font-weight-bold text-uppercase">Habitude Alimentaire et Mode de Vie de {{$patient->prenom}} {{$patient->nom}} [ Consultation du {{$consult->created_at}}]</div>
            <div class="card-body">
                <div class="col">
                    <div class="form-group row">
                        <label class="text-right font-weight-bold col-2">Habitude:</label>
                        <input type="text" readonly name="aliment" class="col-4 form-control" value="{{$habitude->aliment}}">
                        <label class="text-right font-weight-bold col-2">Type:</label>
                        <input type="text" readonly name="type" class="col-4 form-control" value="{{$habitude->type}}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label class="text-right font-weight-bold col-2">Quantité/J:</label>
                        <input type="text" readonly name="quantite" class="form-control col-4" value="{{$habitude->quantite}}">
                        <label class="text-right font-weight-bold col-2">Date du debut:</label>
                        <input type="date" readonly name="datedebut" class="form-control col-4" value="{{$habitude->date_debut}}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label class="text-right font-weight-bold col-2">Mode de consommation:</label>
                        <input type="text" readonly name="frequence" class="form-control col-4" value="{{$habitude->mode_consommation}}">
                        <label class="text-right font-weight-bold col-2">Durée:</label>
                        <input type="text" readonly name="duree" class="form-control col-4" value="{{$habitude->duree}}">
                    </div>
                </div>

                @if($habitude->medication_traditionnel === 'oui' || $habitude->medication_moderne === 'oui')
                    <div class="mt-5 mb-3 text-center text-uppercase font-weight-bolder"><input type="checkbox" readonly checked="true" class="custom-checkbox"> Auto Médication</div>
                    <div class="col">
                        <div class="form-group row">
                            <label class=" text-right col-2 font-weight-bold">Traditionnelle:</label>
                            <input type="text" readonly name="traditionel" class="form-control col-3" value="{{$habitude->medication_traditionnel}}">
                            <label class="text-right font-weight-bold col-2">Préciser le mode d’administration:</label>
                            <input type="text" readonly name="mode_administration" class="form-control col-5" value="{{$habitude->mode_administration}}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row">
                            <label class="text-right col-2 font-weight-bold">Moderne:</label>
                            <input type="text" readonly name="moderne" class="form-control col-3" value="{{$habitude->medication_moderne}}">
                            <label class="text-right font-weight-bold col-2">Préciser le ou les produits:</label>
                            <input type="text" readonly name="produits" class="form-control col-5" value="{{$habitude->produits}}">
                        </div>
                    </div>
                @else
                    <div class="mt-5 mb-3 text-center text-uppercase font-weight-bolder"><input type="checkbox" readonly class="form-check-input"> Auto Médication</div>
                    <div class="col" style="display: none">
                        <div class="form-group row">
                            <label class=" text-right col-2 font-weight-bold">Traditionnelle:</label>
                            <input type="text" readonly name="traditionel" class="form-control col-3" value="{{$habitude->medication_traditionnel}}">
                            <label class="text-right font-weight-bold col-2">Préciser le mode d’administration:</label>
                            <input type="text" readonly name="mode_administration" class="form-control col-5" value="{{$habitude->mode_administration}}">
                        </div>
                    </div>
                    <div class="col" style="display: none">
                        <div class="form-group row">
                            <label class="text-right col-2 font-weight-bold">Moderne:</label>
                            <input type="text" readonly name="moderne" class="form-control col-3" value="{{$habitude->medication_moderne}}">
                            <label class="text-right font-weight-bold col-2">Préciser le ou les produits:</label>
                            <input type="text" readonly name="produits" class="form-control col-5" value="{{$habitude->produits}}">
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
