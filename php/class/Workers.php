<?php 

class Workers {
    private $host='127.0.0.1';
    private $db='tavaratra';
    private $user='root';
    private $pdo = null;
    private $succes;

    public function connect(){
        return new PDO('mysql:host='.$this->host.';dbname='.$this->db.';',$this->user,'');
    }

    //retourne la singleton de la connexion à la base de donnée

    public function getPdo() {
        if($this->pdo == null){
            $this->pdo = $this->connect();
        }
        return $this->pdo;
    }

    /**
     * Gere la formulaire d'ajout d'employer
     */

     public function newWorker(){
        if(isset($_POST['envoyer'])){
            if(isset($_POST['name'], $_POST['firstname'], $_POST['fonctions'], $_POST['cin'], $_POST['adresse'], $_POST['origine'], $_POST['salaire'], $_POST['responsable'], $_POST['contact'], $_POST['departements'], $_POST['date_entree'], $_POST['sexe'])){
                $name= htmlentities(htmlspecialchars($_POST['name']));
                $firstname= htmlentities(htmlspecialchars($_POST['firstname']));
                $fonction= htmlentities(htmlspecialchars($_POST['fonctions']));
                $cin= htmlentities(htmlspecialchars($_POST['cin']));
                $adresse= htmlentities(htmlspecialchars($_POST['adresse']));
                $origine= htmlentities(htmlspecialchars($_POST['origine']));
                $salaire= htmlentities(htmlspecialchars($_POST['salaire']));
                $responsable= htmlentities(htmlspecialchars($_POST['responsable']));
                $contact= htmlentities(htmlspecialchars($_POST['contact']));
                $departement= htmlentities(htmlspecialchars($_POST['departements']));
                $date_entree= htmlentities(htmlspecialchars($_POST['date_entree']));
                $sexe= htmlentities(htmlspecialchars($_POST['sexe']));
                if($_FILES['image']['name']==''){
                    $new_image_name = 'default.png';
                    $this->insertWorker($name, $firstname, $fonction, $cin, $adresse, $origine, $salaire, $responsable,$contact,$new_image_name, $departement, $date_entree, $sexe);
                    $this->getSucces('Succèss');
                   
                }

                if(isset($_FILES['image']) && !empty($_FILES['image'])){
                    $image = $_FILES['image'];
                    $image_name= $image['name'];
                    $image_tmp = $image['tmp_name'];
                    $explode_image_name = explode('.', $image_name);
                    $image_ext = end($explode_image_name);
                    $allowed_ext= ['jpg', 'png', 'gif', 'jpeg'];
                    if(in_array(strtolower($image_ext), $allowed_ext)){
                         $new_image_name= time().'.'.$image_ext;
                        if(move_uploaded_file($image_tmp, '../images/'.$new_image_name)){
                            $this->insertWorker($name, $firstname, $fonction, $cin, $adresse, $origine, $salaire, $responsable,$contact,$new_image_name, $departement, $date_entree, $sexe);
                            $this->getSucces('Succès');
                        }
                       
                    }
                }
                   
               
            }
        }
       
     }

     /**
      * Ajoute le nouveau employé dans la base de donnée
      */

      private function insertWorker($name, $firstname, $id_fonction, $cin, $adresse, $origine, $salaire_base, $responsable, $contact, $image, $id_depart, $date_entree, $sexe){
        $query = $this->getPdo()
        ->prepare('INSERT INTO workers(`name`, `firstname`, `id_fonction`, `cin`, `adresse`, `origine`, `salaire_base`, `responsable`, `contact`, `image`, `id_depart`, `date_entree`, `sexe`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
        $query->execute([$name, $firstname, $id_fonction, $cin, $adresse, $origine, $salaire_base, $responsable, $contact, $image, $id_depart, $date_entree, $sexe]);
        
      }     

       /**
        * retourne liste des employées sans contraintes
        */

        public function listOfWorker(){
            $query= $this->getPdo()  
            ->prepare("SELECT * FROM workers JOIN fonctions ON fonctions.id=workers.id_fonction JOIN departements ON departements.id=workers.id_depart");
            $query->execute();
            return $query->fetchAll();
        }

        /**
         * Affiche les informations de l'employé dans la box
         */
        public function showWorkerInfo() {
            if(isset($_GET['worker_id'])){
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
        private function getSucces($succes) {
            $this->succes = $succes;
        }

        /**
         * retourne les succès
         */
        public function succes(){
            return $this->succes;
        }

        /**
         * recupere l'id d'un employé
         */

         private function getWorkerId(){

            if(isset($_GET['worker_id'])){
                return $_GET['worker_id'];
            }
         }

         /**
          * Supprime un employé par son ID
          */
         public function deleteWorkerById(){
            $query = $this->getPdo() 
            ->prepare('DELETE FROM workers WHERE w_id = ?');
            $query->execute([$this->getWorkerId()]);
            $_SESSION['succes']='Succès !!';
            header('location:listeemployer.php');
         }

         /**
          * autocompletera le formulaire de modification avec les infos de l'employé à modifier
          */
         public function autoCompleteInputByWorkerId() {
            $query= $this->getPdo()
            ->prepare('SELECT * FROM workers JOIN fonctions ON fonctions.id=workers.id_fonction JOIN departements ON departements.id=workers.id_depart WHERE workers.w_id = ?');
            $query->execute([$this->getWorkerId()]);
            return $query->fetch();

         }

         /**
          * Modification des info d'un employé dans la base de donnée
          */

          private function updateWorker($name, $firstname, $id_fonction, $cin, $adresse, $origine, $salaire_base, $responsable, $contact, $image=null, $id_depart, $date_entree, $sexe, $w_id){
            if($image == null) {
                $query = $this->getPdo()
                ->prepare('UPDATE workers SET name= ?,  firstname =?, id_fonction =?,  cin = ?, adresse = ?, origine = ?, salaire_base = ?, responsable = ?, contact = ?, id_depart = ?, date_entree = ?, sexe = ? WHERE w_id = ?');
                $query->execute([$name, $firstname, $id_fonction, $cin, $adresse, $origine, $salaire_base, $responsable, $contact,$id_depart, $date_entree, $sexe, $w_id]);
            }else {
                $query = $this->getPdo()
                ->prepare('UPDATE workers SET name= ?,  firstname =?, id_fonction =?,  cin = ?, adresse = ?, origine = ?, salaire_base = ?, responsable = ?, contact = ?, image = ?, id_depart = ?, date_entree = ?, sexe = ? WHERE w_id = ?');
                $query->execute([$name, $firstname, $id_fonction, $cin, $adresse, $origine, $salaire_base, $responsable, $contact, $image, $id_depart, $date_entree, $sexe, $w_id]);
            }


            
          }   

          /**
           * Gere le processus de modification
           */

           public function changeWorker(){
            if(isset($_POST['envoyer'])){
                if(isset($_POST['name'], $_POST['firstname'], $_POST['fonctions'], $_POST['cin'], $_POST['adresse'], $_POST['origine'], $_POST['salaire'], $_POST['responsable'], $_POST['contact'], $_POST['departements'], $_POST['date_entree'], $_POST['sexe'])){
                    $name= htmlentities(htmlspecialchars($_POST['name']));
                    $firstname= htmlentities(htmlspecialchars($_POST['firstname']));
                    $fonction= htmlentities(htmlspecialchars($_POST['fonctions']));
                    $cin= htmlentities(htmlspecialchars($_POST['cin']));
                    $adresse= htmlentities(htmlspecialchars($_POST['adresse']));
                    $origine= htmlentities(htmlspecialchars($_POST['origine']));
                    $salaire= htmlentities(htmlspecialchars($_POST['salaire']));
                    $responsable= htmlentities(htmlspecialchars($_POST['responsable']));
                    $contact= htmlentities(htmlspecialchars($_POST['contact']));
                    $departement= htmlentities(htmlspecialchars($_POST['departements']));
                    $date_entree= htmlentities(htmlspecialchars($_POST['date_entree']));
                    $sexe= htmlentities(htmlspecialchars($_POST['sexe']));
                    if($_FILES['image']['name']==''){
                        $this->updateWorker($name, $firstname, $fonction, $cin, $adresse, $origine, $salaire, $responsable,$contact,null, $departement, $date_entree, $sexe, $this->getWorkerId());
                        $this->getSucces('Succèss');
                       
                    }
    
                    if(isset($_FILES['image']) && !empty($_FILES['image'])){
                        $image = $_FILES['image'];
                        $image_name= $image['name'];
                        $image_tmp = $image['tmp_name'];
                        $explode_image_name = explode('.', $image_name);
                        $image_ext = end($explode_image_name);
                        $allowed_ext= ['jpg', 'png', 'gif', 'jpeg'];
                        if(in_array(strtolower($image_ext), $allowed_ext)){
                             $new_image_name= time().'.'.$image_ext;
                            if(move_uploaded_file($image_tmp, '../images/'.$new_image_name)){
                                $this->updateWorker($name, $firstname, $fonction, $cin, $adresse, $origine, $salaire, $responsable,$contact,$new_image_name, $departement, $date_entree, $sexe, $this->getWorkerId());
                                $this->getSucces('Succès');
                            }
                           
                        }
                    }
                       
                   
                }
            }
           
         }

        /**
         * Liste des employés dans la partie avance
         */
       
         public function getList() {
            $query = $this->getPdo()
            ->query('SELECT * FROM workers');
            $query->execute();
            return $query->fetchAll();
         }

         /**
          * Recupere le nom et prenom de l'employé selectionné
          */

          public function nameFistname(){
            $query= $this->getPdo()
            ->prepare('SELECT w_id, name, firstname FROM workers WHERE w_id = ?');
            $query->execute([$_SESSION['worker_id']]);
            return $query->fetch();
          }

          /**
           * Mettre l'id de l'employé dans la session
           */

           public function sessionID() {
            $_SESSION['worker_id']=$this->getWorkerId();
            return $_SESSION['worker_id'];
           }

           /**
            * Ajoute les avances dans la base de donnée
            */

            private function insertAvance($a_date, $a_nature, $a_espece, $a_desc, $w_id) {
                $query = $this->getPdo()
                ->prepare('INSERT INTO avances (`a_date`, `a_nature`, `a_espece`, `a_desc`, `id_worker`) VALUES (?, ?, ?, ?, ?)');
                $query->execute([$a_date, $a_nature, $a_espece, $a_desc, $w_id]);
            }
            /**
             * Gere la creation d'une nouvelle avance
             */
            public function newAvance() {
                if(isset($_POST['a_date'], $_POST['a_nature'], $_POST['a_espece'], $_POST['a_desc']) && !empty($_POST['a_date']) && !empty($_POST['a_desc'])){
                    if($_POST['a_nature']!= 0 || $_POST['a_espece'] != 0){
                        $a_date = $_POST['a_date'];
                        $a_nature= (int)($_POST['a_nature']);
                        $a_espece= (int)($_POST['a_espece']);
                        $a_desc= htmlentities(htmlspecialchars($_POST['a_desc']));
                        $this->insertAvance($a_date, $a_nature, $a_espece, $a_desc, $this->sessionID());
                        $this->getSucces('success');
                    }
                }
            }
            /**
             * Ajoute les information de pointage dans la base de donnée
             */
            private function insertPointage($date_ab, $id_worker, $status, $anomalie, $ab_desc){
                $query = $this->getPdo()
                ->prepare('INSERT INTO absences (`date_ab`, `id_worker`, `status`, `anomalie`, `ab_desc`) VALUES (?, ?, ?, ?, ?)');
                $query->execute([$date_ab, $id_worker, $status, $anomalie, $ab_desc]);
            }

            /**
             * Gere le pointage d'un employé
             */

             public function newPointage() {
                if(isset($_POST['date_ab'], $_POST['status'], $_POST['anomalie'], $_POST['ab_desc']) 
                && !empty($_POST['date_ab'])
                && !empty($_POST['status'])
                && !empty($_POST['anomalie'])
                && !empty($_POST['ab_desc'])){
                    $date_ab = $_POST['date_ab'];
                    $status = $_POST['status'];
                    $anomalie = $_POST['anomalie'];
                    $ab_desc =htmlentities(htmlspecialchars($_POST['ab_desc']));
                    $this->insertPointage($date_ab, $this->sessionID(), $status, $anomalie, $ab_desc);
                    $this->getSucces('Succès !!');
                }
             }
    
}       