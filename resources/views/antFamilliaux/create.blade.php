@extends('layouts.medlayout')

@section('content')
    <h1 class="text-center" style="background-color: #01A9CB; height: 30px; font-size: large; padding-top: 5px; font-weight: bold">Antécédents FAMILIAUX</h1>
    <div class="container-fluid p-2" style="background-color: white">
        <div class="flash-message col-md-12">
            @if(Session::has('message'))
                <div class="alert {{Session::get('alert-class')}}">
                    {{session::get('message')}}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                </div>
            @endif
        </div>
        <div class="card p-2">
            <div class="card-body">
                <form action="{{route('antfamilial.store')}}" method="post">
                    @csrf
                    <div class="row mb-5 text-center">
                        <p class="font-weight-bold">Types d'antécédents possibles : </p> Notion de Néphropathie : Polykystose, IR, Syndrome œdémateux et de maladies générales : diabète HTA etc dans la famille
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <h1 class="font-weight-bolder mb-3">1)	Ascendants :</h1>
                            <div class="col-md">
                                <div class="form-group row">
                                    <label class="text-right col-md-4 font-weight-bold">Père :</label>
                                    <input type="text" name="pere" class="form-control col-md-8">
                                </div>
                                <div class="form-group row">
                                    <label class="text-right col-md-4 font-weight-bold">Mère :</label>
                                    <input type="text" name="mere" class="form-control col-md-8">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h1 class="font-weight-bolder mb-3">2)	col-mdlatéraux :</h1>
                            <div class="col-md">
                                <div class="form-group row">
                                    <label class="text-right col-md-4 font-weight-bold">Frères :</label>
                                    <input type="text" name="frere" class="form-control col-md-8">
                                </div>
                                <div class="form-group row">
                                    <label class="text-right col-md-4 font-weight-bold">Sœurs :</label>
                                    <input type="text" name="soeur" class="form-control col-md-8">
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
                                    <input type="text" name="enfantfille" class="form-control col-md-8">
                                </div>
                                <div class="form-group row">
                                    <label class="text-right col-md-4 font-weight-bold">Garçons (Nombre et ATCD):</label>
                                    <input type="text" name="enfantgarcon" class="form-control col-md-8">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md">
                                <div class="form-group row">
                                    <label class="text-right col-md-4 font-weight-bold">4) Conjoint (e) (Nombre et ATCD):</label>
                                    <textarea class="form-control col-md-8" rows="4" name="conjoint"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary mr-1">Enregistrer</button>
                        <div class="btn btn-secondary"><a style="color: white" href="{{route('examen-general.create')}}">Suivant</a></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
