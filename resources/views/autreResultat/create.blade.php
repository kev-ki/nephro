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
            <div class="card-header text-center font-weight-bold text-uppercase ">Autres Resultats</div>
            <div class="card-body">
                <form action="{{route('autre-resultat.store')}}" method="post">
                    @csrf
                    <div class="col">
                        <div class="form-group row">
                            <label class="text-right col-form-label col-2 font-weight-bold">Fond d’œil :</label>
                            <input type="text" name="fondoeil" class="form-control col-10">
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group row">
                            <label class="text-right col-form-label col-2 font-weight-bold">Autres (à préciser) :</label>
                            <input type="text" name="autre" placeholder="Nom examen" class="form-control col-6">
                            <input type="text" name="resultat" placeholder="Resultat" class="form-control col-4">
                        </div>
                        <p class="font-italic font-weight-normal" style="font-size: small; margin-top: -20px">&nbsp; ** optionnel **</p>
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary mr-1">Enregistrer</button>
                        <div class="btn btn-secondary"><a style="color: white" href="{{route('consultation_fin_create')}}">Suivant</a></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
