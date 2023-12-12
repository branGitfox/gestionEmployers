<?php   

class Avance extends Workers {
    public function listOfAvance() {
        $query = Parent::getPdo()
        ->prepare('SELECT * FROM avances JOIN workers ON workers.w_id=avances.id_worker ORDER BY a_id DESC LIMIT 20');
        $query->execute();

        return $query->fetchAll();
    }
}