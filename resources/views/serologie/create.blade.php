@extends('layouts.medlayout')

@section('content')
    <h1 class="text-center" style="background-color: #01A9CB; height: 30px; font-size: large; padding-top: 5px; font-weight: bold">Examens Paracliniques</h1>
    <div class="container-fluid p-2" style="background-color: white">
        <div class="flash-message col-md-12">
            @if(Session::has('message'))
                <div class="alert {{Session::get('alert-class')}}">
                    {{session::get('message')}}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                </div>
            @endif
        </div>
        <div class="card p-2">
            <div class="card-header text-center font-weight-bold text-uppercase p-2">Serologies
                <ul class="nav nav-tabs mb-1  d-flex justify-content-center" id="table" role="tablist">
                    <li class="nav-item bouton-forme" style="font-size: 15px;"><a class="nav-link active" id="page1_tab" data-toggle="tab" href="#page1" role="tab" aria-controls="page1" aria-selected="true">Page 1</a></li>
                    <li class="nav-item ml-md-5 bouton-forme mr-md-5" style="font-size: 15px"><a class="nav-link" id="page2_tab" data-toggle="tab" href="#page2" role="tab" aria-controls="page2" aria-selected="false">Page 2</a></li>
                </ul>
            </div>
            <div class="card-body">
                <form action="{{route('serologie.store')}}" method="post">
                    @csrf
                    <div class="tab-content" id="pages_content">
                        <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="page1_tab" id="page1">
                            <div class="col">
                                <div class="form-group row">
                                    <label class="text-right col-md-form-label col-md-2 font-weight-bold">Date<em style="color: red;">*</em>:</label>
                                    <input type="date" name="date" class="form-control col-md-4">
                                    <label class="text-right col-md-form-label col-md-2 font-weight-bold">Sérologie VIH:</label>
                                    <input type="text" name="serologievih" class="form-control col-md-4">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group row">
                                    <label class="text-right col-md-form-label col-md-2 font-weight-bold">CD4/CV:</label>
                                    <input type="text" name="cd4cb" class="form-control col-md-4">
                                    <label for="hbs" class="text-right col-md-form-label col-md-2 font-weight-bold">Ag Hbs:</label>
                                    <select name="aghbs" id="hbs" onchange="serologieHbs(this)" class="form-control col-md-4 selectpicker" data-style="btn-outline-secondary" data-placeholder="Choisir">
                                        <option value="positif">Positif</option>
                                        <option value="negatif">Négatif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col" id="charge_hbs" style="display: none">
                                <div class="form-group row">
                                    <label class="text-right col-md-form-label col-md-2 font-weight-bold">Charge Virale (Ag Hbs) :</label>
                                    <input type="text" name="charge_hbs" class="form-control col-md-10">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group row">
                                    <label class="text-right col-md-form-label col-md-2 font-weight-bold">AgHbe:</label>
                                    <input type="text" name="aghbe" class="form-control col-md-4">
                                    <label class="text-right col-md-form-label col-md-2 font-weight-bold">Acanti Hbc:</label>
                                    <select name="acantihbc" id="hbc" onchange="serologieHbc(this)" class="form-control col-md-4 selectpicker" data-style="btn-outline-secondary" data-placeholder="Choisir">
                                        <option value="positif">Positif</option>
                                        <option value="negatif">Négatif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col" id="charge_hbc" style="display: none">
                                <div class="form-group row">
                                    <label class="text-right col-md-form-label col-md-2 font-weight-bold">Charge Virale (Acanti Hbc) :</label>
                                    <input type="text" name="charge_hbc"  class="form-control col-md-10">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group row">
                                    <label class="text-right col-md-form-label col-md-2 font-weight-bold">Acanti HVC:</label>
                                    <input type="text" name="acantihvc" class="form-control col-md-4">
                                    <label class="text-right col-md-form-label col-md-2 font-weight-bold">ASLO:</label>
                                    <input type="text" name="also" class="form-control col-md-4">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group row">
                                    <label class="text-right col-md-form-label col-md-2 font-weight-bold">Facteurs rhumatoides:</label>
                                    <input type="text" name="facteurrh" class="form-control col-md-4">
                                    <label class="text-right col-md-form-label col-md-2 font-weight-bold">Widal (titrage):</label>
                                    <input type="text" name="widal" class="form-control col-md-4">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group row">
                                    <label class="text-right col-md-form-label col-md-2 font-weight-bold">Ac antinucléaire:</label>
                                    <input type="text" name="acnucleaire" class="form-control col-md-4">
                                    <label class="text-right col-md-form-label col-md-2 font-weight-bold">Ac anti-DNA natif:</label>
                                    <input type="text" name="acdna" class="form-control col-md-4">
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" role="tabpanel" aria-labelledby="page2_tab" id="page2">
                            <div class="col">
                                <div class="form-group row">
                                    <label class="text-right col-md-form-label col-md-2 font-weight-bold">Ac antiSm:</label>
                                    <input type="text" name="acsm" class="form-control col-md-4">
                                    <label class="text-right col-md-form-label col-md-2 font-weight-bold">Ac antiphospholipide:</label>
                                    <input type="text" name="acph" class="form-control col-md-4">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group row">
                                    <label class="text-right col-md-form-label col-md-2 font-weight-bold">TPHA:</label>
                                    <input type="text" name="tpha" class="form-control col-md-4">
                                    <label class="text-right col-md-form-label col-md-2 font-weight-bold">VDRL:</label>
                                    <input type="text" name="vdrl" class="form-control col-md-4">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group row">
                                    <label class="text-right col-md-form-label col-md-2 font-weight-bold">Sérologie amibienne:</label>
                                    <input type="text" name="serologieamibienne" class="form-control col-md-4">
                                    <label class="text-right col-md-form-label col-md-2 font-weight-bold">Sérologie bilharzienne:</label>
                                    <input type="text" name="serologiebilharzienne" class="form-control col-md-4">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group row">
                                    <label class="text-right col-md-form-label col-md-2 font-weight-bold">Sérologie Dengue:</label>
                                    <input type="text" name="serologiedengue" class="form-control col-md-10">
                                </div>
                            </div>

                            <div class="col" align="center">
                                <div class="form-group row font-weight-bold" style="font-size: 17px">
                                    <div class="offset-5"></div>
                                    <input type="checkbox" onclick="fonctionParaclinic(this)" class="custom-checkbox col-md-1">Autre sérologie  <em class="font-italic font-weight-normal" style="font-size: small">&nbsp; ** optionnel **</em>
                                </div>
                            </div>

                            <div class="col" id="autre_para" style="display: none">
                                <div class="form-group row">
                                    <div class="offset-md-2"></div>
                                    <input type="text" name="nom_autre" placeholder="Nom" class="form-control col-md-5" >
                                    <input type="text" name="resultat" placeholder="Résultat" class="form-control col-md-5" >
                                </div>
                                <div class="form-group row">
                                    <div class="offset-md-2"></div>
                                    <input type="text" name="nom_autre1" placeholder="Nom" class="form-control col-md-5">
                                    <input type="text" name="resultat1" placeholder="Résultat" class="form-control col-md-5">
                                </div>
                            </div>

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary mr-1">Enregistrer</button>
                                <div class="btn btn-secondary"><a style="color: white" href="{{route('parasitologie.create')}}">Suivant</a></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
