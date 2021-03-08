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
            <div class="card-header text-center font-weight-bold text-uppercase p-2">Parasitologie</div>
            <div class="card-body">
                <form action="{{route('parasitologie.store')}}" method="post">
                    @csrf
                    <div class="col">
                        <div class="form-group row">
                            <label class="text-right col-form-label col-2 font-weight-bold">Date<em style="color: red;">*</em> :</label>
                            <input type="date" name="date" class="form-control col-4">
                            <label class="text-right col-form-label col-2 font-weight-bold">Goutte épaisse /DP:</label>
                            <input type="text" name="goutteEpaisse" class="form-control col-4">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row">
                            <label class="text-right col-form-label col-2 font-weight-bold">Selles POK</label>
                            <input type="text" name="sellePOK" class="form-control col-4">
                            <label class="text-right col-form-label col-2 font-weight-bold">BMR:</label>
                            <input type="text" name="bmr" class="form-control col-4">
                        </div>
                    </div>

                    <div class="col" align="center">
                        <div class="form-group row font-weight-bold" style="font-size: 17px">
                            <div class="offset-5"></div>
                            <input type="checkbox" onclick="fonctionParaclinic(this)" class="custom-checkbox col-md-1">Autre parasitologie  <em class="font-italic font-weight-normal" style="font-size: small">&nbsp; ** optionnel **</em>
                        </div>
                    </div>

                    <div class="col" id="autre_para" style="display: none">
                        <div class="form-group row">
                            <div class="offset-md-2"></div>
                            <input type="text" name="nom_autre" id="nom_autre" placeholder="Nom" class="form-control col-md-5" >
                            <input type="text" name="resultat" id="resultat" placeholder="Résultat" class="form-control col-md-5" >
                        </div>
                        <div class="form-group row">
                            <div class="offset-md-2"></div>
                            <input type="text" name="nom_autre1" id="nom_autre1" placeholder="Nom" class="form-control col-md-5">
                            <input type="text" name="resultat1" id="resultat1" placeholder="Résultat" class="form-control col-md-5">
                        </div>
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary mr-1">Enregistrer</button>
                        <div class="btn btn-secondary"><a style="color: white" href="{{route('hemostase.create')}}">Suivant</a></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
