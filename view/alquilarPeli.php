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
    <title>Pelicula</title>
</head>
<body>
<?php
    // $seleccion = $_GET['idPeli'];
    $obj = new Crud();
    $data=$obj->setPeliculaId($_GET['idPeli']);
?>
<div class="container md-5 mt-5">

    <div class="row justify-content-end">
        <div class="col-md-6">
            <form action="" method="post">
                <div class="row">
                    <div class="col">
                        <input class="form-control" type="number" name="consultcedula" id="" placeholder="Digite la cedula para consultar">
                        <input type="hidden" name="titular" value="<?=$_GET['idPeli']; ?>">
                    </div>
                    <div class="col align-self-end">
                        <input type="submit" class="btn btn-info btn-block" value="Consultar">  
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row ">
       <div class="col-md-6">
            <img style="width:50%; height:300px" class="card-img-top" src="../imagen/<?=$data['imagen'];?>" alt="">
       </div>
       <div class="col-md-6">
            <?php if (isset($_POST['consultcedula'],$_POST['titular'])) {
                $obj = new Crud();
                $consul=$obj->setIdentificacionId($_POST['consultcedula'],$_POST['titular']); 
            ?>
                    
                    <form  action="../Controller/actualizar.php" method="post">
                    <div class="row ">
                    <div class="col">
                        <input class="form-control mt-3" type="text" name="nombre-peli" id="nombre-peli" readonly value="<?=$data['titulo'] ?>">
                    </div>
                    <div class="col">
                        <input class="form-control mt-3" type="date"  placeholder="" readonly name="fechaini" id="" value="<?php echo date("Y-m-d");?>">
                    </div>
                    <div class="w-100"></div>
                    <div class="col">
                        <input class="form-control mt-3" type="date"  readonly id="fechafinal" name="fechafinal" value="<?= $consul['fecha_final']?>" > 
                    </div>
                    <div class="col">
                        <input class="form-control mt-3" type="text" name="nombre" id="" value="<?=$consul['nombre_cliente']?>" placeholder="Nombre completo">
                    </div>  
                    <div class="w-100"></div>
                    <div class="col">
                        <input class="form-control mt-3" type="number" name="cedula" readonly id="" value="<?=$consul['cedula_cliente']?>"  placeholder="Numero de indentificación"> 
                    </div>
                    <div class="col">
                        <input class="form-control mt-3" type="text" name="direccion" id="" value="<?=$consul['direccion']?>"    placeholder="Direccion"> 
                    </div>
                    <div class="w-100"></div>
                    <div class="col">
                        <input class="form-control mt-3" type="text" name="telefono" id=""  value="<?=$consul['telefono']?>"  placeholder="Telefono"> 
                    </div>
                    <div class="col">
                        <input class="form-control mt-3" type="email" name="correo" id="" value="<?=$consul['correo']?> "placeholder="Correo"> 
                    </div> 
                    <div class="w-100 mt-4"></div>   
                        <input  type="hidden" name="idpelicula" value="<?= $consul['codigo_pelicula'] ?>"> 
                    <div class="col"> 
                          <input type="submit"  value="modificar" class="btn btn-info btn-block"> 
                    </div>
                    <div class="col"> 
                        <div class="row">
                        <a class="btn btn-info btn-block" href="../Controller/eliminar.php?idcedula=<?=$consul['cedula_cliente'] ?>">Eliminar</a>
                        <!-- <input type="submit" value="eliminar" class="btn btn-info btn-block">  -->
                    </div>
                    <div class="w-100 mt-4"></div>   
                    </div> 
                </div>
                
                <!-- <input type="submit" onClick='validarFecha();' id="submit" name="submit"  class="btn btn-danger btn-block" value="Alquilar"> -->
            </form>
            <div class="card">
                <div class="card-header">
                    <?=$consul['titulo']; ?>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Nombre director: <?=$consul['nombre_director']; ?></h5>
                        <p class="card-text">Actor: 
            
                            <?=$consul['nombre_actor'];?>
                       
                        </p>
                    </h5>
                </div>
            </div>
                <?php
                }else {
            ?>
            <form id="form1" name="form1" method="post">
                <div class="row ">
                    <div class="col">
                        <input class="form-control mt-3" type="text" name="nombre-peli" id="nombre-peli" readonly value="<?=$data['titulo'] ?>">
                    </div>
                    <div class="col">
                        <input class="form-control mt-3" type="date"  placeholder="" readonly name="fechaini" id="" value="<?php echo date("Y-m-d");?>">
                    </div>
                    <div class="w-100"></div>
                    <div class="col">
                        <input class="form-control mt-3" type="date" id="fechafinal" name="fechafinal" value="" > 
                    </div>
                    <div class="col">
                        <input class="form-control mt-3" type="text" name="nombre" id="" value="" placeholder="Nombre completo">
                    </div>  
                    <div class="w-100"></div>
                    <div class="col">
                        <input class="form-control mt-3" type="number" name="cedula" id="" placeholder="Numero de indentificación"> 
                    </div>
                    <div class="col">
                        <input class="form-control mt-3" type="text" name="direccion" id="" placeholder="Direccion"> 
                    </div>
                    <div class="w-100"></div>
                    <div class="col">
                        <input class="form-control mt-3" type="text" name="telefono" id="" placeholder="Telefono"> 
                    </div>
                    <div class="col">
                        <input class="form-control mt-3" type="email" name="correo" id="" placeholder="Correo"> 
                    </div> 
                    <div class="w-100 mt-4"></div>   
                    <div class="col">
                        <input  type="hidden" name="idpelicula" value="<?= $data['codigo_pelicula'] ?>"> 
                    </div> 
                </div>
                <input type="submit" onClick='validarFecha();' id="submit" name="submit"  class="btn btn-danger btn-block" value="Alquilar">
            </form>
            <?php
                }
            ?>
       </div>
    </div>
    <div id="respuesta">
        <!-- APARTADO DONDE SE VA A RECIBIR LO ENVIADO Y TRAIDO DEL SERVIDOR CON AJAX -->
        
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<!-- ENVION AJAX A REGISTROTITULAR.PHP -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script>
    function validarFecha(){
        const hoy = new Date();
        const dias = new Date(fechafinal.value);
        const calculado = new Date();
        const diassumar = calculado.setDate(
        hoy.getDate() + 5
        );
        if (dias > diassumar)
        {
            alert('La fecha de entrega no puede pasar de 5 dias');
        }else{
            $(document).ready(function(){   
            $(document).on('submit', '#form1', function() { 
              //Obtenemos datos formulario.
              var data=$(this).serialize(); 
              //   alert('Datos serializados: '+data);
              //AJAX.
              $.ajax({  
                 type : 'POST',
                 url  : '../Controller/registroTitular.php',
                 data: data, 

                 success:function(data) {  
                     $('#respuesta').html(data).fadeIn();
                     document.getElementById("form1").reset();
                 }  
              });
              return false;
        });
      });//Fin document.

        }

        
    }

    </script>
</body>
</html>