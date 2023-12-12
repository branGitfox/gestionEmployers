<?php 

class Departements  extends Workers{
    /**
     * return la liste des departements venant de la base de donnée
     */
    public function getListOfDepartement(){
        $query = Parent::getPdo()->query('SELECT * FROM departements');
        $query->execute();
        return $query->fetchAll();
    }
}