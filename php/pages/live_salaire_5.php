<?php 

require '../class/Workers.php';
$workers = new Workers();
$date = $_POST['date'];
$somme_absences = 0;
$query = $workers->getPdo()->prepare("SELECT nbr_absence FROM salaires WHERE date_s LIKE '{$date}%'");
$query->execute();
$data = $query->fetchAll();

foreach($data as $abs) {
    $somme_absences += $abs['nbr_absence'];
}

echo $somme_absences;