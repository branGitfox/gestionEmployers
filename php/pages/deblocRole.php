<?php 
session_start();
require '../class/Workers.php';
require '../class/Roles.php';
require '../class/Security.php';
$security = new Security();
$security->redirect();
$roles = new Roles();
$roles->deblockRole();