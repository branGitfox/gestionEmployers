<?php 
$conn = mysqli_connect('127.0.0.1', 'root', '', 'tavaratra');
$bd = '../../databases/'.substr($_POST['bd'], 12, strlen($_POST['bd']));
function restore($bd, $conn){
    $sql = '';
    $error = '';
    if(file_exists($bd)){
        $lines = file($bd);
        foreach ($lines as $line){
            if(substr($line,0,2)== '-' || $line == ''){
                continue;
            }
            $sql.=$line;
            if(substr(trim($line), -1,1)==';'){
                $result=mysqli_query($conn, $sql);
                if(!$result){
                    $error.=mysqli_error($conn)."\n";
                }
                $sql="";
            }
        }
        if($error){
            $response = ['type'=>"error", "message"=>$error];
        }else{
            $response = ['type'=>'success','message'=>'reussi'];
        }
    }
    return $response;
}
 restore($bd, $conn);



