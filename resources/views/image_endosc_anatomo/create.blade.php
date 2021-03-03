@extends('layouts.medlayout')

@section('content')
    <h1 class="text-center" style="background-color: #01A9CB; height: 30px; font-size: large; padding-top: 5px; font-weight: bold">Examens Paracliniques</h1>
    <div class="container-fluid p-2" style="background-color: white">
        <div class="flash-message col-12">
            @if(Session::has('message'))
                <div class="alert {{Session::get('alert-class')}}">
                    {{session::get('message')}}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                </div>
            @endif
        </div>
        <div class="card p-2">
            <div class="card-header text-center font-weight-bold text-uppercase ">Imagerie - Endoscopie - Examens anatomopathologiques</div>
            <div class="card-body">
                <div class="row mb-3 text-center">
                    <div class="col-2"></div>
                    <p class="col-4 font-weight-bold">Type examen anatomopathologique: </p>
                    <p class="col-4">Ponction à aiguille fine, pièce biopsique</p>
                </div>
                <form action="{{route('image-endoscopie-anat.store')}}" method="post">
                    @csrf
                    <div class="col">
                        <div class="form-group row">
                            <label class="text-right col-form-label col-2 font-weight-bold">Type:</label>
                            <select name="type" data-placeholder="Choisir un examen" data-style="btn-outline-secondary" class="selectpicker form-control col-10">
                                <option value="imagerie">Imagerie</option>
                                <option value="endoscopie">Endoscopie</option>
                                <option value="anatomopatholigique">Examen anatomopathologique</option>
                            </select>
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group row">
                            <label class="text-right col-form-label col-2 font-weight-bold">Date:</label>
                            <input type="date" name="date" class="form-control col-4">
                            <label class="text-right col-form-label col-2 font-weight-bold">Nature: </label>
                            <input type="text" name="nature" class="form-control col-4">
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group row">
                            <label for="nom" class="text-right col-form-label col-2 font-weight-bold">Nom explorateur: </label>
                            <input id="nom" class="form-control col-4" name="nom_explorateur">
                            <label for="etablissement" class="text-right col-form-label col-2 font-weight-bold"> Son établissement: </label>
                            <input id="etablissement" class="form-control col-4" name="etablissement_explorateur">
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group row">
                            <label for="commentaire" class="text-right col-form-label col-2 font-weight-bold">Commentaire: </label>
                            <textarea id="commentaire" class="form-control col-10" name="commentaire"></textarea>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary mr-1">Enregistrer</button>
                        <div class="btn btn-secondary"><a style="color: white" href="{{route('autre-resultat.create')}}">Suivant</a></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
