@extends('layouts.medlayout')

@section('content')
    <h1 class="text-center" style="background-color: #01A9CB; height: 30px; font-size: large; padding-top: 5px; font-weight: bold">Antécédents Chirurgicaux</h1>
    <div class="container-fluid p-2" style="background-color: white">
        <div class="flash-message col-md-12">
            @if(Session::has('message'))
                <div class="alert {{Session::get('alert-class')}}">
                    {{session::get('message')}}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                </div>
            @endif
        </div>
        <div class="card p-2">
            <div class="card-body">
                <form action="{{route('chirurgicaux.store')}}" method="post">
                    @csrf
                    <div class="col">
                        <div class="form-group row">
                            <label class="col-md-2 font-weight-bold text-right">Date:</label>
                            <input type="date" name="date" class="col-md-10 form-control">
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 font-weight-bold text-right">Informations des antécédents:</label>
                            <textarea class="form-control col-md-10" style="height: 200px;" name="chirurgical" placeholder="Antécédents chirurgucaux"></textarea>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary mr-1">Enregistrer</button>
                        <div class="btn btn-secondary"><a style="color: white" href="{{route('genico-obstetrique.create')}}">Suivant</a></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
