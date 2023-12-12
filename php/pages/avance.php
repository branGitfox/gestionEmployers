<?php 
session_start();
require '../class/Workers.php';

$workers = new Workers();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/avance.css">
    <title>Avance</title>
</head>
<style>
    .noResult {
        text-align: center;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }
</style>
<body>
    
        <div class="search-container shadow">
            <div class="search-header">
                <h4>Rechercher un employé</h4>
                <svg  id="close" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x-square-fill" viewBox="0 0 16 16">
                    <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708"/>
                  </svg>
            </div>
           
            <div class="search-input">
                <input type="text" placeholder="Recherche" id="search-field">
            </div>
            <div class="result-container">
                <?php foreach($workers->getList() as $worker):?>
                <div class="result-div"><a href="avance.php?worker_id=<?=$worker['w_id']?>"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664z"/>
                  </svg><?=$worker['name'].' '.$worker['firstname']?></a></div>
                  <?php endforeach ?>
            </div>
        </div>
        <div class="container w-50 bg-light shadow rounded">
            <h3 class="text-center mt-5">Donner une Avance</h3>
            <div class="row mt-3 justify-content-center">
                <div class="col-6" style="position: relative;">
                    <svg id="search-icon" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="blue" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                      </svg>
                    <label for="employé" class="form-label">Employé</label>
                    <input type="text" class="form-control" disabled  value="<?= is_numeric($workers->sessionID())?$workers->nameFistname()['name'].' '.$workers->nameFistname()['firstname']:'Aucun employé'?>">
                </div>
                <div class="col-3">
                    <label for="date" class="form-label">Date d'avance</label>
                    <input type="date" class="form-control">
                </div>
            </div>
            <div class="row mt-2 justify-content-center">
                <div class="col-4"> 
                <label for="AvanceE" class="form-label">Avance Espece</label>
                <input type="number" class="form-control" id="avanceE">
                </div>
                <div class="col-4"> 
                    <label for="AvanceN" class="form-label">Avance Nature</label>
                    <input type="number" class="form-control" id="AvanceN">
                    </div>
            </div>
            <div class="row mt-2 justify-content-center">
                <div class="col-8">
                    <label for="description" class="form-label">Description de l'Avance</label>
                    <textarea name="" id="description" class="form-control" aria-placeholder="La raison de l'avance ici...""></textarea>
                </div>
            </div>
            <div class="row mt-2 justify-content-center ">
                <div class="col-8 mb-5">
                    <input type="submit" class="form-control bg-primary text-light" value="Enregistrer">
                </div>
            </div>
        </div>
        <script src="../../assets/js/jquery.min.js"></script>
        <script src="../../assets/js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#search-field').keyup(function () {
                   let value = $('#search-field').val()
                   $.ajax({
                        url:'a_list.php',
                        method:'POST',
                        data:{ worker: value },
                        success:function(data){
                            $('.result-container').html(data)
                        }
                   })
                })
            })
        </script>
    <script>
        document.querySelector('#close').addEventListener('click', () => {
            document.querySelector('.search-container').style.display='none'
        })
        document.querySelector('#search-icon').addEventListener('click', () => {
            document.querySelector('.search-container').style.display='block'

        })
    </script>

</body>
</html>