@extends('layouts.medlayout')

@section('content')
    <h1 class="text-center" style="background-color: #01A9CB; height: 30px; font-size: large; padding-top: 5px; font-weight: bold">Antecedents chirurgicaux de la consultation du {{$consult->created_at}}</h1>
    <div class="container-fluid p-1" style="background-color: white">
        <div class="card">
            <div class="card-header">
                <div class="flash-message col-12">
                    @if(Session::has('message'))
                        <div class="alert {{Session::get('alert-class')}}">
                            {{session::get('message')}}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        </div>
                    @endif
                </div>
            </div>

            <div class="table-responsive card-body">
                <ul>
                    <table class="table">
                        <thead class="font-weight-bold">
                        <tr>
                            <th scope="col">Ordre</th>
                            <th scope="col">Date examen</th>
                            <th scope="col">Date d'enregistrement</th>
                            <th scope="col">Action (s)</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($donnees as $donnees)
                            <tr>
                                <td class="font-weight-bold">{{$donnees->id}}</td>
                                <td>{{$donnees->date}}</td>
                                <td>{{ $donnees->created_at}}</td>

                                <td>
                                    <a href="{{route('chirurgicaux.show',$donnees->id)}}" class="btn mr-1 btn-secondary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                            <title>voir</title>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </ul>
                {{--<div class="d-flex justify-content-center">
                    {{$donnees-> links()}}
                </div>--}}
            </div>
        </div>
    </div>
@endsection
