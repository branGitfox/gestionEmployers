<?php
session_start();
require '../class/Workers.php';
require '../class/Pointage.php';
$wrkrs = new Workers();
$ptg = new Pointage();

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <title>Document</title>
</head>
<style>
    a {
        padding: 13px 20px;
        text-decoration: none;
        color: whitesmoke;
    }

    a:hover {
        background-color: rgba(255, 255, 255, 0.121);
    }

    .logOut:hover {
        background-color: rgba(255, 0, 0, 0.919);
    }

    .list {
        display: flex;
        justify-content: center;
        margin: auto;
    }

    body {
        background-color: #f0f8ff;
    }


    /* tbody {
        height: 61vh;
    } */


    .active {
        background-color: rgba(108, 230, 255, 0.653);
    }

    #look:hover {
        fill: blue;
    }

    #delete:hover {
        fill: red;
    }

    #avance:hover {
        fill: green;
    }

    #pointage:hover {
        fill: orangered;
    }

    #table-container thead th {
        position: sticky;
        top: 0;
        z-index: 100;
        background-color: hsl(0, 0%,
                95%);
    }

    /* .supbtn{
        border: none;
        background-color: transparent;
        padding: 0  10px 0 20px;
    } */
    .popUp {
        width: 50%;
        height: 500px;
        border: solid;
        position: absolute;
        top: 24%;
        left: 24%;
        background-color: antiquewhite;
        z-index: 100;
        border-radius: 10px;
        background-color: white;
        border: none;
        box-shadow: 0px 0px 20px black;
        transition: .3s all ease-in-out;
        display: grid;
        padding: 20px;
        grid-template-rows: 1fr 1fr;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }

    .header {
        display: grid;
        grid-template-columns: 1fr 3fr;
    }

    .anarana {
        padding: 10px;
    }

    .footer {
        display: grid;
        grid-template-columns: 1fr 1fr;
        border-radius: 5px;

    }

    .footer>div {
        display: grid;
        grid-template-rows: 1fr 3fr;
    }

    .footer>div .title {
        border: solid .1px grey;
        display: flex;
        align-items: center;
        justify-content: center;

    }

    .footer>div .body {
        border: solid .1px grey;
        padding: 10px;

    }

    h3 {
        font-size: 15px;
        line-height: 10px;
    }


    .sary {
        width: 100%;
        height: 100%;
        padding: 5px;
    }

    .sary img {
        width: 200px;
        height: 200px;
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
</style>

<body>
    <div class="container-xxl ">
        <h2 class="text-center mt-2">LISTE DES EMPLOYES</h2>
        <div class="p-5 w-75 list">
            <input type="text" class="form-control" placeholder="Rechercher un Employer...." id="searchField">
            <button class="btn btn-primary mx-1">Actualiser</button>
        </div>
        <div class="container " style="max-height: 500px; overflow: auto;" id="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Matricules</th>
                        <th>Noms</th>
                        <th>Prenoms</th>
                        <th>Fonctions</th>
                        <th>Sexes</th>
                        <th>Departement</th>
                        <th>Telephones</td>
                        <th>Modifier / Suprrimer / Profil</th>
                    </tr>
                </thead>
                <tbody id="workersList">
                    <?php foreach ($wrkrs->listOfWorker() as $worker): ?>
                        <tr>
                            <td>
                                <?= $worker['w_id'] ?>
                            </td>
                            <td>
                                <?= $worker['name'] ?>
                            </td>
                            <td>
                                <?= $worker['firstname'] ?>
                            </td>
                            <td>
                                <?= $worker['name_fonction'] ?>
                            </td>
                            <td>
                                <?= $worker['sexe'] ?>
                            </td>
                            <td>
                                <?= $worker['name_depart'] ?>
                            </td>
                            <td>
                                <?= $worker['contact'] ?>
                            </td>
                            <td><a href='modifieremployer.php?worker_id=<?= $worker['w_id'] ?>'><svg id='look'
                                        xmlns='http://www.w3.org/2000/svg' width='25' height='25' fill='black'
                                        class='bi bi-pencil-square' viewBox='0 0 16 16'>
                                        <path
                                            d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z' />
                                        <path fill-rule='evenodd'
                                            d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z' />
                                    </svg></a> <span class="supbtn" onclick="confirmer(<?= $worker['w_id'] ?>)"><svg
                                        id='delete' xmlns='http://www.w3.org/2000/svg' width='25' height='25' fill='red'
                                        class='bi bi-trash' viewBox='0 0 16 16'>
                                        <path
                                            d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z' />
                                        <path
                                            d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z' />
                                    </svg></span><a href='listeemployer.php?worker_id=<?= $worker['w_id'] ?>'><svg
                                        id="popUpSwitch" xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                        fill="blue" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1z" />
                                    </svg></a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php if (isset($_GET['worker_id'])): ?>
        <div class="popUp">
            <div class="header">
                <div class="sary">
                    <img src="../images/<?= $wrkrs->showWorkerInfo()['image'] ?>" alt="">
                </div>
                <div class="anarana">
                    <p>Nom: <?= $wrkrs->showWorkerInfo()['name'] ?></p>
                    <p>Prenom: <?= $wrkrs->showWorkerInfo()['firstname'] ?></p>
                    <p>Sexe: <?= $wrkrs->showWorkerInfo()['sexe'] ?></p>
                    <p>CIN: <?= $wrkrs->showWorkerInfo()['cin'] ?></p>
                    <p>Adresse: <?= $wrkrs->showWorkerInfo()['adresse'] ?></p>
                </div>
            </div>
            <div class="footer">
                <div class="left-info">
                    <div class="title">
                        <h3>Details</h3>
                    </div>
                    <div class="body">
                        <p>Fonctions: <?= $wrkrs->showWorkerInfo()['name_fonction'] ?></p>
                        <p>Departement: <?= $wrkrs->showWorkerInfo()['name_depart'] ?></p>
                        <p>Date d'Entrée: <?= $wrkrs->showWorkerInfo()['date_entree'] ?></p>
                        <p>Salaire de Base: <?= number_format($wrkrs->showWorkerInfo()['salaire_base']) ?> Ar</p>
                    </div>
                </div>
                <div class="right-info">
                    <div class="title">
                        <h3>Autres</h3>
                    </div>
                    <div class="body">
                        <p>N° Matricules: <?= $wrkrs->showWorkerInfo()['w_id'] ?></p>
                        <p>Teléphone: <?= $wrkrs->showWorkerInfo()['contact'] ?></p>
                        <p>Premier Responsable: <?= $wrkrs->showWorkerInfo()['responsable'] ?></p>
                        <p style="text-decoration:underline red;">Nombre d'absence ce mois:
                            <?= $ptg->nbrOfAbsence()['nbr_absence'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php endif ?>
    <?php if (!empty($_SESSION['succes'])): ?>
        <div class="succes">
            <?= $_SESSION['succes'] ?>
        </div>
    <?php endif ?>
    <?php unset($_SESSION['succes']); ?>
    </div>
    <script src="../../assets/js/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#searchField').keyup(function () {
                let value = $('#searchField').val()
                if (value != '') {
                    $.ajax({
                        url: 'searchlist.php',
                        type: 'POST',
                        data: { worker: value },
                        success: function (data) {
                            $('#workersList').html(data)
                        }

                    })
                }
            })

        })
    </script>
    <script>
        window.addEventListener('click', () => {
            document.querySelector('.popUp').style.display = 'none'
            location.href = 'listeemployer.php'
        })

        document.querySelectorAll('.delete').forEach(Element => {
            Element.addEventListener('click', () => {
                if (confirm('Vous etes sure de vouloir supperimer cet employé')) {

                }

            })
        })

        const succes = document.querySelector('.succes')
        setTimeout(() => {
            succes.classList.add('mouve')
        }, 1)

        setTimeout(() => {
            succes.remove()
        }, 3000)

        const refresh = document.querySelector('button')

        refresh.addEventListener('click', () => {
            location.reload()
        })
        function confirmer(id) {
            if (confirm('Vous voulez vraiment supprimer cet employé ?')) {
                location.href = 'suppremployer.php?worker_id=' + id
            }
        }
    </script>

</body>

</html>