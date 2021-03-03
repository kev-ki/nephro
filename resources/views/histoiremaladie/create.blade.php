


@extends('layouts.medecinlayout')

@section('content')

       <div class="container" style="height: 30px; background-color: blue;"> <h1 style="text-align: center;font-weight: bold; color: white;">Histoire de la maladie</h1></div> <br>
      <br>
       
       	       <form action="{{route('histoiremaladie.store')}}" method="post">
       	          @csrf
       	          <div class="col">
       	          	<div class="form-group row">
       	          	 <label class=" col-sm-2 font-weight-bold" >histoire de la maladie:</label>
       	          	<textarea class="form-control col-sm-7"  name="histoiremaladie" style="height: 140px;" required="true"></textarea>
       	          </div>
       	          </div>
       	           
       	          <center><button class="btn btn-primary">enregistrer</button></center>
               </form>
               <br><br><br>
               <center><a href="{{route('uronephrologie.create')}}" class="btn btn-primary">suivant</a></center>
        
@endsection



