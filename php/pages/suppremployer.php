<?php  
session_start();
require '../class/Workers.php';
$worker = new Workers();
$worker->deleteWorkerById();