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
            <div class="card-header text-center font-weight-bold text-uppercase p-2">Hémostase</div>
            <div class="card-body">
                <form action="{{route('hemostase.store')}}" method="post">
                    @csrf
                    <div class="col">
                        <div class="form-group row">
                            <label class="text-right col-form-label col-2 font-weight-bold">Date:</label>
                            <input type="date" name="date" class="form-control col-4">
                            <label class="text-right col-form-label col-2 font-weight-bold">TP:</label>
                            <input type="text" name="tp" class="form-control col-4">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row">
                            <label class="text-right col-form-label col-2 font-weight-bold">TCA:</label>
                            <input type="text" name="tca" class="form-control col-4">
                            <label class="text-right col-form-label col-2 font-weight-bold">INR:</label>
                            <input type="text" name="inr" class="form-control col-4">
                        </div>
                        <div class="form-group row">
                            <label class="text-right col-form-label col-2 font-weight-bold">TCK:</label>
                            <input type="text" name="tck" class="form-control col-4">
                            <label class="text-right col-form-label col-2 font-weight-bold">D-Dimères:</label>
                            <input type="text" name="dimere" class="form-control col-4">
                        </div>
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary mr-1">Enregistrer</button>
                        <div class="btn btn-secondary"><a style="color: white" href="{{route('endocrinologie.create')}}">Suivant</a></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
