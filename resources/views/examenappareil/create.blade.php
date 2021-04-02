@extends('layouts.medlayout')

@section('content')
    <h1 class="text-center" style="background-color: #01A9CB; height: 30px; font-size: large; padding-top: 5px; font-weight: bold">Examen Clinique</h1>
    <div class="container-fluid p-2" style="background-color: white">
        <div class="flash-message col-12">
            @if(Session::has('message'))
                <div class="alert {{Session::get('alert-class')}}">
                    {{session::get('message')}}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                </div>
            @endif
        </div>
        <div class="card p-2">
            <div class="card-header text-center font-weight-bold text-uppercase">Examen des appareils</div>
            <div class="card-body">
                <form action="{{route('examen-appareil.store')}}" method="post">
                    @csrf
                    <div class="col">
                        <div class="form-group row">
                            <label for="nomexamen"  class="col-2 text-right col-form-label font-weight-bold">Nom Appareil<em style="color: red;">*</em> :</label>
                            <select id="nomexamen" name="nomexamen" onchange="examAppareil(this)" data-live-search="true" data-placeholder="Choisir" data-style="btn-outline-secondary"  class="col-4 selectpicker form-control @error('sit_matrimoniale') is-invalid @enderror">
                                <option value="uro-nephrologique">uro-néphrologique</option>
                                <option value="uro-nephrologique">nérologique</option>
                                <option value="cardiovasculaire">cardiovasculaire</option>
                                <option value="respiratoire">respiratoire</option>
                                <option value="digestif">digestif</option>
                                <option value="endocrinien">endocrinien</option>
                                <option value="Neurologique">spléno-ganglionaire</option>
                                <option value="cutaneo-phanerien">cutanéo-phanérien</option>
                                <option value="autre">Autres</option>
                            </select>
                            <label for="date"  class="col-2 text-right col-form-label font-weight-bold">Date<em style="color: red;">*</em> :</label>
                            <input type="date" id="date" name="dateexamen"  class="col-4 form-control">
                        </div>
                    </div>

                    <div class="col" id="nom_autre" style="display: none">
                        <div class="form-group row">
                            <label  class="col-2 text-right col-form-label font-weight-bold">Nom de l'examen<em style="color: red;">*</em> :</label>
                            <input type="text" name="nom_autre" class="col-10 form-control">
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group row">
                            <label for="examen"  class="col-2 text-right col-form-label font-weight-bold">Informations Examen<em style="color: red;">*</em> :</label>
                            <textarea name="infoexamen" id="examen"  class="col-10 form-control" rows="3"></textarea>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary mr-1">Enregistrer</button>
                        <div class="btn btn-secondary"><a style="color: white" href="{{route('bilan-sanguin.create')}}">Suivant</a></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
