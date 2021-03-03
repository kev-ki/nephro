@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 offset-2">
                <div class="form mt-4">
                    <form method="POST" action="{{ route('postregister') }}">
                        @csrf
                        <h1>{{ __('Inscription') }}</h1>
                        <hr><hr>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <input id="name" type="text" placeholder="Nom" class="user-input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $errors -> first('name') }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input id="prenom" type="text" placeholder="Prenom" class="user-input @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" required autocomplete="prenom" autofocus>

                                @error('prenom')
                                <div class="invalid-feedback">
                                    {{ $errors -> first('prenom') }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <input id="email" type="email" placeholder="E-Mail" class="user-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $errors -> first('email') }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <select name="type_user" class="user-input custom-select @error('type_user') is-invalid @enderror">
                                    <option value="1" selected>Médecin</option>
                                    <option value="2">Infirmier</option>
                                    <option value="3">Sécretaire</option>
                                    <option value="0">Administrateur</option>
                                </select>
                                @error('type_user')
                                <div class="invalid-feedback">
                                    {{ $errors -> first('type_user') }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <input id="password" type="password" placeholder="Mot de passe" class="user-input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $errors -> first('password') }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" placeholder="Comfirmer mot de passe" class="user-input" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <select name="status" class="user-input custom-select @error('status') is-invalid @enderror">
                                    <option value="1" selected>Actif</option>
                                    <option value="0">Bloqué</option>
                                </select>
                                @error('status')
                                <div class="invalid-feedback">
                                    {{ $errors -> first('status') }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input id="telephone" type="text" placeholder="téléphone" class="user-input" value="{{ old('telephone') }}" name="telephone">
                                @error('telephone')
                                <div class="invalid-feedback">
                                    {{$errors->first('telephone')}}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="chefservice" class="col-md-3 col-form-label font-weight-bold text-left">Chef de Service :</label>
                            <select name="chefservice" class="col-md-9 custom-select @error('chefservice') is-invalid @enderror">
                                <option value="0" selected>Non</option>
                                <option value="1">Oui</option>
                            </select>
                            @error('chefservice')
                            <div class="invalid-feedback">
                                {{ $errors -> first('chefservice') }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-6 mb-2">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Enregistrer') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
