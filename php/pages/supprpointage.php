<?php 
session_start();
require '../class/Workers.php';
$pointage = new Workers();
$pointage->deletePointageAndUpdateNumberOfAbsence();
?>