<?php
require_once("../database/baseDatos.php");
require_once("../database/conexion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> -->
    <title>Document</title>
</head> 
      <title>maxi pelicula</title>
<body> 
      <h1>Maxi Pelicula</h1> 
        <?php
            $obj = new Crud();
            $data=$obj->setPelicula();
        ?>
        <div class="row">
        <?php foreach($data as $f){ ?>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card h-100">
                        <a href="#"><img style="width:100%; height:300px" class="card-img-top" src="../imagen/<?=$f['imagen'];?>" alt=""></a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="#"><?php echo $f['titulo']; ?></a>
                            </h4>
                            <h5><a class="btn btn-secondary btn-sm btn-block" href="alquilarPeli.php?idPeli=<?php echo $f['codigo_pelicula'];?>">Alquilar</a></h5> 
                        </div>
                    </div>
                </div>
        <?php
        } 
        ?>
        </div>

    <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>   -->
</body>
</html>