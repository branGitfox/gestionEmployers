
<?php 

require '../class/Workers.php';
require '../class/Fonctions.php';
$fonc = new Fonctions();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <th>id</th>
            <th>fonction</th>
            <th>employé occupant</th>
        </thead>
        <tbody>
            <?php foreach($fonc->getNumbersOfWorkerInAFunction() as $fonction):?>
                <tr>
                    <td><?=$fonction['id']?></td>
                    <td><?=$fonction['name_fonction']?></td>
                    <td><?=$fonction['nbr']?></td>
                </tr>
            <?php endforeach?>

        </tbody>
    </table>
</body>
</html>
