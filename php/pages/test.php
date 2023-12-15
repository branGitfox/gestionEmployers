<?php

require '../class/Workers.php';

$test = new Workers();

$query = $test->getPdo()->prepare('SELECT DISTINCT date_s FROM salaires ORDER BY sa_id DESC');
$query->execute();
$data = $query->fetchAll();
// foreach($data as $date){
//     echo $date['date_s'];
// }


echo $test->sommeOfAllSalary();
