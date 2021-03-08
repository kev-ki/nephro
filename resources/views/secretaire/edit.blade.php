
@extends('layouts.seclayout')

@section('content')
  <h1 class="text-center" style="background-color: #01A9CB; height: 30px; font-size: large; padding-top: 5px; font-weight: bold"> Modification D'un Rendez-Vous</h1>
  <div class="container-fluid p-2" style="background-color: white">
      <div class="card">
          <div class="flash-message col-12">
              @if(Session::has('message'))
                  <div class="alert {{Session::get('alert-class')}}">
                      {{session::get('message')}}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  </div>
              @endif
          </div>
          <form method="post" action="{{route('rdv.update',$rdv->id)}}">
              @csrf
              @method('put')
              <div class="col">
                  <div class="row p-1">
                      <div class="col-md-4">
                          <p class="text-uppercase font-weight-bold mb-3">Informations du Patient</p>
                          <div class="row mb-2">
                              <label for="id_patient" class="col-md-4 col-form-label font-weight-bold">Patient<em style="color: red;">*</em> :</label>
                              <select name="id_patient" data-live-search="true" data-placeholder="Choisir le patient" data-style="btn-outline-secondary" class="col-md-8 form-control selectpicker @error('id_patient') @enderror">

                                  @if($rdv->id_patient === '00')
                                      <option value="00" selected>Non Enregistrer</option>
                                      @foreach($liste_patient as $patient)
                                          <option value="{{$patient->idpatient}}">{{$patient->nom}} {{$patient->prenom}}</option>
                                      @endforeach
                                  @else
                                      <option value="00">Non Enregistrer</option>
                                      @foreach($liste_patient as $patient)
                                          <option value="{{$patient->idpatient}}" {{$rdv->id_patient === $patient->idpatient ? 'selected':''}}>{{$patient->nom}} {{$patient->prenom}}</option>
                                      @endforeach
                                  @endif
                              </select>
                              @error('id_patient')
                              <div class="invalid-feedback">
                                  {{$errors->first('id_patient')}}
                              </div>
                              @enderror
                          </div>

                          <div class="row mb-2">
                              <label for="nom" class="col-md-4 col-form-label font-weight-bold">Nom<em style="color: red;">*</em> :</label>
                              <input type="text" id="nom" name="nom" class="col-md-8 form-control @error('nom') @enderror" value="{{old('nom') ?? $rdv->nom}}">
                              @error('nom')
                              <div class="invalid-feedback">
                                  {{$errors->first('nom')}}
                              </div>
                              @enderror
                          </div>

                          <div class="row mb-2">
                              <label for="prenom" class="col-md-4 col-form-label font-weight-bold">Prenom<em style="color: red;">*</em> :</label>
                              <input type="text" id="prenom" name="prenom" class="col-md-8 form-control @error('prenom') @enderror" value="{{old('prenom') ?? $rdv->prenom}}">
                              @error('prenom')
                              <div class="invalid-feedback">
                                  {{$errors->first('prenom')}}
                              </div>
                              @enderror
                          </div>

                          <div class="row mb-2">
                              <label for="telephone" class="col-md-4 col-form-label font-weight-bold">Telephone<em style="color: red;">*</em> :</label>
                              <input type="text" id="telephone" name="telephone" class="col-md-8 form-control @error('email') @enderror" value="{{old('telephone') ?? $rdv->telephone}}">
                              @error('telephone')
                              <div class="invalid-feedback">
                                  {{$errors->first('telephone')}}
                              </div>
                              @enderror
                          </div>
                      </div>

                      <div class="col-md-4">
                          <p class="text-uppercase font-weight-bold mb-3">Medecin concerné et motif</p>
                          <div class="row mb-2">
                              <label for="nom" class="col-md-4 col-form-label font-weight-bold">Medecin<em style="color: red;">*</em> :</label>
                              <select name="medecin" data-live-search="true" data-placeholder="Choisir le Medecin" data-style="btn-outline-secondary" class="col-md-8 form-control selectpicker @error('medecin') @enderror">
                                  @foreach($medecin_liste as $medecin)
                                      <option value="{{$medecin->id}}"> Dr {{$medecin->name}} {{$medecin->prenom}}</option>
                                      @if($rdv->medecin == $medecin->id)
                                          <option selected value="{{$medecin->id}}"> Dr {{$medecin->name}} {{$medecin->prenom}}</option>
                                      @endif
                                  @endforeach
                              </select>
                              @error('medecin')
                              <div class="invalid-feedback">
                                  {{$errors->first('medecin')}}
                              </div>
                              @enderror
                          </div>

                          <div class="row mb-2">
                              <label for="motif" class="col-md-4 col-form-label font-weight-bold">Motif<em style="color: red;">*</em> :</label>
                              <input type="text" id="motif" name="motif" class="col-md-8 form-control @error('motif') @enderror" value="{{old('motif') ?? $rdv->motif}}">
                              @error('motif')
                              <div class="invalid-feedback">
                                  {{$errors->first('motif')}}
                              </div>
                              @enderror
                          </div>
                      </div>

                      <div class="col-md-4">
                          <p class="text-uppercase font-weight-bold mb-3">Date et heure du rendez-vous</p>
                          <div class="row mb-2">
                              <label for="daterdv" class="col-md-4 col-form-label font-weight-bold">Date<em style="color: red;">*</em> :</label>
                              <input type="date" id="daterdv" name="daterdv" class="col-md-8 form-control @error('daterdv') @enderror" value="{{old('daterdv') ?? $rdv->dateRdv}}">
                              @error('daterdv')
                              <div class="invalid-feedback">
                                  {{$errors->first('daterdv')}}
                              </div>
                              @enderror
                          </div>

                          <div class="row mb-2">
                              <label for="heurerdv" class="col-md-4 col-form-label font-weight-bold">Heure<em style="color: red;">*</em> :</label>
                              <input type="time" id="heurerdv" name="heurerdv" class="col-md-8 form-control @error('heurerdv') @enderror" value="{{old('heurerdv') ?? $rdv->heureRdv}}">
                              @error('heurerdv')
                              <div class="invalid-feedback">
                                  {{$errors->first('heurerdv')}}
                              </div>
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
