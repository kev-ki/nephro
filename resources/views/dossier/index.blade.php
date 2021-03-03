
<!DOCTYPE html>
<html>
<head>
	<title>Dossier medical</title>
	<link rel="stylesheet" href="{{ asset('stylecss/bootstrap/css/bootstrap.min.css') }}"  >
    <link rel="stylesheet" href="style.css">
   <script src="{{ asset('stylecss/jquery-3.5.1.slim.min.js') }}" ></script>
   <script src="{{ asset('stylecss/popper.min.js') }} " ></script>
  <script src="{{ asset('stylecss/bootstrap/js/bootstrap.min.js') }}" ></script>
  
</head>
<body>
	<center class="container">
 	 <h3>la liste des utlisateurs actuels du système.</h3>
  <table class="table table-striped">
  <thead>
    <tr>
     <th scope="col">numero du dossier</th>
      <th scope="col">numero patient</th>
      <th scope="col">medecin responsable</th>
      <th scope="col">numeroquitance</th>
      <th scope="col">DES</th>
      <th scope="col">chef de service</th>
       <th scope="col">modifier</th>
      <th scope="col">supprimer</th>
     
     
    </tr>
  </thead>
   @foreach($dossier as $doc)
      <tr>

        

      	<td>{{$doc->numerodossier}}</td>
      	<td>{{$doc->patientid}}</td>
      	<td>{{$doc->medecinresponsable}}</td>
      	<td>{{$doc->numeroquitance}}</td>
      	<td>{{$doc->DES}}</td>
      	<td>{{$doc->chefservice}}</td>
      	<td><a href="{{route('dossier.edit', $doc->id)}}" class="btn btn-warning">modifier</a> </td>
      	<td><form method="post" action="{{route('dossier.destroy', $doc->id)}}">
      		@method('DELETE')
      		@csrf
      		<button class="btn btn-danger">supprimer</button>
      	</form> </td>
     </tr>
   @endforeach
     
  <tbody>
 </tbody>
</table>
</div>

</body>
</html>

