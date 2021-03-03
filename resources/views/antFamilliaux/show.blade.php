@extends('layouts.medlayout')

@section('content')
    <h1 class="text-center" style="background-color: #01A9CB; height: 30px; font-size: large; padding-top: 5px; font-weight: bold"></h1>
    <div class="container-fluid p-2" style="background-color: white">
        <div class="card p-2">
            <div class="card-header text-center font-weight-bold text-uppercase">Antécédents Familiaux de {{$patient->prenom}} {{$patient->nom}} [ Consultation du {{$consult->created_at}}]</div>
            <div class="card-body">
                <div class="row mb-5 text-center">
                    <p class="font-weight-bold">Types d'antécédents possibles : </p> Notion de Néphropathie : Polykystose, IR, Syndrome œdémateux et de maladies générales : diabète HTA etc dans la famille
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="font-weight-bolder mb-3">1)	Ascendants :</h1>
                        <div class="col-md">
                            <div class="form-group row">
                                <label class="text-right col-md-4 font-weight-bold">Père :</label>
                                <input type="text" readonly name="pere" class="form-control col-md-8" value="{{$familial->pere ? $familial->pere:''}}">
                            </div>
                            <div class="form-group row">
                                <label class="text-right col-md-4 font-weight-bold">Mère :</label>
                                <input type="text" readonly name="mere" class="form-control col-md-8" value="{{$familial->mere}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h1 class="font-weight-bolder mb-3">2)	col-mdlatéraux :</h1>
                        <div class="col-md">
                            <div class="form-group row">
                                <label class="text-right col-md-4 font-weight-bold">Frères :</label>
                                <input type="text" readonly name="frere" class="form-control col-md-8" value="{{$familial->frere}}">
                            </div>
                            <div class="form-group row">
                                <label class="text-right col-md-4 font-weight-bold">Sœurs :</label>
                                <input type="text" readonly name="soeur" class="form-control col-md-8" value="{{$familial->soeur}}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <h1 class="font-weight-bolder mb-3">3)   Descendants :</h1>
                        <div class="col-md">
                            <div class="form-group row">
                                <label class="text-right col-md-4 font-weight-bold">Filles (Nombre et ATCD) :</label>
                                <input type="text" readonly name="enfantfille" class="form-control col-md-8" value="{{$familial->enfantfille}}">
                            </div>
                            <div class="form-group row">
                                <label class="text-right col-md-4 font-weight-bold">Garçons (Nombre et ATCD):</label>
                                <input type="text" readonly name="enfantgarcon" class="form-control col-md-8" value="{{$familial->enfantgarcon}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-md">
                            <div class="form-group row">
                                <label class="text-right col-md-4 font-weight-bold">4) Conjoint (e) (Nombre et ATCD):</label>
                                <textarea type="text" readonly class="form-control col-md-8" rows="4" name="conjoint">{{$familial->conjoint}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                {{--<div class="d-flex justify-content-center">
                    <div class="btn btn-secondary"><a href="#" style="color: white">imprimer</a></div>
                </div>--}}
            </div>
        </div>
    </div>
@endsection
