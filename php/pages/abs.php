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
<body>
    <?php include '../sections/navbars.php' ?>
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