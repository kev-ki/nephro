@extends('layouts.adminlayout')

@section('content')
    <h1 class="text-center" style="background-color: #01A9CB; height: 30px; font-size: large; padding-top: 5px; font-weight: bold">édition d'un compte utilisateur</h1>
    <div class="container-fluid p-2" style="background-color: white">
        <div class="flash-message col-12">
            @if(Session::has('message'))
                <div class="alert {{Session::get('alert-class')}}">
                    {{session::get('message')}}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                </div>
            @endif
        </div>

        <div class="card p-2">
            <form method="post" class="mt-2" action="{{route('admin.updateuser', $user->id)}}" accept-charset="utf-8">
                @method('put')
                @csrf
                <input type="hidden" name="iduser" value="{{$user->id}}">
                <div class="col">
                    <div class="form-group row">
                        <label for="name" class="col-2 col-form-label text-right  font-weight-bold text-left">Nom :</label>
                        <input id="name" type="text" class="col-4 form-control @error('name') is-invalid @enderror" name="name" value="{{old('name') ?? $user->name}}">

                        @error('name')
                        <div class="invalid-feedback">
                            {{ $errors -> first('name') }}
                        </div>
                        @enderror

                        <label for="prenom" class="col-2 col-form-label text-right  font-weight-bold text-left">Prenom :</label>
                        <input id="prenom" type="text" class="col-4 form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{old('prenom') ?? $user->prenom}}">

                        @error('prenom')
                        <div class="invalid-feedback">
                            {{ $errors -> first('prenom') }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="col">
                    <div class="form-group row">
                        <label for="pseudo" class="col-2 col-form-label text-right  font-weight-bold text-left">Pseudo :</label>
                        <input id="pseudo" type="text" class="col-4 form-control @error('pseudo') is-invalid @enderror" name="pseudo" value="{{ old('pseudo') ?? $user->pseudo }}">

                        @error('pseudo')
                        <div class="invalid-feedback">
                            {{ $errors -> first('pseudo') }}
                        </div>
                        @enderror
                        <label for="email" class="col-2 col-form-label text-right  font-weight-bold text-left">E-Mail :</label>
                        <input id="email" type="email" class="col-4 form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $user->email }}" required>

                        @error('email')
                        <div class="invalid-feedback">
                            {{ $errors -> first('email') }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="col">
                    <div class="form-group row">
                        <label for="password" class="col-2 col-form-label text-right  font-weight-bold text-left">Mot de passe :</label>
                        <input id="password" type="password" class="col-4 form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                        @error('password')
                        <div class="invalid-feedback">
                            {{ $errors -> first('password') }}
                        </div>
                        @enderror

                        <label for="password-confirm" class="col-2 col-form-label text-right  font-weight-bold text-left">Comfirmer mot de passe :</label>
                        <input id="password-confirm" type="password" class="col-4 form-control" name="password_confirmation" autocomplete="new-password">
                    </div>
                </div>

                <div class="col">
                    <div class="form-group row">
                        <label for="statut" class="col-2 col-form-label text-right  font-weight-bold text-left">Statut :</label>
                        <select id="statut" name="statut" data-style="btn-outline-secondary" class="col-md-4 selectpicker form-control @error('statut') is-invalid @enderror">
                            @foreach($user -> getStatusOptions() as $key => $value)
                                <option value="{{ $key }}" {{ $user -> status == $key ? 'selected' : '' }}>{{ $value }}</option>
                            @endforeach
                        </select>
                        @error('statut')
                        <div class="invalid-feedback">
                            {{ $errors -> first('statut') }}
                        </div>
                        @enderror

                        <label for="telephone" class="col-2 col-form-label text-right  font-weight-bold text-left">Téléphone :</label>
                        <input id="telephone" type="text" class="col-4 form-control" value="{{ old('telephone') ?? $user->telephone }}" name="telephone">
                        @error('telephone')
                        <div class="invalid-feedback">
                            {{$errors->first('telephone')}}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="col">
                    <div class="form-group row">
                        <label for="type_user" class="col-md-2 col-form-label font-weight-bold text-right">Type Utilisateur:</label>
                        <select name="type_user" data-style="btn-outline-secondary" class="col-md-4 selectpicker form-control @error('type_user') is-invalid @enderror">
                            @foreach($user -> getUserTypeOptions() as $key => $value)
                                <option value="{{ $key }}" {{ $user -> type_user == $key ? 'selected' : '' }}>{{ $value }}</option>
                            @endforeach
                        </select>
                        @error('type_user')
                        <div class="invalid-feedback">
                            {{ $errors -> first('type_user') }}
                        </div>
                        @enderror
                        <label for="chefservice" class="col-md-2 col-form-label font-weight-bold text-right">Chef de Service:</label>
                        <select name="chefservice" data-style="btn-outline-secondary" class="col-md-4 form-control selectpicker @error('chefservice') is-invalid @enderror">
                            @if($user->chefservice == 0)
                                <option value="0" selected>Non</option>
                                <option value="1">Oui</option>
                            @else
                                <option value="0">Non</option>
                                <option value="1" selected>Oui</option>
                            @endif
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
