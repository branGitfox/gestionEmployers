<?php 
require '../class/Workers.php';
$workers = new Workers();

$value = $_POST['date'];
$outPut = "";

$query = $workers->getPdo()->prepare('SELECT * FROM avances JOIN workers ON workers.w_id=avances.id_worker WHERE avances.a_date= ? ');
$query->execute([$value]);

if($query->rowCount() > 0){
    while($data = $query->fetch()){
        $outPut .= "<tr>
                <td>{$data['name']}</td>
                <td>{$data['firstname']}</td>
        
        ";
        if($data['a_espece']==0){
            $outPut.="<td>".number_format($data['a_nature'])." Ar</td>";
        }
        if($data['a_nature']==0){
            $outPut.="<td>".number_format($data['a_espece'])." Ar</td>";
        }

        if($data['a_espece']==0){
            $outPut.="<td>Nature</td>";
        }
        if($data['a_nature']==0){
            $outPut.="<td>Espece</td>";
        }

        $outPut.="<td>{$data['a_desc']}</td>
                <td>{$data['a_date']}</td>
        ";
    }
}else {
    $outPut = "<p class='text-center'>Aucune Avance sur cette Date</p>";
}


echo $outPut;

