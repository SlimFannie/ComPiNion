<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Design by foolishdeveloper.com -->
  <title>Companion</title>

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
  <!--Stylesheet-->
  <link rel="stylesheet" href="{{ asset('css/formConnexion.css') }}">

</head>
<body>
    <form method="POST" action="{{ route('users.connexion') }}">
    @csrf
    <h3>Connexion</h3>
    @if($errors->any())
      <div class="alert alert-danger">
        @foreach($errors->all() as $error)
          <p>{{ $error }}</p>
        @endforeach
      </div>
    @endif
    

    <label for="email">Courriel: </label>
    <input type="email" placeholder="Courriel" id="email" name="email">
    <p id="errEmail"></p>

    <label for="password">Mot de passe: </label>
    <input type="password" placeholder="Mot de passe" id="password" name="password">
    <p id="errPass"></p>

    <button type="submit" id="login">Log In</button>

  </form>
</body>

</html>
<script src="{{asset('js/connexion.js') }}"></script>