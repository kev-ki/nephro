@extends('layouts.medlayout')

@section('content')
    <h1 class="text-center" style="background-color: #01A9CB; height: 30px; font-size: large; padding-top: 5px; font-weight: bold">Antécédents Paracliniques</h1>
    <div class="container-fluid p-2" style="background-color: white">
        <div class="card p-2">
            <div class="card-header text-center font-weight-bold text-uppercase">Résultat Endocrinologie de {{$patient->prenom}} {{$patient->nom}} [ Consultation du {{$consult->created_at}}]</div>
            <div class="card-body">
                <div class="col">
                    <div class="form-group row">
                        <label class="text-right col-form-label col-2 font-weight-bold">Date:</label>
                        <input type="date" readonly name="date" class="form-control col-4" value="{{$endo->date}}">
                        <label class="text-right col-form-label col-2 font-weight-bold">FT4:</label>
                        <input type="text" readonly name="ft4" class="form-control col-4" value="{{$endo->ft4}}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label class="text-right col-form-label col-2 font-weight-bold">FT3:</label>
                        <input type="text" readonly name="ft3" class="form-control col-4" value="{{$endo->ft3}}">
                        <label class="text-right col-form-label col-2 font-weight-bold">TSHus:</label>
                        <input type="text" readonly name="thsus" class="form-control col-4" value="{{$endo->tshus}}">
                    </div>
                </div>


                <div class="col">
                    <div class="form-group row">
                        <label class="text-right col-form-label col-2 font-weight-bold">Cortisolémie:</label>
                        <input type="text" readonly name="cortisolomie" class="form-control col-4" value="{{$endo->cortisolomie}}">
                        <label class="text-right col-form-label col-2 font-weight-bold">Test au synacthène:</label>
                        <input type="text" readonly name="testsynacthene" class="form-control col-4" value="{{$endo->testsynacthene}}">
                    </div>
                </div>

                <div class="col">
                    <div class="form-group row">
                        <label class="text-right col-form-label col-2 font-weight-bold">Prolactémie:</label>
                        <input type="text" readonly name="prolactemie" class="form-control col-4" value="{{$endo->prolactemie}}">
                        <label class="text-right col-form-label col-2 font-weight-bold">FSH:</label>
                        <input type="text" readonly name="fsh" class="form-control col-4" value="{{$endo->fsh}}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label class="text-right col-form-label col-2 font-weight-bold">LH:</label>
                        <input type="text" readonly name="lh" class="form-control col-10" value="{{$endo->lh}}">
                    </div>
                </div>

                @if($endo->nom_autre || $endo->nom_autre1)
                    <div class="col" align="center">
                        <div class="form-group row font-weight-bold" style="font-size: 17px">
                            <div class="offset-5"></div>
                            <input type="checkbox" disabled readonly checked onclick="fonctionParaclinic(this)" class="custom-checkbox col-md-1">Autre Endocrinologie  <em class="font-italic font-weight-normal" style="font-size: small">&nbsp; ** optionnel **</em>
                        </div>
                    </div>

                    <div class="col" id="autre_para" style="display: block">
                        @if($endo->nom_autre)
                            <div class="form-group row">
                                <div class="offset-md-2"></div>
                                <input type="text" readonly value="{{$endo->nom_autre}}" name="nom_autre" class="form-control col-md-5" >
                                <input type="text" readonly value="{{$endo->resultat}}" name="resultat" class="form-control col-md-5" >
                            </div>
                        @else
                            <div class="form-group row" style="display:none;">
                                <div class="offset-md-2"></div>
                                <input type="text" readonly value="{{$endo->nom_autre}}" name="nom_autre" class="form-control col-md-5" >
                                <input type="text" readonly value="{{$endo->resultat}}" name="resultat" class="form-control col-md-5" >
                            </div>
                        @endif

                        @if($endo->nom_autre1)
                            <div class="form-group row">
                                <div class="offset-md-2"></div>
                                <input type="text" readonly value="{{$endo->nom_autre1}}" name="nom_autre1" class="form-control col-md-5">
                                <input type="text" readonly value="{{$endo->resultat1}}" name="resultat1"  class="form-control col-md-5">
                            </div>
                        @else
                            <div class="form-group row" style="display: none">
                                <div class="offset-md-2"></div>
                                <input type="text" readonly value="{{$endo->nom_autre1}}" name="nom_autre1" class="form-control col-md-5">
                                <input type="text" readonly value="{{$endo->resultat1}}" name="resultat1"  class="form-control col-md-5">
                            </div>
                        @endif
                    </div>
                @else
                    <div class="col" align="center" style="display: none">
                        <div class="form-group row font-weight-bold" style="font-size: 17px">
                            <div class="offset-5"></div>
                            <input type="checkbox" readonly onclick="fonctionParaclinic(this)" class="custom-checkbox col-md-1">Autre Endocrinologie  <em class="font-italic font-weight-normal" style="font-size: small">&nbsp; ** optionnel **</em>
                        </div>
                    </div>

                    <div class="col" id="autre_para" style="display: none">
                        <div class="form-group row">
                            <div class="offset-md-2"></div>
                            <input type="text" readonly value="{{$endo->nom_autre}}" name="nom_autre"  class="form-control col-md-5" >
                            <input type="text" readonly value="{{$endo->resultat}}" name="resultat"  class="form-control col-md-5" >
                        </div>
                        <div class="form-group row">
                            <div class="offset-md-2"></div>
                            <input type="text" readonly value="{{$endo->nom_autre1}}" name="nom_autre1"  class="form-control col-md-5">
                            <input type="text" readonly value="{{$endo->resultat1}}" name="resultat1"  class="form-control col-md-5">
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
