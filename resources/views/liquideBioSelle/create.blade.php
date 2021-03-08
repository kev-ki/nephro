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
            <div class="card-header text-center font-weight-bold text-uppercase ">Liquides Biologiques et Selles</div>
            <div class="card-body">
                <div class="row mb-2">
                    <p class="col-12 text-center font-weight-bold">Examen cytologique, chimique et bactériologique</p>
                    <p class="col-12 text-center">ECBU, Hémoculture, coproculture, urine, LCR, sérosité, autres liquides au cours d’une ponction : ascite, pleurésie…</p>
                </div>
                <form action="{{route('liquide-bio-selle.store')}}" method="post">
                    @csrf
                    <div class="col">
                        <div class="form-group row">
                            <label class="text-right col-form-label col-2 font-weight-bold">Date<em style="color: red;">*</em> :</label>
                            <input type="date" name="date" class="form-control col-4">
                            <label class="text-right col-form-label col-2 font-weight-bold">Nature<em style="color: red;">*</em> : </label>
                            <input type="text" name="nature" class="form-control col-4">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row">
                            <label class="text-right col-form-label col-2 font-weight-bold">Analyse<em style="color: red;">*</em> : </label>
                            <textarea class="form-control col-10" name="analyse"></textarea>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row">
                            <label class="text-right col-form-label col-2 font-weight-bold">Antibiogramme<em style="color: red;">*</em> : </label>
                            <textarea class="form-control col-10" name="antibiogramme"></textarea>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary mr-1">Enregistrer</button>
                        <div class="btn btn-secondary"><a style="color: white" href="{{route('image-endoscopie-anat.create')}}">Suivant</a></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
