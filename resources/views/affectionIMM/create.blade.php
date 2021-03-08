@extends('layouts.medlayout')

@section('content')
    <h1 class="text-center" style="background-color: #01A9CB; height: 30px; font-size: large; padding-top: 5px; font-weight: bold">Antécédents médicaux</h1>
    <div class="container-fluid p-2" style="background-color: white">
        <div class="flash-message col-md-12">
            @if(Session::has('message'))
                <div class="alert {{Session::get('alert-class')}}">
                    {{session::get('message')}}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                </div>
            @endif
        </div>
        <div class="card p-2">
            <div class="card-header text-center font-weight-bold text-uppercase">Affections immunologiques</div>
            <div class="card-body">
                <form action="{{route('affectionIMM.store')}}" method="post">
                    @csrf
                    <div class="col">
                        <div class="form-group row">
                            <label class="col-md-2 font-weight-bold text-right">Nom affection<em style="color: red;">*</em> :</label>
                            <select class="selectpicker form-control col-md-4" id="nom_imm" onchange="affectionIMM(this)" name="nom" data-style="btn-outline-secondary" data-placeholder="Choisir une affection">
                                <option value="lepus">Lépus</option>
                                <option value="sclerodermie">Sclérodermie</option>
                                <option value="autre">Autre</option>
                            </select>
                            <label class="col-md-2 font-weight-bold text-right">Date de découverte<em style="color: red;">*</em> :</label>
                            <input type="date" name="datedecouverte" class="col-md-4 form-control">
                        </div>
                    </div>

                    <div id="precision_imm" style="display: none" class="col">
                        <div class="form-group row">
                            <label class="col-md-2 font-weight-bold text-right">precisez le nom:</label>
                            <input type="text" name="precision" class="col-md-10 form-control">
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group row">
                            <label class="col-md-2 font-weight-bold text-right">Type affection<em style="color: red;">*</em> :</label>
                            <input type="text" name="type" class="col-md-10 form-control">
                        </div>
                    </div>

                    <div id="traitement_imm" class="col">
                        <div class="form-group row">
                            <label class="col-md-2 font-weight-bold text-right">Traitement<em style="color: red;">*</em> :</label>
                            <input type="text" name="traitement" class="col-md-10 form-control">
                        </div>
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary mr-1">Enregistrer</button>
                        <div class="btn btn-secondary"><a style="color: white" href="{{route('affectionTumorale.create')}}">Suivant</a></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
