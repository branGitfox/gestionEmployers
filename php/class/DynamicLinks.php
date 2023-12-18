<?php 

class DynamicLinks {
    private function getPageLink() {
        return substr($_SERVER['PHP_SELF'], 28, strlen($_SERVER['PHP_SELF']));
    }

    public function matchLink($link){
        if($this->getPageLink() == $link){
            return true;
        }
         return false;
    }

    
}