<?php 

require '../class/Workers.php';

$salaire = new Workers();

$date = $_POST['date'];
$query = $salaire->getPdo()->prepare("SELECT * FROM salaires WHERE date_s LIKE '{$date}%'");
$query->execute();
$data = $query->fetchAll();
$salaire_total = 0;
foreach($data as $salaire){
    $salaire_total += $salaire['salaire_reel'];
}

echo number_format($salaire_total)." "."Ar";