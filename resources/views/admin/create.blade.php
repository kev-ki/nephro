@extends('layouts.adminlayout')

@section('content')
    <h1 class="text-center"  style="background-color: #01A9CB; height: 30px; font-size: large; padding-top: 5px; font-weight: bold">Création D'un Compte Utilisateur</h1>
    <div class="container-fluid p-3" style="background-color: white">
        <div class="flash-message col-12">
            @if(Session::has('message'))
                <div class="alert {{Session::get('alert-class')}}">
                    {{session::get('message')}}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                </div>
            @endif
        </div>

        <div class="card p-2">
            <form  method="post" action="{{route('admin.store')}}" accept-charset="UTF-8">
                @csrf
                <div class="col">
                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label font-weight-bold text-right">Nom <em style="color: red;">*</em>:</label>
                        <input id="name" type="text" class="col-md-4 form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" required>

                        @error('name')
                        <div class="invalid-feedback">
                            {{ $errors -> first('name') }}
                        </div>
                        @enderror

                        <label for="prenom" class="col-md-2 col-form-label font-weight-bold text-right">Prenom <em style="color: red;">*</em>:</label>
                        <input id="prenom" type="text" class="col-md-4 form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{old('prenom')}}" required>

                        @error('prenom')
                        <div class="invalid-feedback">
                            {{ $errors -> first('prenom') }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="col">
                    <div class="form-group row">
                        <label for="pseudo" class="col-md-2 col-form-label font-weight-bold text-right">Pseudo <em style="color: red;">*</em> :</label>
                        <input id="pseudo" type="text" class="col-md-4 form-control @error('pseudo') is-invalid @enderror" name="pseudo" value="{{ old('pseudo')}}">

                        @error('pseudo')
                        <div class="invalid-feedback">
                            {{ $errors -> first('pseudo') }}
                        </div>
                        @enderror
                        <label for="email" class="col-md-2 col-form-label font-weight-bold text-right">E-Mail <em style="color: red;">*</em>:</label>
                        <input id="email" type="email" class="col-md-4 form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>

                        @error('email')
                        <div class="invalid-feedback">
                            {{ $errors -> first('email') }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label for="password" class="col-md-2 col-form-label font-weight-bold text-right">Mot de passe <em style="color: red;">*</em>:</label>
                        <input id="password" type="password" class="col-md-4 form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                        <div class="invalid-feedback">
                            {{ $errors -> first('password') }}
                        </div>
                        @enderror

                        <label for="password-confirm" class="col-md-2 col-form-label font-weight-bold text-right">Comfirmer mot de passe <em style="color: red;">*</em>:</label>
                        <input id="password-confirm" type="password" class="col-md-4 form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label for="statut" class="col-md-2 col-form-label font-weight-bold text-right">Statut <em style="color: red;">*</em>:</label>
                        <select id="statut" name="statut" data-style="btn-outline-secondary" data-placeholder="Choisir un statut" class="col-md-4 selectpicker form-control @error('statut') is-invalid @enderror">
                            @foreach($user -> getStatusOptions() as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                        @error('statut')
                        <div class="invalid-feedback">
                            {{ $errors -> first('statut') }}
                        </div>
                        @enderror

                        <label for="telephone" class="col-md-2 col-form-label font-weight-bold text-right">Téléphone <em style="color: red;">*</em>:</label>
                        <input id="telephone" type="text" class="col-md-4 form-control" value="{{old('telephone')}}" name="telephone">
                        @error('telephone')
                        <div class="invalid-feedback">
                            {{$errors->first('telephone')}}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label for="type_user" class="col-md-2 col-form-label font-weight-bold text-right">Type Utilisateur <em style="color: red;">*</em>:</label>
                        <select name="type_user" data-style="btn-outline-secondary" data-placeholder="Choisir un type d'utilisateur" class="col-md-4 selectpicker form-control @error('type_user') is-invalid @enderror">
                            @foreach($user -> getUserTypeOptions() as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                        @error('type_user')
                        <div class="invalid-feedback">
                            {{ $errors -> first('type_user') }}
                        </div>
                        @enderror
                        <label for="chefservice" class="col-md-2 col-form-label font-weight-bold text-right">Chef de Service<em style="color: red;">*</em> :</label>
                        <select name="chefservice" data-style="btn-outline-secondary" class="col-md-4 form-control selectpicker @error('chefservice') is-invalid @enderror">
                            <option value="0">Non</option>
                            <option value="1">Oui</option>
                        </select>
                        @error('chefservice')
                        <div class="invalid-feedback">
                            {{ $errors -> first('chefservice') }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
@endsection
