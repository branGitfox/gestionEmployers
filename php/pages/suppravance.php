<?php 
session_start();
require '../class/Workers.php';
require '../class/Avance.php';
$avances = new Avance ();
$avances->deleteAvance();
