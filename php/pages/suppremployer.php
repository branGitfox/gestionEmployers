<?php  
session_start();
require '../class/Workers.php';
require '../class/Security.php';
$security = new Security();
$security->redirect();
$worker = new Workers();
$worker->deleteWorkerById();