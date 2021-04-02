@extends('layouts.medlayout')

@section('content')
    <h1 class="text-center" style="background-color: #01A9CB; height: 30px; font-size: large; padding-top: 5px; font-weight: bold">Habitude Alimentaire et Mode de Vie</h1>
    <div class="container-fluid p-2" style="background-color: white">
        <div class="flash-message col-12">
            @if(Session::has('message'))
                <div class="alert {{Session::get('alert-class')}}">
                    {{session::get('message')}}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                </div>
            @endif
        </div>
        <div class="card p-2">
            <div class="card-body">
                <form action="{{route('habitude-alimentaire.store')}}" method="post">
                    @csrf
                    <div class="col">
                        <div class="form-group row">
                            <label class="text-right font-weight-bold col-2">Habitude<em style="color: red;">*</em> :</label>
                            <select class="selectpicker form-control col-4" data-placeholder="Choisir" data-style="btn-outline-secondary" name="aliment">
                                <option value="alcool">Alcool</option>
                                <option value="tabac">Tabac</option>
                                <option value="stupefiant">Stupéfiant</option>
                            </select>
                            <label class="text-right font-weight-bold col-2">Type<em style="color: red;">*</em> :</label>
                            <input type="text" name="type" class="col-4 form-control">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row">
                            <label class="text-right font-weight-bold col-2">Quantité/J<em style="color: red;">*</em> :</label>
                            <input type="text" name="quantite" class="form-control col-4">
                            <label class="text-right font-weight-bold col-2">Date du debut<em style="color: red;">*</em> :</label>
                            <input type="date" name="datedebut" class="form-control col-4">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row">
                            <label class="text-right font-weight-bold col-2">Mode de consommation<em style="color: red;">*</em> :</label>
                            <select class="selectpicker form-control col-4" data-placeholder="Choisir" name="frequence" data-style="btn-outline-secondary">
                                <option value="regulier">Régulière</option>
                                <option value="irregulier">Irregulier</option>
                                <option value="rare">Rare</option>
                                <option value="occasionel">Occasionelle</option>
                                <option value="habituelle">Habituelle</option>
                            </select>
                            <label class="text-right font-weight-bold col-2">Durée<em style="color: red;">*</em> :</label>
                            <input type="text" name="duree" class="form-control col-4">
                        </div>
                    </div>

                    <div class="mt-5 mb-3 text-center text-uppercase font-weight-bolder">Auto Médication</div>
                    <div class="col">
                        <div class="form-group row">
                            <label class=" text-right col-2 font-weight-bold">Traditionnelle :</label>
                            <select name="traditionel" id="traditionnelle" class="col-md-3 form-control selectpicker" data-placeholder="Choisir" data-style="btn-outline-secondary">
                                <option value="oui">Oui</option>
                                <option value="non">Non</option>
                            </select>
                            <label class="text-right font-weight-bold col-2">Préciser le mode d’administration :</label>
                            <input type="text" name="mode_administration" class="form-control col-5">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row">
                            <label class="text-right col-2 font-weight-bold">Moderne :</label>
                            <select name="moderne" id="moderne" class="col-md-3 form-control selectpicker" data-placeholder="Choisir" data-style="btn-outline-secondary">
                                <option value="oui">Oui</option>
                                <option value="non">Non</option>
                            </select>
                            <label class="text-right font-weight-bold col-2">Préciser le ou les produits :</label>
                            <input type="text" name="produits" class="form-control col-5">
                        </div>
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary mr-1">Enregistrer</button>
                        <div class="btn btn-secondary"><a style="color: white" href="{{route('antfamilial.create')}}">Suivant</a></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
