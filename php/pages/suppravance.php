<?php 
session_start();
require '../class/Workers.php';
require '../class/Avance.php';
require '../class/Security.php';
$security = new Security();
$security->redirect();
$avances = new Avance ();
$avances->deleteAvance();
