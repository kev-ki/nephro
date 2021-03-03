@extends('layouts.adminlayout')

@section('content')
<h3 class="text-center" style="background-color: #01A9CB; height: 30px; font-size: large; padding-top: 5px; font-weight: bold"> Utlisateurs du système</h3>
<div class="container-fluid" style="background-color: white">
    <div class="flash-message col-12">
        @if(Session::has('message'))
            <div class="alert {{Session::get('alert-class')}}">
                {{session::get('message')}}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            </div>
        @endif
    </div>
    <div class="table-responsive">
        <ul>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col" class="font-weight-bold">Nom</th>
                    <th scope="col" class="font-weight-bold">Prenom</th>
                    <th scope="col" class="font-weight-bold">Pseudo</th>
                    <th scope="col" class="font-weight-bold">Email</th>
                    <th scope="col" class="font-weight-bold">Type</th>
                    <th scope="col" class="font-weight-bold">statuts du compte</th>
                    <th scope="col" class="font-weight-bold">Telephone</th>
                    {{--<th scope="col" class="text-center font-weight-bold" style="width: 250px">Actions</th>--}}
                </tr>
                </thead>
                <tbody>
                @foreach($user as $users)
                    <tr>
                        <td>{{ $users->name }}</td>
                        <td>{{ $users->prenom }}</td>
                        <td>{{ $users->pseudo }}</td>
                        <td>{{ $users->email }}</td>
                        <td>
                            @if($users->type_user === 0)
                                Amdministrateur
                            @elseif($users->type_user === 1)
                                Médecin
                            @elseif($users->type_user === 2)
                                Infirmier
                            @else
                                Sécretaire
                            @endif
                        </td>
                        <td>{{$users->status}}</td>
                        <td>{{ $users->telephone }}</td>
                        <td class="row">
                            <div class="mr-1">
                                <a href="{{route('admin.edit', $users->id)}}" class="btn btn-primary mb-1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                        <path d="M13.498.795l.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                                        <title>modifier</title>
                                    </svg></a>
                            </div>
                            <form id="resetmdp" class="mr-1" action="{{route('admin.resetmdp', $users->id)}}" method="POST">
                                @csrf
                                @method('patch')
                                <button class="btn btn-secondary mb-1" type="submit"><!--réeinitialisé--> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
                                        <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
                                        <title>réeinitialisé le mot de passe</title>
                                    </svg></button>
                            </form>
                            <form id="activer" class="" action="{{route('admin.activer_desactiver', $users->id)}}" method="POST">
                                @csrf
                                @method('patch')
                                @if($users->status == 'Bloqué')
                                    <button type="submit" class="btn btn-warning mb-1">Activer</button>
                                @endif
                                @if($users->status == 'Actif')
                                    <button type="submit" class="btn btn-danger mb-1">Bloquer</button>
                                @endif
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </ul>
    </div>
    <div class="d-flex justify-content-center">
        {{$user-> links()}}
    </div>
</div>
@endsection
