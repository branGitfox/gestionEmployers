<?php
session_start();
require '../class/Workers.php';
require '../class/Avance.php';
require '../class/Security.php';
$security = new Security();
// $security->disconnect();
$security->redirect();
$avances = new Avance();
$day = (string)date('d');
$month = (string)date('m');
$year = (string)date('Y');
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
<?php include '../sections/font.php'?>
<style>
    body {
        overflow-x: hidden;
    }
		body{
overflow:hidden;
}

main{
position:relative;
top:-1.5rem;
}

    .succes {
        animation-name: fade;
        animation-duration: 5s;
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

    /* .close {
        position: absolute;
        top: 0;
        right: 0;
        fill: red;
    } */

    .body {
        position: absolute;
        top: 5rem;
        width: 84%;
        right: 0rem;
    }

    thead {
        position: sticky;
        top: 0;
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

    .c {
        color: #3A0CA3;
    }
</style>

<body>
    <?php include '../sections/navbars.php' ?>
    <div class="plaque bg-light shadow d-flex align-items-center justify-content-left p-3"><svg class="me-1" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#3A0CA3" class="bi bi-journal-bookmark" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M6 8V1h1v6.117L8.743 6.07a.5.5 0 0 1 .514 0L11 7.117V1h1v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8"/>
            <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2"/>
            <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z"/>
          </svg><h5 class="fs-6 mt-2  ls c" >RAPPORT AVANCES</h5>
    </div>  
    <div class="body">
        <div class="container w-50">
            <div class="row">
                <div class="col-2">
                    <h3 class="text-center">Date: </h3>
                </div>
                <div class="col-5 mt-1">
                    <input type="date" class="form-control" id="date-field" >
                </div>
                <div class="col-3 mx-2 mt-1">
                    <a target="_blank" class="btn btn-primary" id="print"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                            height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                            <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1" />
                            <path
                                d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1" />
                        </svg> Imprimer</a>
                </div>
            </div>
        </div>
        <div class="container mt-3 " style="max-height:81vh; overflow:auto;">
            <table class="table">
                <thead>
                    <tr  class="bg-light">
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
                            <td><span class="btn btn-danger p-1 danger"
                                    onclick="confirmer(<?= $avance['a_id'] ?>)">Annuler</span></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <?php if (!empty($_SESSION['succes'])): ?>
                <div class="position-fixed bottom-0 end-0 p-3 succes" style="z-index: 11">
        <div id="liveToast" class="toast show text-light bg-success" role="alert" aria-live="assertive" aria-atomic="true">
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
            function confirmer(id) {
                if (confirm('Vous voulez vraiment annuler cette avance ?')) {
                    location.href = 'suppravance.php?a_id=' + id
                }
            }

            const succes = document.querySelector('.succes')
     

            setTimeout(() => {
                succes.remove()
            }, 5000)

            // const close =document.querySelector('.close')
            // close.addEventListener('click', () => {
            //     location.href = 'rapports.php'
            // })

	//IMPRESSION DYNAMIQUE
	function impressionSalaire(){

                document.querySelector('#print').href ='impressionAvance.php?date='+document.querySelector('#date-field').value
            }
	document.querySelector('#date-field').addEventListener('change', () => {	
		 impressionSalaire()		
	})
                document.querySelector('#print').href ='impressionAvance.php?date='+today(<?=$day ?>, <?=$month ?>, <?=$year ?>)
	function today(day, month, year){
		let jour = '-'+((day<10)?'0'+day:day)
		let mois = (month<10)?'0'+month:month
		let ans = year.toString()+'-'
		return ans+mois+jour
	}
				
        </script>
</body>

</html>