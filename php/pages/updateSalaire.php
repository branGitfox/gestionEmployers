<?php 
session_start();
require '../class/Workers.php';
require '../class/Config.php';
$config = new Config();
$config->reinitialiseSalaire();