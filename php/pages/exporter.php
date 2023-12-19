<?php

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "tavaratra";
$backup_file = 'tavaratra.sql';

$command = "C:\xampp\mysql\bin\mysqldump --host=$servername --user=$username --password=$password --add-drop-table $dbname > $backup_file";


system($command);
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="' . basename($backup_file) . '"');
readfile($backup_file);

// unlink($backup_file);
?>
