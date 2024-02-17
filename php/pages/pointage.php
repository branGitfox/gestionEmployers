<?php
session_start();
require '../class/Workers.php';
require '../class/Pointage.php';
require '../class/Security.php';
$security = new Security();
// $security->disconnect();
$security->redirect();
$workers = new Workers();
$workers->newPointage(new Pointage);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script src="../../assets/js/bootstrap.bundle.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/avance.css">
    <link rel="shortcut icon" href="../../assets/imgs/5343441.png" type="image/x-icon">
    <title>STE TAVARATRA</title>
</head>
<?php include '../sections/font.php'?>
<style>


    .container {
        position: absolute;
        top: 5rem;
        right: 0;
    }

    .c {
        color: #3A0CA3;
    }
    body {
        overflow: hidden;
    }

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

    .mouve {

        transform: translate(-30rem, -2.5rem);
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
        /* left: 21rem; */
        right: 30px;
    }

    body {
        overflow-y: hidden
    }

    .body {
        width: 100%;
        height: 100vh;

    }

    #active-a {
        background-color: blueviolet;
    }

    .active-a {
        background-color: blueviolet;
    }

    .logo {
        position: relative;
        top: -5px;
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

    <nav>
        <?php include '../sections/navbars.php'; ?>
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
                        <div class="result-div"><a href="pointage.php?worker_id=<?= $worker['w_id'] ?>"><svg
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
            <div class="plaque shadow d-flex align-items-center justify-content-left bg-light   p-3 " ><svg class="me-1  text-primary"
                    xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#3A0CA3"
                    class="bi bi-calendar-date" viewBox="0 0 16 16">
                    <path
                        d="M6.445 11.688V6.354h-.633A12.6 12.6 0 0 0 4.5 7.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675zm1.188-1.305c.047.64.594 1.406 1.703 1.406 1.258 0 2-1.066 2-2.871 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684zm2.953-2.317c0 .696-.559 1.18-1.184 1.18-.601 0-1.144-.383-1.144-1.2 0-.823.582-1.21 1.168-1.21.633 0 1.16.398 1.16 1.23" />
                    <path
                        d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
                </svg>
                <h5 class="fs-6 mt-2  c ls">POINTAGES</h5>
                <a href="pointage.php" class="moreAdd" title="Nouvelle fenetre" target="_blank"><svg
                        xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="blue" class="bi bi-plus-circle"
                        viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                        <path
                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                        </a>
                </svg>
            </div>
            <form method="post">
                <div class="container  pt-1">
                    <h3 class="text-center mt-5">Pointer un Employé</h3>
                    <div class="row mt-3 justify-content-center">
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
                            <label for="nbr_absence" class="form-label">Nombre d'absence</label>
                            <input type="number" class="form-control" name="nbr_absence" required>
                        </div>
                    </div>
                    <div class="row mt-3 justify-content-center">
                        <div class="col-9">
                            <label for="anomalie">Motifs</label>
                            <select name="anomalie" id="anomalie" class="form-select">
                                <option value="maladies">Malade</option>
                                <option value="congés">Congés</option>
                                <option value="probleme personnel">Probleme Personnel</option>
                                <option value="responsabilité familiale">responsabilité Familiale</option>
                                <option value="autre">Autres</option>
                            </select>
                        </div>
                    </div>
<!-- 
                    <div class="row mt-4 justify-content-center ">
                        <div class="col-3">
                            <label class="form-label " for="justify">Justifié</label>
                            <input type="radio" class="form-check-input mx-3" value="justifié" name="status"
                                id="justify" required>
                            <label class="form-label" for="nonJustify">Non Justifié</label>
                            <input type="radio" class="form-check-input mx-3" value="non justifié" name="status"
                                id="nonJustify" required>

                        </div>
                    </div> -->
                    <div class="row mt-2 justify-content-center">
                        <div class="col-9">
                            <label for="description" class="form-label">Description de l'absence</label>
                            <textarea name="ab_desc" id="description" class="form-control" placeholder="Details ici..."
                                required></textarea>
                        </div>
                    </div>
                    <div class=" row mt-2 justify-content-center ">
                        <div class=" col-9 mb-5">
                            <input type="submit" class="form-control bg-primary text-light" value="Enregistrer">
                        </div>
                    </div>
            </form>
        </div>

        <?php if (!empty($workers->succes())): ?>
            <div class="position-fixed bottom-0 end-0 p-3 succes" style="z-index: 11">
                <div id="liveToast" class="toast show text-light bg-success" role="alert" aria-live="assertive" aria-atomic="true">
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
        </div>
        <script src="../../assets/js/jquery.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#search-field').keyup(function () {
                    let value = $('#search-field').val()
                    $.ajax({
                        url: 'p_list.php',
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
            }, 8000)
        </script>

        </script>
        <script>
            const linkList = document.querySelector('.worker-hide-menu')
            const btn = document.querySelector('.btn-w')
            btn.addEventListener('click', () => {
                linkList.classList.toggle('flex')
                linkList.classList.toggle('hide')
            })

            document.querySelector('.body').addEventListener('click', () => {
                linkList.classList.add('hide')
                linkList.classList.remove('flex')
            })
        </script>
</body>

</html>