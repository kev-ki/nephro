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
            <div class="card-header text-center font-weight-bold text-uppercase p-2">Bilan Urinaire
                <ul class="nav nav-tabs mb-1  d-flex justify-content-center" id="table" role="tablist">
                    <li class="nav-item bouton-forme" style="font-size: 15px;"><a class="nav-link active" id="page1_tab" data-toggle="tab" href="#page1" role="tab" aria-controls="page1" aria-selected="true">Page 1</a></li>
                    <li class="nav-item ml-5 bouton-forme" style="font-size: 15px"><a class="nav-link" id="page2_tab" data-toggle="tab" href="#page2" role="tab" aria-controls="page2" aria-selected="false">Page 2</a></li>
                </ul>
            </div>
            <div class="card-body">
                <form action="{{route('bilan-urinaire.store')}}" method="post">
                    @csrf
                    <div class="tab-content" id="pages_content">
                        <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="page1_tab" id="page1">
                            <div class="col">
                                <div class="form-group row">
                                    <label class="text-right col-form-label col-2 font-weight-bold">Date<em style="color: red;">*</em> :</label>
                                    <input type="date" name="date" class="form-control col-4">
                                    <label class="text-right col-form-label col-2 font-weight-bold">Protéinurie/24h:</label>
                                    <input type="text" name="proteine" class="form-control col-4">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group row">
                                    <label class="text-right col-form-label col-2 font-weight-bold">Volume/24h:</label>
                                    <input type="text" name="volume" class="form-control col-4">
                                    <label class="text-right col-form-label col-2 font-weight-bold">Leucytes/mn:</label>
                                    <input type="text" name="leucyte" class="form-control col-4">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group row">
                                    <label class="text-right col-form-label col-2 font-weight-bold">Hématie/mn:</label>
                                    <input type="text" name="hemacie" class="form-control col-4">
                                    <label class="text-right col-form-label col-2 font-weight-bold">Créatinurie:</label>
                                    <input type="text" name="creatinurie" class="form-control col-4">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group row">
                                    <label class="text-right col-form-label col-2 font-weight-bold">Uréé/créatinurie:</label>
                                    <input type="text" name="ureecreati" class="form-control col-4">
                                    <label class="text-right col-form-label col-2 font-weight-bold">Albumine/Créati:</label>
                                    <input type="text" name="albuminecreati" class="form-control col-4">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group row">
                                    <label class="text-right col-form-label col-2 font-weight-bold">Uraturie:</label>
                                    <input type="text" name="uraturie" class="form-control col-4">
                                    <label class="text-right col-form-label col-2 font-weight-bold">Natriurèse:</label>
                                    <input type="text" name="natriurese" class="form-control col-4">
                                </div>
                            </div>
                        </div>

                        {{-- ============================Page 2============================--}}
                        <div class="tab-pane fade" role="tabpanel" aria-labelledby="page2_tab" id="page2">
                            <div class="col">
                                <div class="form-group row">
                                    <label class="text-right col-form-label col-2 font-weight-bold">Kaliurèse:</label>
                                    <input type="kaliurese" name="kaliurese" class="form-control col-4">
                                    <label class="text-right col-form-label col-2 font-weight-bold">Calciturie:</label>
                                    <input type="text" name="caliciturie" class="form-control col-4">
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group row">
                                    <label class="text-right col-form-label col-2 font-weight-bold">Phosphaturie:</label>
                                    <input type="text" name="phosphaturie" class="form-control col-4">
                                    <label class="text-right col-form-label col-2 font-weight-bold">Cristallurie (Préciser):</label>
                                    <input type="text" name="cristallurie" class="form-control col-4">
                                </div>
                            </div>

                            <div class="col" align="center">
                                <div class="form-group row font-weight-bold" style="font-size: 17px">
                                    <div class="offset-5"></div>
                                    <input type="checkbox" onclick="fonctionParaclinic(this)" class="custom-checkbox col-md-1">Autre bilan urinaire  <em class="font-italic font-weight-normal" style="font-size: small">&nbsp; ** optionnel **</em>
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
                                <div class="btn btn-secondary"><a style="color: white" href="{{route('liquide-bio-selle.create')}}">Suivant</a></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
