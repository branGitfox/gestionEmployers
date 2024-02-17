<?php
session_start();
require '../class/Workers.php';
require '../class/Avance.php';
require '../class/Security.php';
$security = new Security();
// $security->disconnect();
$security->redirect();
$printAvance = new Workers();
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="../../assets/imgs/5343441.png" type="image/x-icon">
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
.total{
border:none; 
}
td {
text-align:center;
}

.hide{
border:none;
}
h2{
text-align:center;
}
</style>
<body>	

	<div class="container">
	<h2>SOCIETE TAVARATRA</h2>
		<table>
			<thead>
                <th>Nom ou Prenoms</th>
                <th>Fonction</th>
                <th>Avances</th>
                <th>type</th>
                <th>Details</th>
                <th>Date</th>
                <th>Signatures</th>
            </thead>
            <tbody>
                <?php foreach($printAvance->impressionAvance() as $avance):?>
           		
                        <tr>
                            <td>
                                <?php if($avance['firstname']==''){echo $avance['name'];}else{echo $avance['firstname'];}?>
                            </td>
                            <td>
                                <?= $avance['name_fonction'] ?>
                            </td>
                            <?php if ($avance['a_espece'] == 0): ?>
                                <td>
                                    <?= number_format($avance['a_nature'],0,'',' ') ?> Ar
                                </td>
                            <?php elseif (($avance['a_nature'] == 0)): ?>
                                <td>
                                    <?= number_format($avance['a_espece'],0,'',' ') ?> Ar
                                </td>
                            <?php else: ?>
                                <td>
                                    <?= number_format($avance['a_espece'] + $avance['a_nature'],0,'',' ') ?> Ar
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
                           <td></td>
                        </tr>
                    <?php endforeach ?>
			<tr class="total">
				<td class="hide"></td>
				
				
				<th>TOTAL</th>
				<td><?= number_format($printAvance->impressionAvanceTotal(), 0, '', ' ')?> Ar</td>
			</td>
              </tbody>
		
		
         </table>
	</div>
</body>

</html>