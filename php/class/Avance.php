<?php   

class Avance extends Workers {
    public function listOfAvance() {
        $query = Parent::getPdo()
        ->prepare('SELECT * FROM avances JOIN workers ON workers.w_id=avances.id_worker ORDER BY a_id DESC LIMIT 20');
        $query->execute();
        return $query->fetchAll();
    }

    /**
     * Recupere l'id de l'avance à supprimer
     */

    private function getAvanceId() {
        if(isset($_GET['a_id'])){
            return $_GET['a_id'];
        }
    }

    /**
     * supprime un avance par son ID dans la base de donnée
     */

     public function deleteAvance() {
        $query = Parent::getPdo()
        ->prepare('DELETE FROM avances WHERE a_id = ?');
        $query->execute([$this->getAvanceId()]);
        $_SESSION['succes']='Succès !!';
        header('location:afficherAvance.php');
     }


}