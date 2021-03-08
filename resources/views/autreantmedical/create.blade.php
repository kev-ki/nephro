@extends('layouts.medlayout')

@section('content')
    <h1 class="text-center" style="background-color: #01A9CB; height: 30px; font-size: large; padding-top: 5px; font-weight: bold">Antécédents médicaux</h1>
    <div class="container-fluid p-2" style="background-color: white">
        <div class="flash-message col-12">
            @if(Session::has('message'))
                <div class="alert {{Session::get('alert-class')}}">
                    {{session::get('message')}}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                </div>
            @endif
        </div>
        <div class="card p-2">
            <div class="card-header text-center font-weight-bold text-uppercase">Autres Antecedents Medicaux</div>
            <div class="card-body">
                <form action="{{route('Autre_antecedent_medical.store')}}" method="post">
                    @csrf
                    <div class="col">
                        <div class="form-group row">
                            <label class="font-weight-bold col-md-2 text-right">Nom Antecedent<em style="color: red;">*</em> :</label>
                            <input type="text" name="nom" class="form-control col-md-10">
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group row">
                            <label class="font-weight-bold col-md-2 text-right">Type:</label>
                            <input type="text" name="type" class="form-control col-md-4">
                            <label class="font-weight-bold col-md-2 text-right">Date de découverte<em style="color: red;">*</em> :</label>
                            <input type="date" name="datedecouverte" class="form-control col-md-4">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row">
                            <label class="font-weight-bold col-md-2 text-right">Traitement<em style="color: red;">*</em> :</label>
                            <input type="text" name="traitement" class="form-control col-md-10">
                        </div>
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary mr-1">Enregistrer</button>
                        <div class="btn btn-secondary"><a style="color: white" href="{{route('chirurgicaux.create')}}">Suivant</a></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
