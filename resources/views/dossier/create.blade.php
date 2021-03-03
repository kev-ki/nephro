
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
    <header style="height: 100px;">
 	   <center>dossier médecal patient</center>
        <div style="height: 100px;">
      <div class="flash-message" style="text-align: center;">
          @foreach(['danger','warning','succes','info'] as $mgs)
            @if(Session::has('alert-'.$mgs))
              <p class="alert alert-{{$mgs}}">{{Session::get('alert-'.$mgs)}}
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              </p>
             @endif
          @endforeach
        
       </div>
  </div>
    </header>
       <center class="container">
       	<form method="post" action="{{route('dossier.store')}}" >
    	@csrf
    	<input type="text" name="numerodossier" class="form-controlle" style="width: 400px;" placeholder="numerodossier" required="true"><br><br>
    	<input type="text" name="patientid" class="form-controlle" style="width: 400px;" placeholder="numero du patient" required="true"><br><br>
    	
    	<input type="text" name="numeroquitance" class="form-controlle" style="width: 400px;" placeholder="numeroquitance" required="true"><br><br>

    	<input type="text" name="chefservice" class="form-controlle" style="width: 400px;" placeholder="chefservice" required="true"><br><br>

    	<input type="text" name="medecinresponsable" class="form-controlle" style="width: 400px;" placeholder="medecinresponsable" required="true"><br><br>

    	<input type="text"  name="DES" class="form-controlle" style="width: 400px;" placeholder="DES" required="true"><br><br>
    	<button class="btn btn-primary">enregistrer</button>
    	
    	
    
    </form>
       </center>
</body>
</html>
