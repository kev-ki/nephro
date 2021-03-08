@extends('layouts.seclayout')

@section('content')
    <h1 class="text-center" style="background-color: #01A9CB; height: 30px; font-size: large; padding-top: 5px; font-weight: bold">édition du profile</h1>
    <div class="container-fluid p-2" style="background-color: white">
        <div class="flash-message col-12">
            @if(Session::has('message'))
                <div class="alert {{Session::get('alert-class')}}">
                    {{session::get('message')}}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                </div>
            @endif
        </div>

        <div class="p-2">
            <form method="post" action="{{route('secret.updateprofile', $user->id)}}" accept-charset="utf-8">
                @method('put')
                @csrf
                <div class="col">
                    <div class="form-group row">
                        <label for="password" class="col-2 col-form-label text-right font-weight-bold text-right">Mot de passe<em style="color: red;">*</em> :</label>
                        <input id="password" type="password" class="col-4 form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                        <div class="invalid-feedback">
                            {{ $errors -> first('password') }}
                        </div>
                        @enderror

                        <label for="password-confirm" class="col-2 col-form-label text-right font-weight-bold text-right">Comfirmer mot de passe<em style="color: red;">*</em> :</label>
                        <input id="password-confirm" type="password" class="col-4 form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
@endsection
