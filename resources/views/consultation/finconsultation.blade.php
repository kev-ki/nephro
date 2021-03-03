@extends('layouts.medlayout')

@section('content')
    <h1 class="text-center" style="background-color: #01A9CB; height: 30px; font-size: large; padding-top: 5px; font-weight: bold"></h1>
    <div class="container-fluid p-2" style="background-color: white; border-radius: 10px">
        <div class="flash-message col-12">
            @if(Session::has('message'))
                <div class="alert {{Session::get('alert-class')}}">
                    {{session::get('message')}}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                </div>
            @endif
        </div>
       <form action="{{route('consultation_update',$idconsult)}}" method="POST">
          @csrf
          @method('put')
          <div class="col">
              <div class="form-group row">
                  <label for="resume" class=" col-2 text-right font-weight-bold">Resume</label>
                  <textarea type="text"  name="resume" id="resume" class="col-10 form-control @error('resume') is-invalid @enderror"></textarea>

                  @error('resume')
                  <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                  @enderror
              </div>

              <div class="form-group row">
                  <label for="diagnostic" class=" col-2 text-right font-weight-bold" >Diagnostic:</label>
                  <textarea type="text" id="diagnostic"  name="diagnostic" class="col-10 form-control @error('diagnostic') is-invalid @enderror"></textarea>

                  @error('diagnostic')
                  <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                  @enderror
              </div>

              {{--<div class="form-group row">
                  <label for="bilan_admission" class=" col-2 text-right font-weight-bold" >Bilan à l'admission:</label>
                  <textarea type="text" id="bilan_admission"  name="bilan_admission" class="col-10 form-control @error('bilan_admission') is-invalid @enderror"></textarea>

                  @error('bilan_admission')
                  <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                  @enderror
              </div>--}}

              <div class="form-group row">
                  <label for="conduite_tenir" class="col-2 text-right font-weight-bold" >Conduite à tenir:</label>
                  <textarea type="text" id="conduite_tenir"  name="conduite_tenir" class="col-10 form-control"></textarea>

                  @error('conduite_tenir')
                  <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                  @enderror
              </div>
          </div>

          <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary mr-1">Enregistrer</button>
                <div class="btn btn-secondary"><a style="color: white" href="{{route('traitement.create')}}">Suivant</a></div>
          </div>
       </form>
    </div>
@endsection
