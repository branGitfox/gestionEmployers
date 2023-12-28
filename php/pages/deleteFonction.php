<?php 
session_start();
require '../class/Workers.php';
require '../class/Fonctions.php';
require '../class/Security.php';
$security = new Security();
$security->redirect();
$fonc = new Fonctions();
$fonc->deleteF();
