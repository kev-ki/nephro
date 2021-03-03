
@extends('layouts.medecinlayout')

@section('content')
@extends('layouts.infirmierlayout')

@section('content')

   <center>
   	<div class="flash-message">
       	  @foreach(['danger','warning','succes','info'] as $mgs)
       	    @if(Session::has('alert-'.$mgs))
       	      <p class="alert alert-{{$mgs}}">{{Session::get('alert-'.$mgs)}}
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
       	      </p>
       	     @endif
       	  @endforeach
       	
       </div>
   </center>
   <div class="container">
       <h1 class="text-center mb-2" style="background-color: #01A9CB; height: 30px; font-weight: bold">Enregistrement du patient</h1>
       <ul class="nav nav-tabs mb-1  d-flex justify-content-center" id="table" role="tablist">
           <li class="nav-item" style="border: 5px solid #01A9CB; border-radius: 50%; font-size: 15px; padding: 1px 1px 1px 1px"><a class="nav-link active" id="page1_tab" data-toggle="tab" href="#page1" role="tab" aria-controls="page1" aria-selected="true">1</a></li>
           <li class="nav-item" style="border: 5px solid #01A9CB; border-radius: 50%; font-size: 15px; padding: 1px 1px 1px 1px"><a class="nav-link" id="page2_tab" data-toggle="tab" href="#page2" role="tab" aria-controls="page2" aria-selected="false">2</a></li>
           <!--        <li class="nav-item" style="border: 5px solid #01A9CB; border-radius: 50%; font-size: 15px; padding: 1px 1px 1px 1px"><a class="nav-link" id="page3_tab" data-toggle="tab" href="#page3" role="tab" aria-controls="page3" aria-selected="false">3</a></li>-->
       </ul>

       {{--==================================form===========================--}}

       <form action="{{ route('patient.store') }}" method="POST" class="table-responsive-sm">
           @csrf
           <div class="mb-5 tab-content" id="pages_content">
               <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="page1_tab" id="page1">
                      <div class="col">
         <div class="form-group row">
            <label class="col-form-label col-sm-2 font-weight-bold">Date:</label>
            <input type="date" name="date" class="form-control col-sm-4" required="true">
            <label class="col-form-label col-sm-2 font-weight-bold">Azotémie:</label>
            <input type="text" name="azotemie" class="form-control col-sm-4" required="true">
         </div>
      </div>
      <div class="col">
         <div class="form-group row">
            <label class="col-form-label col-sm-2 font-weight-bold">Créatininémie</label>
            <input type="text" name="creatinemie" class="form-control col-sm-4" required="true">
            <label class="col-form-label col-sm-2 font-weight-bold">Clairance </label>
            <input type="text" name="clairance" class="form-control col-sm-4" required="true">
         </div>
      </div>
      <div class="col">
         <div class="form-group row">
            <label class="col-form-label col-sm-2 font-weight-bold">Uricémie</label>
            <input type="text" name="uricemie" class="form-control col-sm-4" required="true">
            <label class="col-form-label col-sm-2 font-weight-bold">Natremie </label>
            <input type="text" name="natremie" class="form-control col-sm-4" required="true">
         </div>
      </div>
      <div class="col">
         <div class="form-group row">
            <label class="col-form-label col-sm-2 font-weight-bold">Kaliémie</label>
            <input type="text" name="kaliemie" class="form-control col-sm-4" required="true">
            <label class="col-form-label col-sm-2 font-weight-bold">Chlorémie </label>
            <input type="text" name="choremie" class="form-control col-sm-4" required="true">
         </div>
      </div>
      <div class="col">
         <div class="form-group row">
            <label class="col-form-label col-sm-2 font-weight-bold">Phosphorémie:</label>
            <input type="text" name="phosphoremie" class="form-control col-sm-4" required="true">
            <label class="col-form-label col-sm-2 font-weight-bold">Calcémie:</label>
            <input type="text" name="calcemie" class="form-control col-sm-4" required="true">
         </div>
         

      </div><div class="col">
         <div class="form-group row">
            <label class="col-form-label col-sm-2 font-weight-bold">Magnésémie</label>
            <input type="text" name="magnesemie" class="form-control col-sm-4" required="true">
            <label class="col-form-label col-sm-2 font-weight-bold">Bicarbonatemie</label>
            <input type="text" name="bicarbonatemie" class="form-control col-sm-4" required="true">
         </div>

      </div><div class="col">
         <div class="form-group row">
            <label class="col-form-label col-sm-2 font-weight-bold">Protidémie:</label>
            <input type="text" name="protidemie" class="form-control col-sm-4" required="true">
            <label class="col-form-label col-sm-2 font-weight-bold">Troponine </label>
            <input type="text" name="troponine" class="form-control col-sm-4" required="true">
         </div>
      </div><div class="col">
         <div class="form-group row">
            <label class="col-form-label col-sm-2 font-weight-bold">Phosphatases alc</label>
            <input type="text" name="phosphatase" class="form-control col-sm-4" required="true">
            <label class="col-form-label col-sm-2 font-weight-bold"> PTH/Vit D</label>
            <input type="text" name="pth" class="form-control col-sm-4" required="true">
         </div>

      </div><div class="col">
         <div class="form-group row">
            <label class="col-form-label col-sm-2 font-weight-bold">PU de 24H (vol)</label>
            <input type="text" name="pu" class="form-control col-sm-4" required="true">
            <label class="col-form-label col-sm-2 font-weight-bold"> ASAT/ALAT:</label>
            <input type="text" name="asat" class="form-control col-sm-4" required="true">
         </div>
      </div><div class="col">
         <div class="form-group row">
            <label class="col-form-label col-sm-2 font-weight-bold">Bil Total/ Conj</label>
            <input type="text" name="Bil" class="form-control col-sm-4" required="true">
            <label class="col-form-label col-sm-2 font-weight-bold"> Gamma GT</label>
            <input type="text" name="gammagt" class="form-control col-sm-4" required="true">
         </div>
      </div>


      
                   <div class="form-group row">
                       <div class="col-xs-12 d-inline-flex">
                           <button class="btn btn-lg btn-danger mr-2" type="reset"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-repeat" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                   <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z"/>
                                   <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z"/>
                               </svg>Vider</button>
                           <div class="pull-right">
                               <a class="btn btn-lg btn-success mr-2" id="page2_tab" data-toggle="tab" href="#page2" role="tab" aria-controls="page2" aria-selected="false">Suivant <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-right-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                       <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                       <path fill-rule="evenodd" d="M4 8a.5.5 0 0 0 .5.5h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5A.5.5 0 0 0 4 8z"/>
                                   </svg></a>
                           </div>
                       </div>
                   </div>
               </div>

               {{--===============================page 2===========================--}}
               <div class="tab-pane fade" role="tabpanel" aria-labelledby="page2_tab" id="page2">
                    <div class="col">
         <div class="form-group row">
            <label class="col-form-label col-sm-2 font-weight-bold">CPK</label>
            <input type="text" name="cpk" class="form-control col-sm-4" required="true">
            <label class="col-form-label col-sm-2 font-weight-bold">LDH</label>
            <input type="text" name="ldh" class="form-control col-sm-4" required="true">
         </div>
      </div>
      </div><div class="col">
         <div class="form-group row">
            <label class="col-form-label col-sm-2 font-weight-bold"></label>
            <input type="text" name="" class="form-control col-sm-4" required="true">
            <label class="col-form-label col-sm-2 font-weight-bold"></label>
            <input type="text" name="" class="form-control col-sm-4" required="true">
         </div>
      </div>
      </div><div class="col">
         <div class="form-group row">
            <label class="col-form-label col-sm-2 font-weight-bold">Myoglobine</label>
            <input type="text" name="myoglobine" class="form-control col-sm-4" required="true">
            <label class="col-form-label col-sm-2 font-weight-bold">Amylas/Lipasémie</label>
            <input type="text" name="amylas" class="form-control col-sm-4" required="true">
         </div>
      </div>
      </div><div class="col">
         <div class="form-group row">
            <label class="col-form-label col-sm-2 font-weight-bold">Glycémie/ HbA1C</label>
            <input type="text" name="glycemie" class="form-control col-sm-4" required="true">
            <label class="col-form-label col-sm-2 font-weight-bold">Cholestérol total</label>
            <input type="text" name="cholesterol" class="form-control col-sm-4" required="true">
         </div>
      </div>
      </div><div class="col">
         <div class="form-group row">
            <label class="col-form-label col-sm-2 font-weight-bold">HDL/ LDL chol</label>
            <input type="text" name="hd" class="form-control col-sm-4" required="true">
            <label class="col-form-label col-sm-2 font-weight-bold">Hb</label>
            <input type="text" name="hb" class="form-control col-sm-4" required="true">
         </div>
      </div>
      </div><div class="col">
         <div class="form-group row">
            <label class="col-form-label col-sm-2 font-weight-bold">VGM/TCMH</label>
            <input type="text" name="vgm" class="form-control col-sm-4" required="true">
            <label class="col-form-label col-sm-2 font-weight-bold">GB</label>
            <input type="text" name="gb" class="form-control col-sm-4" required="true">
         </div>
      </div>
      </div><div class="col">
         <div class="form-group row">
            <label class="col-form-label col-sm-2 font-weight-bold">Plaquettes </label>
            <input type="text" name="plaquette" class="form-control col-sm-4" required="true">
            <label class="col-form-label col-sm-2 font-weight-bold">Leu/Lymp/Eosi%</label>
            <input type="text" name="leu" class="form-control col-sm-4" required="true">
         </div>
      </div>
      </div><div class="col">
         <div class="form-group row">
            <label class="col-form-label col-sm-2 font-weight-bold">Réticulocytes </label>
            <input type="text" name="reticulocyte" class="form-control col-sm-4" required="true">
            <label class="col-form-label col-sm-2 font-weight-bold">CRP /VS</label>
            <input type="text" name="crp" class="form-control col-sm-4" required="true">
         </div>
      </div>
      </div><div class="col">
         <div class="form-group row">
            <label class="col-form-label col-sm-2 font-weight-bold">Fer sérique </label>
            <input type="text" name="ferserique" class="form-control col-sm-4" required="true">
            <label class="col-form-label col-sm-2 font-weight-bold">Sat Transferrine</label>
            <input type="text" name="satetranferine" class="form-control col-sm-4" required="true">
         </div>
      </div>

      </div><div class="col">
         <div class="form-group row">
            <label class="col-form-label col-sm-2 font-weight-bold">B12 sanguin </label>
            <input type="text" name="b12sanguin" class="form-control col-sm-4" required="true">
            <label class="col-form-label col-sm-2 font-weight-bold">Folate sanguin</label>
            <input type="text" name="folatesanguin" class="form-control col-sm-4" required="true">
         </div>
      </div>
      </div><div class="col">
         <div class="form-group row">
            <label class="col-form-label col-sm-2 font-weight-bold">Autre </label>
            <input type="text" name="autre1" class="form-control col-sm-4" required="true">
            <label class="col-form-label col-sm-2 font-weight-bold">Autre</label>
            <input type="text" name="autre2" class="form-control col-sm-4" required="true">
         </div>
      </div>
      <label class="col-form-label col-sm-2 font-weight-bold">Autre </label>
            <input type="text" name="autre3" class="form-control col-sm-4" required="true">


                   <div class="form-group row">
                       <div class="col-xs-12 d-inline-flex">
                           <div class="pull-right">
                               <a class="btn btn-lg btn-success mr-2" id="page1_tab" data-toggle="tab" href="#page1" role="tab" aria-controls="page1" aria-selected="true"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                       <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                       <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
                                   </svg> Précédent</a>
                           </div>

                           <div class="pull-right">
                               <!--                            <a class="btn btn-lg btn-success mr-2" id="page3_tab" data-toggle="tab" href="#page3" role="tab" aria-controls="page3" aria-selected="false">Suivant <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-right-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                   <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                                                   <path fill-rule="evenodd" d="M4 8a.5.5 0 0 0 .5.5h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5A.5.5 0 0 0 4 8z"/>
                                                               </svg></a>-->

                               <button type="submit" class="btn btn-lg btn-primary">Enregistrer</button>
                           </div>
                       </div>
                   </div>
                   {{--=============================page 3==============================--}}
               </div>
           </div>
       </form>
   </div>
@endsection



@endsection