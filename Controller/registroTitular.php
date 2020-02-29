<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    require_once("../database/baseDatos.php");
    require_once("../database/conexion.php");

    $idpelicula = $_POST['idpelicula'];

    $obj = new Crud();
    $data=$obj->getTitular($_POST['cedula'],$_POST['fechaini'],$_POST['fechafinal'],$_POST['nombre'],
    $_POST['direccion'],$_POST['telefono'],$_POST['correo'],$_POST['idpelicula']);
    
    if (!$data) { ?>
        <div class="alert alert-primary" role="alert">
            Felcidades tu alquiler se ha realizado sastifatoriamente!
        </div>
    <?php       
        }
    ?>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
</body>
</html>