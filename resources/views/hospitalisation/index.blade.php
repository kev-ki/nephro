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
            <div class="row d-flex justify-content-end">
                <div class="col-8">
                    <form method="POST" class="" action="{{route('hospi.search')}}">
                        @csrf
                        <select id="option" type="text" class="col-md-2 selectpicker form-control @error('option') is-invalid @enderror" name="option" data-placeholder="Choisir" data-style="btn-outline-secondary">
                            <option value="id">ID</option>
                            <option value="nom">Nom</option>
                            <option value="prenom">Prénom</option>
                            {{--<option value="domicile">Tel domicile</option>
                            <option value="cellulaire">Céllulaire</option>--}}
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
                    </form>
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
                            <th scope="col">Nom Patient</th>
                            <th scope="col">Prénom Patient</th>
                            <th scope="col">Date Entrée</th>
                            <th scope="col">Date Sortie</th>
                            <th scope="col">Chambre</th>
                            <th scope="col">Lit</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($patients_hospi as $hospi)
                            <tr>
                                <td class="font-weight-bold">{{$hospi->id_patient}}</td>
                                <td>
                                    @foreach($patients as $value)
                                        @if($hospi -> id_patient == $value->idpatient)
                                            {{$value->nom}}
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($patients as $value)
                                        @if($hospi -> id_patient == $value->idpatient)
                                            {{$value->prenom}}
                                        @endif
                                    @endforeach
                                </td>
                                <td>{{ $hospi->date_entree }}</td>
                                <td>{{ $hospi->date_sortie }}</td>
                                <td>{{ $hospi->numerochambre }}</td>
                                <td>{{ $hospi->numerolit }}</td>

                                <td>
                                    <a href="{{route('hospitalisation.show',$hospi->id_patient)}}" class="btn mr-1 btn-secondary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                            <title>voir</title>
                                        </svg>
                                    </a>
                                    <a href="{{route('hospitalisation.edit',$hospi->id_patient)}}" class="btn btn-dark">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                            <path d="M13.498.795l.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                                            <title>modifier</title>
                                        </svg>
                                    </a>
                                </td>
                        @endforeach
                        </tbody>
                    </table>
                </ul>
                <div class="d-flex justify-content-center">
                    {{$patients_hospi-> links()}}
                </div>
            </div>
        </div>
    </div>
</div>
