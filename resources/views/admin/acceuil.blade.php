@extends('layouts.adminlayout')

@section('content')
   <div class="container-fluid p-2" style="background-color: white">
       <div class="row mb-2">
           <div class="col-md-4">
               <div class="card text-white text-center p-3" style="background-color: #01A9CB">
                   <p>{{$user}}</p>
                   <p>Utilisateurs</p>
               </div>
           </div>

           <div class="col-md-4">
               <div class="card text-white text-center p-3" style="background-color: #01A9CB">
                   <p>{{$doc}}</p>
                   <p>Dossiers</p>
               </div>
           </div>

           <div class="col-md-4">
               <div class="card text-white text-center p-3" style="background-color: #01A9CB">
                   <p>{{$patient}}</p>
                   <p>Patients</p>
               </div>
           </div>
       </div>

       <div class="row mb-2">

       </div>
   </div>
@endsection
