@extends('layouts.medlayout')

@section('content')
    <h1 class="text-center" style="background-color: #01A9CB; height: 30px; font-size: large; padding-top: 5px; font-weight: bold">Antécédents Paracliniques</h1>
    <div class="container-fluid p-2" style="background-color: white">
        <div class="card p-2">
            <div class="card-header text-center font-weight-bold text-uppercase">Résultat Marqueur Tumoral de {{$patient->prenom}} {{$patient->nom}} [ Consultation du {{$consult->created_at}}]</div>
            <div class="card-body">
                <div class="col">
                    <div class="form-group row">
                        <label class="text-right col-form-label col-2 font-weight-bold">Date:</label>
                        <input type="date" readonly name="date" class="form-control col-4" value="{{$tumoral->date}}">
                        <label class="text-right col-form-label col-2 font-weight-bold">α-foeto-protéine:</label>
                        <input type="text" readonly name="proteine" class="form-control col-4" value="{{$tumoral->afproteine}}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label class="text-right col-form-label col-2 font-weight-bold">LDH:</label>
                        <input type="text" readonly name="ldh" class="form-control col-4" value="{{$tumoral->ldh}}">
                        <label class="text-right col-form-label col-2 font-weight-bold">ACE:</label>
                        <input type="text" readonly name="ace" class="form-control col-4" value="{{$tumoral->ace}}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label class="text-right col-form-label col-2 font-weight-bold">PSA:</label>
                        <input type="text" readonly name="psa" class="form-control col-4" value="{{$tumoral->psa}}">
                        <label class="text-right col-form-label col-2 font-weight-bold">CA (125, 19-9, 15-3):</label>
                        <input type="text" readonly name="ca" class="form-control col-4" value="{{$tumoral->ca}}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label class="text-right col-form-label col-2 font-weight-bold">Calcitonine:</label>
                        <input type="text" readonly name="calcitonine" class="form-control col-10" value="{{$tumoral->calcitonine}}">
                    </div>
                </div>

                @if($tumoral->nom_autre || $tumoral->nom_autre1)
                    <div class="col" align="center">
                        <div class="form-group row font-weight-bold" style="font-size: 17px">
                            <div class="offset-5"></div>
                            <input type="checkbox" disabled readonly checked onclick="fonctionParaclinic(this)" class="custom-checkbox col-md-1">Autre bilan sanguin  <em class="font-italic font-weight-normal" style="font-size: small">&nbsp; ** optionnel **</em>
                        </div>
                    </div>

                    <div class="col" id="autre_para" style="display: block">
                        @if($tumoral->nom_autre)
                            <div class="form-group row">
                                <div class="offset-md-2"></div>
                                <input type="text" readonly value="{{$tumoral->nom_autre}}" name="nom_autre" class="form-control col-md-5" >
                                <input type="text" readonly value="{{$tumoral->resultat}}" name="resultat" class="form-control col-md-5" >
                            </div>
                        @else
                            <div class="form-group row" style="display:none;">
                                <div class="offset-md-2"></div>
                                <input type="text" readonly value="{{$tumoral->nom_autre}}" name="nom_autre" class="form-control col-md-5" >
                                <input type="text" readonly value="{{$tumoral->resultat}}" name="resultat" class="form-control col-md-5" >
                            </div>
                        @endif

                        @if($tumoral->nom_autre1)
                            <div class="form-group row">
                                <div class="offset-md-2"></div>
                                <input type="text" readonly value="{{$tumoral->nom_autre1}}" name="nom_autre1" class="form-control col-md-5">
                                <input type="text" readonly value="{{$tumoral->resultat1}}" name="resultat1"  class="form-control col-md-5">
                            </div>
                        @else
                            <div class="form-group row" style="display: none">
                                <div class="offset-md-2"></div>
                                <input type="text" readonly value="{{$tumoral->nom_autre1}}" name="nom_autre1" class="form-control col-md-5">
                                <input type="text" readonly value="{{$tumoral->resultat1}}" name="resultat1"  class="form-control col-md-5">
                            </div>
                        @endif
                    </div>
                @else
                    <div class="col" align="center" style="display: none">
                        <div class="form-group row font-weight-bold" style="font-size: 17px">
                            <div class="offset-5"></div>
                            <input type="checkbox" readonly onclick="fonctionParaclinic(this)" class="custom-checkbox col-md-1">Autre Marqueur Tumoral  <em class="font-italic font-weight-normal" style="font-size: small">&nbsp; ** optionnel **</em>
                        </div>
                    </div>

                    <div class="col" id="autre_para" style="display: none">
                        <div class="form-group row">
                            <div class="offset-md-2"></div>
                            <input type="text" readonly value="{{$tumoral->nom_autre}}" name="nom_autre"  class="form-control col-md-5" >
                            <input type="text" readonly value="{{$tumoral->resultat}}" name="resultat"  class="form-control col-md-5" >
                        </div>
                        <div class="form-group row">
                            <div class="offset-md-2"></div>
                            <input type="text" readonly value="{{$tumoral->nom_autre1}}" name="nom_autre1"  class="form-control col-md-5">
                            <input type="text" readonly value="{{$tumoral->resultat1}}" name="resultat1"  class="form-control col-md-5">
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
