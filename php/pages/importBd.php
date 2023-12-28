<?php 
require '../class/Workers.php';
$worker = new Workers();
$bd = '../../databases/'.substr($_POST['bd'], 12, strlen($_POST['bd']));
$q="";
/**IMPORTATION D"UNE BASE DE DONNEE */

// /**IMPORTATION D"UNE BASE DE DONNEE */

$connection = mysqli_connect('localhost','root','','tavaratra');
$filename = $bd;
$handle = fopen($filename,"r+");
$contents = fread($handle,filesize($filename));
$sql = explode(';',$contents);
foreach($sql as $query){
  $result = mysqli_query($connection,$query);
  if($result){
      echo '<tr style="display:none;"><td><br></td></tr>';
      echo '<tr style="display:none;"><td>'.$query.' <b>SUCCESS</b></td></tr>';
      echo '<tr style="display:none;"><td><br></td></tr>';
  }
}
fclose($handle);
