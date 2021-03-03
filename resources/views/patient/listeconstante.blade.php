@extends('layouts.medlayout')

@section('content')
    <div class="container-fluid p-2" style="background-color: white">
        <div class="card">
            <div class="card-header">
                <div class="row mb-3">
                    <div class="col-12">
                        <form method="POST" action="#">
                            @csrf
                            <div class=" row d-flex justify-content-end">
                                <input id="rechercher" type="date" class="col-md-3 form-control @error('rechercher') is-invalid @enderror" placeholder="Mot clé..." name="rechercher" required autofocus>
                                @error('rechercher')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <div class="col-md-3">
                                    <button type="submit" name="search" class="btn btn-primary">
                                        {{ __('Rechercher') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <ul>
                        <table class="table">
                            <thead class="font-weight-bold">
                            <tr>
                                <th scope="col">ID Constante</th>
                                <th scope="col">Date de prise</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($constantes as $constante)
                                <tr>
                                    <td class="font-weight-bold">{{$constante->id}}</td>
                                    <td>{{ $constante->dateprise }}</td>

                                    <td><a href="{{route('medecin.constante',$constante->id)}}" class="btn mr-1 btn-secondary">voir</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </ul>
                    <div class="d-flex justify-content-center">
                        {{$constantes-> links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
