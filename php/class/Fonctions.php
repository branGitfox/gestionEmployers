<?php 

class Fonctions extends Workers {
  /**
   * retourn la liste des fonctions venant de la table fonctions
   */
    public function getListOfFonctions() {
        $query = Parent::getPdo()->query('SELECT * FROM fonctions');
        $query->execute();
        return $query->fetchAll();
    }
}