<?php
session_start();
require '../class/Workers.php';
require '../class/Security.php';
$security = new Security();
// $security->disconnect();
$security->redirect();
$salaire = new Workers();
$salaire->createSalaire();

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

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
       
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

    .active-a {
        background-color: blueviolet;
    }

    #active-a {
        background-color: blueviolet;
    }

    .logo {
        position: relative;
        top: -5px;
    }

    thead {
        position: sticky;
        top: 0;
        /* background-color: #E8E9EB; */
        color: black;


    }

    .bloquer {
        position: absolute;
    top: 30%;
    left: 50%;

    }

    .a {
        position: absolute;
        top: 20%;
        left: 42%;
        font-size: 40px;
    }




    td a {
        color: red;

    }

    .prix {
        border-bottom-left-radius: 3px;
        border-bottom-right-radius: 3px;
    }

    .date {
        width: 110px;
        height: auto;
        /* border: solid; */
        position: absolute;
        top: -5.5rem;
        right: 2.4rem;
        display: flex;
        align-items: center;
        flex-direction: column;
    }

    .impression {
        position: absolute;
        top: 2.5rem;
        /* padding: 10px; */
        right: 1rem;
    }

    .none {
        display: none;
    }

    .little {
        width: 7rem;
    }

    .body {
        position: absolute;
        top: 8rem;
        right: 6rem;
        width: 84%;

    }

    /* @media screen and (max-width:1197px){
        main {
            display: none;
        }
    } */
</style>
<style>
    .radius-10 {
        border-radius: 10px !important;
    }

    .border-info {
        border-left: 5px solid #0dcaf0 !important;
    }

    .border-danger {
        border-left: 5px solid #fd3550 !important;
    }

    .border-success {
        border-left: 5px solid #15ca20 !important;
    }

    .border-warning {
        border-left: 5px solid #ffc107 !important;
    }


    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        width: 200px;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0px solid rgba(0, 0, 0, 0);
        border-radius: .25rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
        height: 100px;
    }

    .bg-gradient-scooter {
        background: #17ead9;
        background: -webkit-linear-gradient(45deg, #17ead9, #6078ea) !important;
        background: linear-gradient(45deg, #17ead9, #6078ea) !important;
    }

    .widgets-icons-2 {
        width: 56px;
        height: 56px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #ededed;
        font-size: 27px;
        border-radius: 10px;
    }

    .rounded-circle {
        border-radius: 50% !important;
    }

    .text-white {
        color: #fff !important;
    }

    .ms-auto {
        margin-left: auto !important;
    }

    .bg-gradient-bloody {
        background: #f54ea2;
        background: -webkit-linear-gradient(45deg, #f54ea2, #ff7676) !important;
        background: linear-gradient(45deg, #f54ea2, #ff7676) !important;
    }

    .bg-gradient-ohhappiness {
        background: #00b09b;
        background: -webkit-linear-gradient(45deg, #00b09b, #96c93d) !important;
        background: linear-gradient(45deg, #00b09b, #96c93d) !important;
    }

    .bg-gradient-blooker {
        background: #ffdf40;
        background: -webkit-linear-gradient(45deg, #ffdf40, #ff8359) !important;
        background: linear-gradient(45deg, #ffdf40, #ff8359) !important;
    }

    #container {
        width: 65%;
        position: absolute;
        top: 5px;
        left: 0;
        right: 0;
    }


</style>

<body>
    <nav>
        <?php include '../sections/navbars.php'; ?>
        <?php if ($_SESSION['user']['role_name'] != 'Utilisateur'):?>
        <div id="container" class="container">
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
                <div class="col">
                    <div class="card radius-10 border-start border-0 border-3 border-info">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">Total Salaires </p>
                                    <h4 id="base" class="my-1 text-info"><?= number_format($salaire->sommeOfAllSalaryBase())?> Ar</h4>
                                    <p class="mb-0 font-13 cycle"><?= date('Y-m')?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10 border-start border-0 border-3 border-danger">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">Total Avances</p>
                                    <h4 id="avance" class="my-1 text-danger"><?= number_format($salaire->sumOfAllAvances())?> Ar</h4>
                                    <p class="mb-0 font-13 cycle"><?= date('Y-m')?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10 border-start border-0 border-3 border-success">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">Reste à Payer</p>
                                    <h4 class="my-1 text-success" id="total"><?= number_format($salaire->sommeOfAllSalary()) ?> Ar</h4>
                                    <p class="mb-0 font-13 cycle"><?= date('Y-m')?></p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10 border-start border-0 border-3 border-warning">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">Total Absences</p>
                                    <h4 id="abs" class="my-1 text-warning"><?= number_format($salaire->sumOfAllAbsences()) ?></h4>
                                    <p class="mb-0 font-13 cycle"><?= date('Y-m')?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="body">
            <div class="container mt-1" style="position:relative;left:7%; height:90vh;overflow:auto;">
                <table class="table ">
                    <thead class="bg-light">
                        <tr>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Salaire Base</th>
                            <th>Avances</th>
                            <th>Absences</th>
                            <th>Salaire Reel</th>
                        </tr>

                    </thead>
                    <tbody id="salaryList">
                        <?php foreach ($salaire->getAllWorkersSalary() as $sal): ?>
                            <tr>
                                <td>
                                    <?= $sal['name'] ?>
                                </td>
                                <td>
                                    <?= $sal['firstname'] ?>
                                </td>
                                <td>
                                    <?= $sal['salaire_base'] ?>
                                </td>
                                <td>
                                    <?= $sal['avances'] ?>
                                </td>
                                <td><a href="abs.php?worker_id=<?= $sal['w_id'] ?>&d=<?= $sal['date_s'] ?>" title="Voir">
                                        <?= $sal['nbr_absence'] ?>
                                    </a></td>
                                <td>
                                    <?= $sal['salaire_reel'] ?>
                                </td>
                            </tr>
                        <?php endforeach ?>

                    </tbody>
                </table>
            </div>

            <!-- <div class="card text-center total">
                <div class="card-header">TOTAL</div>
                <ul class="list-group">
                    <li class="list-group-item" id="total">
                        
                    </li>
                </ul>
            </div> -->

            <div class="date">
                <select class="form-select bg-primary text-light" id="searchField">
                    <?php foreach ($salaire->getListOfDate() as $date): ?>
                        <option value="<?= $date['date_s'] ?>">
                            <?= $date['date_s'] ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="impression">
            <a target="_blank" class="btn btn-primary" id="print"><svg xmlns="http://www.w3.org/2000/svg" width="17" height="17"
                    fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                    <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1" />
                    <path
                        d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1" />
                </svg> Imprimer</a>
        </div>
        <?php else :?>
                <h5 class="text-center text-danger a">Vous n'avez pas acces !!</h5>
                <img class="bloquer" src="../../assets/imgs/téléchargement.png" alt="">
        <?php endif ?>
        <script src="../../assets/js/jquery.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#searchField').change(function () {
                    let date = $('#searchField').val()
                    //  alert(date)
                    if (date != '') {
                        $.ajax({
                            url: 'live_salaire_1.php',
                            type: 'POST',
                            data: { date: date },
                            success: function (data) {
                                $('#salaryList').html(data)
                            }

                        })
                    }

                    $.ajax({
                        url: 'live_salaire_2.php',
                        type: 'POST',
                        data: { date: date },
                        success: function (data) {
                            $('#total').html(data)
                        }
                    })

                    $.ajax({
                        url: 'live_salaire_3.php',
                        type: 'POST',
                        data: { date: date },
                        success: function (data) {
                            $('#avance').html(data)
                        }
                    })

                    
                    $.ajax({
                        url: 'live_salaire_4.php',
                        type: 'POST',
                        data: { date: date },
                        success: function (data) {
                            $('#base').html(data)
                        }
                    })

                    $.ajax({
                        url: 'live_salaire_5.php',
                        type: 'POST',
                        data: { date: date },
                        success: function (data) {
                            $('#abs').html(data)
                        }
                    })

                    $.ajax({
                        url: 'live_salaire_n.php',
                        type: 'POST',
                        data: { date: date },
                        success: function (data) {
                            $('.cycle').html(data)
                        }
                    })
                })

            })
        </script>
        <script>
            function confirmer(id) {
                if (confirm('Vous voulez vraiment supprimer cet employé ?')) {
                    location.href = 'suppremployer.php?worker_id=' + id
                }
            }

            window.addEventListener('mousemove', () => {
                const date = document.querySelector('.date')
                const card = document.querySelector('.card')
                printBtn.classList.remove('none')
                date.classList.remove('little')
                card.classList.remove('little')
            })
            function impressionSalaire(){

                document.querySelector('#print').href ='impressionSalaire.php?date='+document.querySelector('.form-select').value
            }
	document.querySelector('.form-select').addEventListener('change', () => {	
		 impressionSalaire()		
	})
            impressionSalaire()

        </script>
</body>

</html>