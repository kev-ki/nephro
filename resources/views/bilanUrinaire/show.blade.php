@extends('layouts.medlayout')

@section('content')
    <h1 class="text-center" style="background-color: #01A9CB; height: 30px; font-size: large; padding-top: 5px; font-weight: bold">Antécédents Paracliniques</h1>
    <div class="container-fluid p-2" style="background-color: white">
        <div class="card p-2">
            <div class="card-header text-center font-weight-bold text-uppercase">Résultat Bilan Urinaire de {{$patient->prenom}} {{$patient->nom}} [ Consultation du {{$consult->created_at}}]
                <ul class="nav nav-tabs mb-1  d-flex justify-content-center" id="table" role="tablist">
                    <li class="nav-item bouton-forme" style="font-size: 15px;"><a class="nav-link active" id="page1_tab" data-toggle="tab" href="#page1" role="tab" aria-controls="page1" aria-selected="true">Page 1</a></li>
                    <li class="nav-item ml-5 bouton-forme" style="font-size: 15px"><a class="nav-link" id="page2_tab" data-toggle="tab" href="#page2" role="tab" aria-controls="page2" aria-selected="false">Page 2</a></li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="pages_content">
                    <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="page1_tab" id="page1">
                        <div class="col">
                            <div class="form-group row">
                                <label class="text-right col-form-label col-2 font-weight-bold">Date:</label>
                                <input type="date"readonly name="date" class="form-control col-4" value="{{$urinaire->date}}">
                                <label class="text-right col-form-label col-2 font-weight-bold">Protéinurie/24h:</label>
                                <input type="text"readonly name="proteine" class="form-control col-4" value="{{$urinaire->proteinurie}}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group row">
                                <label class="text-right col-form-label col-2 font-weight-bold">Volume/24h:</label>
                                <input type="text"readonly name="volume" class="form-control col-4" value="{{$urinaire->volume}}">
                                <label class="text-right col-form-label col-2 font-weight-bold">Leucytes/mn:</label>
                                <input type="text"readonly name="leucyte" class="form-control col-4" value="{{$urinaire->leucyte}}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group row">
                                <label class="text-right col-form-label col-2 font-weight-bold">Hématie/mn:</label>
                                <input type="text"readonly name="hemacie" class="form-control col-4" value="{{$urinaire->hematie}}">
                                <label class="text-right col-form-label col-2 font-weight-bold">Créatinurie:</label>
                                <input type="text"readonly name="creatinurie" class="form-control col-4" value="{{$urinaire->creatinurie}}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group row">
                                <label class="text-right col-form-label col-2 font-weight-bold">Uréé/créatinurie:</label>
                                <input type="text"readonly name="ureecreati" class="form-control col-4" value="{{$urinaire->ureecreati}}">
                                <label class="text-right col-form-label col-2 font-weight-bold">Albumine/Créati:</label>
                                <input type="text"readonly name="albuminecreati" class="form-control col-4" value="{{$urinaire->albuminecreati}}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group row">
                                <label class="text-right col-form-label col-2 font-weight-bold">Uraturie:</label>
                                <input type="text"readonly name="uraturie" class="form-control col-4" value="{{$urinaire->uraturie}}">
                                <label class="text-right col-form-label col-2 font-weight-bold">Natriurèse:</label>
                                <input type="text"readonly name="natriurese" class="form-control col-4" value="{{$urinaire->natriurese}}">
                            </div>
                        </div>
                    </div>

                    {{-- ============================Page 2============================--}}
                    <div class="tab-pane fade" role="tabpanel" aria-labelledby="page2_tab" id="page2">
                        <div class="col">
                            <div class="form-group row">
                                <label class="text-right col-form-label col-2 font-weight-bold">Kaliurèse:</label>
                                <input type="text"readonly name="kaliurese" class="form-control col-4" value="{{$urinaire->kaliurese}}">
                                <label class="text-right col-form-label col-2 font-weight-bold">Calciturie:</label>
                                <input type="text"readonly name="caliciturie" class="form-control col-4" value="{{$urinaire->caliciturie}}">
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group row">
                                <label class="text-right col-form-label col-2 font-weight-bold">Phosphaturie:</label>
                                <input type="text"readonly name="phosphaturie" class="form-control col-4" value="{{$urinaire->phosphaturie}}">
                                <label class="text-right col-form-label col-2 font-weight-bold">Cristallurie (Préciser):</label>
                                <input type="text"readonly name="cristallurie" class="form-control col-4" value="{{$urinaire->cristallurie}}">
                            </div>
                        </div>

                        @if($urinaire->nom_autre || $urinaire->nom_autre1)
                            <div class="col" align="center">
                                <div class="form-group row font-weight-bold" style="font-size: 17px">
                                    <div class="offset-5"></div>
                                    <input type="checkbox" disabled readonly checked onclick="fonctionParaclinic(this)" class="custom-checkbox col-md-1">Autre bilan sanguin  <em class="font-italic font-weight-normal" style="font-size: small">&nbsp; ** optionnel **</em>
                                </div>
                            </div>

                            <div class="col" id="autre_para" style="display: block">
                                @if($urinaire->nom_autre)
                                    <div class="form-group row">
                                        <div class="offset-md-2"></div>
                                        <input type="text" readonly value="{{$urinaire->nom_autre}}" name="nom_autre" class="form-control col-md-5" >
                                        <input type="text" readonly value="{{$urinaire->resultat}}" name="resultat" class="form-control col-md-5" >
                                    </div>
                                @else
                                    <div class="form-group row" style="display:none;">
                                        <div class="offset-md-2"></div>
                                        <input type="text" readonly value="{{$urinaire->nom_autre}}" name="nom_autre" class="form-control col-md-5" >
                                        <input type="text" readonly value="{{$urinaire->resultat}}" name="resultat" class="form-control col-md-5" >
                                    </div>
                                @endif

                                @if($urinaire->nom_autre1)
                                    <div class="form-group row">
                                        <div class="offset-md-2"></div>
                                        <input type="text" readonly value="{{$urinaire->nom_autre1}}" name="nom_autre1" class="form-control col-md-5">
                                        <input type="text" readonly value="{{$urinaire->resultat1}}" name="resultat1"  class="form-control col-md-5">
                                    </div>
                                @else
                                    <div class="form-group row" style="display: none">
                                        <div class="offset-md-2"></div>
                                        <input type="text" readonly value="{{$urinaire->nom_autre1}}" name="nom_autre1" class="form-control col-md-5">
                                        <input type="text" readonly value="{{$urinaire->resultat1}}" name="resultat1"  class="form-control col-md-5">
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
                                    <input type="text" readonly value="{{$urinaire->nom_autre}}" name="nom_autre"  class="form-control col-md-5" >
                                    <input type="text" readonly value="{{$urinaire->resultat}}" name="resultat"  class="form-control col-md-5" >
                                </div>
                                <div class="form-group row">
                                    <div class="offset-md-2"></div>
                                    <input type="text" readonly value="{{$urinaire->nom_autre1}}" name="nom_autre1"  class="form-control col-md-5">
                                    <input type="text" readonly value="{{$urinaire->resultat1}}" name="resultat1"  class="form-control col-md-5">
                                </div>
                            </div>
                        @endif

                        {{--<div class="d-flex justify-content-center">
                            <div class="btn btn-secondary"><a href="#" style="color: white">imprimer</a></div>
                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
