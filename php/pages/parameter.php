<?php 
session_start();
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
        font-family: 'Poppins', sans-serif;
    }
    .c {
        color: #3A0CA3;
    }

    .ls {
        letter-spacing: 2px;
    }

</style>
<body>
    <?php include '../sections/navbars.php'?>
    <div class="plaque shadow d-flex align-items-center justify-content-left bg-light   p-3 " > <svg class="me-1" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#3A0CA3" class="bi bi-person-workspace" viewBox="0 0 16 16">
            <path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
            <path d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.373 5.373 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2z"/>
          </svg>
                <h5 class="fs-6 mt-2  c ls">PARAMETRES</h5>
               
                </svg>
            </div>
</body>
</html>