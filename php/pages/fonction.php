<?php 
session_start();
require '../class/Workers.php';
require '../class/Fonctions.php';
require '../class/Security.php';
$workers = new Workers();
$workers->changeUserInfo();
$security = new Security();
$security->redirect();
$fonc = new Fonctions();
$fonc->newFonction();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script src="../../assets/js/bootstrap.bundle.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <title>STE TAVARATRA</title>
</head>
<?php include '../sections/font.php'?>
<style>
    .plaque {
        width: 84.25%;
        height: 8.7vh;
        position: absolute;
        top: 0;
        right: 0;
        font-family: 'Poppins', sans-serif;
    }

.succes {

        animation-name: fade;
        animation-duration: 15s;
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

    .c {
        color: #3A0CA3;
    }

    .ls {
        letter-spacing: 1px;
    }

    .container {
        width: 84%;
        height: 89vh;
        position: absolute;
        top: 5rem;
        right: 0;
    }
    .row {
        height: 87vh;
       
    }

 

    .col-8 {
        /* background-color: red; */
        height: 87vh;
        overflow: auto;

    }

</style>
<body>
    <?php include '../sections/navbars.php' ?>
    <div class="plaque shadow d-flex align-items-center justify-content-left bg-light   p-3 " > <svg class="me-1" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#3A0CA3" class="bi bi-person-workspace" viewBox="0 0 16 16">
            <path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
            <path d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.373 5.373 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2z"/>
          </svg>
                <h5 class="fs-6 mt-2  c ls">FONCTIONS</h5>
               
                </svg>
            </div>

            <div class="container">
                <div class="row">
                        <div class="col-4  shadow p-3">
                            <form method="post">
                                
                                <h3 class="text-left text-success">AJOUTER</h3>
                            
                               
                                <div class="mt-4 mb-1">
                                    <label for="nom" class="form-label">Nom du nouveau fonctions</label>
                                    <input type="text" class="form-control" id="nom" name="name_fonction" required>
                                </div>
                                <div class="mt-4 mb-1">
                                    <?php if($_SESSION['user']['role_name'] != 'Utilisateur'):?>
                                    <input type="submit" value="Enregistrer" class="form-control bg-success text-light">
                                    <?php endif ?>
                                </div>
                            </form>
                        </div>
                        <div class="col-8  shadow p-3">
                            <h3 class="text-primary">Liste des fonctions</h3>
                            <ul class="list-group">
                                <?php foreach($fonc->getNumbersOfWorkerInAFunction() as $fonction):?>
                                    <li ondblclick="deleteF(<?= $fonction['id']?>)"  class="list-group-item d-flex justify-content-between align-items-center">
                                        <?= $fonction['name_fonction']?>
                                        <span class="badge bg-primary rounded-pill"><?= $fonction['nbr']?></span>
                                    </li>
                                    <?php endforeach ?>
                            </ul>

                        </div>               
                        <?php if (!empty($fonc->succes())): ?>
                        <div class="position-fixed bottom-0 end-0 p-3 succes" style="z-index: 11">
                    <div id="liveToast" class="toast show text-light bg-success" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                    
                        <strong class="me-auto"> Ste TAVARATRA</strong>
                        <small>Maintenant</small>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        <?= $fonc->succes() ?>
                    </div>
                    </div>
                </div>
            <?php endif ?>
        <?php if (!empty($_SESSION['succes'])): ?>
                <div class="position-fixed bottom-0 end-0 p-3 succes" style="z-index: 11">
                    <div id="liveToast" class="toast show text-light bg-success" role="alert" aria-live="assertive"
                        aria-atomic="true">
                        <div class="toast-header">

                            <strong class="me-auto"> Ste TAVARATRA</strong>
                            <small>Maintenant</small>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                            <?= $_SESSION['succes'] ?>
                        </div>
                    </div>
                </div>
            <?php endif ?>
            <?php unset($_SESSION['succes']); ?>

            <script>
                function deleteF(id) {
                    if(confirm('vous voules vraiment supprimer ce fonction'))
                    {
                        location.href = 'deleteFonction.php?id='+id
                    }
                }

                const succes = document.querySelector('.succes')


                setTimeout(() => {
                    succes.remove()
                }, 5000)
            </script>
</body>
</html>