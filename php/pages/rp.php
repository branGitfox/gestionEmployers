<?php 
require '../class/Workers.php';

$pointage = new Workers();
$outPut = "";
$value = $_POST['date'];

$query = $pointage->getPdo()
->prepare("SELECT * FROM absences JOIN workers ON workers.w_id=absences.id_worker WHERE absences.date_ab LIKE '{$value}%'");
$query->execute();

if($query->rowCount() > 0){
    while($data = $query->fetch()){
        $outPut.= "<tr>
                        <td>
                            {$data['name']}
                        </td>
                        <td>
                            {$data['firstname']}
                        </td>
                        <td>
                            {$data['status']}
                        </td>
                        <td>
                            {$data['anomalie']}
                        </td>
                        <td>
                            {$data['ab_desc']}
                        </td>
                        <td>
                            {$data['date_ab']}
                        </td>
                        <td>
                        <span class='btn btn-danger p-1' onclick='confirmer({$data['id_ab']}, {$data['id_worker']})'>Annuler</span>
                        </td>
                    </tr>";
    }
}else {
    $outPut = "Aucun pointage sur cette date";
}

echo $outPut;