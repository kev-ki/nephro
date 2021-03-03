@extends('layouts.inflayout')

@section('content')
    <h1 class="text-center" style="background-color: #01A9CB; height: 30px; font-size: large; padding-top: 5px; font-weight: bold">Constante de {{$patient->prenom}} {{$patient->nom}} [ ID : {{$patient->idpatient}} ]</h1>
    <div class="container-fluid p-2" style="background-color: white">
        <div class="flash-message col-12">
            @if(Session::has('message'))
                <div class="alert {{Session::get('alert-class')}}">
                    {{session::get('message')}}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                </div>
            @endif
        </div>

        <div class="card bg-white mb-2" style=" box-shadow: 0 0 5px whitesmoke;">
            <div class="col-12">
                <div class="row p-1">
                    <div class="col-6">
                        <div class="row form-group">
                            <label class="font-weight-bold text-right col-5">Date de prise:</label>
                            <input type="date" readonly class="form-control  col-7" value="{{$constante->dateprise}}">
                        </div>
                        <div class="row form-group">
                            <label class="font-weight-bold col-5 text-right">Poids:</label>
                            <input type="text" readonly class="form-control col-7" value="{{$constante->poids}} kg">
                        </div>
                        <div class="row form-group">
                            <label class="font-weight-bold col-5 text-right">Taille:</label>
                            <input type="text" readonly class="form-control col-7" value="{{$constante->taille}} m">
                        </div>
                        <div class="row form-group">
                            <label class="font-weight-bold col-5 text-right">Tension:</label>
                            <input type="text" readonly class="form-control col-7" value="{{$constante->tension}}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row form-group">
                            <label class="font-weight-bold text-right col-5">Pulsation:</label>
                            <input type="text" readonly class="form-control col-7" value="{{$constante->pulsation}}">
                        </div>
                        <div class="row form-group">
                            <label class="font-weight-bold col-5 text-right">Statut:</label>
                            <input type="text" readonly class="form-control col-7" value="{{$constante->statut}}">
                        </div>
                        <div class="row form-group">
                            <label class="font-weight-bold text-right col-5">Pouls:</label>
                            <input type="text" readonly class="form-control col-7" value="{{$constante->pouls}}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row d-flex justify-content-center mb-2">
                <div class="btn btn-outline-secondary mr-1"><a style="color: #000" href="{{route('constante.edit', $constante->id)}}">éditer</a></div>
                <button class="btn btn-primary"><a style="color: #fff" href="#">imprimer</a></button>
            </div>
        </div>
    </div>
@endsection
