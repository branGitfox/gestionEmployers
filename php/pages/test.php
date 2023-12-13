<?php 

require '../class/Workers.php';

$workers = new Workers();
$workers->calculateRealSalaire();
foreach($workers->AllSum() as $total){
    echo $total['total'];
}
