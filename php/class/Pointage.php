<?php 

class Pointage extends Workers {
    public function listOfPointage() {
        $query = $this->getPdo()
        ->prepare('SELECT * FROM absences JOIN workers ON Workers.w_id= absences.id_worker ORDER BY absences.id_ab DESC');
        $query->execute();
        return $query->fetchAll();
    }

  
}