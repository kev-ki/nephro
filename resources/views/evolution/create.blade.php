@extends('layouts.medlayout')

@section('content')
    <h1 class="text-center" style="background-col-mdor: #01A9CB; height: 30px; font-size: large; padding-top: 5px; font-weight: bold">Evolution</h1>
    <div class="container-fluid p-2" style="background-col-mdor: white">
        <div class="flash-message col-md-12">
            @if(Session::has('message'))
                <div class="alert {{Session::get('alert-class')}}">
                    {{session::get('message')}}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                </div>
            @endif
        </div>
        <div class="card p-2">
            <div class="card-body">
                <form action="{{route('evolution.store')}}" method="post">
                    @csrf
                    <div class="col-md">
                        {{--<div class="form-group row">
                            <label class="text-right col-md-form-label col-md-2 font-weight-bold">Date:</label>
                            <input type="date" name="date" class="form-control col-md-10">
                        </div>--}}
                        <div class="form-group row">
                            <label class="text-right col-md-form-label col-md-3 font-weight-bold">Informations sur l'évolution de la maladie:</label>
                            <textarea type="date" name="date" class="form-control col-md-9" rows="8"></textarea>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary mr-1">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
