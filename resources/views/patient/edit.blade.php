@extends('layouts.medlayout')

@section('content')
    <h1 class="text-center" style="background-color: #01A9CB; height: 30px; font-size: large; padding-top: 5px; font-weight: bold">Edition du dossier de {{$patient->prenom}} {{$patient->nom}} [ID: {{$patient->idpatient}}]</h1>
    <div class="container-fluid p-2" style="background-color: white">
        <div class="card">
            <div class="card-header">
                <div class="flash-message col-12">
                    @if(Session::has('message'))
                        <div class="alert {{Session::get('alert-class')}}">
                            {{session::get('message')}}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        </div>
                    @endif
                </div>

                <ul class="nav nav-tabs mb-1  d-flex justify-content-center" id="table" role="tablist">
                    <li class="nav-item bouton-forme" style="font-size: 15px;"><a class="nav-link active" id="page1_tab" data-toggle="tab" href="#page1" role="tab" aria-controls="page1" aria-selected="true">Page 1</a></li>
                    <li class="nav-item ml-md-5 bouton-forme" style="font-size: 15px"><a class="nav-link" id="page2_tab" data-toggle="tab" href="#page2" role="tab" aria-controls="page2" aria-selected="false">Page 2</a></li>
                </ul>
            </div>

            <div class="card-body">
                <form action="{{ route('medecin.update', $patient->idpatient) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="tab-content" id="pages_content">
                        <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="page1_tab" id="page1">
                            <div class="col">
                                <div class="form-group row">
                                    <label for="medecinresp" class="col-md-2 col-form-label text-right font-weight-bold">Medecin responsable<em style="color: red">*</em> :</label>
                                    <select id="medecinresp" name="medecinresp" data-live-search="true" data-style="btn-outline-secondary" data-placeholder="Choisir un medecin" class="col-md-10 selectpicker form-control @error('medecinresp') @enderror">
                                        @foreach($medecin as $medecin)
                                            <option value="{{$medecin->id}}" {{ $medecin -> id == $doc->medecinresp ? 'selected' : '' }}> Dr {{$medecin->prenom}} {{$medecin->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('medecinresp')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col">
                                <div class="form-group row">
                                    <label for="ethnie" class="col-md-2 col-form-label text-right font-weight-bold">Ethnie<em style="color: red">*</em> :</label>
                                    <input type="text" id="ethnie" class="col-md-4 form-control @error('ethnie') is-invalid @enderror" name="ethnie" value="{{old('ethnie') ?? $patient->ethnie}}">
                                    @error('ethnie')
                                    <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                                    @enderror

                                    <label for="sexualite" class="col-md-2 col-form-label text-right font-weight-bold">Sexualité<em style="color: red">*</em> :</label>
                                    <select name="sexualite" data-live-search="true" data-placeholder="Choisir..." id="sexualite" class="col-md-4 selectpicker form-control @error('sexualite') is-invalid @enderror">
                                        @if($patient->sexualite === 'heterosexuel')
                                            <option value="heterosexuel" selected>Hétérosexuel(le)</option>
                                            <option value="homosexuel">Homosexuel(le)</option>
                                            <option value="bisexuel">Bisexuel(le)</option>
                                        @elseif($patient->sexualite === 'homosexuel')
                                            <option value="heterosexuel">Hétérosexuel(le)</option>
                                            <option value="homosexuel" selected>Homosexuel(le)</option>
                                            <option value="bisexuel">Bisexuel(le)</option>
                                        @elseif($patient->sexualite === 'bisexuel')
                                            <option value="heterosexuel">Hétérosexuel(le)</option>
                                            <option value="homosexuel">Homosexuel(le)</option>
                                            <option value="bisexuel" selected>Bisexuel(le)</option>
                                        @endif
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
                                    <label for="profession" class="col-md-2 col-form-label text-right font-weight-bold">Profession<em style="color: red">*</em> :</label>
                                    <select name="profession" data-live-search="true" data-style="btn-outline-secondary" data-placeholder="Choisir une profession" id="profession" class="col-md-4 selectpicker form-control @error('profession') is-invalid @enderror">
                                        @foreach($profession as $value)
                                            <option value="{{$value->code}}" {{$patient->profession == $value->code ? 'selected' : ''}}>{{$value->libelle}}</option>
                                        @endforeach
                                    </select>
                                    @error('profession')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    <label for="culte" class="col-md-2 text-right col-form-label text-right font-weight-bold">Culte<em style="color: red">*</em> :</label>
                                    <input type="text" id="culte" class="col-md-4 form-control @error('culte') is-invalid @enderror" name="culte" value="{{old('culte') ?? $patient->culte}}">
                                    @error('culte')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group row">
                                    <label for="sit_matrimoniale" class="col-md-2 col-form-label text-right font-weight-bold">Situation Matrimoniale<em style="color: red">*</em> :</label>
                                    <select id="sit_matrimoniale" name="sit_matrimoniale" data-live-search="true" data-style="btn-outline-secondary" data-placeholder="Choisir..." class="col-md-2 selectpicker form-control @error('sit_matrimoniale') is-invalid @enderror">
                                        @if($patient->sit_matrimoniale === 'celibataire')
                                            <option value="celibataire" selected>Célibataire</option>
                                            <option value="marier">Marier</option>
                                            <option value="divorcer">Divorcer</option>
                                            <option value="veuvage">Veuvage</option>
                                        @elseif($patient->sit_matrimoniale === 'marier')
                                            <option value="celibataire" >Célibataire</option>
                                            <option value="marier" selected>Marier</option>
                                            <option value="divorcer">Divorcer</option>
                                            <option value="veuvage">Veuvage</option>
                                        @elseif($patient->sit_matrimoniale === 'divorcer')
                                            <option value="celibataire" >Célibataire</option>
                                            <option value="marier">Marier</option>
                                            <option value="divorcer" selected>Divorcer</option>
                                            <option value="veuvage">Veuvage</option>
                                        @elseif($patient->sit_matrimoniale === 'veuvage')
                                            <option value="celibataire" >Célibataire</option>
                                            <option value="marier">Marier</option>
                                            <option value="divorcer">Divorcer</option>
                                            <option value="veuvage" selected>Veuvage</option>
                                        @endif
                                    </select>
                                    @error('sit_matrimoniale')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    <label for="enfant1" class="col-md-3 col-form-label text-right font-weight-bold">Nombre d'enfants: Garçons :</label>
                                    <input type="text" id="enfant1" class="col-md-2 form-control @error('enfant1') is-invalid @enderror" name="enfant1" value="{{old('enfant1') ?? $patient->nombregarcons}}">
                                    @error('enfant1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    <label for="enfant2" class="col-md-1 col-form-label text-right font-weight-bold">Filles :</label>
                                    <input type="text" id="enfant2" class="col-md-2 form-control @error('enfant2') is-invalid @enderror" name="enfant2" value="{{old('enfant2') ?? $patient->nombrefilles}}">
                                    @error('enfant2')
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
                                    <label for="assurance" class="col-md-2 col-form-label text-right font-weight-bold">Assurance :</label>
                                    <input type="text" id="assurance" class="col-md-4 form-control @error('assurance') is-invalid @enderror" name="assurance" value="{{old('assurance') ?? $patient->assurance}}">
                                    @error('assurance')
                                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                                    @enderror

                                    <label for="type_assurance" class="col-md-2 text-right col-form-label font-weight-bold">Type assurance :</label>
                                    <input type="text" id="type_assurance" class="col-md-4 form-control @error('type_assurance') is-invalid @enderror" name="type_assurance" value="{{old('type_assurance') ?? $patient->type_assurance}}">
                                    @error('type_assurance')
                                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group row">
                                    <label for="telephone1" class="col-md-2 col-form-label text-right font-weight-bold">Tel: Burkina<em style="color: red">*</em> :</label>
                                    <input type="text" id="telephone1" class="col-md-3 form-control @error('telephone1') is-invalid @enderror" name="telephone1" value="{{old('telephone1') ?? $patient->telephone1}}">
                                    @error('telephone1')
                                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                                    @enderror

                                    <label for="telephone2" class="col-md-1 col-form-label text-right font-weight-bold">Domicile :</label>
                                    <input type="text" id="telephone2" class="col-md-3 form-control @error('telephone2') is-invalid @enderror" name="telephone2" value="{{old('telephone2') ?? $patient->telephone2}}">
                                    @error('telephone2')
                                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                                    @enderror

                                    <label for="telephone3" class="col-md-1 col-form-label text-right font-weight-bold">Cellulaire :</label>
                                    <input type="text" id="telephone3" class="col-md-2 form-control @error('telephone3') is-invalid @enderror" name="telephone3" value="{{old('telephone3') ?? $patient->telephone3}}">
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
                                    <input type="text" id="tuteur" class="col-md-4 form-control @error('tuteur') is-invalid @enderror" name="tuteur" value="{{old('tuteur') ?? $patient->tuteur}}">
                                    @error('tuteur')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    <label for="quartier_secteur_tuteur" class="col-md-2 col-form-label text-right font-weight-bold">Résidence tuteur :</label>
                                    <select data-placeholder="Choisir une localité" data-live-search="true" data-style="btn-outline-secondary" id="quartier_secteur_tuteur" name="quartier_secteur_tuteur" class="selectpicker form-control col-md-4 @error('quartier_secteur_tuteur') is-invalid @enderror">
                                        @foreach($data as $valeur)
                                            <option value="{{$valeur->code_postal}}" {{$valeur->code_postal == $patient -> quartier_secteur_tuteur ? 'selected' : ''}}>{{$valeur->village}} | commune: {{$valeur->commune}} | region: {{$valeur->region}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('quartier_secteur_tuteur')
                                <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col">
                                <div class="form-group row">
                                    <label for="pers_prevenir" class="col-md-2 col-form-label text-right font-weight-bold">Personne à prévenir<em style="color: red">*</em> :</label>
                                    <input type="text" id="pers_prevenir" class="col-md-4 form-control @error('pers_prevenir') is-invalid @enderror" name="pers_prevenir" value="{{old('pers_prevenir') ?? $patient->pers_prevenir}}">
                                    @error('pers_prevenir')
                                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                                    @enderror

                                    <label for="tel_pers_prevenir" class="col-md-2 col-form-label text-right font-weight-bold">Téléphone<em style="color: red">*</em> :</label>
                                    <input type="text" id="tel_pers_prevenir" class="col-md-4 form-control @error('tel_pers_prevenir') is-invalid @enderror" name="tel_pers_prevenir" value="{{old('tel_pers_prevenir') ?? $patient->tel_pers_prevenir}}">
                                    @error('tel_pers_prevenir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
