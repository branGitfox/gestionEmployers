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


         


       

    
}       