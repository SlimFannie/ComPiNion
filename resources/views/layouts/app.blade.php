<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/c7d7f880b6.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alumni+Sans&family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <!-- bootstrap 5 css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous" />
    <!-- BOX ICONS CSS-->
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <!-- Stylesheet Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

      <!-- jQuery -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <!-- Popper.js -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <!-- Bootstrap JavaScript -->
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">

    
    <title>ComPiNion</title>
</head>
<body>
      <!-- Side-Nav -->
<div class="side-navbar justify-content-between flex-wrap flex-column" id="sidebar">

<div class="navbar">
  <a class="menu-btn" id="menu-btn">
    <i class="fa-solid fa-bars" style="color: white;"></i>
  </a>
</div>

    <div class="nav flex-column text-white w-100">
        <div class="nav-link2 padNav">
            <img class="LogoBoule LogoBoule2" src="" alt="">
            <img id="Logo" class="logoVille img-fluid "src="" alt="">
        </div>
    
        <hr>

        <a class="nav-link blue my-2" href="">
              <img class="img-fluid logoUser" src="{{ asset('img/user.png') }}" alt="">   
        </a>

        <hr>

        <div href="#" class="nav-link ">
          <i class="fa-regular fa-rectangle-list blue"></i>
              <a class="blue titreNav" href=""><span class="mx-2">Gestion:</span></a>
              <div class="mt-3 mx-3">
                  <h6><a class="liens" href="{{ route('users.accueil') }}">Gestion des utilisateurs</a></h6>
                 
              </div>
        </div>
        <hr>
        <!-- <div href="#" class="nav-link ">
        <i class="fa-solid fa-file-lines blue"></i>
            <a class="blue titreNav" href=""><span class="mx-2">Statistiques:</span></a>
            <div class="mt-3 mx-3">
                <h6><a class="liens" href="">Statistiques d'utilisation</a></h6>
            </div>
        </div>
        <hr> -->

        <div class="mx-3">
        @if(auth()->check())
        <form class="form-btndisconnect" method="GET" action="{{ route('logout') }}">
          @csrf
          <button class="btnD disconnect">Fermer la session</button>
        </form>
         @endif    
        </div>



        <span href="#" class="nav-link2 h4 w-100 mb-5 padNav3 mt-3">
        <a class="v3r" href=""><i class= "blue bx bx-link"></i>by PiNes</a><br>
        <a class="phone" href=""><i class= "blue bx bx-phone"></i>1-800-Fabrice</a>
        </span>

</div>


</div>
    <!--End Top Nav -->


  @yield('contenuDuMilieu')

<script src="{{ asset('js/sidebar.js') }}"></script>
</body>
</html>