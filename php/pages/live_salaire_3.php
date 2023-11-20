<?php 

require '../class/Workers.php';
$workers = new Workers();
$somme_avances = 0;

$date = $_POST['date'];

$query = $workers->getPdo()->prepare('SELECT avances FROM salaires WHERE date_s = ?');
$query->execute([$date]);
$data = $query->fetchAll();

foreach($data as $avances) {
    $somme_avances += $avances['avances'];
}

echo number_format($somme_avances) .' '.'Ar';