@extends('layouts.medlayout')

@section('content')
    <h1 class="text-center" style="background-color: #01A9CB; height: 30px; font-size: large; padding-top: 5px; font-weight: bold">Mes Rendez-Vous</h1>
    <div class="container-fluid" style="background-color: white">

        <div class="table-responsive">
            <ul>
                <table class="table">
                    <thead>
                    <tr class="font-weight-bold">
                        <th scope="col">Numero RDV</th>
                        <th scope="col">Nom du patient</th>
                        <th scope="col">Prénom du patient</th>
                        <th scope="col">Telephone</th>
                        <th scope="col">Date du rendez-vous</th>
                        <th scope="col">Heure du rendez-vous</th>
                        <th scope="col">Motif</th>
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
                                    <td>{{$value->motif}} </td>
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
                                        <td>{{$value->motif}} </td>
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
@endsection
