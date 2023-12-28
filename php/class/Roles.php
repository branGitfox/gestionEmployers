<?php

class Roles extends Workers
{
    private $succes;
    private $error;

    /**
     * Creation d'un nouveau role
     */
    public function newRole()
    {
        if (isset($_POST["nom"], $_POST["prenom"], $_POST["password"], $_POST["roles"]) && empty($this->getRoleId())) {
            $nom = htmlentities(htmlspecialchars($_POST["nom"]));
            $prenom = htmlentities(htmlspecialchars($_POST["prenom"]));
            $pass = password_hash($_POST["password"], PASSWORD_DEFAULT);
            $role = $_POST["roles"];
            $status = 'Activé';
            if ($role == 'Admin' || $role == 'Superviseur') {
                if ($this->checkExistRole($role) == true) {
                    $this->getError('Un seul role ' . $role . ' autorisé');
                } else {
                    $this->insertRole($nom, $prenom, $pass, $role, $status);
                }

            } else {
                $this->insertRole($nom, $prenom, $pass, $role, $status);
            }

        }
    }

    /**
     * Retourne la liste des roles 
     */

    public function listOfRole()
    {
        $query = parent::getPdo()
            ->query('SELECT * FROM roles');
        $query->execute();
        return $query->fetchAll();

    }

    /**
     * Autocompletion du formulaire d'edition
     */
    public function getRoleInfo()
    {
        $query = parent::getPdo()
            ->prepare('SELECT * FROM roles WHERE id = ?');
        $query->execute([$this->getRoleId()]);
        return $query->fetch();
    }


    /**
     * Recuperation de l'id du role à modifier
     */
    private function getRoleId()
    {
        if (isset($_GET['id'])) {
            return $_GET['id'];

        }
    }

    /**
     * Suppression d'un role
     */
    public function deleteRole()
    {
        $query = parent::getPdo()
            ->prepare('DELETE FROM roles WHERE id = ?');
        $query->execute([$this->getRoleId()]);
        $_SESSION['succes'] = 'Role bien supprimer';
        header('location:roles.php');
    }

    /**
     * Recuperation des erreurs
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
     * Insertion du role dans la bqse de donnée
     */
    private function insertRole($nom, $prenom, $pass, $role_name, $status)
    {
        $query = parent::getPdo()
            ->prepare("INSERT INTO roles (`name`, `firstname`, `password`, `role_name`, `status`) VALUES (?, ?, ?, ?, ?)");
        $query->execute([$nom, $prenom, $pass, $role_name, $status]);
        $this->getSucces('Role bien creeé');

    }
    /**
     * Modification du role dans la base de donnée
     */

    public function changeRole()
    {
        if (!empty($this->getRoleId())) {
            if (isset($_POST["nom"], $_POST["prenom"], $_POST["password"], $_POST["roles"])) {
                $nom = htmlentities(htmlspecialchars($_POST["nom"]));
                $prenom = htmlentities(htmlspecialchars($_POST["prenom"]));
                $pass = password_hash($_POST["password"], PASSWORD_DEFAULT);
                $role = $_POST["roles"];
                if (!empty($_POST["password"])) {
                    $pass = password_hash($_POST["password"], PASSWORD_DEFAULT);
                    if ($role == 'Admin' || $role == 'Superviseur') {
                        if ($this->checkExistRoleU($role) == true) {
                            $this->getError('Un seul role ' . $role . ' autorisé');
                        } else {
                            $this->updateRoleWP($nom, $prenom, $pass, $role, $this->getRoleId());
                        }

                    } else {
                        $this->updateRoleWP($nom, $prenom, $pass, $role, $this->getRoleId());
                    }

                } else {
                    if ($role == 'Admin' || $role == 'Superviseur') {
                        if ($this->checkExistRole($role) == true) {
                            $this->getError('Un seul role ' . $role . ' autorisé');
                        } else {
                            $this->updateRoleNP($nom, $prenom, $role, $this->getRoleId());
                        }

                    } else {
                        $this->updateRoleNP($nom, $prenom, $role, $this->getRoleId());

                    }

                }
            }
        }

    }

    /**
     * Modification du role avec mot de passe
     */
    private function updateRoleWP($nom, $prenom, $pass, $role_name, $id)
    {
        $query = parent::getPdo()
            ->prepare('UPDATE roles SET name = ?, firstname= ?, password = ?, role_name = ? WHERE id = ?');
        $query->execute([$nom, $prenom, $pass, $role_name, $id]);
        $this->getSucces('Role bien modifié');

    }

    /**
     * Modification du role sans mot de passe
     */
    private function updateRoleNP($nom, $prenom, $role_name, $id)
    {
        $query = parent::getPdo()
            ->prepare('UPDATE roles SET name = ?, firstname= ?, role_name = ? WHERE id = ?');
        $query->execute([$nom, $prenom, $role_name, $id]);
        $this->getSucces('Role bien modifié');

    }

    /**
     * Retourne True si le role existe deja False sinon
     */
    private function checkExistRole($role)
    {
        $query = parent::getPdo()
            ->prepare('SELECT * FROM roles WHERE role_name = ?');
        $query->execute([$role]);
        if ($query->rowCount() > 0) {
            return true;
        }

        return false;

    }


    /**
     * Retourne True si le role existe deja en ignorant celui du role à modifier
     */
    private function checkExistRoleU($role)
    {
        $query = parent::getPdo()
            ->prepare('SELECT * FROM roles WHERE role_name = ?');
        $query->execute([$role]);
        if ($query->rowCount() == 1) {
            return true;
        }

        return false;

    }

    /**
     * Capture les succès
     */

    public function getSucces($succes)
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
     * Blocage d'un role
     */
    public function blockRole()
    {
        $query = parent::getPdo()
            ->prepare('UPDATE roles SET status="Bloqué" WHERE id = ?');
        $query->execute([$this->getRoleId()]);
        $_SESSION['succes'] = 'Blocage reussi';
        header('location:roles.php');
    }

    /**
     * deblocage d'un role
     */
    public function deblockRole()
    {
        $query = parent::getPdo()
            ->prepare('UPDATE roles SET status="Activé" WHERE id = ?');
        $query->execute([$this->getRoleId()]);
        $_SESSION['succes'] = 'Deblocage reussi';
        header('location:roles.php');
    }

    /**
     * Connexion 'un utilisateur
     */
    private function connectRole($user, $password)
    {
        $query = parent::getPdo()
            ->prepare('SELECT * FROM roles WHERE name = ?');
        $query->execute([$user]);
        if ($query->rowCount() > 0) {
            $data = $query->fetch();
            if ($data['status'] != 'Bloqué') {
                if (password_verify($password, $data['password'])) {
                    $_SESSION['user'] = [
                        'id' => $data['id'],
                        'name' => $data['name'],
                        'firstname' => $data['firstname'],
                        'role_name' => $data['role_name']
                    ];
                    header('location:index.php');
                } else {
                    $this->getError('Information incorrect');
                }
            } else {
                $this->getError('Ce role est bloqué');

            }

        } else {
            $this->getError('Ce role nexiste pas');
        }
    }

    /**
     * Gere le formulaire de connexion
     */
    public function checkRoleForm() {
        if(isset($_POST['name'], $_POST['password']))
        {
            $user = htmlentities(htmlspecialchars($_POST['name']));
            $password = $_POST['password'];
            $this->connectRole($user, $password);

        }
    }

}

