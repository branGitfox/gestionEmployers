﻿<?php

class Workers
{
    private $host = '127.0.0.1';
    private $db = 'tavaratra';
    private $user = 'root';
    private $pdo = null;
    private $succes;
    private $error;
    public function connect()
    {
        return new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db . ';', $this->user, '');
    }

    //retourne la singleton de la connexion à la base de donnée

    public function getPdo()
    {
        if ($this->pdo == null) {
            $this->pdo = $this->connect();
        }
        return $this->pdo;
    }

    /**
     * Gere la formulaire d'ajout d'employer
     */

    public function newWorker()
    {
        if (isset($_POST['envoyer'])) {
            if (isset($_POST['name'], $_POST['firstname'], $_POST['fonctions'], $_POST['cin'], $_POST['adresse'], $_POST['origine'], $_POST['salaire'], $_POST['responsable'], $_POST['contact'], $_POST['departements'], $_POST['date_entree'], $_POST['sexe'])) {
                $name = htmlentities(htmlspecialchars($_POST['name']));
                $firstname = htmlentities(htmlspecialchars($_POST['firstname']));
                $fonction = htmlentities(htmlspecialchars($_POST['fonctions']));
                $cin = htmlentities(htmlspecialchars($_POST['cin']));
                $adresse = htmlentities(htmlspecialchars($_POST['adresse']));
                $origine = htmlentities(htmlspecialchars($_POST['origine']));
                $salaire = htmlentities(htmlspecialchars($_POST['salaire']));
                $responsable = htmlentities(htmlspecialchars($_POST['responsable']));
                $contact = htmlentities(htmlspecialchars($_POST['contact']));
                $departement = htmlentities(htmlspecialchars($_POST['departements']));
                $date_entree = htmlentities(htmlspecialchars($_POST['date_entree']));
                $sexe = htmlentities(htmlspecialchars($_POST['sexe']));
                if ($_FILES['image']['name'] == '') {
                    $new_image_name = 'default.png';
                    $this->insertWorker($name, $firstname, $fonction, $cin, $adresse, $origine, $salaire, $responsable, $contact, $new_image_name, $departement, $date_entree, $sexe);
                    $this->getSucces('Employé bien ajouté');

                }

                if (isset($_FILES['image']) && !empty($_FILES['image'])) {
                    $image = $_FILES['image'];
                    $image_name = $image['name'];
                    $image_tmp = $image['tmp_name'];
                    $explode_image_name = explode('.', $image_name);
                    $image_ext = end($explode_image_name);
                    $allowed_ext = ['jpg', 'png', 'gif', 'jpeg'];
                    if (in_array(strtolower($image_ext), $allowed_ext)) {
                        $new_image_name = time() . '.' . $image_ext;
                        if (move_uploaded_file($image_tmp, '../images/' . $new_image_name)) {
                            $this->insertWorker($name, $firstname, $fonction, $cin, $adresse, $origine, $salaire, $responsable, $contact, $new_image_name, $departement, $date_entree, $sexe);
                            $this->getSucces('Employé bien ajouté');
                        }

                    }
                }


            }
        }

    }

    /**
     * Ajoute le nouveau employé dans la base de donnée
     */

    private function insertWorker($name, $firstname, $id_fonction, $cin, $adresse, $origine, $salaire_base, $responsable, $contact, $image, $id_depart, $date_entree, $sexe)
    {
        $query = $this->getPdo()
            ->prepare('INSERT INTO workers(`name`, `firstname`, `id_fonction`, `cin`, `adresse`, `origine`, `salaire_base`, `responsable`, `contact`, `image`, `id_depart`, `date_entree`, `sexe`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
        $query->execute([$name, $firstname, $id_fonction, $cin, $adresse, $origine, $salaire_base, $responsable, $contact, $image, $id_depart, $date_entree, $sexe]);

    }

    /**
     * retourne liste des employées sans contraintes
     */

    public function listOfWorker()
    {
        $query = $this->getPdo()
            ->prepare("SELECT * FROM workers JOIN fonctions ON fonctions.id=workers.id_fonction JOIN departements ON departements.id=workers.id_depart");
        $query->execute();
        return $query->fetchAll();
    }

    /**
     * Affiche les informations de l'employé dans la box
     */
    public function showWorkerInfo()
    {
        if (isset($_GET['worker_id'])) {
            $w_id = $_GET['worker_id'];
            $query = $this->getPdo()
                ->prepare('SELECT * FROM workers JOIN fonctions ON fonctions.id=workers.id_fonction JOIN departements ON departements.id=workers.id_depart WHERE workers.w_id = ?');
            $query->execute([$w_id]);
            return $query->fetch();
        }
    }
    /**
     * Prend les erreur en paramètre
     */
    protected function getSucces($succes)
    {
        $this->succes = $succes;
    }

    /**
     * retourne les succès
     */
    public function succes()
    {
        return $this->succes;
    }

    /**
     * recupere l'id d'un employé
     */

    protected function getWorkerId()
    {

        if (isset($_GET['worker_id'])) {
            return $_GET['worker_id'];
        }
    }

    /**
     * Supprime un employé par son ID et l'enregistrer dans un historique
     */
    public function deleteWorkerById()
    {

        $archivage = $this->getPdo()
                ->prepare('INSERT INTO archives (`arch_name`, `arch_firstname`, `arch_`,``,``) VALUES (?, ?, ?, ?, ?)');
                $archivage->execute([]);

        //derniere action 
        $query = $this->getPdo()
            ->prepare('DELETE FROM workers WHERE w_id = ?');
        $query->execute([$this->getWorkerId()]);
        $_SESSION['succes'] = 'Suppression reussi';
        header('location:listeemployer.php');
    }

    /**
     * autocompletera le formulaire de modification avec les infos de l'employé à modifier
     */
    public function autoCompleteInputByWorkerId()
    {
        $query = $this->getPdo()
            ->prepare('SELECT * FROM workers JOIN fonctions ON fonctions.id=workers.id_fonction JOIN departements ON departements.id=workers.id_depart WHERE workers.w_id = ?');
        $query->execute([$this->getWorkerId()]);
        return $query->fetch();

    }

    /**
     * Modification des info d'un employé dans la base de donnée
     */

    private function updateWorker($name, $firstname, $id_fonction, $cin, $adresse, $origine, $salaire_base, $responsable, $contact, $image = null, $id_depart, $date_entree, $sexe, $w_id)
    {
        if ($image == null) {
            $query = $this->getPdo()
                ->prepare('UPDATE workers SET name= ?,  firstname =?, id_fonction =?,  cin = ?, adresse = ?, origine = ?, salaire_base = ?, responsable = ?, contact = ?, id_depart = ?, date_entree = ?, sexe = ? WHERE w_id = ?');
            $query->execute([$name, $firstname, $id_fonction, $cin, $adresse, $origine, $salaire_base, $responsable, $contact, $id_depart, $date_entree, $sexe, $w_id]);
            //modifier directement la tablew salaires
            $updateSalaryBase = $this->getPdo() 
            ->prepare('UPDATE salaires SET salaire_base = ? WHERE id_worker = ?');
            $updateSalaryBase->execute([$salaire_base, $w_id]);
        } else {
            $query = $this->getPdo()
                ->prepare('UPDATE workers SET name= ?,  firstname =?, id_fonction =?,  cin = ?, adresse = ?, origine = ?, salaire_base = ?, responsable = ?, contact = ?, image = ?, id_depart = ?, date_entree = ?, sexe = ? WHERE w_id = ?');
            $query->execute([$name, $firstname, $id_fonction, $cin, $adresse, $origine, $salaire_base, $responsable, $contact, $image, $id_depart, $date_entree, $sexe, $w_id]);
            //modifier directement la table salaire
            $updateSalaryBase = $this->getPdo() 
            ->prepare('UPDATE salaires SET salaire_base = ? WHERE id_worker = ?');
            $updateSalaryBase->execute([$salaire_base, $w_id]);
        }



    }



    /**
     * Gere le processus de modification
     */

    public function changeWorker()
    {
        if (isset($_POST['envoyer'])) {
            if (isset($_POST['name'], $_POST['firstname'], $_POST['fonctions'], $_POST['cin'], $_POST['adresse'], $_POST['origine'], $_POST['salaire'], $_POST['responsable'], $_POST['contact'], $_POST['departements'], $_POST['date_entree'], $_POST['sexe'])) {
                $name = htmlentities(htmlspecialchars($_POST['name']));
                $firstname = htmlentities(htmlspecialchars($_POST['firstname']));
                $fonction = htmlentities(htmlspecialchars($_POST['fonctions']));
                $cin = htmlentities(htmlspecialchars($_POST['cin']));
                $adresse = htmlentities(htmlspecialchars($_POST['adresse']));
                $origine = htmlentities(htmlspecialchars($_POST['origine']));
                $salaire = htmlentities(htmlspecialchars($_POST['salaire']));
                $responsable = htmlentities(htmlspecialchars($_POST['responsable']));
                $contact = htmlentities(htmlspecialchars($_POST['contact']));
                $departement = htmlentities(htmlspecialchars($_POST['departements']));
                $date_entree = htmlentities(htmlspecialchars($_POST['date_entree']));
                $sexe = htmlentities(htmlspecialchars($_POST['sexe']));
                if ($_FILES['image']['name'] == '') {
                    $this->updateWorker($name, $firstname, $fonction, $cin, $adresse, $origine, $salaire, $responsable, $contact, null, $departement, $date_entree, $sexe, $this->getWorkerId());
                    $_SESSION['succes']='Employé bien modifié';
                    header('location:listeemployer.php');

                }

                if (isset($_FILES['image']) && !empty($_FILES['image'])) {
                    $image = $_FILES['image'];
                    $image_name = $image['name'];
                    $image_tmp = $image['tmp_name'];
                    $explode_image_name = explode('.', $image_name);
                    $image_ext = end($explode_image_name);
                    $allowed_ext = ['jpg', 'png', 'gif', 'jpeg'];
                    if (in_array(strtolower($image_ext), $allowed_ext)) {
                        $new_image_name = time() . '.' . $image_ext;
                        if (move_uploaded_file($image_tmp, '../images/' . $new_image_name)) {
                            $this->updateWorker($name, $firstname, $fonction, $cin, $adresse, $origine, $salaire, $responsable, $contact, $new_image_name, $departement, $date_entree, $sexe, $this->getWorkerId());
                            $_SESSION['succes']='Employé bien modifié';
                            header('location:listeemployer.php');
                        }

                    }
                }


            }
        }

    }

    /**
     * Liste des employés dans la partie avance
     */

    public function getList()
    {
        $query = $this->getPdo()
            ->query('SELECT * FROM workers');
        $query->execute();
        return $query->fetchAll();
    }

    /**
     * Recupere le nom et prenom de l'employé selectionné
     */

    public function nameFistname()
    {
        $query = $this->getPdo()
            ->prepare('SELECT w_id, name, firstname FROM workers WHERE w_id = ?');
        $query->execute([$_SESSION['worker_id']]);
        return $query->fetch();
    }

    /**
     * Mettre l'id de l'employé dans la session
     */

    public function sessionID()
    {
        $_SESSION['worker_id'] = $this->getWorkerId();
        return $_SESSION['worker_id'];
    }

    /**
     * Ajoute les avances dans la base de donnée
     */

    private function insertAvance($a_date, $a_nature, $a_espece, $a_desc, $w_id)
    {
        $query = $this->getPdo()
            ->prepare('INSERT INTO avances (`a_date`, `a_nature`, `a_espece`, `a_desc`, `id_worker`) VALUES (?, ?, ?, ?, ?)');
        $query->execute([$a_date, $a_nature, $a_espece, $a_desc, $w_id]);
    }
    /**
     * Gere la creation d'une nouvelle avance
     */
    public function newAvance(Pointage $pointage)
    {
        if (isset($_POST['a_date'], $_POST['a_nature'], $_POST['a_espece'], $_POST['a_desc']) && !empty($_POST['a_date']) && !empty($_POST['a_desc'])) {
            if ($_POST['a_nature'] != 0 || $_POST['a_espece'] != 0) {
                $a_date = $_POST['a_date'];
                $a_nature = (int) ($_POST['a_nature']);
                $a_espece = (int) ($_POST['a_espece']);
                $a_desc = $_POST['a_desc'];
                if(($a_nature + $a_espece) <= $this->getWorkerSalary()['salaire_base']){
               
                        $this->insertAvance($a_date, $a_nature, $a_espece, $a_desc, $this->sessionID());
                        $this->insertInfotoSalaryTable($this->sessionID(), $pointage->newNbrOfAbsence(), $this->sumofAvance($this->sessionID()),$this->salarybase($this->sessionID())['salaire_base']);
                        $this->getSucces('Avance reussi');
                }else{
                    $this->getError('Les avances ne doivent pas depasser le salaire de base');
                }
              
            }
        }
    }
    /**
     * Ajoute les information de pointage dans la base de donnée
     */
    private function insertPointage($date_ab, $id_worker,$anomalie, $ab_desc,$nbr_absence)
    {
        $query = $this->getPdo()
            ->prepare('INSERT INTO absences (`date_ab`, `id_worker`, `anomalie`, `ab_desc`, `nbr_absence`) VALUES (?, ?, ?, ?, ?)');
        $query->execute([$date_ab, $id_worker, $anomalie, $ab_desc, $nbr_absence]);
    
    }

    /**
     * Gere le pointage d'un employé
     */

    public function newPointage(Pointage $pointage)
    {
        if (
            isset($_POST['nbr_absence'], $_POST['anomalie'], $_POST['ab_desc'])
            && !empty($_POST['nbr_absence'])
            // && !empty($_POST['status'])
            && !empty($_POST['anomalie'])
            && !empty($_POST['ab_desc'])
        ) {
            $nbr_absence = $_POST['nbr_absence'];
            // $status = $_POST['status'];
            $anomalie = $_POST['anomalie'];
            $ab_desc = $_POST['ab_desc'];
            $date_ab = date('Y-m-d');
            if($nbr_absence <= 30){
                $this->insertPointage($date_ab, $this->sessionID(), $anomalie, $ab_desc, $nbr_absence);
                $this->insertInfotoSalaryTable($this->sessionID(), $pointage->newNbrOfAbsence(), $this->sumofAvance($this->sessionID()),$this->salarybase($this->sessionID())['salaire_base']);
                $this->getSucces('Pointage reussi');
            }else {
                $this->getError('Le nombre d\'absence ne doit pas depasser 30');
            }
        }
    }

    /**
     * inserer ou modifier les informations dans la table salaire
     */
    private function insertInfotoSalaryTable($id_worker, $nbr_absence, $avances, $salaire_base) 
    {
        $date = date('Y-m');
        $query = $this->getPdo()
        ->prepare("SELECT * FROM salaires WHERE id_worker = ? AND date_s LIKE '%{$date}%'");
        $query->execute([$id_worker]);
        if($query->rowCount() == 0)
        {
            $salaire = (($salaire_base / 30) * (30 - $nbr_absence)) - $avances;
            $new_salary_info = $this->getPdo()
            ->prepare('INSERT INTO salaires (`id_worker`, `nbr_absence`, `date_s`, `avances`, `salaire_base`, `salaire_reel`) VALUES (?, ?, ?, ?, ?, ?)');
            $new_salary_info->execute([$id_worker,$nbr_absence, $date, $avances, $salaire_base, $salaire]);
        }else {
           $salaire_reel = $this->realSalary($id_worker);
            $new_salary_info = $this->getPdo()
            ->prepare("UPDATE salaires SET nbr_absence = ? , avances = ?, salaire_reel = ? WHERE id_worker = ? AND date_s LIKE '%{$date}%'");
            $new_salary_info->execute([$nbr_absence, $avances, $salaire_reel, $id_worker]);
            $salaire_reel2 = $this->realSalary($id_worker);   
            $new_salary_info = $this->getPdo()
            ->prepare("UPDATE salaires SET nbr_absence = ? , avances = ?, salaire_reel = ? WHERE id_worker = ? AND date_s LIKE '%{$date}%'");
            $new_salary_info->execute([$nbr_absence, $avances, $salaire_reel2, $id_worker]);
        }
    }

    /**
     * La somme des avances d'un employé
     */
    protected function sumofAvance($id_worker) 
    {
        $date = date('Y-m');
        $query = $this->getPdo()
        ->prepare("SELECT * FROM avances WHERE id_worker = ? AND a_date LIKE '%{$date}%'");
        $query->execute([$id_worker]);
        $datas = $query->fetchAll();
        $avance_espece=0;
        $avance_nature=0;
        foreach($datas as $data) {
            $avance_nature += $data['a_nature'];
            $avance_espece += $data['a_espece'];
        }
        $somme_des_avances = $avance_espece + $avance_nature;
      
        return $somme_des_avances;
    }
    
    /**
     * Calcul le salaire reel d'un employé
     */
    private function realSalary($id_worker)  
    {
        $date = date('Y-m');
        $query = $this->getPdo()
        ->prepare("SELECT * FROM salaires WHERE id_worker = ? AND date_s LIKE '%{$date}%'");
        $query->execute([$id_worker]);
        $data = $query->fetch();
        $day = 30;
        $salary_by_day = $this->salarybase($id_worker)['salaire_base'] / $day;
        $day_worked =30 - $data['nbr_absence'];
        $real_salary = ($salary_by_day * $day_worked) - $data['avances'];
        return $real_salary;

    }


    /**
     * Recupere le salaire  de base d'un employé
     */
    protected function salarybase($id_worker)
    {
        $query = $this->getPdo()
        ->prepare('SELECT salaire_base FROM workers WHERE w_id = ?');
        $query->execute([$id_worker]);
        return $query->fetch();
    }
    /**
     * Compte le nombre d'absence du mois actuel en comptant que ceux qui sont no justifié
     */
    // private function countAbsence($id_worker)
    // {
    //     $date = date('Y-m');
    //     $query = $this->getPdo()
    //         ->prepare("SELECT count(id_ab) as abs FROM absences WHERE status = 'non justifié' AND id_worker = ? AND date_ab LIKE '{$date}%'");
    //     $query->execute([$id_worker]);
    //     return $query->fetch();
    // }
    /**
     * Recupere la salaire de base d'un employé
     */

    private function getWorkerSalary() 
    {
        $query = $this->getPdo()
        ->prepare('SELECT salaire_base FROM workers WHERE w_id = ?');
        $query->execute([$this->sessionID()]);
        return $query->fetch();
    }

    /**
     * Capture les erreurs
     */
    protected function getError($error) 
    {
        $this->error = $error;
    }

    /**
     * Retourne les erreurs
     */
    public function error() 
    {
        return $this->error;
    }

    /**
     * Supprime les pointages et met à jour le nombre d'absence d'un employé
     */

     public function deletePointageAndUpdateNumberOfAbsence()
     {
          //recuperation de l'id de l'employé à qui appartient l'avance à supprimé
          $query = $this->getPdo()
          ->prepare('SELECT * FROM absences  WHERE id_ab = ?');
          $query->execute([$this->getPointageId()]);
          $data = $query->fetch();
          $id_worker = $data['id_worker'];
	        $daty= $data['date_ab'];

           //suppression de l'avance
        $delete = $this->getPdo()
        ->prepare("DELETE FROM absences WHERE id_ab = ? AND date_ab LIKE '{$daty}'");
        $delete->execute([$this->getPointageId()]);

        //recuperation du nombre d'absence
        $date= date('Y-m');
        $query2 = $this->getPdo()
        ->prepare("SELECT nbr_absence FROM absences WHERE id_worker = ? AND date_ab LIKE '{$date}%'");
        $query2->execute([$id_worker]);
        $nbr_absence = 0;
        if($query2->rowCount() > 0){

            $nbr_absence = $query2->fetch()['nbr_absence'];
        }


        //salaire de base
        $salaire_base = $this->salarybase($id_worker)['salaire_base'];

        //mise à  jour du salaire
        $avances = $this->sumofAvance($id_worker);
        $salaire_reel = (($salaire_base / 30) * (30-$nbr_absence)) - $avances;
        $update = $this->getPdo()
        ->prepare("UPDATE salaires SET avances = ? ,salaire_reel = ?, nbr_absence = ? WHERE id_worker = ? AND date_s LIKE '{$date}%'");
        $update->execute([$avances, $salaire_reel, $nbr_absence, $id_worker]);
        $_SESSION['succes']='Suppression reussi';
        header('location:afficherPointage.php');
     }


     /**
      * Recupere l'id des pointages
      */

      private function getPointageId() 
      {
        if(isset($_GET['id_ab'])){
            return $_GET['id_ab'];
        }
      }

      /**
       * Recupere l'id_worker
       */

       private function getIdWorker() 
       {
        if(isset($_GET['id_worker'])){
            return $_GET['id_worker'];
        }
       }
       
       /**
        * Cette fonctions va creer automatiquement la salaire d'un employé qui n'a été ni pointé ni avancé
        */
       public function createSalaire() 
       {
            $date = date('Y-m');
            if($this->getLastDate()['last'] != $date){
                $query = $this->getPdo()
                ->prepare('SELECT * FROM workers');
                $query->execute();
                $workers= $query->fetchAll();
                foreach($workers as $worker){
                    $query = $this->getPdo()
                    ->prepare('SELECT * FROM salaires WHERE id_worker = ? AND date_s = ?');
                    $query->execute([$worker['w_id'], $date]);
                    if($query->rowCount() == 0){
                        $insert = $this->getPdo()
                        ->prepare('INSERT INTO salaires (`id_worker`, `date_s`, `salaire_base`, `salaire_reel`) VALUES (?, ?, ?, ?)');
                        $insert->execute([$worker['w_id'], $date, $this->salarybase($worker['w_id'])['salaire_base'], $this->salarybase($worker['w_id'])['salaire_base']]);
                    }
                    
                }
                $upd = $this->getPdo()
                ->prepare('UPDATE lastsalary SET last = ? WHERE id = 1');
                $upd->execute([$date]);
            }else {
                $query = $this->getPdo()
                ->prepare('SELECT * FROM workers');
                $query->execute();
                $workers= $query->fetchAll();
                foreach($workers as $worker){
                    $query = $this->getPdo()
                    ->prepare('SELECT * FROM salaires WHERE id_worker = ? AND date_s = ?');
                    $query->execute([$worker['w_id'], $date]);
                    if($query->rowCount() == 0){
                        $insert = $this->getPdo()
                        ->prepare('INSERT INTO salaires (`id_worker`, `date_s`, `salaire_base`, `salaire_reel`) VALUES (?, ?, ?, ?)');
                        $insert->execute([$worker['w_id'], $date, $this->salarybase($worker['w_id'])['salaire_base'], $this->salarybase($worker['w_id'])['salaire_base']]);
                    }
                    
                }
            }
           
       }

       /**
        * Calcule la somme totale de tout les salaires du mois courant
        */

        public function sommeOfAllSalary() 
        {
            $date = date('Y-m');
            $query = $this->getPdo()
            ->prepare("SELECT * FROM salaires WHERE date_s LIKE '{$date}%'");
            $query->execute();
            $data = $query->fetchAll();
            $salaire_total = 0;
            foreach($data as $salaire){
                $salaire_total += $salaire['salaire_reel'];
            }

            return $salaire_total;
        }

        /**
         * Somme de tout les salaire de base
         */

         public function sommeOfAllSalaryBase() 
         {
            $date = date('Y-m');
            $query = $this->getPdo()
            ->prepare("SELECT * FROM salaires WHERE date_s LIKE '{$date}%'");
            $query->execute();
            $data = $query->fetchAll();
            $salaire_total = 0;
            foreach($data as $salaire){
                $salaire_total += $salaire['salaire_base'];
            }

            return $salaire_total;
         }

        public function getAllWorkersSalary() 
        {
            $date = date('Y-m');
            $query = $this->getPdo()
            ->prepare("SELECT * FROM salaires JOIN workers ON workers.w_id = salaires.id_worker WHERE date_s LIKE '{$date}%'");
            $query->execute();
            return $query->fetchAll();
        }
        /**
         * Teste d'affichage d'un salaire d'un employé par son id
         */
        public function getSalarReelById() 
        {
            $query = $this->getPdo()
            ->prepare("SELECT salaire_reel FROM salaires WHERE sa_id=2 AND date_s LIKE '2023-12' ");
            $query->execute();
            return $query->fetch();
        }

        public function getListOfDate() 
        {
            $query = $this->getPdo()
            ->prepare('SELECT DISTINCT date_s FROM salaires ORDER BY date_s DESC');
            $query->execute();
            return $query->fetchAll();
        }

        public function getLastDate() 
        {
            $query = $this->getPdo()
            ->prepare('SELECT last FROM lastsalary WHERE id=1');
            $query->execute();
            return $query->fetch();
        }

        /**
         * Retourne la liste detaillé d'absence d'un employé
         */
        public function getAbs() 
        {
            $query = $this->getPdo()
            ->prepare("SELECT * FROM absences JOIN workers ON workers.w_id = absences.id_worker WHERE id_worker = ?  AND  date_ab LIKE '{$this->getD()}%' ");
            $query->execute([$this->getWorkerId()]);
            return $query->fetchAll();
            
        }

        public function getD() 
        {
            if(isset($_GET['d'])){
                return $_GET['d'];
            }
        }
        /**
         *Retourne le nombre d'employé
         */
        public function getNumberOfWorkers() {
            $query = $this->getPdo()
            ->prepare('SELECT COUNT(w_id) as nbrW FROM workers');
            $query->execute();
            return $query->fetch();
        }

        /**
         * Retourne le nombre tout les avances d'employé
         */
        public function sumOfAllAvances() 
        {
            $date = date('Y-m');
            $query = $this->getPdo()
            ->prepare("SELECT * FROM salaires WHERE date_s LIKE '{$date}%'");
            $query->execute();
            $data = $query->fetchAll();
            $avance_total = 0;
            foreach($data as $salaire){
                $avance_total += $salaire['avances'];
            }

            return $avance_total;
        }

        /**
         * Retourne le nombre d'absences total du mois selectionné
         */

         public function sumOfAllAbsences () 
         {
            $date = date('Y-m');
            $query = $this->getPdo()
            ->prepare("SELECT * FROM salaires WHERE date_s LIKE '{$date}%'");
            $query->execute();
            $data = $query->fetchAll();
            $absence_total = 0;
            foreach($data as $salaire){
                $absence_total += $salaire['nbr_absence'];
            }

            return $absence_total;
         }

         /**
          * Somme totoal des salaires de base depuis l'utitilisation de l'application
          */
         public function totalSalaireBase () 
         {
            $salaire_base = 0;
            $query= $this->getPdo()
            ->prepare('SELECT salaire_base FROM salaires');
            $query->execute();
            $data = $query->fetchAll();
            foreach($data as $salaire){
                $salaire_base += $salaire['salaire_base'];
            }

            return number_format($salaire_base).' Ar';

            
         }

         /**
          * Somme total des avances deouis l'utilisation de l'application
          */
         public function totalAvance () 
         {
            $avances = 0;
            $query= $this->getPdo()
            ->prepare('SELECT avances FROM salaires');
            $query->execute();
            $data = $query->fetchAll();
            foreach($data as $avance){
                $avances += $avance['avances'];
            }

            return $avances;

            
         }

         /**
          * Somme totale des salaires reel depuis l'utilisation de l'application
          */
         public function totalSalairereel () 
         {
            $salaire_reel = 0;
            $query= $this->getPdo()
            ->prepare('SELECT salaire_reel FROM salaires');
            $query->execute();
            $data = $query->fetchAll();
            foreach($data as $salaire){
                $salaire_reel += $salaire['salaire_reel'];
            }

            return $salaire_reel;
         }

         /**
          * Somme totale des absences depuis l'utilisation de l'application
          */
         public function totalAbsence () 
         {
            $absences = 0;
            $query= $this->getPdo()
            ->prepare('SELECT nbr_absence FROM salaires');
            $query->execute();
            $data = $query->fetchAll();
            foreach($data as $absence){
                $absences += $absence['nbr_absence'];
            }

            return $absences;
         }

         /**
          * Salaire du departement tavaratra depuis l'utilisation de l'application
          */

         public function salaireT () 
         {
            $total = 0;
            $query = $this->getPdo()
            ->prepare('SELECT * FROM Workers WHERE id_depart = 1');
            $query->execute();
            $workers = $query->fetchAll();
            foreach($workers as $worker){
               
                $salaire = $this->getPdo()
                ->prepare('SELECT * FROM salaires WHERE id_worker = ?');
                $salaire->execute([$worker['w_id']]);
                $data = $salaire->fetchAll();
                
                foreach($data as $salaires){
                   $total += $salaires['salaire_reel'];
                }


            }

            return $total;
         }

         /**
          * Pourcentage par rapport au salaire reeel total pour tavaratra
          */
         public function pourcentT() 
         {
            $prctg = round(($this->salaireT() * 100 ) / $this->totalSalairereel(), 2);
            return $prctg;
         }

         /**
          * Salaire du departement annexe shop depuis l'utilisation de l'application
          */

         public function salaireS () 
         {
            $total = 0;
            $query = $this->getPdo()
            ->prepare('SELECT * FROM Workers WHERE id_depart = 2');
            $query->execute();
            $workers = $query->fetchAll();
            foreach($workers as $worker){
               
                $salaire = $this->getPdo()
                ->prepare('SELECT * FROM salaires WHERE id_worker = ?');
                $salaire->execute([$worker['w_id']]);
                $data = $salaire->fetchAll();
                
                foreach($data as $salaires){
                   $total += $salaires['salaire_reel'];
                }


            }

            return $total;
         }

          /**
          * Pourcentage par rapport au salaire reeel total pour annexe shop
          */
         public function pourcentS() {
            $prctg = round(($this->salaireS() * 100 ) / $this->totalSalairereel(), 2);
            return $prctg;
         }


         /**
          * Pourcentage par rapport au salaire reel total pour mahambolo
          */
         public function salaireM ()
          {
            $total = 0;
            $query = $this->getPdo()
            ->prepare('SELECT * FROM Workers WHERE id_depart = 3');
            $query->execute();
            $workers = $query->fetchAll();
            foreach($workers as $worker){
               
                $salaire = $this->getPdo()
                ->prepare('SELECT * FROM salaires WHERE id_worker = ?');
                $salaire->execute([$worker['w_id']]);
                $data = $salaire->fetchAll();
                
                foreach($data as $salaires){
                   $total += $salaires['salaire_reel'];
                }


            }

            return $total;
         }


           /**
          * Salaire du departement annexe shop depuis l'utilisation de l'application
          */
         public function pourcentM() 
         {
            $prctg = round(($this->salaireM() * 100 ) / $this->totalSalairereel(), 2);
            return $prctg;
         }

       /**
        * Pourcentage des avance par departement
        */
         public function pourcentAvance($id_depart) 
         {
            
                $total = 0;
                $query = $this->getPdo()
                ->prepare('SELECT * FROM Workers WHERE id_depart = ?');
                $query->execute([$id_depart]);
                $workers = $query->fetchAll();
                foreach($workers as $worker){
                   
                    $salaire = $this->getPdo()
                    ->prepare('SELECT * FROM salaires WHERE id_worker = ?');
                    $salaire->execute([$worker['w_id']]);
                    $data = $salaire->fetchAll();
                    
                    foreach($data as $salaires){
                       $total += $salaires['avances'];
                    }
    
    
                }
    
                $prctg = round(($total * 100) / $this->totalAvance(), 2);
                return $prctg;
            
         }

           /**
        * Pourcentage des absences par departement
        */
         public function pourcentAbsence($id_depart)  
         {
            
            $total = 0;
            $query = $this->getPdo()
            ->prepare('SELECT * FROM Workers WHERE id_depart = ?');
            $query->execute([$id_depart]);
            $workers = $query->fetchAll();
            foreach($workers as $worker){
               
                $salaire = $this->getPdo()
                ->prepare('SELECT * FROM salaires WHERE id_worker = ?');
                $salaire->execute([$worker['w_id']]);
                $data = $salaire->fetchAll();
                
                foreach($data as $salaires){
                   $total += $salaires['nbr_absence'];
                }


            }



             

            $prctg = round(($total * 100) / $this->totalAbsence(), 2);
            return $prctg;
        
     }

     /**
      * Retourne le nombre de sexe
      */

      public function nbrHomme($sexe) 
      {
        $query = $this->getPdo()
        ->prepare("SELECT COUNT(w_id) as ? FROM workers WHERE sexe = ?");
        $query->execute([$sexe,$sexe]);

        return $query->fetch();
      }

      public function impressionDate() 
      {
        if(isset($_GET['date']))
        {
            $date = $_GET['date'];
            return $date;
        }
      }

      public function sommeOfAllSalaryImpression() 
      {
          $date = $this->impressionDate();
          $query = $this->getPdo()
          ->prepare("SELECT * FROM salaires WHERE date_s LIKE '{$date}%'");
          $query->execute();
          $data = $query->fetchAll();
          $salaire_total = 0;
          foreach($data as $salaire){
              $salaire_total += $salaire['salaire_reel'];
          }

          return $salaire_total;
      }
     

      public function sumOfAllAvancesImpression() 
      {
          $date = $this->impressionDate();
          $query = $this->getPdo()
          ->prepare("SELECT * FROM salaires WHERE date_s LIKE '{$date}%'");
          $query->execute();
          $data = $query->fetchAll();
          $avance_total = 0;
          foreach($data as $salaire){
              $avance_total += $salaire['avances'];
          }

          return $avance_total;
      }
      

      public function sommeOfAllSalaryBaseImpression() 
      {
         $date = $this->impressionDate();
         $query = $this->getPdo()
         ->prepare("SELECT * FROM salaires WHERE date_s LIKE '{$date}%'");
         $query->execute();
         $data = $query->fetchAll();
         $salaire_total = 0;
         foreach($data as $salaire){
             $salaire_total += $salaire['salaire_base'];
         }

         return $salaire_total;
      }
         
      public function getAllWorkersSalaryImpression() 
      {
          $date = $this->impressionDate();
          $query = $this->getPdo()
          ->prepare("SELECT * FROM salaires JOIN workers ON workers.w_id = salaires.id_worker JOIN fonctions ON fonctions.id = workers.id_fonction WHERE date_s LIKE '{$date}%'");
          $query->execute();
          return $query->fetchAll();
      }     


      public function changeUserInfo() 
      {
        if(isset($_POST['infoN'], $_POST['infoF'], $_POST['current_password'], $_POST['mdp']))
        {
            $name= htmlspecialchars($_POST['infoN']);
            $firstname = htmlspecialchars($_POST['infoF']);
            $new_password =password_hash(htmlspecialchars($_POST['mdp']), PASSWORD_DEFAULT);
            $current_passowrd = htmlspecialchars($_POST['current_password']);
            if(!empty($new_password) && !empty($current_passowrd)){
                $getCurrentPassword = $this->getPdo()
                ->prepare('SELECT password FROM roles WHERE id = ?');
                $getCurrentPassword->execute([$_SESSION['user']['id']]);
                $password = $getCurrentPassword->fetch()['password'];
                if(password_verify($current_passowrd, $password))
                {
                    $query = $this->getPdo()
                    ->prepare('UPDATE roles SET password = ?, name = ?, firstname= ? WHERE id = ?');
                    $query->execute([$new_password,$name, $firstname, $_SESSION['user']['id']]);
                    $this->getSucces('Informations modifiés');
                }else {
                    $this->getError(' les mots de passe ne corresponde pas');
                }
            }else{
                $query = $this->getPdo()
                ->prepare('UPDATE roles SET name = ?, firstname= ? WHERE id = ?');
                $query->execute([$name, $firstname, $_SESSION['user']['id']]);
                $this->getSucces('Informations modifiés');
            }
          

            
        }
      }


      /***
       * Retourne le nombre de role dans la base de donnée
       */
      public function getNumberOfRole() 
      {
        $query = $this->getPdo()
        ->prepare('SELECT COUNT(id) as nbrRole FROM roles');
        $query->execute();
        return $query->fetch();

      }

	public function nbrSabs(){

	$daty = $this->impressionDate();
	$query = $this->getPdo()->prepare("SELECT * FROM salaires WHERE date_s LIKE '{$daty}%'");
	$query->execute();
	$data = $query->fetchAll();
	$abs=0;
	foreach($data as $nbr){
		$abs+=$nbr['nbr_absence'];
	}
	return $abs;
	}
/*
*impression dynamique des avances par date
*/

	public function impressionAvance(){
		$date = $this->impressionDate();
		$query = $this->getPdo()
		->prepare('SELECT * FROM avances JOIN workers ON workers.w_id = avances.id_worker JOIN fonctions ON fonctions.id = workers.id_fonction WHERE a_date = ?');
		$query->execute([$date]);
		return $query->fetchAll();
	}

	public function impressionAvanceTotal(){
		$date = $this->impressionDate();
		$query = $this->getPdo()
		->prepare('SELECT * FROM avances JOIN workers ON workers.w_id = avances.id_worker JOIN fonctions ON fonctions.id = workers.id_fonction WHERE a_date = ?');
		$query->execute([$date]);
		$data =  $query->fetchAll();
		$avanceTotal = 0;
		foreach($data as $avance){
		$avanceTotal+= $avance['a_nature'] + $avance['a_espece'];
		}

		return  $avanceTotal;
	}
}