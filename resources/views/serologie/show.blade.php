@extends('layouts.medlayout')

@section('content')
    <h1 class="text-center" style="background-color: #01A9CB; height: 30px; font-size: large; padding-top: 5px; font-weight: bold">Antécédents Paracliniques</h1>
    <div class="container-fluid p-2" style="background-color: white">
        <div class="card p-2">
            <div class="card-header text-center font-weight-bold text-uppercase">Résultat Sérologie de {{$patient->prenom}} {{$patient->nom}} [ Consultation du {{$consult->created_at}}]
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
                                <input type="date" readonly name="date" class="form-control col-4" value="{{$serologie->date}}">
                                <label class="text-right col-form-label col-2 font-weight-bold">Sérologie VIH:</label>
                                <input type="text" readonly name="serologievih" class="form-control col-4" value="{{$serologie->serologie_vih}}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group row">
                                <label class="text-right col-form-label col-2 font-weight-bold">CD4/CV:</label>
                                <input type="text" readonly name="cd4cb" class="form-control col-4" value="{{$serologie->cd4cv}}">
                                <label class="text-right col-form-label col-2 font-weight-bold">Ag Hbs:</label>
                                <input type="text" readonly name="aghbs" class="form-control col-4" value="{{$serologie->aghbs}}">
                            </div>
                        </div>
                        @if($serologie->aghbs === 'positif')
                            <div class="col">
                                <div class="form-group row">
                                    <label class="text-right col-form-label col-2 font-weight-bold">Charge Virale (Ag Hbs) :</label>
                                    <input type="text" readonly name="aghbs" class="form-control col-10" value="{{$serologie->charge_hbs}}">
                                </div>
                            </div>
                        @endif
                        <div class="col">
                            <div class="form-group row">
                                <label class="text-right col-form-label col-2 font-weight-bold">AgHbe:</label>
                                <input type="text" readonly name="aghbe" class="form-control col-4" value="{{$serologie->aghbe}}">
                                <label class="text-right col-form-label col-2 font-weight-bold">Acanti Hbc:</label>
                                <input type="text" readonly name="acantihbc" class="form-control col-4" value="{{$serologie->acantihbc}}">
                            </div>
                        </div>
                        @if($serologie->acantihbc === 'positif')
                            <div class="col">
                                <div class="form-group row">
                                    <label class="text-right col-form-label col-2 font-weight-bold">Charge Virale (Acanti Hbc) :</label>
                                    <input type="text" readonly name="acantihbc" class="form-control col-10" value="{{$serologie->charge_hbc}}">
                                </div>
                            </div>
                        @endif
                        <div class="col">
                            <div class="form-group row">
                                <label class="text-right col-form-label col-2 font-weight-bold">Acanti HVC:</label>
                                <input type="text" readonly name="acantihvc" class="form-control col-4" value="{{$serologie->acantihvc}}">
                                <label class="text-right col-form-label col-2 font-weight-bold">ASLO:</label>
                                <input type="text" readonly name="also" class="form-control col-4" value="{{$serologie->aslo}}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group row">
                                <label class="text-right col-form-label col-2 font-weight-bold">Facteurs rhumatoides:</label>
                                <input type="text" readonly name="facteurrh" class="form-control col-4" value="{{$serologie->facteur_rhumatoide}}">
                                <label class="text-right col-form-label col-2 font-weight-bold">Widal (titrage):</label>
                                <input type="text" readonly name="widal" class="form-control col-4" value="{{$serologie->widal}}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group row">
                                <label class="text-right col-form-label col-2 font-weight-bold">Ac antinucléaire:</label>
                                <input type="text" readonly name="acnucleaire" class="form-control col-4" value="{{$serologie->ac_antinucleaire}}">
                                <label class="text-right col-form-label col-2 font-weight-bold">Ac anti-DNA natif:</label>
                                <input type="text" readonly name="acdna" class="form-control col-4" value="{{$serologie->ac_antidna}}">
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" role="tabpanel" aria-labelledby="page2_tab" id="page2">
                        <div class="col">
                            <div class="form-group row">
                                <label class="text-right col-form-label col-2 font-weight-bold">Ac antiSm:</label>
                                <input type="text" readonly name="acsm" class="form-control col-4" value="{{$serologie->ac_antism}}">
                                <label class="text-right col-form-label col-2 font-weight-bold">Ac antiphospholipide:</label>
                                <input type="text" readonly name="acph" class="form-control col-4" value="{{$serologie->ac_antiphospholipide}}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group row">
                                <label class="text-right col-form-label col-2 font-weight-bold">TPHA:</label>
                                <input type="text" readonly name="tpha" class="form-control col-4" value="{{$serologie->tpha}}">
                                <label class="text-right col-form-label col-2 font-weight-bold">VDRL:</label>
                                <input type="text" readonly name="vdrl" class="form-control col-4" value="{{$serologie->vdrl}}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group row">
                                <label class="text-right col-form-label col-2 font-weight-bold">Sérologie amibienne:</label>
                                <input type="text" readonly name="serologieamibienne" class="form-control col-4" value="{{$serologie->serologie_amibienne}}">
                                <label class="text-right col-form-label col-2 font-weight-bold">Sérologie bilharzienne:</label>
                                <input type="text" readonly name="serologiebilharzienne" class="form-control col-4" value="{{$serologie->serologie_bilharzienne}}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group row">
                                <label class="text-right col-form-label col-2 font-weight-bold">Sérologie Dengue:</label>
                                <input type="text" readonly name="serologiedengue" class="form-control col-10" value="{{$serologie->serologie_dengue}}">
                            </div>
                        </div>

                        @if($serologie->nom_autre || $serologie->nom_autre1)
                            <div class="col" align="center">
                                <div class="form-group row font-weight-bold" style="font-size: 17px">
                                    <div class="offset-5"></div>
                                    <input type="checkbox" disabled readonly checked onclick="fonctionParaclinic(this)" class="custom-checkbox col-1">Autre sérologie  <em class="font-italic font-weight-normal" style="font-size: small">&nbsp; ** optionnel **</em>
                                </div>
                            </div>

                            <div class="col" id="autre_para" style="display: block">
                                @if($serologie->nom_autre)
                                    <div class="form-group row">
                                        <div class="offset-md-2"></div>
                                        <input type="text" readonly value="{{$serologie->nom_autre}}" name="nom_autre" class="form-control col-5" >
                                        <input type="text" readonly value="{{$serologie->resultat}}" name="resultat" class="form-control col-5" >
                                    </div>
                                @else
                                    <div class="form-group row" style="display:none;">
                                        <div class="offset-md-2"></div>
                                        <input type="text" readonly value="{{$serologie->nom_autre}}" name="nom_autre" class="form-control col-5" >
                                        <input type="text" readonly value="{{$serologie->resultat}}" name="resultat" class="form-control col-5" >
                                    </div>
                                @endif

                                @if($serologie->nom_autre1)
                                    <div class="form-group row">
                                        <div class="offset-md-2"></div>
                                        <input type="text" readonly value="{{$serologie->nom_autre1}}" name="nom_autre1" class="form-control col-5">
                                        <input type="text" readonly value="{{$serologie->resultat1}}" name="resultat1"  class="form-control col-5">
                                    </div>
                                @else
                                    <div class="form-group row" style="display: none">
                                        <div class="offset-md-2"></div>
                                        <input type="text" readonly value="{{$serologie->nom_autre1}}" name="nom_autre1" class="form-control col-5">
                                        <input type="text" readonly value="{{$serologie->resultat1}}" name="resultat1"  class="form-control col-5">
                                    </div>
                                @endif
                            </div>
                        @else
                            <div class="col" align="center" style="display: none">
                                <div class="form-group row font-weight-bold" style="font-size: 17px">
                                    <div class="offset-5"></div>
                                    <input type="checkbox" readonly onclick="fonctionParaclinic(this)" class="custom-checkbox col-1">Autre Sérologie  <em class="font-italic font-weight-normal" style="font-size: small">&nbsp; ** optionnel **</em>
                                </div>
                            </div>

                            <div class="col" id="autre_para" style="display: none">
                                <div class="form-group row">
                                    <div class="offset-md-2"></div>
                                    <input type="text" readonly value="{{$serologie->nom_autre}}" name="nom_autre"  class="form-control col-5" >
                                    <input type="text" readonly value="{{$serologie->resultat}}" name="resultat"  class="form-control col-5" >
                                </div>
                                <div class="form-group row">
                                    <div class="offset-md-2"></div>
                                    <input type="text" readonly value="{{$serologie->nom_autre1}}" name="nom_autre1"  class="form-control col-5">
                                    <input type="text" readonly value="{{$serologie->resultat1}}" name="resultat1"  class="form-control col-5">
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
