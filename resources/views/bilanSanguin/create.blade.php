@extends('layouts.medlayout')

@section('content')
    <h1 class="text-center" style="background-color: #01A9CB; height: 30px; font-size: large; padding-top: 5px; font-weight: bold">Examens Paracliniques</h1>
    <div class="container-fluid p-2" style="background-color: white">
        <div class="flash-message col-md-12">
            @if(Session::has('message'))
                <div class="alert {{Session::get('alert-class')}}">
                    {{session::get('message')}}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                </div>
            @endif
        </div>
        <div class="card p-2">
            <div class="card-header text-center font-weight-bold text-uppercase p-2">Bilan Sanguins
                <ul class="nav nav-tabs mb-1  d-flex justify-content-center" id="table" role="tablist">
                    <li class="nav-item bouton-forme" style="font-size: 15px;"><a class="nav-link active" id="page1_tab" data-toggle="tab" href="#page1" role="tab" aria-controls="page1" aria-selected="true">Page 1</a></li>
                    <li class="nav-item ml-5 bouton-forme" style="font-size: 15px"><a class="nav-link" id="page2_tab" data-toggle="tab" href="#page2" role="tab" aria-controls="page2" aria-selected="false">Page 2</a></li>
                    <li class="nav-item ml-5 bouton-forme" style="font-size: 15px"><a class="nav-link" id="page3_tab" data-toggle="tab" href="#page3" role="tab" aria-controls="page3" aria-selected="false">Page 3</a></li>
                    <li class="nav-item ml-5 bouton-forme" style="font-size: 15px"><a class="nav-link" id="page4_tab" data-toggle="tab" href="#page4" role="tab" aria-controls="page4" aria-selected="false">Page 4</a></li>
                </ul>
            </div>
            <div class="card-body">
                <form action="{{route('bilan-sanguin.store')}}" method="post">
                    @csrf
                    <div class="tab-content" id="pages_content">
                        <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="page1_tab" id="page1">
                            <div class="col">
                                <div class="form-group row">
                                    <label class="text-right col-md-form-label col-md-2 font-weight-bold">Date:</label>
                                    <input type="date" name="date" class="form-control col-md-4" >
                                    <label class="text-right col-md-form-label col-md-2 font-weight-bold">Azotémie:</label>
                                    <input type="text" name="azotemie" class="form-control col-md-4" >
                                </div>
                                <div class="form-group row">
                                    <label class="text-right col-md-form-label col-md-2 font-weight-bold">Créatininémie</label>
                                    <input type="text" name="creatinemie" class="form-control col-md-4" >
                                    <label class="text-right col-md-form-label col-md-2 font-weight-bold">Clairance </label>
                                    <input type="text" name="clairance" class="form-control col-md-4" >
                                </div>
                                <div class="form-group row">
                                    <label class="text-right col-md-form-label col-md-2 font-weight-bold">Uricémie</label>
                                    <input type="text" name="uricemie" class="form-control col-md-4" >
                                    <label class="text-right col-md-form-label col-md-2 font-weight-bold">Natremie </label>
                                    <input type="text" name="natremie" class="form-control col-md-4" >
                                </div>
                                <div class="form-group row">
                                    <label class="text-right col-md-form-label col-md-2 font-weight-bold">Kaliémie</label>
                                    <input type="text" name="kaliemie" class="form-control col-md-4" >
                                    <label class="text-right col-md-form-label col-md-2 font-weight-bold">Chlorémie </label>
                                    <input type="text" name="choremie" class="form-control col-md-4" >
                                </div>
                                <div class="form-group row">
                                    <label class="text-right col-md-form-label col-md-2 font-weight-bold">Phosphorémie:</label>
                                    <input type="text" name="phosphoremie" class="form-control col-md-4" >
                                    <label class="text-right col-md-form-label col-md-2 font-weight-bold">Calcémie:</label>
                                    <input type="text" name="calcemie" class="form-control col-md-4" >
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" role="tabpanel" aria-labelledby="page2_tab" id="page2">
                            <div class="col">
                                <div class="form-group row">
                                    <label class="text-right col-md-form-label col-md-2 font-weight-bold">Magnésémie</label>
                                    <input type="text" name="magnesemie" class="form-control col-md-4" >
                                    <label class="text-right col-md-form-label col-md-2 font-weight-bold">Bicarbonatemie</label>
                                    <input type="text" name="bicarbonatemie" class="form-control col-md-4" >
                                </div>
                                <div class="form-group row">
                                    <label class="text-right col-md-form-label col-md-2 font-weight-bold">Protidémie:</label>
                                    <input type="text" name="protidemie" class="form-control col-md-4" >
                                    <label class="text-right col-md-form-label col-md-2 font-weight-bold">Troponine </label>
                                    <input type="text" name="troponine" class="form-control col-md-4" >
                                </div>
                                <div class="form-group row">
                                    <label class="text-right col-md-form-label col-md-2 font-weight-bold">Phosphatases alc</label>
                                    <input type="text" name="phosphatase" class="form-control col-md-4" >
                                    <label class="text-right col-md-form-label col-md-2 font-weight-bold"> PTH/Vit D</label>
                                    <input type="text" name="pth" class="form-control col-md-4" >
                                </div>
                                <div class="form-group row">
                                    <label class="text-right col-md-form-label col-md-2 font-weight-bold">PU de 24H (vol)</label>
                                    <input type="text" name="pu" class="form-control col-md-4" >
                                    <label class="text-right col-md-form-label col-md-2 font-weight-bold"> ASAT/ALAT:</label>
                                    <input type="text" name="asat" class="form-control col-md-4" >
                                </div>
                                <div class="form-group row">
                                    <label class="text-right col-md-form-label col-md-2 font-weight-bold">Bil Total/ Conj</label>
                                    <input type="text" name="Bil" class="form-control col-md-4" >
                                    <label class="text-right col-md-form-label col-md-2 font-weight-bold"> Gamma GT</label>
                                    <input type="text" name="gammagt" class="form-control col-md-4" >
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" role="tabpanel" aria-labelledby="page3_tab" id="page3">
                            <div class="col">
                                <div class="form-group row">
                                    <label class="text-right col-md-form-label col-md-2 font-weight-bold">CPK</label>
                                    <input type="text" name="cpk" class="form-control col-md-4" >
                                    <label class="text-right col-md-form-label col-md-2 font-weight-bold">LDH</label>
                                    <input type="text" name="ldh" class="form-control col-md-4" >
                                </div>
                                <div class="form-group row">
                                    <label class="text-right col-md-form-label col-md-2 font-weight-bold">Myoglobine</label>
                                    <input type="text" name="myoglobine" class="form-control col-md-4" >
                                    <label class="text-right col-md-form-label col-md-2 font-weight-bold">Amylas/Lipasémie</label>
                                    <input type="text" name="amylas" class="form-control col-md-4" >
                                </div>
                                <div class="form-group row">
                                    <label class="text-right col-md-form-label col-md-2 font-weight-bold">Glycémie/ HbA1C</label>
                                    <input type="text" name="glycemie" class="form-control col-md-4" >
                                    <label class="text-right col-md-form-label col-md-2 font-weight-bold">Cholestérol total</label>
                                    <input type="text" name="cholesterol" class="form-control col-md-4" >
                                </div>
                                <div class="form-group row">
                                    <label class="text-right col-md-form-label col-md-2 font-weight-bold">HDL/ LDL chol</label>
                                    <input type="text" name="hd" class="form-control col-md-4" >
                                    <label class="text-right col-md-form-label col-md-2 font-weight-bold">Hb</label>
                                    <input type="text" name="hb" class="form-control col-md-4" >
                                </div>
                                <div class="form-group row">
                                    <label class="text-right col-md-form-label col-md-2 font-weight-bold">VGM/TCMH</label>
                                    <input type="text" name="vgm" class="form-control col-md-4" >
                                    <label class="text-right col-md-form-label col-md-2 font-weight-bold">GB</label>
                                    <input type="text" name="gb" class="form-control col-md-4" >
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" role="tabpanel" aria-labelledby="page4_tab" id="page4">
                            <div class="col">
                                <div class="form-group row">
                                    <label class="text-right col-md-form-label col-md-2 font-weight-bold">Plaquettes </label>
                                    <input type="text" name="plaquette" class="form-control col-md-4" >
                                    <label class="text-right col-md-form-label col-md-2 font-weight-bold">Leu/Lymp/Eosi%</label>
                                    <input type="text" name="leu" class="form-control col-md-4" >
                                </div>
                                <div class="form-group row">
                                    <label class="text-right col-md-form-label col-md-2 font-weight-bold">Réticulocytes </label>
                                    <input type="text" name="reticulocyte" class="form-control col-md-4" >
                                    <label class="text-right col-md-form-label col-md-2 font-weight-bold">CRP /VS</label>
                                    <input type="text" name="crp" class="form-control col-md-4" >
                                </div>
                                <div class="form-group row">
                                    <label class="text-right col-md-form-label col-md-2 font-weight-bold">Fer sérique </label>
                                    <input type="text" name="ferserique" class="form-control col-md-4" >
                                    <label class="text-right col-md-form-label col-md-2 font-weight-bold">Sat Transferrine</label>
                                    <input type="text" name="satetranferine" class="form-control col-md-4" >
                                </div>
                                <div class="form-group row">
                                    <label class="text-right col-md-form-label col-md-2 font-weight-bold">B12 sanguin </label>
                                    <input type="text" name="b12sanguin" class="form-control col-md-4" >
                                    <label class="text-right col-md-form-label col-md-2 font-weight-bold">Folate sanguin</label>
                                    <input type="text" name="folatesanguin" class="form-control col-md-4" >
                                </div>
                            </div>

                            <div class="col" align="center">
                               <div class="form-group row font-weight-bold" style="font-size: 17px">
                                   <div class="offset-5"></div>
                                   <input type="checkbox" onclick="fonctionParaclinic(this)" class="custom-checkbox col-md-1">Autre bilan sanguin  <em class="font-italic font-weight-normal" style="font-size: small">&nbsp; ** optionnel **</em>
                               </div>
                            </div>

                            <div class="col" id="autre_para" style="display: none">
                                <div class="form-group row">
                                    <div class="offset-md-2"></div>
                                    <input type="text" name="nom_autre" placeholder="Nom" class="form-control col-md-5" >
                                    <input type="text" name="resultat" placeholder="Résultat" class="form-control col-md-5" >
                                </div>
                                <div class="form-group row">
                                    <div class="offset-md-2"></div>
                                    <input type="text" name="nom_autre1" placeholder="Nom" class="form-control col-md-5">
                                    <input type="text" name="resultat1" placeholder="Résultat" class="form-control col-md-5">
                                </div>
                            </div>

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary mr-1">Enregistrer</button>
                                <div class="btn btn-secondary"><a style="color: white" href="{{route('electrophorese.create')}}">Suivant</a></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
