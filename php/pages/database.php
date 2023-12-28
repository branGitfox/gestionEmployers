<?php 
session_start();
require '../class/Security.php';
$security = new Security();
$security->redirect();
if(isset($_FILES['bd'])){
    var_dump($_FILES['bd']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="../../assets/js/bootstrap.bundle.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <title>Document</title>
</head>
<?php include '../sections/font.php'?>
<style>
       .plaque {
        width: 84.25%;
        height: 8.7vh;
        position: absolute;
        top: 0;
        right: 0;
    }

    a{
        text-decoration: none;
    }

    .succes {
        animation-name: fade;
        animation-duration: 15s;
        transition: .5s;
    }

    @keyframes fade {
        from {
            opacity: 1;
        }

        to {

            opacity: 0;
        }
    }
    .c {
        color: #3A0CA3;
    }

    .ls {
        letter-spacing: 1px;
    }

    .container {
        position: absolute;
        top: 10rem;
        right: 15rem;
    }

    .bloquer {
        position: absolute;
        top: 30%;
        left: 50%;
        
    }
    .a {
        position: absolute;
        top: 20%;
        left: 42%;
        font-size: 40px;
    }
</style>
<body>
    <?php include '../sections/navbars.php'?>
    <div class="plaque bg-light shadow d-flex align-items-center justify-content-space-between   p-3 ">   
        <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#3A0CA3" class="bi bi-database" viewBox="0 0 16 16">
        <path d="M4.318 2.687C5.234 2.271 6.536 2 8 2s2.766.27 3.682.687C12.644 3.125 13 3.627 13 4c0 .374-.356.875-1.318 1.313C10.766 5.729 9.464 6 8 6s-2.766-.27-3.682-.687C3.356 4.875 3 4.373 3 4c0-.374.356-.875 1.318-1.313ZM13 5.698V7c0 .374-.356.875-1.318 1.313C10.766 8.729 9.464 9 8 9s-2.766-.27-3.682-.687C3.356 7.875 3 7.373 3 7V5.698c.271.202.58.378.904.525C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777A4.92 4.92 0 0 0 13 5.698M14 4c0-1.007-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1s-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4v9c0 1.007.875 1.755 1.904 2.223C4.978 15.71 6.427 16 8 16s3.022-.289 4.096-.777C13.125 14.755 14 14.007 14 13zm-1 4.698V10c0 .374-.356.875-1.318 1.313C10.766 11.729 9.464 12 8 12s-2.766-.27-3.682-.687C3.356 10.875 3 10.373 3 10V8.698c.271.202.58.378.904.525C4.978 9.71 6.427 10 8 10s3.022-.289 4.096-.777A4.92 4.92 0 0 0 13 8.698m0 3V13c0 .374-.356.875-1.318 1.313C10.766 14.729 9.464 15 8 15s-2.766-.27-3.682-.687C3.356 13.875 3 13.373 3 13v-1.302c.271.202.58.378.904.525C4.978 12.71 6.427 13 8 13s3.022-.289 4.096-.777c.324-.147.633-.323.904-.525"/>
        </svg>
                <h5 class=" mt-2  ls c " >BASE DE DONNEE</h5>
            </div>
        <?php if($_SESSION['user']['role_name'] != 'Utilisateur'):?>
            <div class="container w-50 bg-light shadow rounded text-center">
                <h4 class="text-success mt-3">Importation et Exportation</h4>
                <div class="spinner-border text-primary h6" role="status" style="display:none;">
                <span class="visually-hidden">Loading...</span>
                </div>
                <div id="result"></div>
                <div class="mt-3 mb-1">
                        <label for="bd" class="form-label">Inserer la base de donnée ici</label>
                        <input type="file" name="bd" id="bd" class="form-control mb-2">
                        <button onclick="return confirm('Vous voulez vraiment restaurer la base de donnée ?')"  class="form-control bg-primary text-light mb-1" id="imp">Importer</button>
                        <a href="exporterBd.php" class="form-control text-light bg-success mb-5">Exporter</a>
                </div>
               

            </div>
            <?php else :?>
                <h5 class="text-center text-danger a">Vous n'avez pas acces !!</h5>
                <img class="bloquer" src="../../assets/imgs/téléchargement.png" alt="">
                <?php endif ?>
            <?php if (!empty($_SESSION['succes'])): ?>
                <div class="position-fixed bottom-0 end-0 p-3 succes" style="z-index: 11">
                    <div id="liveToast" class="toast show text-light bg-success" role="alert" aria-live="assertive"
                        aria-atomic="true">
                        <div class="toast-header">

                            <strong class="me-auto"> Ste TAVARATRA</strong>
                            <small>Maintenant</small>
                            <button type="button"  class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                            <?= $_SESSION['succes'] ?>
                        </div>
                    </div>
                </div>
            <?php endif ?>
            <?php unset($_SESSION['succes']); ?>
        <script src="../../assets/js/jquery.min.js"></script>
                <script>
                   $(document).ready(function () {
                    $('#imp').click(function () {
                        
                        let bd = $('#bd').val()
                       $('.h6').show()
                        $.ajax({
                            url:'importBd.php',
                            method:'POST',
                            data:{bd : bd},
                            complete: function() {
                             $('.h6').hide()
                                
                            },
                            success:function() {
                             $('.h6').hide()
                                $('#result').html('Importation reussi!')
                            },
                            error:function() {
                             $('.h6').hide()
                                $('#result').html('Echec d\'importation')
                            }
                        })
                    })
                     
                   })
                </script>
            <script>
                
                const succes = document.querySelector('.succes')
                setTimeout(() => {
                    succes.remove()
                }, 5000)

         
            </script>
</body>
</html>