@extends('layouts.inflayout')

@section('content')
    <h1 class="text-center" style="background-color: #01A9CB; height: 30px; font-weight: bold; font-size: large; padding-top: 5px;">Enregistrement du patient</h1>
    <div class="container-fluid p-2" style="background-color: white">
        <div class="flash-message col-12">
            @if(Session::has('message'))
                <div class="alert {{Session::get('alert-class')}}">
                    {{session::get('message')}}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                </div>
            @endif
        </div>

        <ul class="nav nav-tabs mb-1  d-flex justify-content-center" id="table" role="tablist">
            <li class="nav-item bouton-forme" style="font-size: 15px;"><a class="nav-link active" id="page1_tab" data-toggle="tab" href="#page1" role="tab" aria-controls="page1" aria-selected="true">Page 1</a></li>
            <li class="nav-item ml-md-5 bouton-forme mr-md-5" style="font-size: 15px"><a class="nav-link" id="page2_tab" data-toggle="tab" href="#page2" role="tab" aria-controls="page2" aria-selected="false">Page 2</a></li>
            <li class="nav-item bouton-forme" style="font-size: 15px;"><a class="nav-link" id="page3_tab" data-toggle="tab" href="#page3" role="tab" aria-controls="page3" aria-selected="false">Page 3</a></li>
        </ul>

        {{--==================================form===========================--}}

        <form action="{{ route('infirmier.store') }}" method="POST" class="table-responsive-sm">
            @csrf
            <div class="mb-5 tab-content" id="pages_content">
                <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="page1_tab" id="page1">
                    <div class="col">
                        <div class="form-group row">
                            <label for="numero_dossier" class="col-md-2 col-form-label text-right font-weight-bold">Numero Dossier<em style="color: red;">*</em> :</label>
                            <input type="text" id="numero_dossier" class="col-md-10 form-control @error('numero_dossier') is-invalid @enderror" name="numero_dossier" value="{{old('numero_dossier')}}">
                            @error('numero_dossier')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group row">
                            <label for="chefservice" class="col-md-2 col-form-label text-right font-weight-bold">Chef de Service<em style="color: red;">*</em> :</label>
                            <select id="chefservice" name="chefservice" data-style="btn-outline-secondary" class="col-md-10 selectpicker form-control @error('chefservice') @enderror">
                                @foreach($chef as $chefservice)
                                    <option selected value="{{$chefservice->id}}"> Dr {{$chefservice->prenom}} {{$chefservice->name}}</option>
                                @endforeach
                            </select>
                            @error('chefservice')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group row">
                            <label for="medecinresp" class="col-md-2 col-form-label text-right font-weight-bold">Medecin responsable<em style="color: red;">*</em> :</label>
                            <select id="medecinresp" name="medecinresp" data-live-search="true" data-placeholder="Choisir un medecin" data-style="btn-outline-secondary" class="col-md-4 selectpicker form-control @error('medecinresp') @enderror">
                                @foreach($liste_medecin as $medecin)
                                    <option value="{{$medecin->id}}"> Dr {{$medecin->prenom}} {{$medecin->name}}</option>
                                @endforeach
                            </select>
                            @error('medecinresp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <label for="des" class="col-md-2 col-form-label text-right font-weight-bold">DES :</label>
                            <input type="text" id="des" class="col-md-4 form-control @error('des') is-invalid @enderror" name="des" value="{{old('des')}}">
                            @error('des')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col" >
                        <div class="form-group row">
                            <label for="nom" class="col-md-2 col-form-label text-right font-weight-bold">Nom<em style="color: red;">*</em> :</label>
                            <input type="text" id="nom" class="col-md-4 form-control @error('nom') is-invalid @enderror" name="nom" value="{{old('nom')}}">
                            @error('nom')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror

                            <label for="prenom" class="col-md-2 col-form-label text-right font-weight-bold">Prénom<em style="color: red;">*</em> :</label>
                            <input type="text" id="prenom" class="col-md-4 form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{old('prenom')}}">
                            @error('prenom')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group row">
                            <label for="nomjf" class="col-md-2 col-form-label text-right font-weight-bold">Nom de jeune fille :</label>
                            <input type="text" id="nomjf" class="col-md-2 form-control @error('nomjf') is-invalid @enderror" name="nomjf" value="{{old('nomjf')}}">
                            @error('nomjf')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror

                            <label for="piecepatient" class="col-md-2 col-form-label text-right font-weight-bold">Document d'Identité :</label>
                            <select name="piecepatient" id="piecepatient" data-style="btn-outline-secondary" class="col-md-2 selectpicker form-control @error('piecepatient') is-invalid @enderror">
                                <option selected value="cnib">CNIB</option>
                                <option value="passeport">Passeport</option>
                            </select>
                            @error('piecepatient')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <label for="identite" class="col-md-2 col-form-label text-right font-weight-bold">Numero :</label>
                            <input type="text" id="identite" class="col-md-2 form-control @error('identite') is-invalid @enderror" name="identite" value="{{old('identite')}}">
                            @error('identite')
                            <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group row">
                            <label for="datenaissance" class="col-md-2 col-form-label text-right font-weight-bold">Date de naissance<em style="color: red;">*</em> :</label>
                            <input type="Date" id="datenaissance" class="col-md-4 form-control @error('datenaissance') is-invalid @enderror" name="datenaissance" value="{{old('datenaissance')}}">
                            @error('datenaissance')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror

                            <label for="lieunaissance" class="col-md-2 col-form-label text-right font-weight-bold">Lieu de naissance<em style="color: red;">*</em> :</label>
                            <select name="lieunaissance" id="lieunaissance" data-live-search="true" data-style="btn-outline-secondary" data-placeholder="Choisir un lieu" class="col-md-4 selectpicker form-control @error('lieunaissance') is-invalid @enderror">
                                @foreach($data as $value)
                                    <option value="{{$value->code_postal}}">{{$value->village}}| commune: {{$value->commune}}| region:{{$value->region}}</option>
                                @endforeach
                            </select>
                            @error('lieunaissance')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label text-right font-weight-bold">Sexe<em style="color: red;">*</em> :</label>
                            <select name="sexe" id="sexe" data-style="btn-outline-secondary" class="col-md-10 selectpicker form-control @error('sexe') is-invalid @enderror" data-placeholder="Choisir un genre">
                                <option value="1">Homme</option>
                                <option value="2">Femme</option>
                            </select>
                            @error('sexe')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                {{--===============================page 2===========================--}}
                <div class="tab-pane fade" role="tabpanel" aria-labelledby="page2_tab" id="page2">
                    <div class="col">
                        <div class="form-group row">
                            <label for="rhesus" class="col-md-2 col-form-label text-right font-weight-bold">Groupe rhésus<em style="color: red;">*</em> :</label>
                            <select id="rhesus" name="rhesus" data-live-search="true" data-style="btn-outline-secondary" data-placeholder="Choisir groupe rhésus" class="col-md-4 selectpicker form-control @error('rhesus') is-invalid @enderror" value="{{old('rhesus')}}">
                                <option value="A+">A Rh+</option>
                                <option value="A-">A Rh-</option>
                                <option value="B+">B Rh+</option>
                                <option value="B-">B Rh-</option>
                                <option value="AB+">AB Rh+</option>
                                <option value="AB-">AB Rh-</option>
                                <option value="O+">O Rh+</option>
                                <option value="O-">O Rh-</option>
                            </select>
                            @error('rhesus')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror

                            <label for="electrophoreseHB" class="col-md-2 col-form-label text-right font-weight-bold">Electrophorèse de l'HB<em style="color: red;">*</em> :</label>
                            <select id="electrophoreseHB" name="electrophoreseHB" data-live-search="true" data-style="btn-outline-secondary" data-placeholder="Choisir" class="col-md-4 selectpicker form-control @error('electrophoreseHB') is-invalid @enderror" value="{{old('electrophoreseHB')}}">
                                <option value="AA">AA</option>
                                <option value="AC">AC</option>
                                <option value="AS">AS</option>
                                <option value="SS">SS</option>
                                <option value="SA">SA</option>
                                <option value="SC">SC</option>
                                <option value="CC">CC</option>
                                <option value="CA">CA</option>
                                <option value="CS">CS</option>
                            </select>
                            @error('electrophoreseHB')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group row">
                            <label for="parent1" class="col-md-2 col-form-label text-right font-weight-bold">Fils ou fille de (Père)<em style="color: red;">*</em> :</label>
                            <input type="text" id="parent1" class="col-md-4 form-control @error('parent1') is-invalid @enderror" name="parent1" value="{{old('parent1')}}">
                            @error('parent1')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror

                            <label for="parent2" class="col-md-2 col-form-label text-right font-weight-bold">et de (Mère)<em style="color: red;">*</em> :</label>
                            <input type="text" id="parent2" class="col-md-4 form-control @error('parent2') is-invalid @enderror" name="parent2" value="{{old('parent2')}}">
                            @error('parent2')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group row">
                            <label for="ethnie" class="col-md-2 col-form-label text-right font-weight-bold">Ethnie<em style="color: red;">*</em> :</label>
                            <input type="text" id="ethnie" class="col-md-4 form-control @error('ethnie') is-invalid @enderror" name="ethnie" value="{{old('ethnie')}}">
                            @error('ethnie')
                            <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                           </span>
                            @enderror

                            <label for="sexualite" class="col-md-2 col-form-label text-right font-weight-bold">Sexualité<em style="color: red;">*</em> :</label>
                            <select name="sexualite" data-live-search="true" data-style="btn-outline-secondary" data-placeholder="Choisir..." id="sexualite" class="col-md-4 selectpicker form-control @error('sexualite') is-invalid @enderror">
                                <option value=""></option>
                                <option value="heterosexuel">Hétérosexuel(le)</option>
                                <option value="homosexuel">Homosexuel(le)</option>
                                <option value="bisexuel">Bisexuel(le)</option>
                            </select>
                            @error('sexualite')
                            <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                           </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group row">
                            <label for="profession" class="col-md-2 col-form-label text-right font-weight-bold">Profession<em style="color: red;">*</em> :</label>
                            <select name="profession" data-live-search="true" data-style="btn-outline-secondary" data-placeholder="Choisir une profession" id="profession" class="col-md-4 selectpicker form-control @error('profession') is-invalid @enderror">
                                @foreach($profession as $value)
                                    <option value="{{$value->code}}">{{$value->libelle}}</option>
                                @endforeach
                            </select>
                            @error('profession')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror

                            <label for="culte" class="col-md-2 text-right col-form-label text-right font-weight-bold">Culte<em style="color: red;">*</em> :</label>
                            <input type="text" id="culte" class="col-md-4 form-control @error('culte') is-invalid @enderror" name="culte" value="{{old('culte')}}">
                            @error('culte')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                               </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group row">
                            <label for="sit_matrimoniale" class="col-md-2 col-form-label text-right font-weight-bold">Situation Matrimoniale<em style="color: red;">*</em> :</label>
                            <select id="sit_matrimoniale" name="sit_matrimoniale" data-style="btn-outline-secondary" data-live-search="true" data-placeholder="Choisir..." class="col-md-2 selectpicker form-control @error('sit_matrimoniale') is-invalid @enderror">
                                <option value="celibataire">Célibataire</option>
                                <option value="marier">Marier</option>
                                <option value="divorcer">Divorcer</option>
                                <option value="veuvage">Veuvage</option>
                            </select>
                            @error('sit_matrimoniale')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror

                            <label for="enfant1" class="col-md-3 col-form-label text-right font-weight-bold">Nombre d'enfants: Garçons :</label>
                            <input type="text" id="enfant1" class="col-md-2 form-control @error('enfant1') is-invalid @enderror" name="enfant1" value="{{old('enfant1')}}">
                            @error('enfant1')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror

                            <label for="enfant2" class="col-md-1 col-form-label text-right font-weight-bold">Filles :</label>
                            <input type="text" id="enfant2" class="col-md-2 form-control @error('enfant2') is-invalid @enderror" name="enfant2" value="{{old('enfant2')}}">
                            @error('enfant2')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group row">
                            <label for="region" class="col-md-2 col-form-label text-right font-weight-bold">Région d'origine<em style="color: red;">*</em> :</label>
                            <select id="region" name="region" data-live-search="true" data-style="btn-outline-secondary" data-placeholder="Choisir une region" class="col-md-10 selectpicker form-control @error('region') is-invalid @enderror">
                                @foreach($region as $value)
                                    <option value="{{$value->code_region}}">{{$value->region}}</option>
                                @endforeach
                            </select>
                            @error('region')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                    </div>
                </div>
                {{--=============================page 3==============================--}}
                <div class="tab-pane fade" role="tabpanel" aria-labelledby="page3_tab" id="page3">
                    <div class="col">
                        <div class="form-group row">
                            <label for="ville_village" class="col-md-2 text-right col-form-label font-weight-bold">Adresse de Résidence<em style="color: red;">*</em> :</label>
                            <select id="ville_village" data-live-search="true" data-style="btn-outline-secondary" data-placeholder="Choisir une localité" name="ville_village" class="col-md-10 selectpicker form-control @error('ville_village') is-invalid @enderror">
                                @foreach($data as $value)
                                    <option value="{{$value->code_postal}}">{{$value->village}}| commune: {{$value->commune}}| region:{{$value->region}}</option>
                                @endforeach
                            </select>
                            @error('ville_village')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group row">
                            <label for="assurance" class="col-md-2 col-form-label text-right font-weight-bold">Assurance :</label>
                            <input type="text" id="assurance" class="col-md-4 form-control @error('assurance') is-invalid @enderror" name="assurance" value="{{old('assurance')}}">
                            @error('assurance')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror

                            <label for="type_assurance" class="col-md-2 text-right col-form-label font-weight-bold">Type assurance :</label>
                            <input type="text" id="type_assurance" class="col-md-4 form-control @error('type_assurance') is-invalid @enderror" name="type_assurance" value="{{old('type_assurance')}}">
                            @error('type_assurance')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group row">
                            <label for="telephone1" class="col-md-2 col-form-label text-right font-weight-bold">Tel: Burkina<em style="color: red;">*</em> :</label>
                            <input type="text" id="telephone1" class="col-md-3 form-control @error('telephone1') is-invalid @enderror" name="telephone1" value="{{old('telephone1')}}">
                            @error('telephone1')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror

                            <label for="telephone2" class="col-md-1 col-form-label text-right font-weight-bold">Domicile :</label>
                            <input type="text" id="telephone2" class="col-md-3 form-control @error('telephone2') is-invalid @enderror" name="telephone2" value="{{old('telephone2')}}">
                            @error('telephone2')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror

                            <label for="telephone3" class="col-md-1 col-form-label text-right font-weight-bold">Cellulaire :</label>
                            <input type="text" id="telephone3" class="col-md-2 form-control @error('telephone3') is-invalid @enderror" name="telephone3" value="{{old('telephone3')}}">
                            @error('telephone3')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group row">
                            <label for="tuteur" class="col-md-2 col-form-label text-right font-weight-bold">Tuteur à Bobo :</label>
                            <input type="text" id="tuteur" class="col-md-4 form-control @error('tuteur') is-invalid @enderror" name="tuteur" value="{{old('tuteur')}}">
                            @error('tuteur')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror

                            <label for="quartier_secteur_tuteur" class="col-md-2 col-form-label text-right font-weight-bold">Résidence tuteur :</label>
                            <select data-placeholder="Choisir une localité" data-live-search="true" data-style="btn-outline-secondary" id="quartier_secteur_tuteur" name="quartier_secteur_tuteur" class="selectpicker form-control col-md-4 @error('quartier_secteur_tuteur') is-invalid @enderror">
                                <option value=""></option>
                                @foreach($data as $value)
                                    <option value="{{$value->code_postal}}">{{$value->village}} | commune: {{$value->commune}} | region: {{$value->region}}</option>
                                @endforeach
                            </select>
                            @error('quartier_secteur_tuteur')
                            <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group row">
                            <label for="pers_prevenir" class="col-md-2 col-form-label text-right font-weight-bold">Personne à prévenir<em style="color: red;">*</em> :</label>
                            <input type="text" id="pers_prevenir" class="col-md-4 form-control @error('pers_prevenir') is-invalid @enderror" name="pers_prevenir" value="{{old('pers_prevenir')}}">
                            @error('pers_prevenir')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror

                            <label for="tel_pers_prevenir" class="col-md-2 col-form-label text-right font-weight-bold">Téléphone<em style="color: red;">*</em> :</label>
                            <input type="text" id="tel_pers_prevenir" class="col-md-4 form-control @error('tel_pers_prevenir') is-invalid @enderror" name="tel_pers_prevenir" value="{{old('tel_pers_prevenir')}}">
                            @error('tel_pers_prevenir')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12" align="center">
                            <button type="submit" class="btn btn btn-primary">Enregistrer</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
