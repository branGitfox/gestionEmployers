<?php
require '../class/Workers.php';
require '../class/Fonctions.php';
require '../class/Departements.php';
$fct= new Fonctions();
$dpt= new Departements(); 
$wrkrs = new Workers();
$wrkrs->newWorker();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <title>Ajoutez un employer</title>
</head>
<style>
    body{
        background-color: #f0f8ff;
        overflow: hidden;
    }
    .succes {
        position: absolute;
        bottom: 05rem;
        right: -20rem;
        width: 200px;
        height: 50px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 10px;
        background-color: green;
        color:white;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        animation-name:fade;
        animation-duration:15s;
        transition: .5s;
    }

    .mouve {
        
        transform:translate(-30rem, -2.5rem);
    }

    @keyframes fade {
        from {
            opacity: 1;
        }

        to{
            
            opacity: 0;
        }
    }
</style>
<body>
    <div class="container-lg p-5 bg-light shadow rounded">
        <h1 class="text-center mb-3">Ajoutez un employer</h1>
        <form method="post" enctype="multipart/form-data">
        <div class="row justify-content-center mt-5">
            <div class="col-4">
                <label for="Nom">Nom</label>
                <input type="text" class="form-control"id="Nom" placeholder="Nom" name="name" required>
            </div>
            <div class="col-4">
                <label for="Prenom">Prenom</label>
                <input type="text" class="form-control" id="Prenom" placeholder="Prenom" name="firstname" required>
            </div>
            <div class="col-3">
                <label for="fonctions">Fonctions</label>
                <select name="fonctions" id="fonctions" class="form-select">
                   <?php foreach($fct->getListOfFonctions() as $fonc):?>
                    <option value="<?= $fonc['id'] ?>"><?= $fonc['name_fonction'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-4">
                <label for="cin">N° de CIN</label>
                <input type="text" class="form-control"id="cin" placeholder="################" name="cin" required>
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
                <input type="number" class="form-control" id="salaire" placeholder="Le salaire en Ar" name="salaire" required>
            </div>
            <div class="col-4">
                <label for="responsable">Premier Responsable</label>
                <input type="text" class="form-control" id="responsable" placeholder="Le premier responsble" name="responsable" required>
            </div>
            <div class="col-3">
                <label for="contact">Contacts</label>
                <input type="text" class="form-control " id="contact" placeholder="Contact (xxx/xxx)" name="contact" required>
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
                    <?php foreach($dpt->getListOfDepartement() as $depart):?>
                        <option value="<?= $depart['id']?>"><?= $depart['name_depart']?></option>
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
                    <input type="radio" class="form-check-input" id="homme" value="homme" name="sexe" required >
                    <label class="form-check-label" for="homme">Homme</label>
                    <input type="radio" class="form-check-input" id="femme" value="femme" name="sexe" required>
                    <label class="form-check-label" for="femme">Femme</label>
                </div> 
            </div>
            </div>
        <div class="row mt-3 justify-content-center">
            <div class="col-8" style="position: relative;">
                <svg style="position: absolute;top:10px;left:40%;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" class="bi bi-floppy" viewBox="0 0 16 16">
                    <path d="M11 2H9v3h2z"/>
                    <path d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z"/>
                  </svg>
                <input type="submit" class="form-control bg-primary text-light" id="photo" value="Enregistrer" style="border: none;" name="envoyer">
            </div>
        </div>
    </form>
    <?php if(!empty($wrkrs->succes())):?>
        <div class="succes"><?=$wrkrs->succes()?></div>
    <?php endif?>
    </div>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script>
        const succes = document.querySelector('.succes')
        setTimeout(() => {
            succes.classList.add('mouve')  
        }, 1)

        setTimeout(() => {
            succes.remove()
        },3000)
    </script>
</body>
</html>