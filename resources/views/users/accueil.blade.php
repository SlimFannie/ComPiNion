@extends('layouts.app')
@section('title', 'accueil')
@section('contenuDuMilieu')
<head>
<link rel="stylesheet" href="{{ asset('css/accueil.css') }}">

</head>

<body>
<div class="myContainer">

    <div class="liste-notifications">
        <div class="leftSpace">
        <input type="text" id="searchInput" placeholder="Rechercher...">
        <button onclick="searchTable()" id="searchButton" class="btn btn-search"><i class="fa-solid fa-search"></i>Rechercher</button>
            
        </div>
        <div class="navigationRapide">
            <h3 class ="userManageTitle">Gestion des utilisateur: </h3>
            <ul>
                <li>
                    <a class="remplir-form" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa-sharp fa-solid fa-file-pen"></i>  Créer un nouvel utilisateur.
                    </a>
                </li>
                <li>
              
                </li>
            </ul>
        </div>
    </div>
    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Créer un utilisateur</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
            <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group mt-2">
                <label for="pseudo">Pseudo: </label><br>
                <input type="text" id="pseudo" name="pseudo" required>
            </div>
            <div class="form-group mt-2">
                <label for="nom">Nom: </label><br>
                <input type="text" id="nom" name="nom" required>
            </div>
            <div class="form-group mt-2">
                <label for="prenom">Prénom: </label><br>
                <input type="text" id="prenom" name="prenom" required>
            </div>
            <div class="form-group mt-2">
                <label for="email">Courriel: </label><br>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group mt-2">
                <label for="password">Mot de passe: </label><br>
                <input type="password" id="password" name="password" required>
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Retour</button>
            <button type="submit" class="btn btn-primary btnAddUser ">Créer</button>
        </div>

        </form>
        </div>
    </div>
    </div>

    <!-- Fin du modal -->



    <!--Tableu des utilisateurs-->
    <h2>Liste des utilisateurs</h2>
    @if (count($users) > 0)
    <div class="table-wrapper">
        <table id="dataTable" class="fl-table">
            <thead>
            <tr>
                <th>Pseudo</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Points de mérites</th>
                <th>Character</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user['pseudo'] }}</td>
                <td>{{ $user['nom'] }}</td>
                <td>{{ $user['prenom'] }}</td>
                <td>{{ $user['merite'] }}</td>
                <td>{{ $user->character->name }}</td>
                <td><form class="delete-form" action="{{ route('users.destroy', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn-delete" type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')"><i class="fa-solid fa-trash"></i></button>
                </form></td>
            </tr>
            @endforeach
            

            <tbody>
        </table>
    </div>
    @else
    <p class ="aucun-form">Aucun utilisateur </p>
    @endif
    </div>
    
    <script src="{{ asset('js/accueil.js') }}"></script>

</body>



@endsection
