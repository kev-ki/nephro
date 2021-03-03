@extends('layouts.medlayout')

@section('content')
    <h1 class="text-center" style="background-color: #01A9CB; height: 30px; font-size: large; padding-top: 5px; font-weight: bold">Antécédents Gyneco-Obstetriques</h1>
    <div class="container-fluid p-2" style="background-color: white">
        <div class="flash-message col-md-12">
            @if(Session::has('message'))
                <div class="alert {{Session::get('alert-class')}}">
                    {{session::get('message')}}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                </div>
            @endif
        </div>
        <div class="card p-2">
            <div class="card-header text-center font-weight-bold text-uppercase">
                <ul class="nav nav-tabs mb-1  d-flex justify-content-center" id="table" role="tablist">
                    <li class="nav-item bouton-forme" style="font-size: 15px;"><a class="nav-link active" id="page1_tab" data-toggle="tab" href="#page1" role="tab" aria-controls="page1" aria-selected="true">Page 1</a></li>
                    <li class="nav-item ml-5 bouton-forme" style="font-size: 15px"><a class="nav-link" id="page2_tab" data-toggle="tab" href="#page2" role="tab" aria-controls="page2" aria-selected="false">Page 2</a></li>
                </ul>
            </div>
            <div class="card-body">
                <form action="{{route('genico-obstetrique.store')}}" method="post">
                    @csrf
                    <div class="tab-content" id="pages_content">
                        <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="page1_tab" id="page1">
                            <div class="col">
                                <div class="form-group row">
                                    <label class="text-right font-weight-bold col-md-2">Date des prémières règles:</label>
                                    <input type="date" name="datepremierregle" class="form-control col-md-4">
                                    <label class="text-right font-weight-bold col-md-2">Date des dernières règles:</label>
                                    <input type="date" name="datedernierregle" class="form-control col-md-4">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group row">
                                    <label class="text-right col-md-2 font-weight-bold">Ménopause:</label>
                                    <select name="menopause" id="menopause" class="col-md-4 selectpicker form-control" data-placeholder="Choisir" data-style="btn-outline-secondary">
                                        <option value="oui">Oui</option>
                                        <option value="non">Non</option>
                                    </select>
                                    <label class="text-right font-weight-bold col-md-2">Date:</label>
                                    <input type="date" name="datemenopause" class="form-control col-md-4">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group row">
                                    <label class="text-right col-md-2 font-weight-bold">Contraception:</label>
                                    <select name="contraception" id="contraception" class="col-md-4 form-control selectpicker" data-placeholder="Choisir" data-style="btn-outline-secondary">
                                        <option value="oui">Oui</option>
                                        <option value="non">Non</option>
                                    </select>
                                    <label class="text-right font-weight-bold col-md-2">Type:</label>
                                    <input type="text" name="type" class="form-control col-md-4">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group row">
                                    <label class="text-right font-weight-bold col-md-2">Durée:</label>
                                    <input type="text" name="dure" class="form-control col-md-4">
                                    <label class="text-right font-weight-bold col-md-2">Gestité:</label>
                                    <input type="text" name="gestite" class="form-control col-md-4">

                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group row">
                                    <label class="text-right font-weight-bold col-md-2">Parité:</label>
                                    <input type="text" name="parite" class="form-control col-md-4">
                                    <label class="text-right font-weight-bold col-md-2">Date de dernière grossesse:</label>
                                    <input type="date" name="datederniergrossesse" class="form-control col-md-4">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group row">
                                    <label class="text-right font-weight-bold col-md-2">EV:</label>
                                    <input type="text" name="EV" class="form-control col-md-4">
                                    <label class="text-right font-weight-bold col-md-2">DCD:</label>
                                    <input type="text" name="DCD" class="form-control col-md-4">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group row">
                                    <label class="text-right col-md-2 font-weight-bold">Avortements Spontanés:</label>
                                    <select name="spontane" id="spontane" class="col-md-2 form-control selectpicker" data-placeholder="Choisir" data-style="btn-outline-secondary">
                                        <option value="oui">Oui</option>
                                        <option value="non">Non</option>
                                    </select>
                                    <input type="text" name="nombrespont" placeholder="Nombres" class="form-control col-md-4">
                                    <input type="text" name="anneespont" placeholder="Années" class="form-control col-md-4">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" role="tabpanel" aria-labelledby="page2_tab" id="page2">
                            <div class="col">
                                <div class="form-group row">
                                    <label class="text-right col-md-2 font-weight-bold">Avortements Provoqués:</label>
                                    <select name="provoque"  id="provoque" class="col-md-2 form-control selectpicker" data-placeholder="Choisir" data-style="btn-outline-secondary">
                                        <option value="oui">Oui</option>
                                        <option value="non">Non</option>
                                    </select>
                                    <input type="text" name="nombreprovoque" placeholder="Nombres" class="form-control col-md-4">
                                    <input type="text" name="anneeprovoque" placeholder="Années" class="form-control col-md-4">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group row">
                                    <label class="text-right col-md-2 font-weight-bold">Césariennes:</label>
                                    <select name="cesarienne" id="cesarienne" class="col-md-2 form-control selectpicker" data-placeholder="Choisir" data-style="btn-outline-secondary">
                                        <option value="oui">Oui</option>
                                        <option value="non">Non</option>
                                    </select>
                                    <input type="text" name="nombrecesarienne" placeholder="Nombres" class="form-control col-md-2">
                                    <input type="text" name="anneecesarienne" placeholder="Années" class="form-control col-md-2">
                                    <input type="text" name="motifcesarienne" placeholder="Motifs" class="form-control col-md-4">
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group row">
                                    <label class="text-right col-md-2 font-weight-bold">Albumine pendant la (les) grossesse (s):</label>
                                    <select name="albumine" id="albumine" class="col-md-4 form-control selectpicker" data-placeholder="Choisir" data-style="btn-outline-secondary">
                                        <option value="oui">Oui</option>
                                        <option value="non">Non</option>
                                    </select>
                                    <label class="text-right col-md-2 font-weight-bold">HTA pendant la (les)grossesse (s):</label>
                                    <select name="hta" id="hta" class="col-md-4 form-control selectpicker" data-placeholder="Choisir">
                                        <option value="oui">Oui</option>
                                        <option value="non">Non</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group row">
                                    <label class="text-right col-md-2 font-weight-bold">Préciser la (les) grossesse (s) :</label>
                                    <input type="text" name="grossesse" class="form-control col-md-6">
                                    <input type="text" name="issues" class="form-control col-md-4" placeholder="leur issue (s)">
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group row">
                                    <label class="text-right col-md-2 font-weight-bold">Autres antécédents gynéco-obstétrique :</label>
                                    <input type="text" name="autre" class="form-control col-md-10">
                                </div>
                            </div>

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary mr-1">Enregistrer</button>
                                <div class="btn btn-secondary"><a style="color: white" href="{{route('habitude-alimentaire.create')}}">Suivant</a></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
