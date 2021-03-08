@extends('layouts.medlayout')

@section('content')
    <h1 class="text-center font-weight-bold" style="background-color: #01A9CB; height: 30px; font-weight: bold; padding-top: 5px; font-size: large;">Antécédents médicaux</h1>
    <div class="container-fluid p-2" style="background-color: white">
        <div class="flash-message col-md-12">
            @if(Session::has('message'))
                <div class="alert {{Session::get('alert-class')}}">
                    {{session::get('message')}}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                </div>
            @endif
        </div>
        <div class="card p-2">
            <div class="card-header text-center font-weight-bold text-uppercase">Maladie generales</div>
            <div class="card-body">
                <form action="{{route('maladiegenerale.store')}}" method="post">
                    @csrf
                    <div class="col">
                        <div class="form-group row">
                            <label for="maladie_generale" class="col-md-2 text-right font-weight-bold">Nom maladie<em style="color: red;">*</em>:</label>
                            <select onchange="maladieGenerale(this)" id="maladie_generale" data-style="btn-outline-secondary" data-placeholder="Choisir une maladie" data-live-search="true" class="selectpicker form-control col-md-10" name="nom">
                                <option value="drepanocytose">Drépanocytose</option>
                                <option value="hypertension_arterielle">Hypertension Artérielle</option>
                                <option value="diabete">Diabète</option>
                                <option value="goutte">Goutte</option>
                            </select>
                        </div>
                    </div>

                    <div id="type_hemoglobine" style="display: none" class="col">
                        <div class="row form-group">
                            <label class="col-md-2 text-right font-weight-bold">Type hémoglobine<em style="color: red;">*</em> :</label>
                            <input type="text" name="hemoglobine" class="form-control col-md-10">
                        </div>
                    </div>

                    <div id="type_diabete" style="display: none" class="col">
                        <div class="form-group row">
                            <label for="typediabete" class="font-weight-bold text-right col-md-2">Type diabète<em style="color: red;">*</em> :</label>
                            <select name="typediabete" id="typediabete" data-style="btn-outline-secondary" data-placeholder="Choisir un type" data-live-search="true" class="selectpicker form-control col-md-10">
                                <option value="type1">Type 1</option>
                                <option value="type2">Type 2</option>
                            </select>
                        </div>
                    </div>

                    <div id="decouverte_mgenerale" class="col">
                        <div class="row form-group">
                            <label class="col-md-2 text-right font-weight-bold">Date de decouverte<em style="color: red;">*</em> :</label>
                            <input type="date" name="datedecouverte" class="form-control col-md-10">
                        </div>
                    </div>

                    <div id="traitement_mgenerale" class="col">
                        <div class="form-group row">
                            <label class="font-weight-bold text-right col-md-2">Traitement<em style="color: red;">*</em> :</label>
                            <input type="text" name="traitement" class="form-control col-md-10">
                        </div>
                    </div>

                    <div id="frequence_traitement" style="display: none" class="col">
                        <div class="form-group row">
                            <label for="frequence" class="font-weight-bold text-right col-md-2">Fréquence du traitement<em style="color: red;">*</em> :</label>
                            <select name="frequence" id="frequence" data-style="btn-outline-secondary" data-placeholder="Choisir une fréquence" data-live-search="true" class="selectpicker form-control col-md-10">
                                <option value="regulier">Régulier</option>
                                <option value="irregulier">Irrégulier</option>
                                <option value="interruption">Interruption</option>
                                <option value="abscence">Abscence</option>
                            </select>
                        </div>
                    </div>


                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary mr-1">Enregistrer</button>
                        <div class="btn btn-secondary"><a style="color: white" href="{{route('affectionIMM.create')}}">Suivant</a></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
