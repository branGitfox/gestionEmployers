<?php 
require '../class/Workers.php';
$abs = new Workers();

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
      .close {
        position: absolute;
        top: 0;
        right: 0;
        fill: red;
    }
</style>
<body>
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
    <svg class="close" xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-x-square-fill" viewBox="0 0 16 16">
                 <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708"/>
    </svg>
    <script>
           const close =document.querySelector('.close')
        close.addEventListener('click', () => {
            location.href = 'salaires.php'
        })
    </script>
</body>
</html>