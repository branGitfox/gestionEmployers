<?php 
require '../class/Workers.php';
$salaire = new Workers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../sections/icone.php'?>

    <title>IMPRESSION | SALAIRES</title>
</head>
<style> 
.container {
    width: 90%;
    margin: auto;
    display: flex;
   flex-direction: column;
   align-items: center;
}

table {
    border: solid;
    border-collapse: collapse;
}
thead {
    position: sticky;
    top: 0;
}
th, td{
    border: solid;
    padding: 10px;
}
.total-container {
    width: 55.5%;
    height: 7vh;
    border: solid;
    margin-bottom: 3px;
    display: grid;
    grid-template-columns: auto auto auto auto;
}

.total-container > div {
   
    display: grid;
    grid-template-rows: auto auto;
}

.total-container > div >div {
    border: solid grey .5px;
    text-align: center;
}
</style>
<body>
    <div class="container">
        <div class="total-container">
            <div>
                <div>Total salaire base</div>
                <div><?=number_format($salaire->sommeOfAllSalaryBaseImpression())  ?></div>
            </div>
            <div>
                <div>Total avances</div>
                <div><?=number_format($salaire->sumOfAllAvancesImpression() ) ?></div>
            </div>
            <div>
            <div>Total absences</div>
                <div><?= $salaire->sumOfAllAbsences() ?></div>
            </div>
            <div>
            <div>Reste à payer</div>
                <div><?=number_format($salaire->sommeOfAllSalaryImpression())  ?></div>
            </div>
        </div>
        <table>
            <thead>
                <th>Nom</th>
                <th>Prenoms</th>
                <th>Salaire Base</th>
                <th>Avances</th>
                <th>Absences</th>
                <th>Salaire reel</th>
                <th>Signatures</th>
            </thead>
            <tbody>
                <?php foreach($salaire->getAllWorkersSalaryImpression() as $sal):?>
                    <tr>
                        <td><?= $sal['name']?></td>
                        <td><?=$sal['firstname']?></td>
                        <td><?=number_format($sal['salaire_base'])?></</td>
                        <td><?=number_format( $sal['avances'])?></</td>
                        <td><?= $sal['nbr_absence']?></</td>
                        <td><?=number_format($sal['salaire_reel'])?></</td>
                        <td></td>
                    </tr>
                    <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <button>print</button>
    <script>
        document.querySelector('button').addEventListener('click', () => {
            window.print()
        })
    </script>
</body>
</html>