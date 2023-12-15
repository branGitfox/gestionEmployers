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
        /* position: relative; */
    }

    a:hover {
        background-color: rgba(255, 255, 255, 0.121);
    }

    .logOut:hover {
        background-color: rgba(255, 0, 0, 0.919);
    }

    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
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
        z-index: 1000;
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

    body {
        overflow: hidden;
        overflow: hidden;
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
                    <a id="active-a" href="listeemployer.php">LISTE</a>
                    <a href="avance.php">AVANCE</a>
                    <a href="pointage.php">POINTAGE</a>
                    <a href="">FONCTION</a>
                </span>
                <a href=""><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-coin" viewBox="0 0 16 16">
                    <path d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932 0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853 0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9H5.5zm2.177-2.166c-.59-.137-.91-.416-.91-.836 0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91 0 .542-.412.914-1.135.982V8.518z"/>
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                    <path d="M8 13.5a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11m0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12"/>
                  </svg>SALAIRES</a>
                <a  href="rapports.php"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-journals" viewBox="0 0 16 16">
                    <path d="M5 0h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2 2 2 0 0 1-2 2H3a2 2 0 0 1-2-2h1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1H1a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v9a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1H3a2 2 0 0 1 2-2"/>
                    <path d="M1 6v-.5a.5.5 0 0 1 1 0V6h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V9h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 2.5v.5H.5a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1H2v-.5a.5.5 0 0 0-1 0"/>
                  </svg>RAPPORTS</a>
                <a href><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="red" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                  </svg>DECONNEXION</a>
            </div>
        </nav>
    <div class="container-xxl body">
        <h2 class="text-center mt-2">LISTE DES EMPLOYES</h2>
        <div class="p-5 w-75 list">
            <input type="text" class="form-control" placeholder="Rechercher un Employer...." id="searchField">
            <button class="btn btn-primary mx-1 refresh">Actualiser</button>
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

        const refresh = document.querySelector('.refresh')

        refresh.addEventListener('click', () => {
            location.reload()
        })
        function confirmer(id) {
            if (confirm('Vous voulez vraiment supprimer cet employé ?')) {
                location.href = 'suppremployer.php?worker_id=' + id
            }
        }
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