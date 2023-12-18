<?php 

class Security {
    
    public function disconnect() {  
        session_destroy();
        header('location:../../login.php');     
    }

    public function redirect() {
        if(!$_SESSION['user']){
            if($this->dir() == 'index.php'){
                header('location:login.php');
            }else {
            header('location:../../login.php');

            }
        }
    }

    public function dir() {
        return substr($_SERVER['PHP_SELF'], 18, strlen($_SERVER['PHP_SELF']));
    }
}