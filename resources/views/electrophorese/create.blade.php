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
            <div class="card-header text-center font-weight-bold text-uppercase p-2">Electrophoreses Des Proteines</div>
            <div class="card-body">
                <form action="{{route('electrophorese.store')}}" method="post">
                    @csrf
                    <div class="col">
                        <div class="form-group row">
                            <label class="text-right col-form-label col-2 font-weight-bold">Date<em style="color: red;">*</em> :</label>
                            <input type="date" name="date" class="form-control col-4" >
                            <label class="text-right col-form-label col-2 font-weight-bold">Type Electrophorèse<em style="color: red;">*</em> :</label>
                            <select  name="type" data-placeholder="Choisir" data-style="btn-outline-secondary" class="col-4 form-control selectpicker">
                                <option value="proteine urinaire">Protéines urinaires</option>
                                <option value="proteine serique">Protéines sériques</option>
                            </select>
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group row">
                            <label class="text-right col-form-label col-2 font-weight-bold">Protide:</label>
                            <input type="text" name="protide" class="form-control col-4" >
                            <label class="text-right col-form-label col-2 font-weight-bold">Albumine: </label>
                            <input type="text" name="albumine" class="form-control col-4" >
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group row">
                            <label class="text-right col-form-label col-2 font-weight-bold">Alpha 1:</label>
                            <input type="text" name="alpha1" class="form-control col-4" >
                            <label class="text-right col-form-label col-2 font-weight-bold">Alpha 2:</label>
                            <input type="text" name="alpha2" class="form-control col-4" >
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group row">
                            <label class="text-right col-form-label col-2 font-weight-bold">Gamma:</label>
                            <input type="text" name="gamma" class="form-control col-4" >
                            <label class="text-right col-form-label col-2 font-weight-bold">Beta:</label>
                            <input type="text" name="beta" class="form-control col-4" >
                        </div>
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary mr-1">Enregistrer</button>
                        <div class="btn btn-secondary"><a style="color: white" href="{{route('serologie.create')}}">Suivant</a></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
