<?php 

class Config extends Workers {
    /**
     * Reinitialise l'application 
     */
    public function dropDatabase() 
    {
        $dropWorkers = Parent::getPdo()
        ->prepare('TRUNCATE TABLE workers');
        $dropWorkers->execute();
        $dropSalaires = Parent::getPdo()
        ->prepare('TRUNCATE TABLE salaires');
        $dropSalaires->execute();
        $dropAbsences = Parent::getPdo()
        ->prepare('TRUNCATE TABLE absences');
        $dropAbsences->execute();
        $dropAvances = Parent::getPdo()
        ->prepare('TRUNCATE TABLE avances');
        $dropAvances->execute();
        $dropRole = Parent::getPdo()
        ->prepare('DELETE FROM roles WHERE role_name = "Utilisateur" AND OR role_name = "Superviseur"');
        $dropRole->execute();
        $_SESSION['succes'] = 'Application reinitialisée';
        header('location:parameter.php');
    }

    /**
     * Mets à jour le salair du mois
     */

    public function reinitialiseSalaire() {
        $date = date('Y-m');
        $query = Parent::getPdo()
        ->prepare("DELETE FROM Salaires WHERE date_s LIKE '{$date}%'");
        $query->execute();
        $_SESSION['succes'] = 'Salaire mis à jour';
        header('location:parameter.php');
    }
}