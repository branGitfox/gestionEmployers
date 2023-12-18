<?php 

require '../class/DynamicLinks.php';
// @include './php/class/DynamicLinks.php';

$link = new DynamicLinks();

?>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow" aria-label="Offcanvas navbar large">
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
              <a class="nav-link" aria-current="page" href="../../index.php">Acceuil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if($link->matchLink('salaires.php')){echo 'active';}?>" href="../pages/salaires.php">Salaires</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle <?php if($link->matchLink('avance.php') || $link->matchLink('pointage.php') || $link->matchLink('listeemployer.php') || $link->matchLink('modifieremployer.php') || $link->matchLink('ajouterunemployer.php')){echo 'active';}?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Employés
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item <?php if($link->matchLink('ajouterunemployer.php')){echo 'active';}?>" href="../pages/ajouterunemployer.php">Ajouter un Employé</a></li>
                <li><a class="dropdown-item <?php if($link->matchLink('avance.php')){echo 'active';}?>" href="../pages/avance.php">Donner une Avance</a></li>
                <li><a class="dropdown-item <?php if($link->matchLink('pointage.php')){echo 'active';}?>" href="../pages/pointage.php">Pointer un Employé</a></li>
                <?php if($link->matchLink('modifieremployer.php')) :?>
                <li><a class="dropdown-item <?php if($link->matchLink('modifieremployer.php')){echo 'active';}?>" href="../pages/abs.php">Modifier un employé</a></li>
                    <?php endif ?>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item <?php if($link->matchLink('listeemployer.php')){echo 'active';}?>" href="../pages/listeemployer.php">Liste des Employés</a></li>
                
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle <?php if($link->matchLink('afficherAvance.php') || $link->matchLink('afficherPointage.php') || $link->matchLink('abs.php')){echo 'active';}?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Accessibilités
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item <?php if($link->matchLink('afficherAvance.php')){echo 'active';}?>" href="../pages/afficherAvance.php">Rapport des Avances</a></li>
                <li><a class="dropdown-item <?php if($link->matchLink('afficherPointage.php')){echo 'active';}?>" href="../pages/afficherPointage.php">Rapport des Pointages</a></li>
                <?php if($link->matchLink('abs.php')) :?>
                <li><a class="dropdown-item <?php if($link->matchLink('abs.php')){echo 'active';}?>" href="../pages/abs.php">Absences</a></li>
                    <?php endif ?>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Nouveau Fonctions</a></li>
                
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link btn btn-danger" onclick="return confirm('Vous voulez vraiment vous deconnecter ?')" href="../pages/deconnexion.php">Deconnexion</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
</main>