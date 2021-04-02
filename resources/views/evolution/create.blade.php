@extends('layouts.medlayout')

@section('content')
    <h1 class="text-center" style="background-color: #01A9CB; height: 30px; font-size: large; padding-top: 5px; font-weight: bold">Evolution</h1>
    <div class="container" style="background-colotr: white">
        <div class="flash-message col-md-12">
            @if(Session::has('message'))
                <div class="alert {{Session::get('alert-class')}}">
                    {{session::get('message')}}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                </div>
            @endif
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{route('evolution.store')}}" method="post">
                    @csrf
                    <div class="col">
                        {{--<div class="form-group row">
                            <label class="text-right col-md-form-label col-md-2 font-weight-bold">Date:</label>
                            <input type="date" name="date" class="form-control col-md-10">
                        </div>--}}
                        <div class="form-group row">
                            <label class="text-right col-md-form-label col-md-3 font-weight-bold">Informations sur l'évolution de la maladie<em style="color: red;">*</em> :</label>
                            <textarea type="text" name="infos_evolution" class="form-control col-md-9 @error('infos_evolution') is-invalid @enderror" style="height: 200px;"></textarea>
                        </div>
                        @error('infos_evolution')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary mr-1">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
