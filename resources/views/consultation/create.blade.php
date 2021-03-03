@extends('layouts.medlayout')

@section('content')
    <h1 class="text-center" style="background-color: #01A9CB; height: 30px; font-size: large; padding-top: 5px; font-weight: bold">Examen de {{$patient->prenom}} {{$patient->nom}} [ID: {{$patient->idpatient}}]</h1>
    <div class="flash-message col-md-12">
        @if(Session::has('message'))
            <div class="alert {{Session::get('alert-class')}}">
                {{session::get('message')}}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            </div>
        @endif
    </div>
    <div class="container-fluid p-2" style="background-color: white">
       <form action="{{route('consultation.store')}}" method="post">
          @csrf
          <div class="col">
              <div class="form-group row">
                  <input type="hidden"  name="num_dossier" class="form-control" value="{{$doc->numD}}">
              </div>
              <div class="form-group row">
                  <label for="numQ" class=" col-md-3 text-right font-weight-bold" >Numero de la quittance:</label>
                  <input type="text"  name="numQ" id="numQ" class="col-md-8 form-control @error('numQ') is-invalid @enderror">

                  @error('numQ')
                  <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                  @enderror
              </div>
              <div class="form-group row">
                  <label for="adresserpar" class=" col-md-3 text-right font-weight-bold" >Adressé par:</label>
                  <input type="text" id="adresserpar"  name="adresserpar" class="col-md-8 form-control @error('adresserpar') is-invalid @enderror">
                  @error('adresserpar')
                  <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                  @enderror
              </div>
              <div class="form-group row">
                  <label for="motifadmission" class=" col-md-3 text-right font-weight-bold" >Motif d'admission:</label>
                  <input type="text" id="motifadmission"  name="motifadmission" class="col-md-8 form-control">
              </div>
              <div class="form-group row">
                  <label for="motifhospitalisation" class="col-md-3 text-right font-weight-bold" >Motif d'hospitalisation:</label>
                  <input type="text" id="motifhospitalisation"  name="motifhospitalisation" class="col-md-8 form-control">
              </div>
              <div class="form-group row">
                  <label for="histoiremaladie" class="form-label font-weight-bold text-right col-md-3">Histoire de la maladie:</label>
                  <textarea class="form-control col-md-8 @error('adresserpar') is-invalid @enderror" id="histoiremaladie" name="histoiremaladie"></textarea>
                  @error('histoiremaladie')
                  <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                  @enderror
              </div>
          </div>

          <div class="d-flex justify-content-center"><button class="btn btn-primary">enregistrer</button></div>
       </form>
        {{--<div><a href="#" class="btn btn-primary">Phase Examen</a></div>--}}
    </div>
@endsection



