<?php 
session_start();
require '../class/Workers.php';
require '../class/Security.php';
$security = new Security();
// $security->disconnect();
$security->redirect();
$abs = new Workers();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="../../assets/js/bootstrap.bundle.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="shortcut icon" href="../../assets/imgs/5343441.png" type="image/x-icon">
    <?php include '../sections/icone.php'?>
    <title>STE TAVARATRA</title>
</head>
<style>
       .container{
        position: absolute;
        top: 5rem;
        right: 0;
        width: 84%;
        }

        /* .retour {
            position: absolute;
            top: 0;
            left: 50%;
        } */

        .plaque {
        width: 84.25%;
        height: 8.7vh;
        position: absolute;
        top: 0;
        right: 0;
    }

    .ls{
        letter-spacing: 1px;
    }

    .moreAdd{
        position: absolute;
        right: 2rem;
        top:1rem;
    }
</style>


<body>
    <?php include '../sections/navbars.php' ?>
    <div class="plaque bg-light shadow d-flex align-items-center justify-content-left   p-3 "><svg class="me-1  text-primary"
                    xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-calendar-date" viewBox="0 0 16 16">
                    <path
                        d="M6.445 11.688V6.354h-.633A12.6 12.6 0 0 0 4.5 7.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675zm1.188-1.305c.047.64.594 1.406 1.703 1.406 1.258 0 2-1.066 2-2.871 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684zm2.953-2.317c0 .696-.559 1.18-1.184 1.18-.601 0-1.144-.383-1.144-1.2 0-.823.582-1.21 1.168-1.21.633 0 1.16.398 1.16 1.23" />
                    <path
                        d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
                </svg>
                <h5 class="fs-6 mt-2 text-primary fw-bold ls">POINTAGES</h5>
                <a href="salaires.php" class="moreAdd" title="Retour" ><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
  <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z"/>
</svg></a>
</div>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Anomalie</th>
                    <th>Details</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($abs->getAbs() as $abss):?>
                    <tr>
                        <td><?= $abss['name']?></td>
                        <td><?= $abss['firstname']?></td>
                        <td><?= $abss['date_ab']?></td>
                        <td <?php if($abss['status']=='non justifié'):?> style="color:red;"<?php endif?>><?= $abss['status']?></td>
                        <td><?= $abss['anomalie']?></td>
                        <td><?= $abss['ab_desc']?></td>
                    </tr>
                    <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <script>
           const close =document.querySelector('.close')
        close.addEventListener('click', () => {
            location.href = 'salaires.php'
        })
    </script>
</body>
</html>