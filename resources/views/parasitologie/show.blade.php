@extends('layouts.medlayout')

@section('content')
    <h1 class="text-center" style="background-color: #01A9CB; height: 30px; font-size: large; padding-top: 5px; font-weight: bold">Antécédents Paracliniques</h1>
    <div class="container-fluid p-2" style="background-color: white">
        <div class="card p-2">
            <div class="card-header text-center font-weight-bold text-uppercase">Résultat Parasitologie de {{$patient->prenom}} {{$patient->nom}} [ Consultation du {{$consult->created_at}}]</div>
            <div class="card-body">
                <div class="col">
                    <div class="form-group row">
                        <label class="text-right col-form-label col-2 font-weight-bold">Date:</label>
                        <input type="date" readonly name="date" class="form-control col-4" value="{{$parasitologie->date}}">
                        <label class="text-right col-form-label col-2 font-weight-bold">Goutte épaisse /DP:</label>
                        <input type="text" readonly name="goutteEpaisse" class="form-control col-4" value="{{$parasitologie->goutteepaisse}}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label class="text-right col-form-label col-2 font-weight-bold">Selles POK</label>
                        <input type="text" readonly name="sellePOK" class="form-control col-4" value="{{$parasitologie->selle_pok}}">
                        <label class="text-right col-form-label col-2 font-weight-bold">BMR:</label>
                        <input type="text" readonly name="bmr" class="form-control col-4" value="{{$parasitologie->bmr}}">
                    </div>
                </div>

                @if($parasitologie->nom_autre || $parasitologie->nom_autre1)
                    <div class="col" align="center">
                        <div class="form-group row font-weight-bold" style="font-size: 17px">
                            <div class="offset-5"></div>
                            <input type="checkbox" disabled readonly checked onclick="fonctionParaclinic(this)" class="custom-checkbox col-md-1">Autre Parasitologie  <em class="font-italic font-weight-normal" style="font-size: small">&nbsp; ** optionnel **</em>
                        </div>
                    </div>

                    <div class="col" id="autre_para" style="display: block">
                        @if($parasitologie->nom_autre)
                            <div class="form-group row">
                                <div class="offset-md-2"></div>
                                <input type="text" readonly value="{{$parasitologie->nom_autre}}" name="nom_autre" class="form-control col-md-5" >
                                <input type="text" readonly value="{{$parasitologie->resultat}}" name="resultat" class="form-control col-md-5" >
                            </div>
                        @else
                            <div class="form-group row" style="display:none;">
                                <div class="offset-md-2"></div>
                                <input type="text" readonly value="{{$parasitologie->nom_autre}}" name="nom_autre" class="form-control col-md-5" >
                                <input type="text" readonly value="{{$parasitologie->resultat}}" name="resultat" class="form-control col-md-5" >
                            </div>
                        @endif

                        @if($parasitologie->nom_autre1)
                            <div class="form-group row">
                                <div class="offset-md-2"></div>
                                <input type="text" readonly value="{{$parasitologie->nom_autre1}}" name="nom_autre1" class="form-control col-md-5">
                                <input type="text" readonly value="{{$parasitologie->resultat1}}" name="resultat1"  class="form-control col-md-5">
                            </div>
                        @else
                            <div class="form-group row" style="display: none">
                                <div class="offset-md-2"></div>
                                <input type="text" readonly value="{{$parasitologie->nom_autre1}}" name="nom_autre1" class="form-control col-md-5">
                                <input type="text" readonly value="{{$parasitologie->resultat1}}" name="resultat1"  class="form-control col-md-5">
                            </div>
                        @endif
                    </div>
                @else
                    <div class="col" align="center" style="display: none">
                        <div class="form-group row font-weight-bold" style="font-size: 17px">
                            <div class="offset-5"></div>
                            <input type="checkbox" readonly onclick="fonctionParaclinic(this)" class="custom-checkbox col-md-1">Autre Parasitologie  <em class="font-italic font-weight-normal" style="font-size: small">&nbsp; ** optionnel **</em>
                        </div>
                    </div>

                    <div class="col" id="autre_para" style="display: none">
                        <div class="form-group row">
                            <div class="offset-md-2"></div>
                            <input type="text" readonly value="{{$parasitologie->nom_autre}}" name="nom_autre"  class="form-control col-md-5" >
                            <input type="text" readonly value="{{$parasitologie->resultat}}" name="resultat"  class="form-control col-md-5" >
                        </div>
                        <div class="form-group row">
                            <div class="offset-md-2"></div>
                            <input type="text" readonly value="{{$parasitologie->nom_autre1}}" name="nom_autre1"  class="form-control col-md-5">
                            <input type="text" readonly value="{{$parasitologie->resultat1}}" name="resultat1"  class="form-control col-md-5">
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
