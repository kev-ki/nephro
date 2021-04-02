<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="X-UA-Compatible" content="ie=edge">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/bootstrap-select.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/simple-sidebar.css')}}" rel="stylesheet">
    <link href="{{asset('css/profile.css')}}" rel="stylesheet">
    <link href="{{asset('css/test.css')}}" rel="stylesheet">

</head>

<body>
<div class="d-flex " id="wrapper">

    <!-- Sidebar -->
    <div class="border-right responsive-header" id="sidebar-wrapper">
        <div class="sidebar-heading">
            <div class="row">
                <div class="">
                    <div>
                        <div class="profile-image">
                            <img src="{{asset('images/')}}" alt="Photo Service Nephro-Dialyse">
                        </div>
                        <h3 class="title">Service Nephro-Dialyse</h3>
                        <h3>Gestion des patients</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-navigation ">
            <ul class="navigation text-left">
                <li><a href="{{route('infirmier.index')}}" class="list-group-item-action d-flex justify-content-start">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                            <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                        </svg> Annuaire Patients</a></li>
                <li class="nav-item" style="background-color: #01A9CB">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle d-flex justify-content-start" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                            <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
                        </svg> Gestion Patient</a>

                    <div class="dropdown-menu dropdown-menu-right" style="background-color: #01A9CB" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('infirmier.create')}}"
                           onclick="event.preventDefault();
                                 document.getElementById('patient').submit();">
                            {{ __('Nouveau Patient') }}
                        </a>
                        <a class="dropdown-item" href="{{route('constante.create')}}"
                           onclick="event.preventDefault();
                                 document.getElementById('constante').submit();">
                            {{ __('Prise De Constante') }}
                        </a>
                        <a class="dropdown-item" href="{{route('hospitalisation.index')}}"
                           onclick="event.preventDefault();
                                 document.getElementById('hospi').submit();">
                            {{ __('Annuaire Hospitalisés') }}
                        </a>
                        <a class="dropdown-item" href="{{route('faire_hospitaliser')}}"
                           onclick="event.preventDefault();
                                 document.getElementById('faire_hospi').submit();">
                            {{ __('Attente d\'hospitalisation') }}
                        </a>
                        <a class="dropdown-item" href="{{route('archivage.index')}}"
                           onclick="event.preventDefault();
                                 document.getElementById('archive').submit();">
                            {{ __('Archive hospitalisation') }}
                        </a>
                       {{-- <a class="dropdown-item" href="{{route('hospitalisation.create')}}"
                           onclick="event.preventDefault();
                                 document.getElementById('hospi').submit();">
                            {{ __('Nouvelle Hospitalisation') }}
                        </a>--}}

                        <form id="archive" action="{{ route('archivage.index') }}" method="" class="d-none">
                            @csrf
                        </form>
                        <form id="patient" action="{{ route('infirmier.create') }}" method="" class="d-none">
                            @csrf
                        </form>
                        <form id="constante" action="{{route('constante.create')}}" method="" class="d-none">
                            @csrf
                        </form>
                        <form id="hospi" action="{{route('hospitalisation.index')}}" method="" class="d-none">
                            @csrf
                        </form>
                        <form id="faire_hospi" action="{{route('faire_hospitaliser')}}" method="" class="d-none">
                            @csrf
                        </form>
                        {{--<form id="hospi" action="{{route('hospitalisation.create')}}" method="" class="d-none">
                            @csrf
                        </form>--}}
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!-- navbar horizontale -->
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbarCouleur navbar-light border-bottom">
            <button class="btn btn-primary" id="menu-toggle"><span class="navbar-toggler-icon"></span></button>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    {{--<li class="nav-item">
                        <a class="nav-link" href="#"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-printer-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5z"/>
                                <path fill-rule="evenodd" d="M11 9H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
                                <path fill-rule="evenodd" d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                            </svg> Imprimer</a>
                    </li>--}}
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->prenom }} {{ Auth::user()->name }} <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                            </svg></a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                                    <title>déconnexion</title>
                                </svg> Deconnexion
                            </a>
                            <a class="dropdown-item" href="{{route('infirmier.editprofile', Auth::user()->id)}}"
                               onclick="event.preventDefault();
                                 document.getElementById('editionprofile').submit();">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sliders" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M11.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM9.05 3a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0V3h9.05zM4.5 7a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM2.05 8a2.5 2.5 0 0 1 4.9 0H16v1H6.95a2.5 2.5 0 0 1-4.9 0H0V8h2.05zm9.45 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm-2.45 1a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0v-1h9.05z"/>
                                    <title>paramètre du compte</title>
                                </svg> Paramètre
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            <form id="editionprofile" action="{{route('infirmier.editprofile', Auth::user()->id)}}" method="" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <div>
            <main class="py-2 p-3">
                @yield('content')
            </main>
        </div>
    </div>
</div>


<!-- Bootstrap JavaScript -->
<script src="{{asset('js/myjs.js')}}"></script>
<script src="{{asset('js/jquery.js')}}"></script>
{{--<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>--}}
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/bootstrap-select.min.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.selectpicker').selectpicker({
            style: 'btn-info',
            size: 7
        });
    });
</script>
<!-- Menu Toggle Script -->
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>
</body>

</html>
