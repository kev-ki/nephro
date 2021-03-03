


@extends('layouts.medecinlayout')

@section('content')
<div class="container" style="height: 30px; background-color: blue;"><h1 style="color: white; text-align: center;">Debut de consultation</h1></div><br><br>

<center><a href="{{route('histoiremaladie.create')}}" class="btn btn-primary" style="height: 120px; width: 110px;">Phase interrogatoire</a></center><br><br>
<center><a href="{{route('examengeneral.create')}}" class="btn btn-primary" style="height: 120px; width: 110px;">phase des examens</a></center>

@endsection



