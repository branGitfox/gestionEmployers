<?php 

class Pointage extends Workers {
    public function listOfPointage() {
        $date = date('Y-m');
        $query = $this->getPdo()
        ->prepare("SELECT * FROM absences JOIN workers ON Workers.w_id= absences.id_worker WHERE absences.date_ab LIKE '{$date}%' ORDER BY absences.id_ab DESC");
        $query->execute();
        return $query->fetchAll();
    }

    /**
     * compte le nombre d'absence pour l'ancienne version 
     */

    public function nbrOfAbsence()
     {
        $date= date('Y-m');
        $query = Parent::getPdo()
        ->prepare("SELECT COUNT(id_ab) as nbr_absence FROM absences WHERE id_worker = ? AND status = 'non justifié' AND date_ab LIKE '{$date}%'");
        $query->execute([Parent::getWorkerID()]);
        return $query->fetch();
    }

     /**
     * compte le nombre d'absence nouvelle version
     */


     public function newNbrOfAbsence() {
        $date = date('Y-m');
        $query = Parent::getPdo()
        ->prepare("SELECT nbr_absence FROM absences WHERE id_worker = ? AND date_ab LIKE '{$date}%'");
        $query->execute([Parent::getWorkerId()]);
        if($query->rowCount() > 0){

            return $query->fetch()['nbr_absence'];
        }else {
            return 0;
        }
     }


  
}