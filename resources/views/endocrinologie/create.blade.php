@extends('layouts.medlayout')

@section('content')
    <h1 class="text-center" style="background-color: #01A9CB; height: 30px; font-size: large; padding-top: 5px; font-weight: bold">Examens Paracliniques</h1>
    <div class="container-fluid p-2" style="background-color: white">
        <div class="flash-message col-12">
            @if(Session::has('message'))
                <div class="alert {{Session::get('alert-class')}}">
                    {{session::get('message')}}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                </div>
            @endif
        </div>
        <div class="card p-2">
            <div class="card-header text-center font-weight-bold text-uppercase p-2">Endocrinologie</div>
            <div class="card-body">
                <form action="{{route('endocrinologie.store')}}" method="post">
                    @csrf
                    <div class="col">
                        <div class="form-group row">
                            <label class="text-right col-form-label col-2 font-weight-bold">Date<em style="color: red;">*</em> :</label>
                            <input type="date" name="date" class="form-control col-4">
                            <label class="text-right col-form-label col-2 font-weight-bold">FT4:</label>
                            <input type="text" name="ft4" class="form-control col-4">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row">
                            <label class="text-right col-form-label col-2 font-weight-bold">FT3:</label>
                            <input type="text" name="ft3" class="form-control col-4">
                            <label class="text-right col-form-label col-2 font-weight-bold">TSHus:</label>
                            <input type="text" name="thsus" class="form-control col-4">
                        </div>
                    </div>


                    <div class="col">
                        <div class="form-group row">
                            <label class="text-right col-form-label col-2 font-weight-bold">Cortisolémie:</label>
                            <input type="text" name="cortisolomie" class="form-control col-4">
                            <label class="text-right col-form-label col-2 font-weight-bold">Test au synacthène:</label>
                            <input type="text" name="testsynacthene" class="form-control col-4">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row">
                            <label class="text-right col-form-label col-2 font-weight-bold">Prolactémie:</label>
                            <input type="text" name="prolactemie" class="form-control col-4">
                            <label class="text-right col-form-label col-2 font-weight-bold">FSH:</label>
                            <input type="text" name="fsh" class="form-control col-4">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row">
                            <label class="text-right col-form-label col-2 font-weight-bold">LH:</label>
                            <input type="text" name="lh" class="form-control col-10">
                        </div>
                    </div>

                    <div class="col" align="center">
                        <div class="form-group row font-weight-bold" style="font-size: 17px">
                            <div class="offset-5"></div>
                            <input type="checkbox" onclick="fonctionParaclinic(this)" class="custom-checkbox col-md-1">Autre endocrinologie  <em class="font-italic font-weight-normal" style="font-size: small">&nbsp; ** optionnel **</em>
                        </div>
                    </div>

                    <div class="col" id="autre_para" style="display: none">
                        <div class="form-group row">
                            <div class="offset-md-2"></div>
                            <input type="text" name="nom_autre" id="nom_autre" placeholder="Nom" class="form-control col-md-5" >
                            <input type="text" name="resultat" id="resultat" placeholder="Résultat" class="form-control col-md-5" >
                        </div>
                        <div class="form-group row">
                            <div class="offset-md-2"></div>
                            <input type="text" name="nom_autre1" id="nom_autre1" placeholder="Nom" class="form-control col-md-5">
                            <input type="text" name="resultat1" id="resultat1" placeholder="Résultat" class="form-control col-md-5">
                        </div>
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary mr-1">Enregistrer</button>
                        <div class="btn btn-secondary"><a style="color: white" href="{{route('marqueur-tumoral.create')}}">Suivant</a></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
