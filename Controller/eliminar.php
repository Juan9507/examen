<?php 
require_once("../database/baseDatos.php");
require_once("../database/conexion.php"); 
$id=$_GET['idcedula'];
$obj = new Crud(); 
$data=$obj->delete($id); 
header("location:../view/index.php");
?>