@extends('layouts.medlayout')

@section('content')
    <div class="container-fluid p-2" style="background-color: white">
        @if(Session::has('doc'))
            <div class="card">
                <div class="card-header">
                    <div class="row mb-3">
                        <div class="col-12">
                            <form method="POST" action="{{route('consultation.search', $doc->id_patient)}}">
                                @csrf
                                @method('post')
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

                <div class="table-responsive card-body">
                    <ul>
                        <table class="table">
                            <thead class="font-weight-bold">
                            <tr>
                                {{--<th scope="col">ID Consultation</th>--}}
                                <th scope="col">Date d'enregistrement</th>
                                <th scope="col">Numero Quittance</th>
                                <th scope="col">Adressé par</th>
                                <th scope="col">Bilan Admission</th>
                                <th scope="col">Action (s)</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($consult as $consult)
                                <tr>
                                    {{--<td class="font-weight-bold">{{$consult->id}}</td>--}}
                                    <td class="font-weight-bold">{{ $consult->created_at}}</td>
                                    <td>{{ $consult->numQ}}</td>
                                    <td>{{ $consult->adresserpar}}</td>
                                    <td>{{ $consult->bilan_admission}}</td>

                                    <td><a href="{{route('medecin.consultation',$consult->id)}}" class="btn mr-1 btn-secondary">voir</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </ul>
                    {{--<div class="d-flex justify-content-center">
                        {{$consult-> links()}}
                    </div>--}}
                </div>
            </div>
        @else
            <div class="card">
                <div class="card-header">

                </div>

                <div class="table-responsive card-body">
                    <ul>
                        <table class="table">
                            <thead class="font-weight-bold">
                            <tr>
                                {{--<th scope="col">ID Consultation</th>--}}
                                <th scope="col">Date d'enregistrement</th>
                                <th scope="col">Numero Quittance</th>
                                <th scope="col">Adressé par</th>
                                <th scope="col">Bilan Admission</th>
                                <th scope="col">Action (s)</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($consult as $consult)
                                <tr>
                                    {{--<td class="font-weight-bold">{{$consult->id}}</td>--}}
                                    <td class="font-weight-bold">{{ $consult->created_at}}</td>
                                    <td>{{ $consult->numQ}}</td>
                                    <td>{{ $consult->adresserpar}}</td>
                                    <td>{{ $consult->bilan_admission}}</td>

                                    <td><a href="{{route('medecin.consultation',$consult->id)}}" class="btn mr-1 btn-secondary">voir</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </ul>
                    {{--<div class="d-flex justify-content-center">
                        {{$consult-> links()}}
                    </div>--}}
                </div>
            </div>
        @endif
    </div>
@endsection
