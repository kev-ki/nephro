@extends('layouts.inflayout')

@section('content')
    <h1 class="text-center" style="background-color: #01A9CB; height: 30px; font-size: large; padding-top: 5px; font-weight: bold">Details hospitalisation de {{$patient->prenom}} {{$patient->nom}}</h1>
    <div class="container-fluid p-2" style="background-color: white">
        <div>
            <div class="flash-message col-12">
                @if(Session::has('message'))
                    <div class="alert {{Session::get('alert-class')}}">
                        {{session::get('message')}}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    </div>
                @endif
            </div>
            <p><a href="{{route('hospitalisation.index')}}"><<<< Annuaire des patients hospitalisés</a></p>
            <div class="card p-1">
                <div class="col">
                    <div class="row">
                        <div class="col-12">
                            <div class="row form-group">
                                <label for="motif_hospitalisation" class="col-md-2 col-form-label text-right font-weight-bold">Motif Hospitalisation<em style="color: red;">*</em> :</label>
                                <input readonly  id="motif_hospitalisation" name="motif_hospitalisation" class="col-md-10 form-control" value="{{old('motif_hospitalisation') ?? $hospitalisation->motif_hospitalisation}}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row form-group">
                                <label for="patientid" class="col-md-3 col-form-label text-right font-weight-bold">ID Patient<em style="color: red;">*</em> :</label>
                                <input readonly  id="patientid" name="patientid" class="col-md-9 form-control" value="{{old('patientid') ?? $hospitalisation->id_patient .' [ '.$patient->prenom.' '.$patient->nom.' ]'}}">
                            </div>

                            <div class="row form-group">
                                <label for="numerosalle" class="col-md-3 col-form-label text-right font-weight-bold">Numero Chambre<em style="color: red;">*</em> :</label>
                                <input readonly  type="text" id="numerosalle" class="col-md-9 form-control" name="numerosalle" value="{{old('numerosalle') ?? $hospitalisation->numerochambre}}">
                            </div>

                            <div class="row form-group">
                                <label for="numerolit" class="col-md-3 col-form-label text-right font-weight-bold">Numero lit<em style="color: red;">*</em> :</label>
                                <input readonly  type="text" id="numerolit" class="col-md-9 form-control" name="numerolit" value="{{old('numerolit') ?? $hospitalisation->numerolit}}">
                            </div>

                            <div class="row form-group">
                                <label for="diagnosticPrincipale" class="col-md-3 col-form-label text-right font-weight-bold">Diagnostic Principal<em style="color: red;">*</em> :</label>
                                <input readonly  type="text" id="diagnosticPrincipale" class="col-md-9 form-control" name="diagnosticPrincipale" value="{{old('diagnosticPrincipale') ?? $hospitalisation->diagnosticPrincipale}}">
                            </div>

                            <div class="form-group row">
                                <label for="diagnosticSecondaire" class="col-md-3 col-form-label text-right font-weight-bold">Diagnostic secondaire<em style="color: red;">*</em> :</label>
                                <input readonly  type="text" id="diagnosticSecondaire" class="col-md-9 form-control" name="diagnosticSecondaire" value="{{old('diagnosticSecondaire') ?? $hospitalisation->diagnosticSecondaire}}">
                            </div>

                            <div class="form-group row">
                                <label for="diagnosticAssocie" class="col-md-3 col-form-label text-right font-weight-bold">Diagnostic associé<em style="color: red;">*</em> :</label>
                                <input readonly  type="text" id="diagnosticAssocie" class="col-md-9 form-control" name="diagnosticAssocie" value="{{old('diagnosticAssocie') ?? $hospitalisation->diagnosticAssocie}}">
                            </div>
                        </div>

                        <div class="col-6" >
                            <div class="form-group row">
                                <label for="diagnosticEntree" class="col-md-3 col-form-label text-right font-weight-bold">Diagnostic à l'entrée<em style="color: red;">*</em> :</label>
                                <input readonly  type="text" id="diagnosticEntree" class="col-md-9 form-control" name="diagnosticEntree" value="{{old('diagnosticEntree') ?? $hospitalisation->diagnosticEntree}}">
                            </div>
                            <div class="form-group row">
                                <label for="dateEntree" class="col-md-3 col-form-label text-right font-weight-bold">Date d'entrée<em style="color: red;">*</em> :</label>
                                <input readonly  type="date" id="dateEntree" class="col-md-9 form-control" name="dateEntree" value="{{old('dateEntree') ?? $hospitalisation->date_entree}}">
                            </div>

                            <div class="row form-group">
                                <label for="modeentree" class="col-md-3 col-form-label text-right font-weight-bold">Mode d'entrée<em style="color: red;">*</em> :</label>
                                <input readonly  type="text" id="modeentree" class="col-md-9 form-control" name="modeentree" value="{{old('modeentree') ?? $hospitalisation->mode_entree}}">
                            </div>

                            <div class="row form-group">
                                <label for="dateSortie" class="col-md-3 col-form-label text-right font-weight-bold">Date de sortie</label>
                                <input readonly  type="date" id="dateSortie" class="col-md-9 form-control" name="dateSortie" value="{{old('dateSortie') ?? $hospitalisation->date_sortie}}">
                            </div>

                            <div class="form-group row">
                                <label for="diagnosticSortie" class="col-md-3 col-form-label text-right font-weight-bold">Diagnostic à la Sortie :</label>
                                <input readonly  type="text" id="diagnosticSortie" class="col-md-9 form-control" name="diagnosticSortie" value="{{old('diagnosticSortie') ?? $hospitalisation->diagnosticSortie}}">
                            </div>

                            <div class="row form-group">
                                <label for="modesortie" class="col-md-3 col-form-label text-right font-weight-bold">Mode de sortie :</label>
                                <input readonly  type="text" id="modesortie" class="col-md-9 form-control" name="modesortie" value="{{old('modesortie') ?? $hospitalisation->mode_sortie}}">
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center">
                        <button class="btn btn-secondary"><a style="color: #2d2d2d" href="{{route('hospitalisation.edit', $hospitalisation->id)}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                    <path d="M13.498.795l.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                                    <title>éditer</title>
                                </svg> éditer
                            </a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
