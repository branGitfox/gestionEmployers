<?php
session_start();
require '../class/Security.php';
$security = new Security();
// $security->disconnect();
$security->redirect();
require '../class/Workers.php';
require '../class/Fonctions.php';
require '../class/Departements.php';
$fct = new Fonctions();
$dpt = new Departements();
$wrkrs = new Workers();
$wrkrs->newWorker();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script src="../../assets/js/bootstrap.bundle.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="shortcut icon" href="../../assets/imgs/5343441.png" type="image/x-icon">
    <title>STE TAVARATRA</title>
</head>
<style>
    body {
        overflow: hidden;
    }

    .succes {
        animation-name: fade;
        animation-duration: 5s;
        transition: .5s;
    }
    
    @keyframes fade {
        from {
            opacity: 1;
        }

        to {

            opacity: 0;
        }
    }

    /* form {
        position: relative;
    } */

    /* .close {
        position: absolute;
        top: 0;
        right: 0;
        fill: red;
    } */

    .container-lg{
        position: absolute;
        top: 3rem;
        right: 0;
    }

    .plaque {
        width: 84.25%;
        height: 8.7vh;
        position: absolute;
        top: 0;
        right: 0;
    }

    .moreAdd {
        position: absolute;
        right: 2rem;
    }
</style>

<body>
    <?php include '../sections/navbars.php' ?>
    <div class="plaque bg-light shadow d-flex align-items-center justify-content-left p-3"><svg class="me-1  text-primary" xmlns="http://www.w3.org/2000/svg"
                        width="20" height="20" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
                        <path
                            d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664z" />
                        <path fill-rule="evenodd"
                            d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5" />
                    </svg><h5 class="fs-6 mt-2 fw-bold text-primary ls">AJOUTER</h5>
                <a href="listeemployer.php" class="moreAdd" title="Retour" ><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
  <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z"/>
</svg></a>
    </div>   
    <div class="container-lg p-5">
        <h1 class="text-center mb-3">Ajouter un employer</h1>
        <form method="post" enctype="multipart/form-data">
            <div class="row justify-content-center mt-5">
                <div class="col-4">
                    <label for="Nom">Nom</label>
                    <input type="text" class="form-control" id="Nom" placeholder="Nom" name="name" required>
                </div>
                <div class="col-4">
                    <label for="Prenom">Prenom</label>
                    <input type="text" class="form-control" id="Prenom" placeholder="Prenom" name="firstname" >
                </div>
                <div class="col-3">
                    <label for="fonctions">Fonctions</label>
                    <select name="fonctions" id="fonctions" class="form-select">
                        <?php foreach ($fct->getListOfFonctions() as $fonc): ?>
                            <option value="<?= $fonc['id'] ?>">
                                <?= $fonc['name_fonction'] ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div class="row justify-content-center mt-5">
                <div class="col-4">
                    <label for="cin">N° de CIN</label>
                    <input type="text" class="form-control" id="cin" placeholder="################" name="cin" required>
                </div>
                <div class="col-4">
                    <label for="adresse">Adresse</label>
                    <input type="text" class="form-control" id="adresse" placeholder="Adresse" name="adresse" required>
                </div>
                <div class="col-3">
                    <label for="Origine">Origine</label>
                    <input type="text" class="form-control" id="Origine" placeholder="Origine" name="origine" required>
                </div>
            </div>
            <div class="row justify-content-center mt-5">

                <div class="col-4">
                    <label for="salaire">Salaire</label>
                    <input type="number" class="form-control" id="salaire" placeholder="Le salaire en Ar" name="salaire"
                        required>
                </div>
                <div class="col-4">
                    <label for="responsable">Premier Responsable</label>
                    <input type="text" class="form-control" id="responsable" placeholder="Le premier responsble"
                        name="responsable" required>
                </div>
                <div class="col-3">
                    <label for="contact">Contacts</label>
                    <input type="text" class="form-control " id="contact" placeholder="Contact (xxx/xxx)" name="contact"
                        required>
                </div>
            </div>
            <div class="row mt-3 justify-content-center">
                <div class="col-4">
                    <label for="photo">Photo 4x4</label>
                    <input type="file" class="form-control " id="photo" name="image">
                </div>
                <div class="col-4">
                    <label for="departement">Departement</label>
                    <select name="departements" id="departement" class="form-select">
                        <?php foreach ($dpt->getListOfDepartement() as $depart): ?>
                            <option value="<?= $depart['id'] ?>">
                                <?= $depart['name_depart'] ?>
                            </option>
                        <?php endforeach ?>
                    </select>

                </div>
                <div class="col-3">
                    <label for="date">Date d'entrée</label>
                    <input type="date" class="form-control" name="date_entree" required>
                </div>
            </div>
            <div class="row mt-3 justify-content-center">
                <div class="col-1">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="homme" value="homme" name="sexe" required>
                        <label class="form-check-label" for="homme">Homme</label>
                        <input type="radio" class="form-check-input" id="femme" value="femme" name="sexe" required>
                        <label class="form-check-label" for="femme">Femme</label>
                    </div>
                </div>
            </div>
            <div class="row mt-3 justify-content-center">
                <div class="col-11" style="position: relative;">
                    <svg style="position: absolute;top:10px;left:40%;" xmlns="http://www.w3.org/2000/svg" width="20"
                        height="20" fill="white" class="bi bi-floppy" viewBox="0 0 16 16">
                        <path d="M11 2H9v3h2z" />
                        <path
                            d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z" />
                    </svg>
                    <input type="submit" class="form-control bg-primary text-light" id="photo" value="Enregistrer"
                        style="border: none;" name="envoyer">
                </div>
            </div>
            <!-- <svg class="close" xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-x-square-fill" viewBox="0 0 16 16">
                 <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708"/>
            </svg> -->
        </form>
        <?php if (!empty($wrkrs->succes())): ?>
            <div class="position-fixed bottom-0 end-0 p-3 succes" style="z-index: 11">
        <div id="liveToast" class="toast show text-success" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header">
         
            <strong class="me-auto"> Ste TAVARATRA</strong>
            <small>Maintenant</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
          <div class="toast-body">
            <?= $wrkrs->succes() ?>
          </div>
        </div>
      </div>
        <?php endif ?>
    <script>
        const succes = document.querySelector('.succes')

        setTimeout(() => {
            succes.remove()
        }, 5000)

        // const close =document.querySelector('.close')
        // close.addEventListener('click', () => {
        //     location.href = 'listeemployer.php'
        // })
    </script>
</body>

</html>