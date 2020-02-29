<?php  
 require_once("../database/baseDatos.php");
 require_once("../database/conexion.php");
 
 $idpelis= $_POST['idpelicula'];
 $obj = new Crud(); 
 $data=$obj->update($_POST['cedula'],$_POST['fechaini'],$_POST['fechafinal'],$_POST['direccion'],
 $_POST['nombre'],$_POST['telefono'],$_POST['correo'],$_POST['idpelicula'],$_POST['cedula']); 

 header("location:../view/alquilarpeli.php?idPeli=$idpelis");


?>