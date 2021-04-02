@extends('layouts.medlayout')

@section('content')
    <h1 class="text-center" style="background-color: #01A9CB; height: 30px; font-size: large; padding-top: 5px; font-weight: bold">Antécédents médicaux</h1>
    <div class="container-fluid p-2" style="background-color: white">
        <div class="flash-message col-md-12">
            @if(Session::has('message'))
                <div class="alert {{Session::get('alert-class')}}">
                    {{session::get('message')}}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                </div>
            @endif
        </div>

        <div class="card p-2">
            <div class="card-header text-center font-weight-bold text-uppercase">Uronephrologiques</div>
            <div class="card-body">
                <form action="{{route('uronephrologie.store')}}" method="post">
                    @csrf
                    <div class="col">
                        <div class="form-group row">
                            <label class="col-md-2 font-weight-bold text-right"  for="nom_maladie">Symptomes<em style="color: red;">*</em> :</label>
                            <select onchange="showHideUro()" data-live-search="true" data-placeholder="choisir une maladie" name="nom" id="nom_maladie" data-style="btn-outline-secondary btn-perso" class="selectpicker form-control col-md-4">
                                <option value="oeudeme">Œdèmes</option>
                                <option value="proteinurie">Protéinurie</option>
                                <option value="hematurie">Hématurie </option>
                                <option value="troublemictiondiurese">Troubles de la miction et de la diurèse</option>
                            </select>
                            <label class="col-md-2 font-weight-bold text-right" for="datedecouverte">Date de decouverte<em style="color: red;">*</em> :</label>
                            <input type="date" name="datedecouverte" id="datedecouverte" class="form-control col-md-4">
                        </div>
                    </div>

                    <div id="nombre_episode" style="display: none" class="col">
                        <div class="form-group row">
                            <label class="col-md-2 font-weight-bold text-right" for="nombreepisode">Nombre épisodes<em style="color: red;">*</em> :</label>
                            <input type="text" name="nombreepisode" id="nombreepisode" class="col-md-10 form-control">
                        </div>
                    </div>

                    <div id="ifevolution" style="display: none" class="col">
                        <div class="form-group row">
                            <label for="evolution" class="col-md-2 font-weight-bold text-right">Evolution<em style="color: red;">*</em> :</label>
                            <select onchange="showHideUro()" name="evolution" id="evolution" data-style="btn-outline-secondary btn-perso" class="selectpicker form-control col-md-10" data-placeholder="choisir l'evolution" data-live-search="true">
                                <option value="disparition">Disparition</option>
                                <option value="persistance">Persistance</option>
                                <option value="rechute">Rechute</option>
                                <option value="pasdecontrol">Pas de contrôle ni de suivi</option>
                            </select>
                        </div>
                    </div>

                    <div id="rechute_nombre" style="display: none" class="col">
                        <div class="row form-group">
                            <label class="col-md-2 font-weight-bold text-right">Nombre de rechute<em style="color: red;">*</em> :</label>
                            <input type="text" name="nombrerechute" class="col-md-10 form-control">
                        </div>
                    </div>

                    <div id="oeudemesiege" style="display: none" class="col">
                        <div class="form-group row">
                            <label class="col-md-2 font-weight-bold text-right">Siège<em style="color: red;">*</em> :</label>
                            <select class="col-md-10 form-control selectpicker" data-placeholder="Choisir Siege(s)" data-style="btn-outline-secondary btn-perso" data-live-search="true" multiple name="siegeoeudeme[]">
                                <option value="visage">Visage</option>
                                <option value="membreinferieur">Membre inférieur</option>
                                <option value="ascite">Ascite</option>
                                <option value="generalise">Généralisé</option>
                            </select>
                        </div>
                    </div>

                    <div id="traitement_recu"  style="display: none" class="col">
                        <div class="form-group row">
                            <label for="traitement" class="col-md-2 font-weight-bold text-right">Traitement reçu<em style="color: red;">*</em> :</label>
                            <select id="traitement" onchange="showHideUro()" data-placeholder="Choisir traitement (s)" data-style="btn-outline-secondary btn-perso" data-live-search="true" class="selectpicker form-control col-md-10" multiple  name="traitement[]">
                                <option class="font-weight-bold" disabled>Traitement Œdèmes</option>
                                <option value="rhs">RHS</option>
                                <option value="traditionnel">Traditionnel</option>
                                <option value="diuretique">Diurétique</option>
                                <option value="aucun">Aucun</option>

                                <option class="font-weight-bold" disabled>Traitement Protéinurie</option>
                                <option value="aucun">Aucun</option>
                                <option value="regimesanssel">Regime sans sel</option>
                                <option value="corticoide">Corticoïdes</option>
                                <option value="traditionnel">Traditionnel</option>
                                <option value="autre">Autre</option>
                            </select>
                        </div>
                    </div>

                    <div id="dose_corticoide" style="display: none" class="col">
                        <div class="form-group row">
                            <label class="col-md-2 font-weight-bold text-right">Dose traitement Corticoïdes<em style="color: red;">*</em> :</label>
                            <input type="text" name="dose_corticoide" class="col-md-10 form-control">
                        </div>
                    </div>

                    <div id="duree_corticoide" style="display: none" class="col">
                        <div class="form-group row">
                            <label class="col-md-2 font-weight-bold text-right">Durée traitement Corticoïdes<em style="color: red;">*</em> :</label>
                            <input type="text" name="duree_corticoide" class="col-md-10 form-control">
                        </div>
                    </div>

                    <div id="precision_traitement"  style="display: none" class="col">
                        <div class="form-group row">
                            <label class="col-md-2 font-weight-bold text-right">Précision du traitement<em style="color: red;">*</em> :</label>
                            <input type="text" name="precisiontraitement" class="col-md-10 form-control">
                        </div>
                    </div>

                    <div id="type_hematurie" style="display: none" class="col">
                        <div class="form-group row">
                            <label class="col-md-2 font-weight-bold text-right">Type Hématurie<em style="color: red;">*</em> :</label>
                            <select class="selectpicker form-control col-md-10" name="type_hematurie[]" data-style="btn-outline-secondary btn-perso" data-live-search="true" data-placeholder="Choisir type (s)" multiple>
                                <option value="macroscopique">Macroscopique</option>
                                <option value="microscopique">Microscopique</option>
                                <option value="permanente">Permanente</option>
                                <option value="intermittente">intermittente</option>
                                <option value="isole">Isolé</option>
                            </select>
                        </div>
                    </div>

                    <div id="signe_accompagnement" style="display: none" class="col">
                        <div class="form-group row">
                            <label class="col-md-2 font-weight-bold text-right">Signe d'accompagnement<em style="color: red;">*</em> :</label>
                            <input type="text" name="signeaccompagnement" class="col-md-10 form-control">
                        </div>
                    </div>

                    <div id="type_trouble" style="display: none" class="col">
                        <div class="form-group row">
                            <label class="col-md-2 font-weight-bold text-right">Type Troubles de la miction et de la diurèse<em style="color: red;">*</em> :</label>
                            <select onchange="showHideUro()" data-style="btn-outline-secondary btn-perso" class="selectpicker form-control col-md-10" name="type_trouble" data-live-search="true" data-placeholder="Choisir un type">
                                <option value="dysirie">Dysurie</option>
                                <option value="pollakiurie">Pollakiurie</option>
                                <option value="oligurie">Oligurie</option>
                                <option value="rau">RAU</option>
                                <option value="polyurie">Polyurie</option>
                                <option value="nycturie">Nycturie</option>
                                <option value="autre">Autre</option>
                            </select>
                        </div>
                    </div>

                    <div id="precision_autre_trouble" style="display: none" class="col">
                        <div id="" class="form-group row">
                            <label class="col-md-2 font-weight-bold text-right">Précision du type<em style="color: red;">*</em> :</label>
                            <input type="text" name="precisiontype" class="col-md-10 form-control">
                        </div>
                    </div>

                    <div id="traitement_trouble" style="display: none" class="col">
                        <div id="" class="form-group row">
                            <label class="col-md-2 font-weight-bold text-right">Traitement du trouble<em style="color: red;">*</em> :</label>
                            <input type="text" name="traitement_trouble" class="col-md-10 form-control">
                        </div>
                    </div>

                    <div class="d-flex justify-content-center">
                        <button class="btn btn-primary mr-1">Enregistrer</button>
                        <div class="btn btn-secondary"><a href="{{route('infection.create')}}" style="color: white">Suivant</a></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection



