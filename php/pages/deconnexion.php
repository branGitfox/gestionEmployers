<?php 
session_start();
require '../class/Security.php';
$security = new Security();
$security->disconnect();