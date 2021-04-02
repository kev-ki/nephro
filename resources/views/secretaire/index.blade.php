@extends('layouts.seclayout')

@section('content')
    <h1 class="text-center" style="background-color: #01A9CB; height: 30px; font-size: large; padding-top: 5px; font-weight: bold">Les Rendez-Vous à  venir</h1>
    <div class="container-fluid p-1" style="background-color: white">
        <div class="flash-message col-12">
            @if(Session::has('message'))
                <div class="alert {{Session::get('alert-class')}}">
                    {{session::get('message')}}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                </div>
            @endif
        </div>

        <div class="card">
            <div class="table-responsive">
                <ul>
                    <table class="table">
                        <thead>
                        <tr class="font-weight-bold">
                            <th scope="col">Numero RDV</th>
                            <th scope="col">Nom du patient</th>
                            <th scope="col">Prénom du patient</th>
                            <th scope="col">Telephone</th>
                            <th scope="col">Date</th>
                            <th scope="col">Heure</th>
                            <th scope="col">Médecin</th>
                            <th scope="col">Motif</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($rdv as $value)
                            @if($value->dateRdv >= $date)
                                @if($value->dateRdv > $date)
                                    <tr>
                                        <td class="font-weight-bold">{{$value->id}}</td>
                                        <td>{{$value->nom}} </td>
                                        <td>{{$value->prenom}} </td>
                                        <td>{{$value->telephone}} </td>
                                        <td>{{$value->dateRdv}} </td>
                                        <td>{{$value->heureRdv}} </td>
                                        <td>
                                            @foreach($users as $user)
                                                @if($value->medecin == $user->id)
                                                    {{$user->prenom}} {{$user->name}}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>{{$value->motif}} </td>
                                        <td class="row">
                                            <a  class="btn-sm btn-secondary mr-1 d-flex" href="{{route('rdv.edit', $value->id)}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                                    <path d="M13.498.795l.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                                                    <title>modifier</title>
                                                </svg>
                                            </a>
                                            <form action="{{route('rdv.destroy', $value->id)}}" method="POST">
                                                    {{csrf_field()}}
                                                    {{method_field('DELETE')}}

                                                    <button type="submit" class="btn-sm btn-danger d-flex">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                            <title>Supprimer</title>
                                                        </svg>
                                                    </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                                @if($value->dateRdv == $date)
                                    @if($value->heureRdv > $heure)
                                        <tr>
                                            <td>{{$value->id}}</td>
                                            <td>{{$value->nom}} </td>
                                            <td>{{$value->prenom}} </td>
                                            <td>{{$value->telephone}} </td>
                                            <td>{{$value->dateRdv}} </td>
                                            <td>{{$value->heureRdv}} </td>
                                            <td>
                                                @foreach($users as $user)
                                                    @if($value->medecin == $user->id)
                                                        {{$user->prenom}} {{$user->name}}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>{{$value->motif}} </td>
                                            <td>
                                                <a  class="btn-sm btn-secondary mr-1" href="{{route('rdv.edit', $value->id)}}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                                        <path d="M13.498.795l.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                                                        <title>éditer</title>
                                                    </svg>
                                                </a>
                                                <form action="{{route('rdv.destroy', $value->id)}}" method="POST">
                                                    {{csrf_field()}}
                                                    {{method_field('DELETE')}}

                                                    <button type="submit" class="btn-sm btn-danger">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                            <title>Supprimer</title>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endif
                                @endif
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </ul>
            </div>
            <div class="d-flex justify-content-center">
                {{$rdv-> links()}}
            </div>
        </div>
    </div>
@endsection
