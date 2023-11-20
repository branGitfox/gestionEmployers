<?php
session_start();
require '../class/Workers.php';
require '../class/Pointage.php';
require '../class/Security.php';
$security = new Security();
// $security->disconnect();
$security->redirect();
$pointages = new Pointage();
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

    body {
        overflow-x: hidden;
    }

    .body {
        position: absolute;
        top: 5rem;
        width: 84%;
        right: 0rem;
    }
    .succes {
        animation-name: fade;
        animation-duration: 15s;
        transition: .5s;
    }

    @keyframes fade {
        from {
            opacity: 1;
        }

        to {

            opacity: 0;
        }
    }

    .plaque {
        width: 84.25%;
        height: 8.7vh;
        position: absolute;
        top: 0;
        right: 0;
    }

    .ls {
        letter-spacing: 1px;
    }
</style>
<body>
    <?php include '../sections/navbars.php'?>
    <div class="plaque bg-light shadow d-flex align-items-center justify-content-left p-3"><svg class="me-1  text-primary" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-journal-bookmark" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M6 8V1h1v6.117L8.743 6.07a.5.5 0 0 1 .514 0L11 7.117V1h1v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8"/>
            <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2"/>
            <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z"/>
          </svg><h5 class="fs-6 mt-2 fw-bold text-primary ls">RAPPORT POINTAGES</h5>
                
    </div> 
    <div class="body">
    <div class="container w-50">
        <div class="row">
            <div class="col-2">
                <h3 class="text-center">Date: </h3>
            </div>
            <div class="col-5 mt-1">
                <input type="date" class="form-control" id="date-field">
            </div>
            <div class="col-3 mx-2 mt-1">
                <button class="btn btn-primary printBtn"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                        <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1" />
                        <path
                            d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1" />
                    </svg> Imprimer</button>
            </div>
        </div>
    </div>
    <div class="container mt-3" style="height:81vh; overflow:auto;">
        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Status</th>
                    <th>Anomalie</th>
                    <th>Description</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody id="result-body">
                <?php foreach ($pointages->listOfPointage() as $pointage): ?>
                    <tr>
                        <td>
                            <?= $pointage['name'] ?>
                        </td>
                        <td>
                            <?= $pointage['firstname'] ?>
                        </td>
                        <td>
                            <?=$pointage['status']?>
                        </td>
                        <td>
                            <?=$pointage['anomalie']?>
                        </td>
                        <td>
                            <?=$pointage['ab_desc']?>
                        </td>
                        <td>
                            <?=$pointage['date_ab']?>
                        </td>
                        <td>
                            <span class="btn btn-danger p-1" onclick="confirmer(<?= $pointage['id_ab'] ?>, <?=$pointage['id_worker']?>)">Annuler</span>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <?php if (!empty($_SESSION['succes'])): ?>
            <div class="position-fixed bottom-0 end-0 p-3 succes" style="z-index: 11">
        <div id="liveToast" class="toast show text-success" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header">
         
            <strong class="me-auto"> Ste TAVARATRA</strong>
            <small>Maintenant</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
          <div class="toast-body">
            <?= $_SESSION['succes'] ?>
          </div>
        </div>
      </div>
    <?php endif ?>
    <?php unset($_SESSION['succes']); ?>
    </div>
    </div>
    
    <script src="../../assets/js/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#date-field").change(function () {
                let value = $("#date-field").val()
                $.ajax({
                    url: 'rp.php',
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
        const printBtn = document.querySelector('.printBtn')
        printBtn.addEventListener('click', () => {  
            document.querySelectorAll('.danger').forEach(a=>{
                a.style.display = 'none'
                
            })    
            printBtn.style.display='none'  
            window.print()
        })

        window.addEventListener('mousemove', () => {
            document.querySelectorAll('.danger').forEach(a=>{
                a.style.display = 'inline'
            })
            printBtn.style.display='block'
        })
     
        function confirmer(id_ab,id_worker) {
            if (confirm('Vous voulez vraiment annuler ce pointage ?')) {
                location.href = 'supprpointage.php?id_ab=' + id_ab+'&id_worker='+id_worker
            }
        }

        const succes = document.querySelector('.succes')
   

        setTimeout(() => {
            succes.remove()
        }, 5000)

        const close =document.querySelector('.close')
        close.addEventListener('click', () => {
            location.href = 'rapports.php'
        })
    </script>
</body>

</html>