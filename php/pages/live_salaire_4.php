<?php 

require '../class/Workers.php';
$workers = new Workers();
$somme_salaires = 0;

$date = $_POST['date'];

$query = $workers->getPdo()->prepare('SELECT salaire_base FROM salaires WHERE date_s = ?');
$query->execute([$date]);
$data = $query->fetchAll();

foreach($data as $avances) {
    $somme_salaires += $avances['salaire_base'];
}

echo number_format($somme_salaires) .' '.'Ar';