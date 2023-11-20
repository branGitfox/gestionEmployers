<?php
session_start();
require '../class/Workers.php';
require '../class/Pointage.php';
require '../class/Security.php';
$security = new Security();
// $security->disconnect();
$security->redirect();
$workers = new Workers();
$workers->newAvance(new Pointage());
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <script src="../../assets/js/bootstrap.bundle.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/avance.css">
    <title>Avance</title>
</head>
<style>
    .noResult {
        text-align: center;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }

    body {
        overflow-x: hidden;
    }

    .succes {
        animation-name: fade;
        animation-duration: 5s;
        transition: .5s;
    }

    .erreur {
        background-color: red;
    }



    @keyframes fade {
        from {
            opacity: 1;
        }

        to {

            opacity: 0;
        }
    }


    #search-icon {
        position: absolute;
       right: 30px;
    }


    body{
        overflow-y: hidden;
    }
    
    .container {
        position: absolute;
        top: 5rem;
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

    .ls {
        letter-spacing: 1px;
    }
</style>

<body>
        <?php include '../sections/navbars.php';?>
           
    <div class="body">
        <div class="search-container shadow">
        <div class="search-header">
            <h4>Rechercher un employé</h4>
            <svg id="close" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                class="bi bi-x-square-fill" viewBox="0 0 16 16">
                <path
                    d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708" />
            </svg>
        </div>

        <div class="search-input">
            <input type="text" placeholder="Recherche" id="search-field">
        </div>
        <div class="result-container">
            <?php foreach ($workers->getList() as $worker): ?>
                <div class="result-div"><a href="avance.php?worker_id=<?= $worker['w_id'] ?>"><svg
                            xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                            class="bi bi-person" viewBox="0 0 16 16">
                            <path
                                d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664z" />
                        </svg>
                        <?= $worker['name'] . ' ' . $worker['firstname'] ?>
                    </a></div>
            <?php endforeach ?>
        </div>
    </div>
    <div class="plaque bg-light shadow d-flex align-items-center justify-content-left p-3"><svg class="me-1 mt-2 text-primary" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8m5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0"/>
            <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z"/>
            <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1z"/>
            <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z"/>
          </svg><h5 class="fs-6 mt-2 fw-bold text-primary ls">AVANCES</h5>
                <a href="avance.php" class="moreAdd" title="Nouvelle fenetre" target="_blank"><svg  xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="blue" class="bi bi-plus-circle" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/></svg></a>
    </div>        

    <form action="" method="POST">
        <div class="container">
            <h3 class="text-center mt-5">Donner une Avance</h3>
            <div class="row mt-3 mb-3 justify-content-center">
                <div class="col-6" style="position: relative;">
                    <svg id="search-icon" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="blue"
                        class="bi bi-search" viewBox="0 0 16 16">
                        <path
                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                    </svg>
                    <label for="employé" class="form-label">Employé</label>
                    <input type="text" class="form-control" disabled
                        value="<?= is_numeric($workers->sessionID()) ? $workers->nameFistname()['name'] . ' ' . $workers->nameFistname()['firstname'] : 'Aucun employé' ?>">
                </div>

                <div class="col-3">
                    <label for="date" class="form-label">Date d'avance</label>
                    <input type="date" class="form-control" name="a_date">
                </div>
            </div>
            <div class="row mt-2 mb-3 justify-content-center">
                <div class="col-4">
                    <label for="AvanceE" class="form-label">Avance Espece</label>
                    <input type="number" class="form-control" id="avanceE" name="a_espece">
                </div>
                <div class="col-4">
                    <label for="AvanceN" class="form-label">Avance Nature</label>
                    <input type="number" class="form-control" id="AvanceN" name="a_nature">
                </div>
            </div>
            <div class="row mt-2 justify-content-center">
                <div class="col-9 mb-3">
                    <label for="description" class="form-label">Description de l'Avance</label>
                    <textarea name="a_desc" id="description" class="form-control"
                        placeholder="La raison de l'avance ici..."></textarea>
                </div>
            </div>
            <div class="row mt-2 justify-content-center ">
                <div class="col-9 ">
                    <input type="submit" class="form-control bg-primary text-light" value="Enregistrer">
                </div>
            </div>
    </form>
        </div>
   
    <?php if (!empty($workers->succes())): ?>
        <div class="position-fixed bottom-0 end-0 p-3 succes" style="z-index: 11">
        <div id="liveToast" class="toast show text-success" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header">
         
            <strong class="me-auto"> Ste TAVARATRA</strong>
            <small>Maintenant</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
          <div class="toast-body">
            <?= $workers->succes() ?>
          </div>
        </div>
      </div>
    <?php endif ?>
    <?php if (!empty($workers->error())): ?>
        <div class="position-fixed bottom-0 end-0 p-3 succes" style="z-index: 11">
        <div id="liveToast" class="toast show text-danger" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header">
         
            <strong class="me-auto"> Ste TAVARATRA</strong>
            <small>Maintenant</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
          <div class="toast-body">
            <?= $workers->error() ?>
          </div>
        </div>
      </div>
    <?php endif ?>
    </div>
    <script src="../../assets/js/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#search-field').keyup(function () {
                let value = $('#search-field').val()
                $.ajax({
                    url: 'a_list.php',
                    method: 'POST',
                    data: { worker: value },
                    success: function (data) {
                        $('.result-container').html(data)
                    }
                })
            })
        })
    </script>
    <script>
        document.querySelector('#close').addEventListener('click', () => {
            document.querySelector('.search-container').style.display = 'none'
        })
        document.querySelector('#search-icon').addEventListener('click', () => {
            document.querySelector('.search-container').style.display = 'block'

        })

        const succes = document.querySelector('.succes')
   

        setTimeout(() => {
            succes.remove()
        }, 5000)
    </script>
</body>

</html>