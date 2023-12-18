<?php 

class Security {
    
    public function disconnect() {  
        session_destroy();
        header('location:../../login.php');     
    }

    public function redirect() {
        if(!$_SESSION['user']){
            header('location:../../login.php');
        }
    }
}