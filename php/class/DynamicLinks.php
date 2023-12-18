<?php 

class DynamicLinks {
    /**
     * Recupere le lien de la page courante
     */
    private function getPageLink() {
        return substr($_SERVER['PHP_SELF'], 28, strlen($_SERVER['PHP_SELF']));
    }

    /**
     * Renvoie true si le lien passé en param correspond au lien de la page courante false sinon
     */

    public function matchLink($link){
        if($this->getPageLink() == $link){
            return true;
        }
         return false;
    }

    
}