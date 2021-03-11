
@extends('layouts.medlayout')

@section('content')
    <h1 class="text-center" style="background-color: #01A9CB; height: 30px; font-size: large; padding-top: 5px; font-weight: bold">Traitement</h1>
    <div class="container-fluid p-2" style="background-color: white">
        <div class="flash-message col-md-12">
            @if(Session::has('message'))
                <div class="alert {{Session::get('alert-class')}}">
                    {{session::get('message')}}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                </div>
            @endif
        </div>
        <div class="card p-2">
            <div class="card-body">
                <div class="col">
                    <div class="form-group row">
                        <label class="text-right col-md-form-label col-md-2 font-weight-bold">Date :</label>
                        <input type="date" readonly name="date" class="form-control col-md-10 @error('date') is-invalid @enderror" value="{{old('date') ?? $traitement->date}}">
                        @error('date')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label class="text-right col-md-form-label col-md-2 font-weight-bold">Prescription:</label>
                        <input type="text" readonly name="prescription" class="form-control col-md-10 @error('prescription') is-invalid @enderror" value="{{old('prescription') ?? $traitement->prescription}}">
                        @error('prescription')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label class="text-right col-md-form-label col-md-2 font-weight-bold">Posologie:</label>
                        <textarea name="posologie" readonly class="form-control col-md-10 @error('posologie') is-invalid @enderror">{{$traitement->voie_administration}}</textarea>
                        @error('posologie')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label class="text-right col-md-form-label col-md-2 font-weight-bold">Voie d'administration:</label>
                        <textarea name="administration" readonly class="form-control col-md-10 @error('administration') is-invalid @enderror">{{$traitement->voie_administration}}</textarea>
                        @error('administration')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label class="text-right col-md-form-label col-md-2 font-weight-bold">Prescripteur:</label>
                        <select name="prescripteur" disabled id="prescripteur" data-live-search="true" data-placeholder="Choisir un prescripteur" data-style="btn-outline-secondary" class="selectpicker form-control col-md-10 @error('prescripteur') is-invalid @enderror">
                            @foreach($liste_medecin as $medecin)
                                <option value="{{$medecin->id}}" {{$medecin->id === $traitement->prescripteur ? 'selected' : ''}}> Dr {{$medecin->prenom}} {{$medecin->name}}</option>
                            @endforeach
                        </select>
                        @error('prescripteur')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
