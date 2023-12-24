<?php 

class Roles extends Workers {
    private $succes;
    private $error;

    public function newRole()
    {
        if(isset($_POST["nom"], $_POST["prenom"], $_POST["password"], $_POST["roles"] ) && empty($this->getRoleId())){
            $nom = htmlentities(htmlspecialchars($_POST["nom"]));
            $prenom = htmlentities(htmlspecialchars($_POST["prenom"]));
            $pass = password_hash($_POST["password"], PASSWORD_DEFAULT);
            $role = $_POST["roles"];
            $status ='Activé';
            if($role == 'Admin' || $role == 'Superviseur'){
                 if($this->checkExistRole($role) == true){
                    $this->getError('Un seul role '.$role.' autorisé');
                 }else {
                    $this->insertRole($nom, $prenom, $pass, $role, $status);
                 }

            }else {
                $this->insertRole($nom, $prenom, $pass, $role, $status);
            }
            
        }
    }

    public function listOfRole() 
    {
        $query = Parent::getPdo()
        ->query('SELECT * FROM roles');
        $query->execute();
       return $query->fetchAll();

    }

    public function getRoleInfo() {
        $query = Parent::getPdo()
        ->prepare('SELECT * FROM roles WHERE id = ?');
        $query->execute([$this->getRoleId()]);
        return $query->fetch();
    }


    private function getRoleId(){
        if(isset($_GET['id'])){
            return $_GET['id'];
       
        }
    }

    public function deleteRole(){
        $query = Parent::getPdo()
        ->prepare('DELETE FROM roles WHERE id = ?');
        $query->execute([$this->getRoleId()]);
        $_SESSION['succes'] = 'Role bien supprimer';
        header('location:roles.php');
    }

    protected function getError($error) 
    {
        $this->error = $error;
    }

    public function error() 
    {
        return $this->error;
    }
    private function insertRole($nom, $prenom, $pass, $role_name, $status)
    {
        $query = Parent::getPdo()
        ->prepare("INSERT INTO roles (`name`, `firstname`, `password`, `role_name`, `status`) VALUES (?, ?, ?, ?, ?)");
        $query->execute([$nom, $prenom, $pass, $role_name, $status]);
        $this->getSucces('Role bien creeé');
        
    }

    public function changeRole() 
    {
        if(!empty($this->getRoleId())){
            if(isset($_POST["nom"], $_POST["prenom"], $_POST["password"], $_POST["roles"])){
                $nom = htmlentities(htmlspecialchars($_POST["nom"]));
                $prenom = htmlentities(htmlspecialchars($_POST["prenom"]));
                $pass = password_hash($_POST["password"], PASSWORD_DEFAULT);
                $role = $_POST["roles"];
                if(!empty( $_POST["password"])){
                $pass = password_hash($_POST["password"], PASSWORD_DEFAULT);
                if($role == 'Admin' || $role == 'Superviseur'){
                    if($this->checkExistRoleU($role) == true){  
                       $this->getError('Un seul role '.$role.' autorisé');
                    }else {
                       $this->updateRoleWP($nom, $prenom, $pass, $role, $this->getRoleId());
                    }
                
                }else {
                    $this->updateRoleWP($nom, $prenom, $pass, $role, $this->getRoleId());
                }
                
            }else{
                if($role == 'Admin' || $role == 'Superviseur'){
                    if($this->checkExistRoleU($role) == true){  
                       $this->getError('Un seul role '.$role.' autorisé');
                    }else {
                       $this->updateRoleNP($nom, $prenom, $role, $this->getRoleId());
                    }
                
                }else{
                    $this->updateRoleNP($nom, $prenom, $role, $this->getRoleId());

                }

            }
        }
        }
       
    }

    private function updateRoleWP($nom, $prenom, $pass, $role_name,$id)
    {
        $query = Parent::getPdo()
        ->prepare('UPDATE roles SET name = ?, firstname= ?, password = ?, role_name = ? WHERE id = ?');
        $query->execute([$nom, $prenom, $pass, $role_name, $id]);
        $this->getSucces('Role bien modifié');

    }

    private function updateRoleNP($nom, $prenom,  $role_name,$id)
    {
        $query = Parent::getPdo()
        ->prepare('UPDATE roles SET name = ?, firstname= ?, role_name = ? WHERE id = ?');
        $query->execute([$nom, $prenom,$role_name, $id]);
        $this->getSucces('Role bien modifié');

    }

    private function checkExistRole($role){
        $query = Parent::getPdo()
        ->prepare('SELECT * FROM roles WHERE role_name = ?');
        $query->execute([$role]);
        if($query->rowCount() >= 1){
            return true;
        }

        return false;

    }

    
    private function checkExistRoleU($role){
        $query = Parent::getPdo()
        ->prepare('SELECT * FROM roles WHERE role_name = ?');
        $query->execute([$role]);
        if($query->rowCount() > 1){
            return true;
        }

        return false;

    }


    public function getSucces($succes)
     {
        $this->succes= $succes;
    }

    public function succes()
    {
        return $this->succes;
    }

    public function blockRole() 
    {
        $query = Parent::getPdo()
        ->prepare('UPDATE roles SET status="Bloqué" WHERE id = ?');
        $query->execute([$this->getRoleId()]);
        $_SESSION['succes'] = 'Blocage reussi';
        header('location:roles.php');
    }

    public function deblockRole() {
        $query = Parent::getPdo()
        ->prepare('UPDATE roles SET status="Activé" WHERE id = ?');
        $query->execute([$this->getRoleId()]);
        $_SESSION['succes'] = 'Deblocage reussi';
        header('location:roles.php');
    }
}