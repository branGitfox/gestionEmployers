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

    <title>STE TAVARATRA</title>
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

th, td{
    border: solid;
    padding: 10px;
}
.total-container {
    width: 100%;
    height: 7vh;
    border: solid;
    margin-bottom: 3px;
    display: grid;
    grid-template-columns: auto auto auto auto;
}

td {
text-align:center;
}

.total-container > div {
   
    display: grid;
    grid-template-rows: auto auto;
}

.total-container > div >div {
    border: solid grey .5px;
    text-align: center;
}

button {

position:absolute;
top:2rem;
left:-2rem;
transform:rotate(90deg);
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
                <div><?= $salaire->nbrSabs() ?></div>
            </div>
            <div>
            <div>Reste à payer</div>
                <div><?=number_format($salaire->sommeOfAllSalaryImpression())  ?></div>
            </div>
        </div>
        <table>
            <thead>
                <th>Nom ou Prenoms</th>
                <th>Fonction</th>
                <th>Salaire B</th>
                <th>Avances</th>
                <th>Absences</th>
                <th>Salaire R</th>
                <th>Signatures</th>
            </thead>
            <tbody>
                <?php foreach($salaire->getAllWorkersSalaryImpression() as $sal):?>
                    <tr>
                        <td><?php if(empty($sal['firstname'])){echo $sal['name'];}else{echo $sal['firstname'];}?></td>
                        <td><?=$sal['name_fonction']?></td>
                        <td><?=number_format($sal['salaire_base'],0,'',' ')?></</td>
                        <td><?=number_format( $sal['avances'],0,'','')?></</td>
                        <td><?= $sal['nbr_absence']?></</td>
                        <td><?=number_format($sal['salaire_reel'],0,'',' ')?></</td>
                        <td></td>
                    </tr>
                    <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <button>IMPRIMER</button>
    <script>
        document.querySelector('button').addEventListener('click', () => {
            window.print()
        })
    </script>
</body>
</html>