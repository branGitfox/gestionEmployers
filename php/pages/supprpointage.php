<?php 
session_start();
require '../class/Workers.php';
require '../class/Security.php';
$security = new Security();
$security->redirect();
$pointage = new Workers();
$pointage->deletePointageAndUpdateNumberOfAbsence();
?>