@extends('layouts.inflayout')

@section('content')
    <h1 class="text-center" style="background-color: #01A9CB; height: 30px; font-size: large; padding-top: 5px; font-weight: bold">Hospitalisation</h1>
<div class="container-fluid p-2" style="background-color: white">
   <div>
       <div class="flash-message col-12">
           @if(Session::has('message'))
               <div class="alert {{Session::get('alert-class')}}">
                   {{session::get('message')}}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
               </div>
           @endif
       </div>

       <form action="{{ route('hospitalisation.store') }}" method="POST" class="table-responsive-sm p-1">
           @csrf
           @method('post')
           <div>
               <div class="col">
                   <div class="row">
                       <div class="col-6">
                           <div class="row form-group">
                               <label for="patientid" class="col-md-3 col-form-label text-right font-weight-bold">ID Patient<em style="color: red;">*</em> :</label>
                               <select id="patientid" name="patientid" data-live-search="true" data-style="btn-outline-secondary" data-placeholder="Choisir un ID" class="col-md-9 selectpicker form-control @error('patientid') is-invalid @enderror">
                                   @foreach($hospi as $value)
                                       @foreach($patient as $valeur)
                                           @if($value->id_patient === $valeur->idpatient)
                                               <option value="{{$valeur->id_patient}}">{{$valeur->idpatient}} [{{$valeur->prenom}} {{$valeur->nom}}]</option>
                                           @endif
                                       @endforeach
                                   @endforeach
                               </select>
                               @error('patientid')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                           </div>
                           <div class="row form-group">
                               <label for="numerosalle" class="col-md-3 col-form-label text-right font-weight-bold">Numero Chambre<em style="color: red;">*</em> :</label>
                               <input type="text" id="numerosalle" class="col-md-9 form-control @error('numerosalle') is-invalid @enderror" name="numerosalle" value="{{old('numerosalle')}}">
                               @error('numerosalle')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                           </div>

                           <div class="row form-group">
                               <label for="numerolit" class="col-md-3 col-form-label text-right font-weight-bold">Numero lit<em style="color: red;">*</em> :</label>
                               <input type="text" id="numerolit" class="col-md-9 form-control @error('numerolit') is-invalid @enderror" name="numerolit" value="{{old('numerolit')}}">
                               @error('numerolit')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                           </div>

                           <div class="row form-group">
                               <label for="diagnostiquePrincipale" class="col-md-3 col-form-label text-right font-weight-bold">Diagnostic Principal<em style="color: red;">*</em> :</label>
                               <input type="text" id="diagnostiquePrincipale" class="col-md-9 form-control @error('diagnostiquePrincipale') is-invalid @enderror" name="diagnostiquePrincipale" value="{{old('diagnostiquePrincipale')}}">
                               @error('diagnostiquePrincipale')
                               <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                               @enderror
                           </div>

                           <div class="form-group row">
                               <label for="diagnostiquePrincipale" class="col-md-3 col-form-label text-right font-weight-bold">Diagnostic secondaire<em style="color: red;">*</em> :</label>
                               <input type="text" id="diagnostiquePrincipale" class="col-md-9 form-control @error('diagnostiquePrincipale') is-invalid @enderror" name="diagnostiqueSecondaire" value="{{old('diagnostiquePrincipale')}}">
                               @error('diagnostiquePrincipale')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                           </div>

                           <div class="form-group row">
                               <label for="diagnostiqueAssocie" class="col-md-3 col-form-label text-right font-weight-bold">Diagnostic associé<em style="color: red;">*</em> :</label>
                               <input type="text" id="diagnostiqueAssocie" class="col-md-9 form-control @error('identite') is-invalid @enderror" name="diagnostiqueAssocie" value="{{old('identite')}}">
                               @error('identite')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                           </div>
                       </div>

                       <div class="col-6" >
                           <div class="form-group row">
                               <label for="datenaissance" class="col-md-3 col-form-label text-right font-weight-bold">Diagnostic à l'entrée<em style="color: red;">*</em> :</label>
                               <input type="text" id="datenaissance" class="col-md-9 form-control @error('datenaissance') is-invalid @enderror" name="diagnostiqueEntre" value="{{old('datenaissance')}}">
                               @error('datenaissance')
                               <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                           </div>
                           <div class="form-group row">
                               <label for="rhesus" class="col-md-3 col-form-label text-right font-weight-bold">Date d'entrée<em style="color: red;">*</em> :</label>
                               <input type="date" id="rhesus" class="col-md-9 form-control @error('rhesus') is-invalid @enderror" name="dateEntre" value="{{old('rhesus')}}">
                               @error('rhesus')
                               <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                           </div>

                           <div class="row form-group">
                               <label for="parent1" class="col-md-3 col-form-label text-right font-weight-bold">Mode d'entrée<em style="color: red;">*</em> :</label>
                               <input type="text" id="parent1" class="col-md-9 form-control @error('parent1') is-invalid @enderror" name="modeentre" value="{{old('parent1')}}">
                               @error('parent1')
                               <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                           </div>

                           <div class="row form-group">
                               <label for="electrophoreseHB" class="col-md-3 col-form-label text-right font-weight-bold">Date de sortie</label>
                               <input type="date" id="electrophoreseHB" class="col-md-9 form-control @error('electrophoreseHB') is-invalid @enderror" name="dateSortie" value="{{old('electrophoreseHB')}}">
                               @error('electrophoreseHB')
                               <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                           </div>

                           <div class="form-group row">
                               <label for="lieunaissance" class="col-md-3 col-form-label text-right font-weight-bold">Diagnostic à la Sortie :</label>
                               <input type="text" id="diagnostiqueSortie" class="col-md-9 form-control @error('lieunaissance') is-invalid @enderror" name="lieunaissance" value="{{old('lieunaissance')}}">
                               @error('lieunaissance')
                               <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                           </div>

                           <div class="row form-group">
                               <label for="parent2" class="col-md-3 col-form-label text-right font-weight-bold">Mode de sortie :</label>
                               <input type="text" id="parent2" class="col-md-9 form-control @error('parent2') is-invalid @enderror" name="modesortie" value="{{old('parent2')}}">
                               @error('parent2')
                               <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                           </div>

                           {{--<div class="row form-group">
                               <label for="parent2" class="col-md-3 col-form-label text-right font-weight-bold">motif d'hospitalisation:</label>
                               <input type="text" id="parent2" class="col-md-9 form-control @error('parent2') is-invalid @enderror" name="motifhospitalisation" value="{{old('parent2')}}">
                               @error('parent2')
                               <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                           </div>--}}
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
@endsection





