<div class="container-fluid p-1" style="background-color: white">
    <div class="flash-message col-12">
        @if(Session::has('message'))
            <div class="alert {{Session::get('alert-class')}}">
                {{session::get('message')}}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            </div>
        @endif
    </div>

    <div class="card p-2">
        <div class="card-header">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-5 d-flex justify-content-start">
                            <button class="btn btn-outline-primary mr-1 mb-sm-1-1">
                                <a href="{{route('medecin.create')}}">Nouveau patient
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
                                        <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                        <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                                    </svg>
                                </a>
                            </button>
                            <div class="btn-group">
                                <button type="button" class="btn btn-outline-primary dropdown-toggle" aria-haspopup="true" data-toggle="dropdown" aria-expanded="false" v-pre>exporter données
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{route('export_excel')}}">Excel</a></li>
                                    <li><a class="dropdown-item" href="{{route('export_pdf')}}">PDF</a></li>
                                </ul>
                            </div>
                        </div>
                        <form method="POST" class="col-md-7" action="{{route('medecin.search')}}">
                            @csrf
                            <div class="col-md d-flex justify-content-end">
                                <select id="option" type="text" class="col-md-2 selectpicker form-control @error('option') is-invalid @enderror" name="option" data-placeholder="Choisir" data-style="btn-outline-secondary">
                                    <option value="id">ID</option>
                                    <option value="nom">Nom</option>
                                    <option value="prenom">Prénom</option>
                                    <option value="domicile">Tel domicile</option>
                                    <option value="cellulaire">Céllulaire</option>
                                </select>
                                @error('option')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                                <input id="rechercher" type="text" class="col-md-6 form-control-perso  @error('rechercher') is-invalid @enderror" placeholder="Mot clé..." name="rechercher">
                                @error('rechercher')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                                <div class="col-md-2">
                                    <button type="submit" name="search" class="btn btn-outline-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="25" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                            <title>rechercher</title>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body embed-responsive">
            <div class="table-responsive">
                <ul>
                    <table class="table">
                        <thead class="font-weight-bold">
                        <tr>
                            <th scope="col">ID Patient</th>
                            <th scope="col">Sexe</th>
                            <th scope="col">Telephone</th>
                            <th scope="col">Date d'enregistrement</th>
                            <th scope="col">Dossier</th>
                            <th scope="col">Examen patient</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($patient as $pa)
                            <tr>
                                <td class="font-weight-bold">{{$pa->idpatient}}</td>
                                <td>
                                    @if($pa -> sexe == 1)
                                        {{__('Homme')}}
                                    @else
                                        {{__('Feminin')}}
                                    @endif
                                </td>
                                <td>+226 {{$pa->telephone3}}</td>
                                <td>{{ $pa->created_at }}</td>

                                <td>
                                    <a href="{{route('medecin.show',$pa->idpatient)}}" class="btn mr-1 btn-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                            <title>voir</title>
                                        </svg>
                                    </a>
                                    <a href="{{route('medecin.edit',$pa->idpatient)}}" class="btn btn-secondary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                            <path d="M13.498.795l.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                                            <title>modifier</title>
                                        </svg>
                                    </a>
                                </td>
                                <td><a href="{{route('consultation.begin', $pa->idpatient)}}" class="btn btn-outline-primary">examiner</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </ul>
                <div class="d-flex justify-content-center">
                    {{$patient-> links()}}
                </div>
            </div>
        </div>
    </div>
</div>
