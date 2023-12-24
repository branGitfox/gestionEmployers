<?php 
session_start();
require '../class/Workers.php';
require '../class/Roles.php';

$roles = new Roles();
$roles->deleteRole();