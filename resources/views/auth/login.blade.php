<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/style_login.css') }}" rel="stylesheet">
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
</head>
<body>
   <div class="back p-5 mt-5">
       <div class="container d-flex justify-content-center">
           <div class="row d-flex justify-content-center">
               <div class="col-12">
                   <div class="form">
                       <div id="appname" class="headlogin mb-5 p-1">
                           <a class="navbar-brand" href="{{ route('login') }}">
                               {{config('app.name')}}
                           </a>
                           <div class="marquee-rtl">
                               <div>Bienvenue sur <b>{{config('app.name')}}</b> votre plateforme de gestion des patients...</div>
                           </div>
                       </div>
                       <div class="flash-message col-md-12">
                           @if(Session::has('message'))
                               <div class="alert {{Session::get('alert-class')}}">
                                   {{session::get('message')}}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                               </div>
                           @endif
                       </div>
                       <form method="POST" action="{{ route('postlogin') }}">
                       @csrf
                           <div class="divsvg">

                           </div>
                       <!-- <i class="fa-hospital-o"></i> -->
                           <div class="row d-flex justify-content-center">
                               <div class="col-8 mt-2">
                                   <input id="pseudo" type="text" class="user-input @error('pseudo') is-invalid @enderror" placeholder="Pseudo" name="pseudo" value="{{ old('pseudo') }}" required autocomplete="email">
                                   @error('pseudo')
                                   <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                               </div>
                               <div class="input-group col-8" id="show_hide_password">
                                   <input id="password" type="password" class="user-input @error('password') is-invalid @enderror" name="password" placeholder="Mot de passe" required autocomplete="current-password">
                                   <span toggle="#password" id="sans-slash" class="field-icon" style="display: block">
                                       <a href="#" style="color: #2d2d2d;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
  <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
  <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
</svg></a></span>

                                   <span toggle="#password" id="slash" class="field-icon" style="display: none">
                                       <a href="#" style="color: #2d2d2d;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash-fill" viewBox="0 0 16 16">
  <path d="M10.79 12.912l-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.027 7.027 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.088z"/>
  <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708l-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6l-12-12 .708-.708 12 12-.708.707z"/>
</svg></a></span>

                                   @error('password')
                                   <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                               </div>
                           </div>

                           <div class="form-group row d-flex justify-content-center">
                               <div class="col-4">
                                   <div class="form-check">
                                       <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                       <label class="form-check-label" for="remember">
                                           {{ __('Se souvenir de moi') }}
                                       </label>
                                   </div>
                               </div>
                               <div class="col-4">
                                   @if (Route::has('password.request'))
                                       <a class="linksmdp" href="{{ route('password.request') }}">
                                           {{ __('Mot de passe oublier?') }}
                                       </a>
                                   @endif
                               </div>
                           </div>

                           <div class="form-group row d-flex justify-content-center">
                               <div class="col-6">
                                   <button type="submit" class="btn btn-primary">
                                       {{ __('Se connecter') }}
                                   </button>
                               </div>
                           </div>
                       </form>
                   </div>
               </div>
           </div>
       </div>
   </div>

   <script src="{{asset('js/jquery.min.js')}}"></script>
<!-- <script src="{{asset('js/bootstrap-dropdown.js')}}"></script> -->
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>

   <script>
       document.getElementById('sans-slash').addEventListener("click", function (e) {
           var input = document.getElementById('password');
           if (input.getAttribute("type") == "password") {
               input.setAttribute("type", "text")
           }else {
               input.setAttribute("type", "password");
           }
       });

   </script>
</body>
<footer style="color: black">
    &copy2020 Tous droits reservés
</footer>
</html>
