<?php
session_start();
require '../class/Workers.php';
require '../class/Fonctions.php';
require '../class/Departements.php';
require '../class/Security.php';
$security = new Security();
// $security->disconnect();
$security->redirect();
$fct = new Fonctions();
$dpt = new Departements();
$wrkrs = new Workers();
$wrkrs->changeWorker();

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
<?php include '../sections/font.php'?>
<style>
    body {
        overflow: hidden;
    }

    .succes {
       
        animation-name: fade;
        animation-duration: 4s;
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
    <?php include '../sections/navbars.php'?>
    <div class="plaque bg-light shadow d-flex align-items-center justify-content-left p-3"> <svg
                class="me-1  text-primary" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                class="bi bi-person-bounding-box" viewBox="0 0 16 16">
                <path
                    d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5M.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5m15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5" />
                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
            </svg>
            <h5 class="fs-6 mt-2 fw-bold text-primary ls"></h5>
            <a href="listeemployer.php" class="moreAdd" title="Retour" ><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
  <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z"/>
</svg></a>
        </div>
    <div class="container-lg p-5">
        <h1 class="text-center mb-3">Modifier un employer</h1>
        <form method="post" enctype="multipart/form-data">
            <div class="row justify-content-center mt-5">
                <div class="col-4">
                    <label for="Nom">Nom</label>
                    <input type="text" class="form-control" id="Nom" placeholder="Nom" name="name" required
                        value="<?= $wrkrs->autoCompleteInputByWorkerId()['name'] ?>">
                </div>
                <div class="col-4">
                    <label for="Prenom">Prenom</label>
                    <input type="text" class="form-control" id="Prenom" placeholder="Prenom" name="firstname" required
                        value="<?= $wrkrs->autoCompleteInputByWorkerId()['firstname'] ?>">
                </div>
                <div class="col-3">
                    <label for="fonctions">Fonctions</label>
                    <select name="fonctions" id="fonctions" class="form-select">
                        <?php foreach ($fct->getListOfFonctions() as $fonc): ?>
                            <option value="<?= $fonc['id'] ?>" <?php if ($wrkrs->autoCompleteInputByWorkerId()['name_fonction'] == $fonc['name_fonction']): ?>selected<?php endif ?>>
                                <?= $fonc['name_fonction'] ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div class="row justify-content-center mt-5">
                <div class="col-4">
                    <label for="cin">N° de CIN</label>
                    <input type="text" class="form-control" id="cin" placeholder="################" name="cin" required
                        value="<?= $wrkrs->autoCompleteInputByWorkerId()['cin'] ?>">
                </div>
                <div class="col-4">
                    <label for="adresse">Adresse</label>
                    <input type="text" class="form-control" id="adresse" placeholder="Adresse" name="adresse" required
                        value="<?= $wrkrs->autoCompleteInputByWorkerId()['adresse'] ?>">
                </div>
                <div class="col-3">
                    <label for="Origine">Origine</label>
                    <input type="text" class="form-control" id="Origine" placeholder="Origine" name="origine" required
                        value="<?= $wrkrs->autoCompleteInputByWorkerId()['origine'] ?>">
                </div>
            </div>
            <div class="row justify-content-center mt-5">

                <div class="col-4">
                    <label for="salaire">Salaire</label>
                    <input type="number" class="form-control" id="salaire" placeholder="Le salaire en Ar" name="salaire"
                        required value="<?= $wrkrs->autoCompleteInputByWorkerId()['salaire_base'] ?>">
                </div>
                <div class="col-4">
                    <label for="responsable">Premier Responsable</label>
                    <input type="text" class="form-control" id="responsable" placeholder="Le premier responsble"
                        name="responsable" required value="<?= $wrkrs->autoCompleteInputByWorkerId()['responsable'] ?>">
                </div>
                <div class="col-3">
                    <label for="contact">Contacts</label>
                    <input type="text" class="form-control " id="contact" placeholder="Contact (xxx/xxx)" name="contact"
                        required value="<?= $wrkrs->autoCompleteInputByWorkerId()['contact'] ?>">
                </div>
            </div>
            <div class="row mt-3 justify-content-center">
                <div class="col-4">
                    <label for="photo">Photo 4x4</label>
                    <input type="file" class="form-control " id="photo" name="image"
                        value="<?= $wrkrs->autoCompleteInputByWorkerId()['image'] ?>">
                </div>
                <div class="col-4">
                    <label for="departement">Departement</label>
                    <select name="departements" id="departement" class="form-select">
                        <?php foreach ($dpt->getListOfDepartement() as $depart): ?>
                            <option value="<?= $depart['id'] ?>" <?php if ($wrkrs->autoCompleteInputByWorkerId()['name_depart'] == $depart['name_depart']): ?> selected
                                <?php endif ?>>
                                <?= $depart['name_depart'] ?>
                            </option>
                        <?php endforeach ?>
                    </select>

                </div>
                <div class="col-3">
                    <label for="date">Date d'entrée</label>
                    <input type="date" class="form-control" name="date_entree" required
                        value="<?= $wrkrs->autoCompleteInputByWorkerId()['date_entree'] ?>">
                </div>
            </div>
            <div class="row mt-3 justify-content-center">
                <div class="col-1">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="homme" value="homme" name="sexe" required <?php if ($wrkrs->autoCompleteInputByWorkerId()['sexe'] == 'homme'): ?> checked <?php endif ?>>
                        <label class="form-check-label" for="homme">Homme</label>
                        <input type="radio" class="form-check-input" id="femme" value="femme" name="sexe" required <?php if ($wrkrs->autoCompleteInputByWorkerId()['sexe'] == 'femme'): ?> checked <?php endif ?>>
                        <label class="form-check-label" for="femme">Femme</label>
                    </div>
                </div>
            </div>
            <div class="row mt-3 justify-content-center">
                <div class="col-8" style="position: relative;">
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
    </div>
    <script>
        const succes = document.querySelector('.succes')
    

        setTimeout(() => {
            succes.remove()
        }, 5000)
    </script>
</body>

</html>