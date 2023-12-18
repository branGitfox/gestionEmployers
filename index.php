<!DOCTYPE html>
<html lang="en">
<head>
    <script src="./assets/js/bootstrap.bundle.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <title>Document</title>
</head> 
<style>
    body {
        overflow: hidden;
    }
    img {
        width: 100%;
        /* height: 100vh; */
    }
</style>
<body>
  
<nav class="navbar navbar-expand-lg navbar-dark bg-primary" aria-label="Offcanvas navbar large">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">STE TAVARATRA</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar2" aria-controls="offcanvasNavbar2" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasNavbar2" aria-labelledby="offcanvasNavbar2Label">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbar2Label">Offcanvas</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="">Acceuil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./php/pages/salaires.php">Salaires</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Employés
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="./php/pages/ajouterunemployer.php">Ajouter un Employé</a></li>
                <li><a class="dropdown-item" href="./php/pages/avance.php">Donner une Avance</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="./php/pages/listeemployer.php">Liste des Employés</a></li>
                
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Accessibilités
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="./php/pages/afficherAvance.php">Rapport Avance</a></li>
                <li><a class="dropdown-item" href="./php/pages/afficherPointage.php">Rapport des Pointages</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Nouveau Fonctions</a></li>
                
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link btn btn-danger" href="./php/pages/deconnexion.php" onclick="return confirm('Vous voulez vraiment vous deconnecter ?')">Deconnexion</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./assets/fond/1-thessaloniciens-5-11.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="./assets/fond/actes-4-12-2.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="./assets/fond/marc-11-24.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
</div>
</main>
</body>
</html>