<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php $id = 10;?>
     <button onclick="confirmer(<?=$id ?>)">supprimer <p style="display: none;"><?= 1 ?></p></button>
   <?php 
    echo date('Y-m');
   
   ?>
    <script>
        function confirmer (id) {
            if(confirm('hello')){
                location.href='suppremployer.php?worker_id='+id
            }
        }
    </script>
</body>
</html>