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
	
                  if(Parent::getLastDate()['last'] != $date){
                $query = Parent::getPdo()
                ->prepare('SELECT * FROM workers');
                $query->execute();
                $workers= $query->fetchAll();
                foreach($workers as $worker){
                    $query = Parent::getPdo()
                    ->prepare('SELECT * FROM salaires WHERE id_worker = ? AND date_s = ?');
                    $query->execute([$worker['w_id'], $date]);
                    if($query->rowCount() == 0){
                        $insert = Parent::getPdo()
                        ->prepare('INSERT INTO salaires (`id_worker`, `date_s`, `salaire_base`, `salaire_reel`) VALUES (?, ?, ?, ?)');
                        $insert->execute([$worker['w_id'], $date, Parent::salarybase($worker['w_id'])['salaire_base'], Parent::salarybase($worker['w_id'])['salaire_base']]);
        //nombre d'absence
        $date= date('Y-m');
        $query2 = Parent::getPdo()
        ->prepare("SELECT nbr_absence FROM absences WHERE id_worker = ? AND date_ab LIKE '{$date}%'");
        $query2->execute([$worker['w_i']]);
        $nbr_absence = 0;
        if($query2->rowCount() > 0){

            $nbr_absence = $query2->fetch()['nbr_absence'];
        }
      
        //salaire de base
        $salaire_base = Parent::salarybase($worker['w_id'])['salaire_base'];

        //mise à  jour du salaire
        $avances = Parent::sumofAvance($worker['w_id']);
        $salaire_reel = (($salaire_base / 30) * (30-$nbr_absence)) - $avances;
        $update = Parent::getPdo()
        ->prepare("UPDATE salaires SET avances = ? ,salaire_reel = ?, nbr_absence = ? WHERE id_worker = ? AND date_s LIKE '{$date}%'");
        $update->execute([$avances, $salaire_reel, $nbr_absence, $worker['w_id']]);                    }
                    
                }
                $upd = Parent::getPdo()
                ->prepare('UPDATE lastsalary SET last = ? WHERE id = 1');
                $upd->execute([$date]);
            }else {
                $query = Parent::getPdo()
                ->prepare('SELECT * FROM workers');
                $query->execute();
                $workers= $query->fetchAll();
                foreach($workers as $worker){
                    $query = Parent::getPdo()
                    ->prepare('SELECT * FROM salaires WHERE id_worker = ? AND date_s = ?');
                    $query->execute([$worker['w_id'], $date]);
                    if($query->rowCount() == 0){
                        $insert = Parent::getPdo()
                        ->prepare('INSERT INTO salaires (`id_worker`, `date_s`, `salaire_base`, `salaire_reel`) VALUES (?, ?, ?, ?)');
                        $insert->execute([$worker['w_id'], $date, Parent::salarybase($worker['w_id'])['salaire_base'], Parent::salarybase($worker['w_id'])['salaire_base']]);
        //nombre d'absence
        $date= date('Y-m');
        $query2 = Parent::getPdo()
        ->prepare("SELECT nbr_absence FROM absences WHERE id_worker = ? AND date_ab LIKE '{$date}%'");
        $query2->execute([$worker['w_id']]);
        $nbr_absence = 0;
        if($query2->rowCount() > 0){

            $nbr_absence = $query2->fetch()['nbr_absence'];
        }
        

        //salaire de base
        $salaire_base = Parent::salarybase($worker['w_id'])['salaire_base'];

        //mise à  jour du salaire
        $avances = Parent::sumofAvance($worker['w_id']);
        $salaire_reel = (($salaire_base / 30) * (30-$nbr_absence)) - $avances;
        $update = Parent::getPdo()
        ->prepare("UPDATE salaires SET avances = ? ,salaire_reel = ?, nbr_absence = ? WHERE id_worker = ? AND date_s LIKE '{$date}%'");
        $update->execute([$avances, $salaire_reel, $nbr_absence, $worker['w_id']]);
                    }
                    
                }
            }

        $_SESSION['succes'] = 'Salaire mis à jour';
        header('location:parameter.php');
    }
}