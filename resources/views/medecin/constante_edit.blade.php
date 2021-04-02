@extends('layouts.medlayout')

@section('content')
    <h1 class="text-center" style="background-color: #01A9CB; height: 30px; font-size: large; padding-top: 5px; font-weight: bold">Modification des Constantes de {{$patient->prenom}} {{$patient->nom}} [ ID : {{$patient->idpatient}} ]</h1>
    <div class="container-fluid p-2" style="background-color: white">
        <div class="flash-message col-12">
            @if(Session::has('message'))
                <div class="alert {{Session::get('alert-class')}}">
                    {{session::get('message')}}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                </div>
            @endif
        </div>

        <div>
            <form action="{{ route('constante.update', $constante->id) }}" method="POST" class="table-responsive-sm">
                @csrf
                @method('put')
                <div class="mb-5 tab-content">
                    <div class="">
                        <div class="col">
                            <div class="form-group row">
                                <label for="idpatient" class="col-md-2 col-form-label text-right font-weight-bold">ID Patient<em style="color: red;">*</em> :</label>
                                <select id="idpatient" name="idpatient" data-live-search="true" data-style="btn-outline-secondary" data-placeholder="Choisir un ID" class="col-md-4 selectpicker form-control @error('idpatient') is-invalid @enderror">
                                    @foreach($liste_patients as $value)
                                        <option value="{{$value->idpatient}}" {{$constante->idpatient === $value->idpatient ? 'selected':''}}>{{$value->nom}} {{$value->prenom}}</option>
                                    @endforeach
                                </select>
                                @error('patientid')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                                <label for="poids" class="col-md-2 col-form-label text-right font-weight-bold">Poids<em style="color: red;">*</em> :</label>
                                <input type="text" id="poids" class="col-md-4 form-control @error('poids') is-invalid @enderror" name="poids" value="{{old('poids') ?? $constante->poids}}">
                                @error('poids')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col" >
                            <div class="form-group row">
                                <label for="taille" class="col-md-2 col-form-label text-right font-weight-bold">Taille<em style="color: red;">*</em> :</label>
                                <input type="text" id="taille" class="col-md-4 form-control @error('taille') is-invalid @enderror" name="taille" value="{{old('taille') ?? $constante->taille}}">
                                @error('taille')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                                <label for="tension" class="col-md-2 col-form-label text-right font-weight-bold">Tension<em style="color: red;">*</em> :</label>
                                <input type="text" id="tension" class="col-md-4 form-control @error('tension') is-invalid @enderror" name="tension" value="{{old('tension') ?? $constante->tension}}">
                                @error('tension')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group row">
                                <label for="temperature" class="col-md-2 col-form-label text-right font-weight-bold">Temperature<em style="color: red;">*</em> :</label>
                                <input type="text" id="temperature" class="col-md-4 form-control @error('temperature') is-invalid @enderror" name="temperature" value="{{old('temperature') ?? $constante->temperature}}">
                                @error('temperature')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <label for="statut" class="col-md-2 col-form-label text-right font-weight-bold">Status<em style="color: red;">*</em> :</label>
                                <input type="text" id="statut" class="col-md-4 form-control @error('statut') is-invalid @enderror" name="statut" value="{{old('statut') ?? $constante->status}}">
                                @error('statut')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group row">
                                <label for="pouls" class="col-md-2 col-form-label text-right font-weight-bold">Pouls<em style="color: red;">*</em> :</label>
                                <input type="text" id="pouls" class="col-md-4 form-control @error('pouls') is-invalid @enderror" name="pouls" value="{{old('pouls') ?? $constante->pouls}}">
                                @error('pouls')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <label for="saturation_oxygene" class="col-md-2 col-form-label text-right font-weight-bold">Saturation en Oxygène<em style="color: red;">*</em> :</label>
                                <input type="text" id="saturation_oxygene" class="col-md-4 form-control @error('saturation_oxygene') is-invalid @enderror" name="saturation_oxygene" value="{{old('saturation_oxygene') ?? $constante->saturation_oxygene}}">
                                @error('saturation_oxygene')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group row">
                                <label for="frequence_respiratoire" class="col-md-2 col-form-label text-right font-weight-bold">Frequence Respiratoire<em style="color: red;">*</em> :</label>
                                <input type="text" id="frequence_respiratoire" class="col-md-4 form-control @error('frequence_respiratoire') is-invalid @enderror" name="frequence_respiratoire" value="{{old('frequence_respiratoire') ?? $constante->frequence_respiratoire}}">
                                @error('frequence_respiratoire')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <label for="frequence_cardiaque" class="col-md-2 col-form-label text-right font-weight-bold">Frequence Cardiaque<em style="color: red;">*</em> :</label>
                                <input type="text" id="frequence_cardiaque" class="col-md-4 form-control @error('frequence_cardiaque') is-invalid @enderror" name="frequence_cardiaque" value="{{old('frequence_cardiaque') ?? $constante->frequence_cardiaque}}">
                                @error('frequence_cardiaque')
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
@endsection
