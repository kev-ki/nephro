@extends('layouts.medlayout')

@section('content')
    <h1 class="text-center" style="background-color: #01A9CB; height: 30px; font-size: large; padding-top: 5px; font-weight: bold">Antécédents Paracliniques</h1>
    <div class="container-fluid p-2" style="background-color: white">
        <div class="card p-2">
            <div class="card-header text-center font-weight-bold text-uppercase">Résultat Bilan Sanguin de {{$patient->prenom}} {{$patient->nom}} [ Consultation du {{$consult->created_at}}]
                <ul class="nav nav-tabs mb-1  d-flex justify-content-center" id="table" role="tablist">
                    <li class="nav-item bouton-forme" style="font-size: 15px;"><a class="nav-link active" id="page1_tab" data-toggle="tab" href="#page1" role="tab" aria-controls="page1" aria-selected="true">Page 1</a></li>
                    <li class="nav-item ml-5 bouton-forme" style="font-size: 15px"><a class="nav-link" id="page2_tab" data-toggle="tab" href="#page2" role="tab" aria-controls="page2" aria-selected="false">Page 2</a></li>
                    <li class="nav-item ml-5 bouton-forme" style="font-size: 15px"><a class="nav-link" id="page3_tab" data-toggle="tab" href="#page3" role="tab" aria-controls="page3" aria-selected="false">Page 3</a></li>
                    <li class="nav-item ml-5 bouton-forme" style="font-size: 15px"><a class="nav-link" id="page4_tab" data-toggle="tab" href="#page4" role="tab" aria-controls="page4" aria-selected="false">Page 4</a></li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="pages_content">
                    <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="page1_tab" id="page1">
                        <div class="col">
                            <div class="form-group row">
                                <label class="text-right col-md-form-label col-md-2 font-weight-bold">Date:</label>
                                <input type="date" readonly value="{{$sanguin->date}}" name="date" class="form-control col-md-4" >
                                <label class="text-right col-md-form-label col-md-2 font-weight-bold">Azotémie:</label>
                                <input type="text" readonly value="{{$sanguin->azotemie}}" name="azotemie" class="form-control col-md-4" >
                            </div>
                            <div class="form-group row">
                                <label class="text-right col-md-form-label col-md-2 font-weight-bold">Créatininémie</label>
                                <input type="text" readonly value="{{$sanguin->creatinemie}}" name="creatinemie" class="form-control col-md-4" >
                                <label class="text-right col-md-form-label col-md-2 font-weight-bold">Clairance </label>
                                <input type="text" readonly value="{{$sanguin->clairance}}" name="clairance" class="form-control col-md-4" >
                            </div>
                            <div class="form-group row">
                                <label class="text-right col-md-form-label col-md-2 font-weight-bold">Uricémie</label>
                                <input type="text" readonly value="{{$sanguin->uricemie}}" name="uricemie" class="form-control col-md-4" >
                                <label class="text-right col-md-form-label col-md-2 font-weight-bold">Natremie </label>
                                <input type="text" readonly value="{{$sanguin->natremie}}" name="natremie" class="form-control col-md-4" >
                            </div>
                            <div class="form-group row">
                                <label class="text-right col-md-form-label col-md-2 font-weight-bold">Kaliémie</label>
                                <input type="text" readonly value="{{$sanguin->kaliemie}}" name="kaliemie" class="form-control col-md-4" >
                                <label class="text-right col-md-form-label col-md-2 font-weight-bold">Chlorémie </label>
                                <input type="text" readonly value="{{$sanguin->chloremie}}" name="choremie" class="form-control col-md-4" >
                            </div>
                            <div class="form-group row">
                                <label class="text-right col-md-form-label col-md-2 font-weight-bold">Phosphorémie:</label>
                                <input type="text" readonly value="{{$sanguin->phosphoremie}}" name="phosphoremie" class="form-control col-md-4" >
                                <label class="text-right col-md-form-label col-md-2 font-weight-bold">Calcémie:</label>
                                <input type="text" readonly value="{{$sanguin->calcemie}}" name="calcemie" class="form-control col-md-4" >
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" role="tabpanel" aria-labelledby="page2_tab" id="page2">
                        <div class="col">
                            <div class="form-group row">
                                <label class="text-right col-md-form-label col-md-2 font-weight-bold">Magnésémie</label>
                                <input type="text" readonly value="{{$sanguin->magnesemie}}" name="magnesemie" class="form-control col-md-4" >
                                <label class="text-right col-md-form-label col-md-2 font-weight-bold">Bicarbonatemie</label>
                                <input type="text" readonly value="{{$sanguin->bicarbonatemie}}" name="bicarbonatemie" class="form-control col-md-4" >
                            </div>
                            <div class="form-group row">
                                <label class="text-right col-md-form-label col-md-2 font-weight-bold">Protidémie:</label>
                                <input type="text" readonly value="{{$sanguin->protidemie}}" name="protidemie" class="form-control col-md-4" >
                                <label class="text-right col-md-form-label col-md-2 font-weight-bold">Troponine </label>
                                <input type="text" readonly value="{{$sanguin->troponine}}" name="troponine" class="form-control col-md-4" >
                            </div>
                            <div class="form-group row">
                                <label class="text-right col-md-form-label col-md-2 font-weight-bold">Phosphatases alc</label>
                                <input type="text" readonly value="{{$sanguin->phosphatase}}" name="phosphatase" class="form-control col-md-4" >
                                <label class="text-right col-md-form-label col-md-2 font-weight-bold"> PTH/Vit D</label>
                                <input type="text" readonly value="{{$sanguin->pth}}" name="pth" class="form-control col-md-4" >
                            </div>
                            <div class="form-group row">
                                <label class="text-right col-md-form-label col-md-2 font-weight-bold">PU de 24H (vol)</label>
                                <input type="text" readonly value="{{$sanguin->pu}}" name="pu" class="form-control col-md-4" >
                                <label class="text-right col-md-form-label col-md-2 font-weight-bold"> ASAT/ALAT:</label>
                                <input type="text" readonly value="{{$sanguin->asat}}" name="asat" class="form-control col-md-4" >
                            </div>
                            <div class="form-group row">
                                <label class="text-right col-md-form-label col-md-2 font-weight-bold">Bil Total/ Conj</label>
                                <input type="text" readonly value="{{$sanguin->biltotal}}" name="Bil" class="form-control col-md-4" >
                                <label class="text-right col-md-form-label col-md-2 font-weight-bold"> Gamma GT</label>
                                <input type="text" readonly value="{{$sanguin->gammagt}}" name="gammagt" class="form-control col-md-4" >
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" role="tabpanel" aria-labelledby="page3_tab" id="page3">
                        <div class="col">
                            <div class="form-group row">
                                <label class="text-right col-md-form-label col-md-2 font-weight-bold">CPK</label>
                                <input type="text" readonly value="{{$sanguin->cpk}}" name="cpk" class="form-control col-md-4" >
                                <label class="text-right col-md-form-label col-md-2 font-weight-bold">LDH</label>
                                <input type="text" readonly value="{{$sanguin->ldh}}" name="ldh" class="form-control col-md-4" >
                            </div>
                            <div class="form-group row">
                                <label class="text-right col-md-form-label col-md-2 font-weight-bold">Myoglobine</label>
                                <input type="text" readonly value="{{$sanguin->myoglobine}}" name="myoglobine" class="form-control col-md-4" >
                                <label class="text-right col-md-form-label col-md-2 font-weight-bold">Amylas/Lipasémie</label>
                                <input type="text" readonly value="{{$sanguin->amylas}}" name="amylas" class="form-control col-md-4" >
                            </div>
                            <div class="form-group row">
                                <label class="text-right col-md-form-label col-md-2 font-weight-bold">Glycémie/ HbA1C</label>
                                <input type="text" readonly value="{{$sanguin->glycemie}}" name="glycemie" class="form-control col-md-4" >
                                <label class="text-right col-md-form-label col-md-2 font-weight-bold">Cholestérol total</label>
                                <input type="text" readonly value="{{$sanguin->cholesterol}}" name="cholesterol" class="form-control col-md-4" >
                            </div>
                            <div class="form-group row">
                                <label class="text-right col-md-form-label col-md-2 font-weight-bold">HDL/ LDL chol</label>
                                <input type="text" readonly value="{{$sanguin->hdl}}" name="hd" class="form-control col-md-4" >
                                <label class="text-right col-md-form-label col-md-2 font-weight-bold">Hb</label>
                                <input type="text" readonly value="{{$sanguin->hb}}" name="hb" class="form-control col-md-4" >
                            </div>
                            <div class="form-group row">
                                <label class="text-right col-md-form-label col-md-2 font-weight-bold">VGM/TCMH</label>
                                <input type="text" readonly value="{{$sanguin->vgm}}" name="vgm" class="form-control col-md-4" >
                                <label class="text-right col-md-form-label col-md-2 font-weight-bold">GB</label>
                                <input type="text" readonly value="{{$sanguin->gb}}" name="gb" class="form-control col-md-4" >
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" role="tabpanel" aria-labelledby="page4_tab" id="page4">
                        <div class="col">
                            <div class="form-group row">
                                <label class="text-right col-md-form-label col-md-2 font-weight-bold">Plaquettes </label>
                                <input type="text" readonly value="{{$sanguin->plaquette}}" name="plaquette" class="form-control col-md-4" >
                                <label class="text-right col-md-form-label col-md-2 font-weight-bold">Leu/Lymp/Eosi%</label>
                                <input type="text" readonly value="{{$sanguin->leu}}" name="leu" class="form-control col-md-4" >
                            </div>
                            <div class="form-group row">
                                <label class="text-right col-md-form-label col-md-2 font-weight-bold">Réticulocytes </label>
                                <input type="text" readonly value="{{$sanguin->reticulocyte}}" name="reticulocyte" class="form-control col-md-4" >
                                <label class="text-right col-md-form-label col-md-2 font-weight-bold">CRP /VS</label>
                                <input type="text" readonly value="{{$sanguin->crp}}" name="crp" class="form-control col-md-4" >
                            </div>
                            <div class="form-group row">
                                <label class="text-right col-md-form-label col-md-2 font-weight-bold">Fer sérique </label>
                                <input type="text" readonly value="{{$sanguin->ferserique}}" name="ferserique" class="form-control col-md-4" >
                                <label class="text-right col-md-form-label col-md-2 font-weight-bold">Sat Transferrine</label>
                                <input type="text" readonly value="{{$sanguin->sattetranferrine}}" name="satetranferine" class="form-control col-md-4" >
                            </div>
                            <div class="form-group row">
                                <label class="text-right col-md-form-label col-md-2 font-weight-bold">B12 sanguin </label>
                                <input type="text" readonly value="{{$sanguin->b12sanguin}}" name="b12sanguin" class="form-control col-md-4" >
                                <label class="text-right col-md-form-label col-md-2 font-weight-bold">Folate sanguin</label>
                                <input type="text" readonly value="{{$sanguin->folatesanguin}}" name="folatesanguin" class="form-control col-md-4" >
                            </div>
                        </div>

                        @if($sanguin->nom_autre || $sanguin->nom_autre1)
                            <div class="col" align="center">
                                <div class="form-group row font-weight-bold" style="font-size: 17px">
                                    <div class="offset-5"></div>
                                    <input type="checkbox" disabled readonly checked onclick="fonctionParaclinic(this)" class="custom-checkbox col-md-1">Autre bilan sanguin  <em class="font-italic font-weight-normal" style="font-size: small">&nbsp; ** optionnel **</em>
                                </div>
                            </div>

                            <div class="col" id="autre_para" style="display: block">
                                @if($sanguin->nom_autre)
                                    <div class="form-group row">
                                        <div class="offset-md-2"></div>
                                        <input type="text" readonly value="{{$sanguin->nom_autre}}" name="nom_autre" class="form-control col-md-5" >
                                        <input type="text" readonly value="{{$sanguin->resultat}}" name="resultat" class="form-control col-md-5" >
                                    </div>
                                @else
                                    <div class="form-group row" style="display:none;">
                                        <div class="offset-md-2"></div>
                                        <input type="text" readonly value="{{$sanguin->nom_autre}}" name="nom_autre" class="form-control col-md-5" >
                                        <input type="text" readonly value="{{$sanguin->resultat}}" name="resultat" class="form-control col-md-5" >
                                    </div>
                                @endif

                                @if($sanguin->nom_autre1)
                                    <div class="form-group row">
                                        <div class="offset-md-2"></div>
                                        <input type="text" readonly value="{{$sanguin->nom_autre1}}" name="nom_autre1" class="form-control col-md-5">
                                        <input type="text" readonly value="{{$sanguin->resultat1}}" name="resultat1"  class="form-control col-md-5">
                                    </div>
                                @else
                                    <div class="form-group row" style="display: none">
                                        <div class="offset-md-2"></div>
                                        <input type="text" readonly value="{{$sanguin->nom_autre1}}" name="nom_autre1" class="form-control col-md-5">
                                        <input type="text" readonly value="{{$sanguin->resultat1}}" name="resultat1"  class="form-control col-md-5">
                                    </div>
                                @endif
                            </div>
                        @else
                            <div class="col" align="center" style="display: none">
                                <div class="form-group row font-weight-bold" style="font-size: 17px">
                                    <div class="offset-5"></div>
                                    <input type="checkbox" readonly onclick="fonctionParaclinic(this)" class="custom-checkbox col-md-1">Autre bilan sanguin  <em class="font-italic font-weight-normal" style="font-size: small">&nbsp; ** optionnel **</em>
                                </div>
                            </div>

                            <div class="col" id="autre_para" style="display: none">
                                <div class="form-group row">
                                    <div class="offset-md-2"></div>
                                    <input type="text" readonly value="{{$sanguin->nom_autre}}" name="nom_autre"  class="form-control col-md-5" >
                                    <input type="text" readonly value="{{$sanguin->resultat}}" name="resultat"  class="form-control col-md-5" >
                                </div>
                                <div class="form-group row">
                                    <div class="offset-md-2"></div>
                                    <input type="text" readonly value="{{$sanguin->nom_autre1}}" name="nom_autre1"  class="form-control col-md-5">
                                    <input type="text" readonly value="{{$sanguin->resultat1}}" name="resultat1"  class="form-control col-md-5">
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
