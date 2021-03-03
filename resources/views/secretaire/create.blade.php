@extends('layouts.seclayout')

@section('content')
  <h1 class="text-center" style="background-color: #01A9CB; height: 30px; font-size: large; padding-top: 5px; font-weight: bold"> Enregistrement D'un Rendez-Vous</h1>
  <div class="container-fluid p-2" style="background-color: white">
      <div class="flash-message col-12">
          @if(Session::has('message'))
              <div class="alert {{Session::get('alert-class')}}">
                  {{session::get('message')}}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              </div>
          @endif
      </div>

      <div class="card">
          <form method="POST" action="{{route('rdv.store')}}">
              @csrf
              <div class="col">
                  <div class="row p-1">
                      <div class="col-md-4">
                          <p class="text-uppercase font-weight-bold mb-3">Informations du Patient</p>
                          <div class="row mb-2">
                              <label for="id_patient" class="col-md-4 text-right col-form-label font-weight-bold">Patient :</label>
                              <select name="id_patient" data-live-search="true" data-placeholder="Choisir le patient" data-style="btn-outline-secondary" class="col-md-8 selectpicker form-control @error('id_patient') @enderror">
                                  <option value="00">Non Enregistrer</option>
                                  @foreach($liste_patient as $patient)
                                      <option value="{{$patient->idpatient}}">{{$patient->nom}} {{$patient->prenom}}</option>
                                  @endforeach
                              </select>
                              @error('id_patient')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>

                          <div class="row mb-2">
                              <label for="nom" class="col-md-4 col-form-label text-right font-weight-bold">Nom :</label>
                              <input type="text" id="nom" name="nom" class="col-md-8 form-control @error('nom') @enderror" value="{{old('nom')}}">
                              @error('nom')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>

                          <div class="row mb-2">
                              <label for="prenom" class="col-md-4 col-form-label text-right font-weight-bold">Prenom :</label>
                              <input type="text" id="prenom" name="prenom" class="col-md-8 form-control @error('prenom') @enderror" value="{{old('prenom')}}">
                              @error('prenom')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>

                          <div class="row mb-2">
                              <label for="telephone" class="col-md-4 col-form-label text-right font-weight-bold">Telephone :</label>
                              <input type="text" id="telephone" name="telephone" class="col-md-8 form-control @error('email') @enderror" value="{{old('telephone')}}">
                              @error('telephone')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="col-md-4">
                          <p class="text-uppercase font-weight-bold mb-3">Medecin concerné et motif</p>
                          <div class="row mb-2">
                              <label for="nom" class="col-md-4 col-form-label text-right font-weight-bold">Medecin :</label>
                              <select name="medecin" data-style="btn-outline-secondary" data-live-search="true" data-placeholder="Choisir le medecin" class="col-md-8 form-control selectpicker @error('medecin') @enderror">
                                  @foreach($liste_medecin as $medecin)
                                      <option value="{{$medecin->id}}"> Dr {{$medecin->prenom}} {{$medecin->name}}</option>
                                  @endforeach
                              </select>
                              @error('medecin')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>

                          <div class="row mb-2">
                              <label for="motif" class="col-md-4 col-form-label text-right font-weight-bold">Motif :</label>
                              <input type="text" id="motif" name="motif" class="col-md-8 form-control @error('motif') @enderror" value="{{old('motif')}}">
                              @error('motif')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="col-md-4">
                          <p class="text-uppercase font-weight-bold mb-3">Date et heure du rendez-vous</p>
                          <div class="row mb-2">
                              <label for="daterdv" class="col-md-4 col-form-label text-right font-weight-bold">Date :</label>
                              <input type="date" id="daterdv" name="date_rendezvous" class="col-md-8 form-control @error('date_rendezvous') @enderror" value="{{old('date_rendezvous')}}">
                              @error('date_rendezvous')
                                  <div class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </div>
                              @enderror
                          </div>

                          <div class="row mb-2">
                              <label for="heurerdv" class="col-md-4 col-form-label text-right font-weight-bold">Heure :</label>
                              <input type="time" id="heurerdv" name="heure_rendezvous" class="col-md-8 form-control @error('heure_rendezvous') @enderror" value="{{old('heure_rendezvous')}}">
                              @error('heure_rendezvous')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>
                  </div>
              </div>

              <div class="form-group row">
                 <div class="col-12" align="center">
                     <button type="submit" class="btn btn-primary">Enregistrer</button>
                 </div>
              </div>
          </form>
      </div>
  </div>
@endsection
