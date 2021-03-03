@extends('layouts.medlayout')

@section('content')
    <h1 class="text-center" style="background-color: #01A9CB; height: 30px; font-size: large; padding-top: 5px; font-weight: bold">Antécédents Paracliniques</h1>
    <div class="container-fluid p-2" style="background-color: white">
        <div class="card p-2">
            <div class="card-header text-center font-weight-bold text-uppercase">Résultat
                @if($iea->type === 'imagerie') Imagerie @endif
                @if($iea->type === 'endoscopie') Endoscopie @endif
                @if($iea->type === 'anatomopathologique') Examens Anatomopathologiques @endif
                de {{$patient->prenom}} {{$patient->nom}} [ Consultation du {{$consult->created_at}}]</div>
            <div class="card-body">
                <div class="col">
                    <div class="form-group row">
                        <label class="text-right col-form-label col-md-2 font-weight-bold">Type:</label>
                        <input type="text" readonly name="nature" class="form-control col-md-10" value="{{$iea->type}}">
                    </div>
                </div>

                <div class="col">
                    <div class="form-group row">
                        <label class="text-right col-form-label col-md-2 font-weight-bold">Date:</label>
                        <input type="date" readonly name="date" class="form-control col-md-4" value="{{$iea->date}}">
                        <label class="text-right col-form-label col-md-2 font-weight-bold">Nature: </label>
                        <input type="text" readonly name="nature" class="form-control col-md-4" value="{{$iea->nature}}">
                    </div>
                </div>

                <div class="col">
                    <div class="form-group row">
                        <label for="nom" class="text-right col-form-label col-md-2 font-weight-bold">Nom explorateur: </label>
                        <input type="text" readonly id="nom" class="form-control col-md-4" name="nom_explorateur" value="{{$iea->nom_explorateur}}">
                        <label for="etablissement" class="text-right col-form-label col-md-2 font-weight-bold"> Son établissement: </label>
                        <input type="text" readonly id="etablissement" class="form-control col-md-4" name="etablissement_explorateur" value="{{$iea->etablissement_explorateur}}">
                    </div>
                </div>

                <div class="col">
                    <div class="form-group row">
                        <label for="commentaire" class="text-right col-form-label col-md-2 font-weight-bold">Commentaire: </label>
                        <textarea readonly id="commentaire" class="form-control col-md-10" name="commentaire">{{$iea->commentaire}}</textarea>
                    </div>
                </div>

                {{--<div class="d-flex justify-content-center">
                    <div class="btn btn-secondary"><a href="#" style="color: white">imprimer</a></div>
                </div>--}}
            </div>
        </div>
    </div>
@endsection
