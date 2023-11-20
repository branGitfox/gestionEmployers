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
    <title>STE TAVARATRA</title>
</head>
<style>
       .container{
        position: absolute;
        top: 5rem;
        right: 0;
        width: 84%;
        }

        .retour {
            position: absolute;
            top: 0;
            left: 50%;
        }
</style>
<body>
    <?php include '../sections/navbars.php' ?>
        <a title="Retour" href="salaires.php" class="retour mt-1 shadow rounded-circle">
            <svg  xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
            <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
            </svg>
</a>
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