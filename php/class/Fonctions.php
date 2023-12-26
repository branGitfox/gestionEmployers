<?php 

class Fonctions extends Workers {
  private $fonctions = [];

  private $succes;
  /**
   * retourn la liste des fonctions venant de la table fonctions
   */
    public function getListOfFonctions() {
        $query = Parent::getPdo()->query('SELECT * FROM fonctions');
        $query->execute();
        return $query->fetchAll();
    }

    /**
     * Retourne le nombre de fonction existants
     *
     */

     public function postes() {
        $query=Parent::getPdo()->prepare('SELECT COUNT(id) as postes FROM fonctions');
        $query->execute();
        return $query->fetch();
     }


     public function getNumbersOfWorkerInAFunction() 
     {
     
           foreach($this->getListOfFonctions() as $fonc){
            $query = parent::getPdo()
            ->prepare('SELECT COUNT(w_id) as nbr FROM workers WHERE id_fonction = ?');
            $query->execute([$fonc['id']]);
            $data = $query->fetch();
           array_push($this->fonctions ,[
              'id' => $fonc['id'],
              'name_fonction' => $fonc['name_fonction'],
              'nbr' => $data['nbr']
            ]);

           }

           return $this->fonctions;
            
     }

     private function insertFonction ($name_fonction) 
     {
      $query = Parent::getPdo()
      ->prepare('INSERT INTO fonctions (`name_fonction`) VALUES (?)');
      $query->execute([$name_fonction]);
      $this->getSucces('Fonction bien ajouté');
     }

     public function newFonction() 
     {
      if(isset($_POST['name_fonction']))
      {
        $name_fonction = htmlspecialchars($_POST['name_fonction']);
        $this->insertFonction($name_fonction);

      }
     }

     protected function getSucces($succes) 
     {
        $this->succes = $succes;
     }

     public function succes() 
     {
      return $this->succes;
     }

     public function deleteF()
     {
      $query = Parent::getPdo()
      ->prepare('DELETE FROM fonctions WHERE id = ?');
      $query->execute([$this->getFonctionId()]);
      $_SESSION['succes'] = 'Fonction bien supprimé';
      header('location:fonction.php');
     }

     private function getFonctionId()
     {
      if(isset($_GET['id']))
      {
         return $_GET['id'];
      }
     }
}