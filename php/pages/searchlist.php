<?php 
require '../class/Workers.php';
$wrkrs = new Workers();
// echo $_POST['worker']; 
// $sql = "SELECT * FROM workers JOIN fonctions ON fonctions.id=workers.id_fonction JOIN departements ON departements.id=workers.id_depart";   
if(isset($_POST['worker']) && !empty($_POST['worker'])){
    $value = $_POST['worker'];
    $sql= "SELECT * FROM workers JOIN fonctions ON fonctions.id=workers.id_fonction JOIN departements ON departements.id=workers.id_depart WHERE workers.w_id LIKE '%{$value}%' OR  workers.name LIKE '%{$value}%' OR workers.firstname LIKE '%{$value}%' OR fonctions.name_fonction LIKE '%{$value}%' OR workers.sexe LIKE '%{$value}%' OR departements.name_depart LIKE '%{$value}%'";
}
 

$list = "";
try{
    $query = $wrkrs->getPdo()->prepare($sql);
    $query->execute();
}catch(Exception $e){

}


if($query->rowCount() > 0) {
    while($data =$query->fetch()){
        $list.="<tr>
                 <td>{$data['w_id']}</td>   
                <td>{$data['name']}</td>
                <td>{$data['firstname']}</td>
                <td>{$data['name_fonction']}</td>
                <td>{$data['sexe']}</td>
                <td>{$data['name_depart']}</td>
                <td>{$data['contact']}</td>
                <td><a href='modifieremployer.php?worker_id={$data['w_id']}' ><svg id='look' xmlns='http://www.w3.org/2000/svg' width='25' height='25' fill='black' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z'/>
              </svg></a> <span class='supbtn' onclick='confirmer({$data['w_id']})'><svg id='delete' xmlns='http://www.w3.org/2000/svg' width='25' height='25' fill='red' class='bi bi-trash' viewBox='0 0 16 16'>
                <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z'/>
                <path d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z'/>
              </svg></span><a href='listeemployer.php?worker_id={$data['w_id']}' ><svg id='popUpSwitch' xmlns='http://www.w3.org/2000/svg' width='25' height='25' fill='blue' class='bi bi-person-lines-fill' viewBox='0 0 16 16'>
              <path d='M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1z'/>
            </svg></a>
              </td>
              </tr>";



    }
}else {
    $list = 'Aucun Employé trouvé';
}


echo $list;


