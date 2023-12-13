<?php
session_start();
require '../class/Workers.php';
require '../class/Avance.php';
$avances = new Avance();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <title>Afficher les avances</title>
</head>
<style>
    .btn-danger {
        font-size:12px;
    }

    body {
        overflow-x: hidden;
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
    <div class="container w-50">
        <div class="row">
            <div class="col-2">
                <h3 class="text-center">Date: </h3>
            </div>
            <div class="col-5 mt-1">
                <input type="date" class="form-control" id="date-field">
            </div>
            <div class="col-3 mx-2 mt-1">
                <button class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                        <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1" />
                        <path
                            d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1" />
                    </svg> Imprimer</button>
            </div>
        </div>
    </div>
    <div class="container mt-3 bg-light">
        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Somme</th>
                    <th>Type</th>
                    <th>Description</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody id="result-body">
                <?php foreach ($avances->listOfAvance() as $avance): ?>
                    <tr>
                        <td>
                            <?= $avance['name'] ?>
                        </td>
                        <td>
                            <?= $avance['firstname'] ?>
                        </td>
                        <?php if ($avance['a_espece'] == 0): ?>
                            <td>
                                <?= number_format($avance['a_nature']) ?> Ar
                            </td>
                        <?php elseif (($avance['a_nature'] == 0)): ?>
                            <td>
                                <?= number_format($avance['a_espece']) ?> Ar
                            </td>
                        <?php else: ?>
                            <td>
                                <?= number_format($avance['a_espece'] + $avance['a_nature']) ?> Ar
                            </td>
                        <?php endif ?>
                        <?php if ($avance['a_espece'] == 0): ?>
                            <td> Nature</td>
                        <?php elseif ($avance['a_nature'] == 0): ?>
                            <td>Espece</td>
                        <?php else: ?>
                            <td>Mixte</td>
                        <?php endif ?>
                        <td>
                            <?= $avance['a_desc'] ?>
                        </td>
                        <td>
                            <?= $avance['a_date'] ?>
                        </td>
                        <td><span class="btn btn-danger p-1" onclick="confirmer(<?= $avance['a_id'] ?>)">Annuler</span></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
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
            $("#date-field").change(function () {
                let value = $("#date-field").val()
                $.ajax({
                    url: 'd_list.php',
                    method: 'POST',
                    data: { date: value },
                    success: function (data) {
                        $('#result-body').html(data)
                    }
                })
            })
        })
    </script>
    <script>
        const printBtn = document.querySelector('button')
        printBtn.addEventListener('click', () => {  
            document.querySelectorAll('.btn-danger').forEach(a=>{
                a.style.display = 'none'
                
            })    
            printBtn.style.display='none'  
            window.print()
        })

        window.addEventListener('mousemove', () => {
            document.querySelectorAll('.btn-danger').forEach(a=>{
                a.style.display = 'inline'
            })
            printBtn.style.display='block'
        })
     
        function confirmer(id) {
            if (confirm('Vous voulez vraiment supprimer cet employé ?')) {
                location.href = 'suppravance.php?a_id=' + id
            }
        }

        const succes = document.querySelector('.succes')
        setTimeout(() => {
            succes.classList.add('mouve')
        }, 1)

        setTimeout(() => {
            succes.remove()
        }, 3000)
    </script>
</body>

</html>