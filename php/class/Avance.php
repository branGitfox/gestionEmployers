<?php   

class Avance extends Workers {
    public function listOfAvance() {
        $date = date('Y-m');
        $query = Parent::getPdo()
        ->prepare("SELECT * FROM avances JOIN workers ON workers.w_id=avances.id_worker WHERE avances.a_date LIKE '{$date}%'  ORDER BY a_id DESC LIMIT 20");
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
        //recuperation de l'id de l'employé à qui appartient l'avance à supprimé
        $query = Parent::getPdo()
        ->prepare('SELECT * FROM avances WHERE a_id = ?');
        $query->execute([$this->getAvanceId()]);
        $data = $query->fetch();
        $id_worker = $data['id_worker'];

        //suppression de l'avance
        $delete = Parent::getPdo()
        ->prepare('DELETE FROM avances WHERE a_id = ?');
        $delete->execute([$this->getAvanceId()]);

        //nbr d'absence 
        $date= date('Y-m');
        $query2 = Parent::getPdo()
        ->prepare("SELECT COUNT(id_ab) as nbr_absence FROM absences WHERE id_worker = ? AND status = 'non justifié' AND date_ab LIKE '{$date}%'");
        $query2->execute([$id_worker]);
        $nbr_absence = $query2->fetch()['nbr_absence'];

        //salaire de base
        $salaire_base = Parent::salarybase($id_worker)['salaire_base'];

        //mise à  jour du salaire
        $avances = Parent::sumofAvance($id_worker);
        $salaire_reel = (($salaire_base / 30) * (30-$nbr_absence)) - $avances;
        $update = Parent::getPdo()
        ->prepare('UPDATE salaires SET avances = ? ,salaire_reel = ?, nbr_absence = ? WHERE id_worker = ?');
        $update->execute([$avances, $salaire_reel, $nbr_absence, $id_worker]);
        $_SESSION['succes']='Succès !!';
        header('location:afficherAvance.php');
     }




}