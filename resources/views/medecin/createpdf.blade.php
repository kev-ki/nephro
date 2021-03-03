<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/bootstrap-select.css')}}" rel="stylesheet">
    <link href="{{asset('css/simple-sidebar.css')}}" rel="stylesheet">
    <link href="{{asset('css/profile.css')}}" rel="stylesheet">

</head>
<body>
    <h1 style="text-align: center;" class="font-weight-bold" style="text-decoration: underline;">CHUSS BOBO service de néphrologie-dialyse les statistiques actuelles</h1><br>
    <center><h1 class="font-weight-bold">statistique depuis la mise en place du système</h1></center>
    <table class="table table-bordered">
        <thead>

        <tr>
            <th scope="col">Libellé</th>
            <th scope="col">valeur</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>nombre de patient:</td>
            <td>{{$nombrepatient}}</td>
        </tr>
        <tr>
            <td>nombre de femme:</td>
            <td>{{$femme}}</td>
        </tr>
        <tr>
            <td>nombre d'homme:</td>
            <td>{{$homme}}</td>
        </tr>
        <tr>
            <td>pourcentage des hommes:</td>
            <td>{{$poucentagehomme}}%</td>
        </tr>
        <tr>
            <td>pourcentage des femmes:</td>
            <td>{{$poucentagefemme}}%</td>
        </tr>
        <tr>
            <td>nombre de patients superieur à 18 ans:</td>
            <td>{{$sup18}}</td>
        </tr>
        <tr>
            <td>nombre de patients inférieur à 5 ans:</td>
            <td>{{$inf5}}</td>
        </tr>
        <tr>
            <td>nombre de patients stritements compris entre 5 à 18 ans:</td>
            <td>{{$compris518}}</td>
        </tr>
        <tr>
            <td>pourcentage des patients superieur à 18 ans:</td>
            <td>{{$pourcentagesup18}}%</td>
        </tr>
        <tr>
            <td>pourcentage des patients inferieur à 5 ans:</td>
            <td>{{$pourcentageinf5}}%</td>
        </tr>
        <tr>
            <td>pourcentage des patients strictement compris entre 5 à 18 ans</td>
            <td>{{$pourcentagecompris518}}%</td>
        </tr>
        <tr>
            <td>âge maximal</td>
            <td>{{$maxage}}</td>
        </tr>
        <tr>
            <td>âge minimun</td>
            <td>{{$minage}}</td>
        </tr>
        <tr>
            <td>moyenne</td>
            <td>{{$moyage}}</td>
        </tr>
        <tr>
            <td>variance d'âge</td>
            <td>{{$variance}}</td>
        </tr>
        <tr>
            <td>écart type</td>
            <td>{{$ecartype}}</td>
        </tr>
        </tbody>
    </table>

    <div style="height: 170px;"></div>
    <center><h1 class="font-weight-bold">statistique de l'année en cour</h1></center>
    <table class="table table-bordered">
        <thead>

        <tr>
            <th scope="col">Champ</th>
            <th scope="col">valeur</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>nombre de patient:</td>
            <td>{{$nouveaupatient}}</td>
        </tr>
        <tr>
            <td>nombre de femme:</td>
            <td>{{$nouveaufemme}}</td>
        </tr>
        <tr>
            <td>nombre d'homme:</td>
            <td>{{$nouveauhomme}}</td>
        </tr>
        <tr>
            <td>pourcentage des hommes:</td>
            <td>{{$pourcentagenouveauhomme}}%</td>
        </tr>
        <tr>
            <td>pourcentage des femmes:</td>
            <td>{{$pourcentagenouveaufemme}}%</td>
        </tr>
        <tr>
            <td>nombre de patients superieur à 18 ans:</td>
            <td>{{$nouveausup18}}</td>
        </tr>
        <tr>
            <td>nombre de patients inférieur à 5 ans:</td>
            <td>{{$nouveauinf5}}</td>
        </tr>
        <tr>
            <td>nombre de patients stritements compris entre 5 à 18 ans:</td>
            <td>{{$nouveaucompris518}}</td>
        </tr>
        <tr>
            <td>pourcentage des patients superieur à 18 ans:</td>
            <td>{{$pourcentagenouveausup18}}%</td>
        </tr>
        <tr>
            <td>pourcentage des patients inferieur à 5 ans:</td>
            <td>{{$pourcentagenouveauinf5}}%</td>
        </tr>
        <tr>
            <td>pourcentage des patients strictement compris entre 5 à 18 ans</td>
            <td>{{$pourcentagenouveaucompris518}}%</td>
        </tr>
        <tr>
            <td>âge maximun</td>
            <td>{{$nouveaumaxage}}</td>
        </tr>
        <tr>
            <td>âge minimun</td>
            <td>{{$nouveauminage}}</td>
        </tr>
        <tr>
            <td> moyenne</td>
            <td>{{$nouveaumoyage}}</td>
        </tr>
        <tr>
            <td>variance d'âge</td>
            <td>{{$nouveauvariance}}</td>
        </tr>
        <tr>
            <td>écart type</td>
            <td>{{$nouveauecartype}}</td>
        </tr>
        </tbody>
    </table>

    <div style="height: 30px;"></div>
    <center><h1 class="font-weight-bold">les hospitalisation</h1></center>
    <table class="table table-bordered">
        <thead>

        <tr>
            <th scope="col">Champ</th>
            <th scope="col">valeur</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>les hospitalisations totales depuis la mise en place du système</td>
            <td>{{$nombrehospitalisation}}</td>
        </tr>
        <tr>
            <td>nombre d'hospitalisations de l'année en cour</td>
            <td>{{$nouveauhospitalisation}}</td>
        </tr>

        </tbody>
    </table>
    <div style="height: 30px;"></div>
    <center><h1 class="font-weight-bold">les consultations</h1></center>
    <table class="table table-bordered">
        <thead>

        <tr>
            <th scope="col">Champ</th>
            <th scope="col">valeur</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>le nombre des consultaions totales depuis la mise en place du système</td>
            <td>{{$nombreconsultation}}</td>
        </tr>
        <tr>
            <td>nombre d'hospitalisations de l'année en cour</td>
            <td>{{$nouveauconsultation}}</td>
        </tr>

        </tbody>
    </table>

    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>
