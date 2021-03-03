@extends('layouts.medlayout')

@section('content')
    <h1 class="text-center" style="background-color: #01A9CB; height: 30px; font-size: large; padding-top: 5px; font-weight: bold">Consultation du {{$consult->created_at}} de {{$infopatient->prenom}} {{$infopatient->nom}}</h1>
    <div class="container-fluid p-1" style="background-color: white">
        <div class="flash-message col-12">
            @if(Session::has('message'))
                <div class="alert {{Session::get('alert-class')}}">
                    {{session::get('message')}}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                </div>
            @endif
        </div>
        <div class="card bg-white p-2 mb-2" style=" box-shadow: 0 0 5px whitesmoke;">
            <div class="col">
                <div class="form-group row">
                    <label for="num_dossier" class=" col-md-2 text-right font-weight-bold" >Numéro dossier:</label>
                    <input type="text" readonly id="num_dossier" name="num_dossier" class="col-md-4 form-control" value="{{$consult->num_dossier}}">
                    <label for="numQ" class=" col-md-2 text-right font-weight-bold" >Numero de la quittance:</label>
                    <input type="text"  readonly name="numQ" id="numQ" class="col-md-4 form-control" value="{{$consult->numQ}}">
                </div>
                <div class="form-group row">
                    <label for="adresserpar" class=" col-md-2 text-right font-weight-bold" >Adressé par:</label>
                    <input type="text" readonly id="adresserpar"  name="adresserpar" class="col-md-4 form-control" value="{{$consult->adresserpar}}">
                    <label for="motifadmission" class=" col-md-2 text-right font-weight-bold" >Motif d'admission:</label>
                    <input type="text"readonly id="motifadmission"  name="motifadmission" value="{{$consult->motif_admission}}" class="col-md-4 form-control">
                </div>
                <div class="form-group row">
                    <label for="motifhospitalisation" class="col-md-2 text-right font-weight-bold" >Motif d'hospitalisation:</label>
                    <input type="text" readonly id="motifhospitalisation"  name="motifhospitalisation" value="{{$consult->motif_hospitalisation}}" class="col-md-4 form-control">
                    <label for="resume" class="col-md-2 text-right font-weight-bold" >Résume:</label>
                    <textarea type="text" readonly id="resume"  name="resume" class="col-md-4 form-control">{{$consult->resume}}</textarea>
                </div>
                <div class="form-group row">
                    <label for="conduite" class="col-md-2 text-right font-weight-bold" >Conduite à tenir:</label>
                    <textarea type="text" readonly id="conduite"  name="conduite" class="col-md-4 form-control">{{$consult->conduite}}</textarea>
                    <label for="diagnostic" class="col-md-2 text-right font-weight-bold" >Diagnostic:</label>
                    <textarea type="text" readonly id="diagnostic"  name="diagnostic" class="col-md-4 form-control">{{$consult->diagnostic}}</textarea>
                </div>
                <div class="form-group row">

                </div>
                <div class="form-group row">
                    <label for="histoiremaladie" class="form-label font-weight-bold text-right col-md-2">Histoire de la maladie:</label>
                    <textarea readonly class="form-control col-md-10" id="histoiremaladie" name="histoiremaladie">{{$consult->histoiremaladie}}</textarea>
                </div>


                <div class="row d-flex justify-content-center">
                    <div class="mr-1">
                        <a id="dropdown" class="nav-link dropdown-toggle btn btn-outline-primary dropdown-toggle-split" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Antécédents </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdown">
                            <li><a class="dropdown-item" href="{{route('uronephrologie.show', $consult->id)}}">Uronephrologiques</a></li>
                            <li><a class="dropdown-item" href="{{route('infection.show', $consult->id)}}">Infectieux</a></li>
                            <li><a class="dropdown-item" href="{{route('maladiegenerale.show', $consult->id)}}">Maladies Générales</a></li>
                            <li><a class="dropdown-item" href="{{route('affectionIMM.show', $consult->id)}}">Affections Immunologiques</a></li>
                            <li><a class="dropdown-item" href="{{route('affectionTumorale.show', $consult->id)}}">Affections Tumorales Malignes</a></li>
                            <li><a class="dropdown-item" href="{{route('Autre_antecedent_medical.show', $consult->id)}}">Autres Antécédents Médicaux</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{route('chirurgicaux.show', $consult->id)}}">Chirurgicaux</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{route('genico-obstetrique.show', $consult->id)}}">Gyneco-Obstétriques</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{route('habitude-alimentaire.show', $consult->id)}}">Habitudes Alimentaire et Mode de Vie</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{route('antfamilial.show', $consult->id)}}">Familiaux</a></li>
                        </ul>
                    </div>

                    <div class="mr-1">
                        <a id="dropdown1" class="nav-link dropdown-toggle btn btn-outline-primary dropdown-toggle-split" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Examens Cliniques </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdown1">
                            <li><a class="dropdown-item" href="{{route('examen-appareil.show', $consult->id)}}">Examen Appareils</a></li>
                            <li><a class="dropdown-item" href="{{route('examen-general.show', $consult->id)}}">Examen Général</a></li>
                        </ul>
                    </div>

                    <div class="mr-1">
                        <a id="dropdown2" class="nav-link dropdown-toggle btn btn-outline-primary dropdown-toggle-split" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Examens Paracliniques </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdown2">
                            <li><a class="dropdown-item" href="{{route('bilan-sanguin.show', $consult->id)}}">Bilan Sanguins</a></li>
                            <li><a class="dropdown-item" href="{{route('electrophorese.show', $consult->id)}}">Electrophorèse des protéines</a></li>
                            <li><a class="dropdown-item" href="{{route('serologie.show', $consult->id)}}">Sérologies</a></li>
                            <li><a class="dropdown-item" href="{{route('parasitologie.show', $consult->id)}}">Parasitologie</a></li>
                            <li><a class="dropdown-item" href="{{route('hemostase.show', $consult->id)}}">Hémostase</a></li>
                            <li><a class="dropdown-item" href="{{route('endocrinologie.show', $consult->id)}}">Endocrinologie</a></li>
                            <li><a class="dropdown-item" href="{{route('marqueur-tumoral.show', $consult->id)}}">Marqueurs Tumoraux</a></li>
                            <li><a class="dropdown-item" href="{{route('bilan-urinaire.show', $consult->id)}}">Bilan Urinaire</a></li>
                            <li><a class="dropdown-item" href="{{route('liquide-bio-selle.show', $consult->id)}}">Liquides Biologiques et selles</a></li>
                            <li>
                                <form action="{{route('imagerie', $consult->id)}}" method="post">
                                    @csrf
                                    <input type="hidden" name="image" value="imagerie">
                                    <button type="submit" class="dropdown-item">Imagerie</button>
                                </form>
                            </li>
                            <li>
                                <form action="{{route('endoscopie', $consult->id)}}" method="post">
                                    @csrf
                                    <input type="hidden" name="endoscopie" value="endoscopie">
                                    <button type="submit" class="dropdown-item">Endoscopie</button>
                                </form>
                            </li>
                            <li>
                                <form action="{{route('anatomopatholigique', $consult->id)}}" method="post">
                                    @csrf
                                    <input type="hidden" name="anatomopatholigique" value="anatomopatholigique">
                                    <button type="submit" class="dropdown-item">Examens Anatomopathologiques</button>
                                </form>
                            </li>
                        </ul>
                    </div>

                    <button class="btn btn-outline-primary mr-1 nav-link"><a href="#">Traitement</a></button>
                    <button class="btn btn-outline-primary mr-1 nav-link"><a href="#">Evolution</a></button>
                    <button class="btn btn-outline-primary mr-1 nav-link"><a href="#">Autre Résultat</a></button>
                    <button class="btn btn-outline-secondary"><a style="color: #4e555b" href="#">Imprimer</a></button>
                </div>
            </div>

        </div>
    </div>
@endsection
