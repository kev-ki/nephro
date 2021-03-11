@extends('layouts.medlayout')

@section('content')
    <h1 class="text-center" style="background-color: #01A9CB; height: 30px; font-size: large; padding-top: 5px; font-weight: bold">Edition des informations d'hospitalisation de {{$patient->prenom}} {{$patient->nom}}</h1>
    <div class="container-fluid p-2" style="background-color: white">
        <div>
            <div class="flash-message col-12">
                @if(Session::has('message'))
                    <div class="alert {{Session::get('alert-class')}}">
                        {{session::get('message')}}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    </div>
                @endif
            </div>

            <div class="card p-1">
                <form action="{{route('hospitalisation.update', $hospitalisation->id)}}" method="post">
                    @csrf
                    @method('put')

                    <div class="col">
                        <div class="row">
                            <div class="col-6">
                                <div class="row form-group">
                                    <label for="id_patient" class="col-md-3 col-form-label text-right font-weight-bold">ID Patient<em style="color: red;">*</em> :</label>
                                    <select disabled id="id_patient" name="id_patient" data-live-search="true" data-style="btn-outline-secondary" data-placeholder="Choisir un ID" class="col-md-9 selectpicker form-control @error('id_patient') is-invalid @enderror">
                                        @foreach($hospi_all as $value)
                                            @foreach($patients as $valeur)
                                                @if($value->id_patient === $valeur->idpatient)
                                                    <option value="{{$valeur->id_patient}}" {{$value->id_patient == $hospitalisation->id_patient ? 'selected' : ''}}>{{$valeur->idpatient}} [{{$valeur->prenom}} {{$valeur->nom}}]</option>
                                                @endif
                                            @endforeach
                                        @endforeach
                                    </select>
                                    @error('id_patient')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="row form-group">
                                    <label for="numerochambre" class="col-md-3 col-form-label text-right font-weight-bold @error('numerochambre') is-invalid @enderror">Numero Chambre<em style="color: red;">*</em> :</label>
                                    <input type="text" id="numerochambre" class="col-md-9 form-control" name="numerochambre" value="{{old('numerochambre') ?? $hospitalisation->numerochambre}}">
                                    @error('numerochambre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="row form-group">
                                    <label for="numerolit" class="col-md-3 col-form-label text-right font-weight-bold">Numero lit<em style="color: red;">*</em> :</label>
                                    <input type="text" id="numerolit" class="col-md-9 form-control @error('numerolit') is-invalid @enderror" name="numerolit" value="{{old('numerolit') ?? $hospitalisation->numerolit}}">
                                    @error('numerolit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="row form-group">
                                    <label for="diagnosticPrincipale" class="col-md-3 col-form-label text-right font-weight-bold">Diagnostic Principal<em style="color: red;">*</em> :</label>
                                    <input type="text" id="diagnosticPrincipale" class="col-md-9 form-control @error('diagnosticPrincipale') is-invalid @enderror" name="diagnosticPrincipale" value="{{old('diagnosticPrincipale') ?? $hospitalisation->diagnosticPrincipale}}">
                                    @error('diagnosticPrincipale')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <label for="diagnosticSecondaire" class="col-md-3 col-form-label text-right font-weight-bold">Diagnostic secondaire<em style="color: red;">*</em> :</label>
                                    <input type="text" id="diagnosticSecondaire" class="col-md-9 form-control @error('diagnosticSecondaire') is-invalid @enderror" name="diagnosticSecondaire" value="{{old('diagnosticSecondaire') ?? $hospitalisation->diagnosticSecondaire}}">
                                    @error('diagnosticSecondaire')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <label for="diagnosticAssocie" class="col-md-3 col-form-label text-right font-weight-bold">Diagnostic associé :</label>
                                    <input type="text" id="diagnosticAssocie" class="col-md-9 form-control @error('diagnosticAssocie') is-invalid @enderror" name="diagnosticAssocie" value="{{old('diagnosticAssocie') ?? $hospitalisation->diagnosticAssocie}}">
                                    @error('diagnosticAssocie')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6" >
                                <div class="form-group row">
                                    <label for="diagnosticEntree" class="col-md-3 col-form-label text-right font-weight-bold">Diagnostic à l'entrée<em style="color: red;">*</em> :</label>
                                    <input type="text" id="diagnosticEntree" class="col-md-9 form-control @error('diagnosticEntree') is-invalid @enderror" name="diagnosticEntree" value="{{old('diagnosticEntree') ?? $hospitalisation->diagnosticEntree}}">
                                    @error('diagnosticEntree')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <label for="date_entree" class="col-md-3 col-form-label text-right font-weight-bold">Date d'entrée<em style="color: red;">*</em> :</label>
                                    <input type="date" id="date_entree" class="col-md-9 form-control @error('date_entree') is-invalid @enderror" name="date_entree" value="{{old('date_entree') ?? $hospitalisation->date_entree}}">
                                    @error('date_entree')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="row form-group">
                                    <label for="mode_entree" class="col-md-3 col-form-label text-right font-weight-bold">Mode d'entrée<em style="color: red;">*</em> :</label>
                                    <input type="text" id="mode_entree" class="col-md-9 form-control @error('mode_entree') is-invalid @enderror" name="mode_entree" value="{{old('mode_entree') ?? $hospitalisation->mode_entree}}">
                                    @error('mode_entree')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="row form-group">
                                    <label for="date_sortie" class="col-md-3 col-form-label text-right font-weight-bold">Date de sortie</label>
                                    <input type="date" id="date_sortie" class="col-md-9 form-control @error('date_sortie') is-invalid @enderror" name="date_sortie" value="{{old('date_sortie') ?? $hospitalisation->date_sortie}}">
                                    @error('date_sortie')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <label for="diagnosticSortie" class="col-md-3 col-form-label text-right font-weight-bold">Diagnostic à la Sortie :</label>
                                    <input type="text" id="diagnosticSortie" class="col-md-9 form-control @error('diagnosticSortie') is-invalid @enderror" name="diagnosticSortie" value="{{old('diagnosticSortie') ?? $hospitalisation->diagnosticSortie}}">
                                    @error('diagnosticSortie')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>

                                <div class="row form-group">
                                    <label for="mode_sortie" class="col-md-3 col-form-label text-right font-weight-bold">Mode de sortie :</label>
                                    <input type="text" id="mode_sortie" class="col-md-9 form-control @error('mode_sortie') is-invalid @enderror" name="mode_sortie" value="{{old('mode_sortie') ?? $hospitalisation->mode_sortie}}">
                                    @error('mode_sortie')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
