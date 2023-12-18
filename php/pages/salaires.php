<?php 
require '../class/Workers.php';
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
    <title>Document</title>
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
        background-color: blueviolet;
        color: white;

      
    }

    .total{
        position: absolute;
        /* border: solid grey .1px; */
        width: 200px;
        height: 50px;
        top: 4rem;
        display: grid;
        grid-template-rows: 1fr 1fr;
        /* grid-template-columns: 1fr; */
        border-radius: 3px;
    }
.total div {
    border: solid grey .1px;
    padding: 10px;
    /* background-color: red; */
    display: flex;
    justify-content: center;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
}

.header {
    letter-spacing: 2px;
    font-weight: bold;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
    background-color: blueviolet;
    color: goldenrod;
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
    top: 13rem;
    display: flex;
    align-items: center;
    flex-direction: column;
}

</style>

<body>
<nav>
           <?php include '../sections/navbars.php';?>
        <div class="body">
        <div class="container mt-1" style="position:relative;left:7%; height:92vh;overflow:auto;">
            <table class="table">
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
    <div class="total">
        <div class="header">TOTAL</div>
        <div class="prix" id="total"><?= number_format($salaire->sommeOfAllSalary())?> AR</div>
    </div>

    <div class="date">
        <h3 class="text-center pt-1">Date</h3>
        <select  class="form-select bg-primary text-light" id="searchField">
            <?php foreach($salaire->getListOfDate() as $date):?>
                <option value="<?= $date['date_s']?>"><?= $date['date_s']?></option>
            <?php endforeach ?>    
        </select>
    </div>
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
    </script>
</body>

</html>