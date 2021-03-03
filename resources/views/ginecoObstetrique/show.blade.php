@extends('layouts.medlayout')

@section('content')
    <h1 class="text-center" style="background-color: #01A9CB; height: 30px; font-size: large; padding-top: 5px; font-weight: bold">Antécédents Gyneco-Obstetriques</h1>
    <div class="container-fluid p-2" style="background-color: white">
        <div class="card p-2">
            <div class="card-header text-center font-weight-bold text-uppercase">Antécédent Gyneco-Obstetrique de {{$patient->prenom}} {{$patient->nom}} [ Consultation du {{$consult->created_at}}]
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
                                <label class="text-right font-weight-bold col-md-2">Date des prémières règles:</label>
                                <input type="date" readonly name="datepremierregle" class="form-control col-md-4" value="{{$gyneco->datepremierregle}}">
                                <label class="text-right font-weight-bold col-md-2">Date des dernières règles:</label>
                                <input type="date" readonly name="datedernierregle" class="form-control col-md-4" value="{{$gyneco->datedernierregle}}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group row">
                                <label class="text-right col-md-2 font-weight-bold">Ménopause:</label>
                                <input type="date" readonly name="menopause" class="form-control col-md-4" value="{{$gyneco->menopause}}">
                                <label class="text-right font-weight-bold col-md-2">Date:</label>
                                <input type="date" readonly name="datemenopause" class="form-control col-md-4" value="{{$gyneco->datemenopause}}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group row">
                                <label class="text-right col-md-2 font-weight-bold">Contraception:</label>
                                <input type="text" readonly name="contraception" class="form-control col-md-4" value="{{$gyneco->contraception}}">
                                <label class="text-right font-weight-bold col-md-2">Type:</label>
                                <input type="text" readonly name="type" class="form-control col-md-4" value="{{$gyneco->type_contraception}}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group row">
                                <label class="text-right font-weight-bold col-md-2">Durée:</label>
                                <input type="text" readonly name="dure" class="form-control col-md-4" value="{{$gyneco->duree_contraception}}">
                                <label class="text-right font-weight-bold col-md-2">Gestité:</label>
                                <input type="text" readonly name="gestite" class="form-control col-md-4" value="{{$gyneco->gestite}}">

                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group row">
                                <label class="text-right font-weight-bold col-md-2">Parité:</label>
                                <input type="text" readonly name="parite" class="form-control col-md-4" value="{{$gyneco->parite}}">
                                <label class="text-right font-weight-bold col-md-2">Date de dernière grossesse:</label>
                                <input type="date" readonly name="datederniergrossesse" class="form-control col-md-4" value="{{$gyneco->datederniergrossesse}}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group row">
                                <label class="text-right font-weight-bold col-md-2">EV:</label>
                                <input type="text" readonly name="EV" class="form-control col-md-4" value="{{$gyneco->ev}}">
                                <label class="text-right font-weight-bold col-md-2">DCD:</label>
                                <input type="text" readonly name="DCD" class="form-control col-md-4" value="{{$gyneco->dcd}}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group row">
                                <label class="text-right col-md-2 font-weight-bold">Avortements Spontanés:</label>
                                <input type="text" readonly name="spontane" class="form-control col-md-2" value="{{$gyneco->avortement_spontane}}">
                                <input type="text" readonly name="nombrespont" class="form-control col-md-4" value="{{$gyneco->nombre_avortement_spontane}}">
                                <input type="text" readonly name="anneespont" class="form-control col-md-4" value="{{$gyneco->annee_avortement_spontane}}">
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" role="tabpanel" aria-labelledby="page2_tab" id="page2">
                        <div class="col">
                            <div class="form-group row">
                                <label class="text-right col-md-2 font-weight-bold">Avortements Provoqués:</label>
                                <input type="text" readonly name="provoque" class="form-control col-md-2" value="{{$gyneco->avortement_provoque}}">
                                <input type="text" readonly name="nombreprovoque" class="form-control col-md-4" value="{{$gyneco->nombre_avortement_provoque}}">
                                <input type="text" readonly name="anneeprovoque" class="form-control col-md-4" value="{{$gyneco->annee_avortement_provoque}}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group row">
                                <label class="text-right col-md-2 font-weight-bold">Césariennes:</label>
                                <input type="text" readonly name="cesarienne" class="form-control col-md-2" value="{{$gyneco->cesarienne}}">
                                <input type="text" readonly name="nombrecesarienne"  class="form-control col-md-2" value="{{$gyneco->nombre_cesarienne}}">
                                <input type="text" readonly name="anneecesarienne" class="form-control col-md-2" value="{{$gyneco->annee_cesarienne}}">
                                <input type="text" readonly name="motifcesarienne" class="form-control col-md-4" value="{{$gyneco->motif_cesarienne}}">
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group row">
                                <label class="text-right col-md-2 font-weight-bold">Albumine pendant la (les) grossesse (s):</label>
                                <input type="text" readonly name="albumine" class="form-control col-md-4" value="{{$gyneco->albumine}}">
                                <label class="text-right col-md-2 font-weight-bold">HTA pendant la (les)grossesse (s):</label>
                                <input type="text" readonly name="hta" class="form-control col-md-4" value="{{$gyneco->hta}}">
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group row">
                                <label class="text-right col-md-2 font-weight-bold">Préciser la (les) grossesse (s) :</label>
                                <input type="text" readonly name="grossesse" class="form-control col-md-6" value="{{$gyneco->grossesse}}">
                                <input type="text" readonly name="issues" class="form-control col-md-4" value="{{$gyneco->issue_grossesse}}">
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group row">
                                <label class="text-right col-md-2 font-weight-bold">Autres antécédents gynéco-obstétrique :</label>
                                <input type="text" readonly name="autre" class="form-control col-md-10" value="{{$gyneco->autreginecoobs}}">
                            </div>
                        </div>

                {{--<div class="d-flex justify-content-center">
                    <div class="btn btn-secondary"><a href="#" style="color: white">imprimer</a></div>
                </div>--}}
            </div>
        </div>
    </div>
@endsection
