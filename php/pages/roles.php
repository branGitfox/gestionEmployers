<?php 
session_start();
require '../class/Workers.php';
require '../class/Roles.php';
$roles = new Roles();
$roles->newRole();
$roles->changeRole();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script src="../../assets/js/bootstrap.bundle.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <title>STE TAVARATRA</title>
</head>
<?php include '../sections/font.php'?>
<style>
    .plaque {
        width: 84.25%;
        height: 8.7vh;
        position: absolute;
        top: 0;
        right: 0;
        font-family: 'Poppins', sans-serif;
    }

    .c {
        color: #3A0CA3;
    }

    .ls {
        letter-spacing: 1px;
    }

    .container {
        width: 84%;
        height: 89vh;
        position: absolute;
        top: 5rem;
        right: 0;
    }
    .row {
        height: 87vh;
       
    }

 

    .col-8 {
        /* background-color: red; */
        height: 87vh;
        overflow: auto;

    }

    #pass {
        position: relative;
    }

    #pass svg {
        position: absolute;
        right: .5rem;
        top: 2.7rem;
    }

    .none {
        display: none;
    }

  
    thead{
        position: sticky;
        top: 0;
        /* background-color: red; */
        
    }
</style>
<body>
    <?php include '../sections/navbars.php' ?>
    <div class="plaque shadow d-flex align-items-center justify-content-left bg-light   p-3 " >   <svg class="me-1" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#3A0CA3" class="bi bi-shield-lock" viewBox="0 0 16 16">
            <path d="M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .101.025.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56"/>
            <path d="M9.5 6.5a1.5 1.5 0 0 1-1 1.415l.385 1.99a.5.5 0 0 1-.491.595h-.788a.5.5 0 0 1-.49-.595l.384-1.99a1.5 1.5 0 1 1 2-1.415z"/>
          </svg>
                <h5 class="fs-6 mt-2  c ls">ROLES</h5>
               
                </svg>
            </div>

            <div class="container">
                <div class="row">
                        <div class="col-4  shadow p-3">
                            <form method="post">
                                
                                <h3 class="text-left text-success">AJOUTER</h3>
                            
                               
                                <div class="mt-4 mb-1">
                                    <label for="nom" class="form-label">Nom</label>
                                    <input type="text" class="form-control" id="nom" name="nom" value="<?=empty($roles->getRoleInfo())?'': $roles->getRoleInfo()['name']?>">
                                </div>
                                <div class="mt-4 mb-1">
                                    <label for="prenom" class="form-label">Prenom</label>
                                    <input type="text" class="form-control" id="prenom" name="prenom" value="<?=empty($roles->getRoleInfo())?'': $roles->getRoleInfo()['firstname']?>">
                                </div>
                                <div class="mt-4 mb-1" id="pass">
                                <svg class="look" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                                </svg>
                                <svg class="close none" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash" viewBox="0 0 16 16">
                                <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486z"/>
                                <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829"/>
                                <path d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708"/>
                                </svg>
                                    <label for="password" class="form-label">Mot de passe</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                                <div class="mt-4 mb-1">
                                    <label for="role" class="form-label">Role</label>
                                    <select name="roles" id="role" class="form-select">
                                        <option value="Admin" <?php if(!empty($roles->getRoleInfo()) && $roles->getRoleInfo()['role_name']=='Admin'){echo 'selected';}?>>Administrateur</option>
                                        <option value="Superviseur" <?php if(!empty($roles->getRoleInfo()) && $roles->getRoleInfo()['role_name']=='Superviseur'){echo 'selected';}?>>Superviseur</option>
                                        <option value="Utilisateur" <?php if(!empty($roles->getRoleInfo()) && $roles->getRoleInfo()['role_name']=='Utilisateur'){echo 'selected';}?>>Utilisateur</option>
                                    </select>
                                </div>
                                <div class="mt-4 mb-1">
                                    <input type="submit" value="Enregistrer" class="form-control bg-success text-light">
                                    <?php if($roles->getRoleInfo()):?>
                                        <a href="roles.php" class="btn btn-danger">Annuler</a>
                                        <?php endif ?>
                                </div>
                            </form>
                        </div>
                        <div class="col-8  shadow p-3">
                            <h3 class="text-primary">Liste des roles</h3>
                            <table class="table">
                                <thead class="bg-light">
                                    <tr>
                                        <th>Nom</th>
                                        <th>Prenom</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Creation</th>
                                        <th>Modifier|Bloquer|Supprimer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($roles->ListOfRole() as $role):?>
                                    <tr>
                                        <td><?=$role['name']?></td>
                                        <td><?=$role['firstname']?></td>
                                        <td><?=$role['role_name']?></td>
                                        <?php if($role['status'] == 'Activé'):?>
                                        <td class="text-success"><?=$role['status']?></td>
                                        <?php else :?>
                                        <td class="text-danger"><?=$role['status']?></td>
                                        <?php endif?>

                                        <td><?=$role['date']?></td>
                                        <?php if($role['role_name'] != 'Admin'):?>
                                        <td><a href="roles.php?id=<?=$role['id']?>"  class="btn btn-success me-4 ">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                            </svg>
                                        </a>
                                        <?php if($role['status']=='Bloqué'):?>
                                        <a href="deblocRole.php?id=<?=$role['id']?>" title="Debloqué" onclick="return confirm('Vous voulez vraiment bloquer ce role ?')" class="btn btn-secondary me-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-ban" viewBox="0 0 16 16">
                                            <path d="M15 8a6.973 6.973 0 0 0-1.71-4.584l-9.874 9.875A7 7 0 0 0 15 8M2.71 12.584l9.874-9.875a7 7 0 0 0-9.874 9.874ZM16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0"/>
                                            </svg>
                                        </a>
                                        <?php else :?>
                                            <a href="blockRole.php?id=<?=$role['id']?>" title="Bloqué" onclick="return confirm('Vous voulez vraiment bloquer ce role ?')" class="btn btn-warning me-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-ban" viewBox="0 0 16 16">
                                            <path d="M15 8a6.973 6.973 0 0 0-1.71-4.584l-9.874 9.875A7 7 0 0 0 15 8M2.71 12.584l9.874-9.875a7 7 0 0 0-9.874 9.874ZM16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0"/>
                                            </svg>
                                        </a>
                                        <?php endif ?>
                                        <a href="deleteRole.php?id=<?=$role['id']?>" onclick="return confirm('Vous voulez vraiment supprimer ce role ?')" class="btn btn-danger me-4">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                            </svg>
                                        </a>    
                                        <?php endif ?>
                                        </td>
                                    </tr>    
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
            <?php if (!empty($roles->succes())): ?>
            <div class="position-fixed bottom-0 end-0 p-3 succes" style="z-index: 11">
        <div id="liveToast" class="toast show text-light bg-success" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header">
         
            <strong class="me-auto"> Ste TAVARATRA</strong>
            <small>Maintenant</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
          <div class="toast-body">
            <?= $roles->succes() ?>
          </div>
        </div>
      </div>
        <?php endif ?>
        <?php if (!empty($roles->error())): ?>
            <div class="position-fixed bottom-0 end-0 p-3 succes" style="z-index: 11">
        <div id="liveToast" class="toast show text-light bg-danger" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header">
         
            <strong class="me-auto"> Ste TAVARATRA</strong>
            <small>Maintenant</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
          <div class="toast-body">
            <?= $roles->error() ?>
          </div>
        </div>
      </div>
        <?php endif ?>
        <?php if (!empty($_SESSION['succes'])): ?>
                <div class="position-fixed bottom-0 end-0 p-3 succes" style="z-index: 11">
                    <div id="liveToast" class="toast show text-light bg-success" role="alert" aria-live="assertive"
                        aria-atomic="true">
                        <div class="toast-header">

                            <strong class="me-auto"> Ste TAVARATRA</strong>
                            <small>Maintenant</small>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                            <?= $_SESSION['succes'] ?>
                        </div>
                    </div>
                </div>
            <?php endif ?>
            <?php unset($_SESSION['succes']); ?>
            <script>
        const look = document.querySelector('.look')
        const close = document.querySelector('.close')
        const input =document.querySelector('#password')
        look.addEventListener('click', ()=> {
            input.type = 'text'
            look.classList.add('none');
            close.classList.remove('none');
        })

        close.addEventListener('click', ()=> {
            input.type = 'password'
            close.classList.add('none');
            look.classList.remove('none');
        })
        
    </script>
</body>
</html>