@extends('layouts.app')
@section('title', 'accueil')
@section('contenuDuMilieu')
<head>
<link rel="stylesheet" href="{{ asset('css/accueil.css') }}">

</head>

<body>

    <div class="liste-notifications">
        <div class="bjr_container">
            <h6 class="bonjour"></h6>
        </div>
        <div class="navigationRapide">
            <h3 class ="userManageTitle">Gestion des utilisateur: </h3>
            <ul>
                <li>
                    <a class="remplir-form" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa-sharp fa-solid fa-file-pen"></i>  Créer un nouvel utilisateur.
                    </a>
                </li>
            </ul>
        </div>
    </div>
    
    <div class="container">


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
            <form method="POST" action="" enctype="multipart/form-data">
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
                <label for="password">Mot de passe: </label><br>
                <input type="text" id="password" name="password" required>
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
    <div class="table-wrapper">
        <table class="fl-table">
            <thead>
            <tr>
                <th>Pseudo</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Compinion</th>
                <th>Série actuelle</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Sk8terB0y</td>
                <td>Lyes</td>
                <td>Aidoun</td>
                <td>Gorlock</td>
                <td>8</td>
            </tr>
            <tr>
                <td>Content 2</td>
                <td>Content 2</td>
                <td>Content 2</td>
                <td>Content 2</td>
                <td>Content 2</td>
            </tr>
            <tr>
                <td>Content 3</td>
                <td>Content 3</td>
                <td>Content 3</td>
                <td>Content 3</td>
                <td>Content 3</td>
            </tr>
            <tr>
                <td>Content 4</td>
                <td>Content 4</td>
                <td>Content 4</td>
                <td>Content 4</td>
                <td>Content 4</td>
            </tr>

            <tbody>
        </table>
    </div>

    </div>
    
</body>



@endsection
