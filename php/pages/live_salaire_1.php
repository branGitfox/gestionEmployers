<?php 
require '../class/Workers.php';

$salaire = new Workers();
$outPut = "";
$date = $_POST['date'];
echo $date;

$query = $salaire->getPdo()->prepare("SELECT * FROM salaires JOIN workers ON workers.w_id = salaires.id_worker WHERE date_s LIKE '{$date}%'");
$query->execute();

if($query->rowCount() > 0){
    while($data = $query->fetch()){
        $outPut .= "<tr>
                        <td>{$data['name']}</td>
                        <td>{$data['firstname']}</td>
                        <td>{$data['salaire_base']}</td>
                        <td>{$data['avances']}</td>
                        <td><a href='abs.php?worker_id={$data['w_id']}'>{$data['nbr_absence']}</a></td>
                        <td>{$data['salaire_reel']}</td>
";
    }

}else {
    $outPut = '<p>Impossible d\'afficher les salaires';
}

echo $outPut;