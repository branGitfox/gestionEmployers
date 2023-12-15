<?php
session_start();
require '../class/Workers.php';
require '../class/Pointage.php';
$workers = new Workers();
$workers->newPointage(new Pointage);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/avance.css">
    <title>Pointage</title>
</head>
<style>
    body {
        overflow-x: hidden;
    }

    .succes {
        position: absolute;
        bottom: 5rem;
        right: -20rem;
        width: 200px;
        height: 50px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 10px;
        background-color: green;
        color: white;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
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

    
    .hide {
        display: none;
    }

    .flex {
        display: flex;
    }

    .nav-links a {
        padding: 15px;
        background-color: blue;
        text-decoration: none;
        color: white;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        font-weight: 400;
        letter-spacing: 2px;
    }


    .worker-hide-menu {
        flex-direction: column;
        align-items: center;
        border: solid;
        justify-content: center;
        width:117px;
        position: absolute;
        /* padding: 10px; */
        border: solid .1px rgba(0, 0, 255, 0.753);
        background-color: blue;
        border-bottom-left-radius: 3px;
        border-bottom-right-radius: 3px;
        /* box-shadow: 0px 0px 1px; */
    }

    .worker-hide-menu a {
        padding:10px 5px;
        text-decoration: none;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        color: white;
        font-size: 15px;
        width: 100%;
        text-align: center;
    }

    .worker-hide-menu a:hover{
        background-color: rgb(3, 3, 57);
    }

    nav {
        width: 100%;
        height: 8vh;
        background-color: blue;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .nav-links a:hover{
        background-color: rgb(97, 97, 248);
    }

    .btn-w {
        padding: 15px 5px;
        background-color: blue;
        border: none;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        font-size: 15px;
        color: white;
        font-weight:400;
        letter-spacing: 2px;
    }

    .btn-w:hover{
        background-color: rgb(97, 97, 248);
    }

    .nav-logo {
        margin-left:3rem ;
    }

    svg {
        position: relative;
        /* top: 5px; */
        left: -5px;
    }
    .logo {
        top: 0;
        left: 0;
    }
    h1 {
        font-weight: bold;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        color: whitesmoke;
    }

    #search-icon {
        position: absolute;
        left: 21rem;
    }

    body{
        overflow-y: hidden
    }

    .body {
        width: 100%;
        height: 100vh;

    }

    #active-a {
        background-color: blueviolet;
    }
</style>

<body>
    
<nav>
            <div class="nav-logo"><h1>STE TAV<svg class="logo"  xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-buildings" viewBox="0 0 16 16">
                <path d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022ZM6 8.694 1 10.36V15h5zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5z"/>
                <path d="M2 11h1v1H2zm2 0h1v1H4zm-2 2h1v1H2zm2 0h1v1H4zm4-4h1v1H8zm2 0h1v1h-1zm-2 2h1v1H8zm2 0h1v1h-1zm2-2h1v1h-1zm0 2h1v1h-1zM8 7h1v1H8zm2 0h1v1h-1zm2 0h1v1h-1zM8 5h1v1H8zm2 0h1v1h-1zm2 0h1v1h-1zm0-2h1v1h-1z"/>
              </svg>RATRA</h1></div>
            <div class="nav-links">
                <button class="btn-w"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-square" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                    <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/>
                  </svg>EMPLOYER</button>
                <span class="worker-hide-menu hide">
                    <a href="ajouterunemployer.php">NOUVEAU</a>
                    <a href="listeemployer.php">LISTE</a>
                    <a href="avance.php">AVANCE</a>
                    <a id="active-a" href="pointage.php">POINTAGE</a>
                    <a href="">FONCTION</a>
                </span>
                <a href="salaires.php"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-coin" viewBox="0 0 16 16">
                    <path d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932 0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853 0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9H5.5zm2.177-2.166c-.59-.137-.91-.416-.91-.836 0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91 0 .542-.412.914-1.135.982V8.518z"/>
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                    <path d="M8 13.5a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11m0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12"/>
                  </svg>SALAIRES</a>
                <a href="rapports.php"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-journals" viewBox="0 0 16 16">
                    <path d="M5 0h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2 2 2 0 0 1-2 2H3a2 2 0 0 1-2-2h1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1H1a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v9a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1H3a2 2 0 0 1 2-2"/>
                    <path d="M1 6v-.5a.5.5 0 0 1 1 0V6h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V9h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 2.5v.5H.5a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1H2v-.5a.5.5 0 0 0-1 0"/>
                  </svg>RAPPORTS</a>
                <a href><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="red" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                  </svg>DECONNEXION</a>
            </div>
        </nav>
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
    <form method="post">
        <div class="container w-50 bg-light shadow rounded">
            <h3 class="text-center mt-5">pointer un employé</h3>
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
                    <label for="date" class="form-label">Date d'avance</label>
                    <input type="date" class="form-control" name="date_ab" required>
                </div>
            </div>
            <div class="row mt-2 justify-content-center">
                <div class="col-4">

                    <input type="radio" class="form-check-input" value="justifié" name="status" id="justify" required>
                    <label class="form-label" for="justify">Justifié</label>
                    <input type="radio" class="form-check-input" value="non justifié" name="status" id="nonJustify"
                        required>
                    <label class="form-label" for="nonJustify">Non Justifié</label>

                </div>
                <div class="col-4">
                    <input type="radio" class="form-check-input" value="maladie" name="anomalie" id="malade" required>
                    <label class="form-label" for="malade">Malade</label>
                    <input type="radio" class="form-check-input" value="engagement particulier" name="anomalie"
                        id="autre" required>
                    <label class="form-label" for="autre">Autres</label>

                </div>
            </div>
            <div class="row mt-2 justify-content-center">
                <div class="col-8">
                    <label for="description" class="form-label">Description de l'absence</label>
                    <textarea name="ab_desc" id="description" class="form-control" placeholder="Details ici..."
                        required></textarea>
                </div>
            </div>
            <div class=" row mt-2 justify-content-center ">
                <div class=" col-8 mb-5">
                    <input type="submit" class="form-control bg-primary text-light" value="Enregistrer">
                </div>
            </div>
    </form>
</div>

    <?php if (!empty($workers->succes())): ?>
        <div class="succes"><?= $workers->succes() ?></div>
    <?php endif ?>
    </div>
    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
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
            succes.classList.add('mouve')
        }, 1)

        setTimeout(() => {
            succes.remove()
        }, 3000)
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