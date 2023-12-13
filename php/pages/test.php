<?php 

require '../class/Workers.php';

$workers = new Workers();
$workers->calculateRealSalaire();
echo $workers->showSalaryReel()['salaire_reel'];
