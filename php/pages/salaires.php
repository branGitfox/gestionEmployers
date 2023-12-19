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
<style>

    *{
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
        top:0;
        background-color: #E8E9EB;
        color: white;

      
    }

    .total{
        position: absolute;
        /* border: solid grey .1px; */
        width: 200px;
        height: 50px;
        top: 4rem;
    }



td a {
    color: red;
    
}
.prix {
    border-bottom-left-radius: 3px;
    border-bottom-right-radius: 3px;
}

.date {
    width: 200px;
    height: auto;
    /* border: solid; */
    position: absolute;
    top: 10rem;
    display: flex;
    align-items: center;
    flex-direction: column;
}

.impression {
    position: absolute;
    top: 13rem;
    padding: 10px;
}
.none {
    display: none;
}

.little{
    width: 7rem;
}
</style>

<body>
<nav>
           <?php include '../sections/navbars.php';?>
        <div class="body">
        <div class="container mt-1" style="position:relative;left:7%; height:92vh;overflow:auto;">
            <table class="table table-striped">
                <thead >
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
                    <?php foreach($salaire->getAllWorkersSalary() as $sal) :?>
                        <tr>
                            <td><?= $sal['name']?></td>
                            <td><?= $sal['firstname']?></td>
                            <td><?= $sal['salaire_base']?></td>
                            <td><?= $sal['avances']?></td>
                            <td><a href="abs.php?worker_id=<?=$sal['w_id']?>&d=<?=$sal['date_s']?>"><?= $sal['nbr_absence']?></a></td>
                            <td><?= $sal['salaire_reel']?></td>
                        </tr>
                     <?php endforeach ?>   

                </tbody>
            </table>
        </div>
    <div class="card text-center total">
        <div class="card-header">TOTAL</div>
        <ul class="list-group">
            <li class="list-group-item" id="total"><?= number_format($salaire->sommeOfAllSalary())?> AR</li>
        </ul>
    </div>

    <div class="date">
        <select  class="form-select bg-primary text-light" id="searchField">
            <?php foreach($salaire->getListOfDate() as $date):?>
                <option value="<?= $date['date_s']?>"><?= $date['date_s']?></option>
            <?php endforeach ?>    
        </select>
    </div>
        </div>
    <div class="impression">
        <button class="btn btn-primary" id="print"><svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
  <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1"/>
  <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1"/>
</svg> Imprimer</button>
    </div>
       
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
            })

        })
    </script>
    <script>
        function confirmer(id) {
            if (confirm('Vous voulez vraiment supprimer cet employé ?')) {
                location.href = 'suppremployer.php?worker_id=' + id
            }
        }

        
        const printBtn =document.getElementById('print')
        printBtn.addEventListener('click', ()=> {
            const date =document.querySelector('.date')
        const card = document.querySelector('.card')
            printBtn.classList.add('none')
            date.classList.add('little')
            card.classList.add('little')
            window.print()
      
        })

        window.addEventListener('mousemove', () => {
            const date =document.querySelector('.date')
        const card = document.querySelector('.card')
            printBtn.classList.remove('none')
            date.classList.remove('little')
            card.classList.remove('little')
        })
    </script>
</body>

</html>