<?php
  require_once("conexion.php");
  class Crud extends conexion{
     
     public function setPelicula(){
        $this->setNames();
        $sql="select * from pelicula";
        $resul=mysqli_query($this->con,$sql);
        $data=NULL;
        while($fila=mysqli_fetch_assoc($resul)){
            $data[]=$fila;
        }

        return $data;
     }

     public function setPeliculaId($seleccion){
      $this->setNames();
      $sql="select * from pelicula where codigo_pelicula='$seleccion'";
      $result=mysqli_query($this->con,$sql);
      $f=mysqli_fetch_array($result);
      return $f;
   }

   public function getTitular($cedula,$fechaini,$fechafinal,$nombre,$direccion,$telefono,$correo,$idpelicula){
      try{
         $this->setNames();
         $sql= "insert into alquiler (cedula_cliente,fecha_ini,fecha_final,nombre_cliente,direccion,telefono,correo,pelicula_tres) values ('".$cedula."','".$fechaini."','".$fechafinal."','".$nombre."','".$direccion."','".$telefono."','".$correo."','".$idpelicula."')";
         if ($this->con->query($sql)==true){
         //   echo "Registro guardado";

         }else{
           echo "Error: " . $sql . "<br>" . $this->con->error;
         }
      }catch(exception $ex){
          throw $ex;
      }
     
   }
          
   public function setIdentificacionId($seleccion,$idPelicula){
      $this->setNames();
      // $sql="select * from alquiler INNER JOIN pelicula where alquiler.pelicula_tres=codigo_pelicula && cedula_cliente='$seleccion'";
      $sql="select * from pelicula LEFT JOIN alquiler ON pelicula.codigo_pelicula=pelicula_tres LEFT JOIN director ON pelicula.codigo_pelicula=pelicula_dos LEFT JOIN actores ON pelicula.codigo_pelicula=pelicula where cedula_cliente='$seleccion' && pelicula_tres = '$idPelicula'";
      $result=mysqli_query($this->con,$sql);
      $f=mysqli_fetch_array($result);
      return $f;
   }

   public function update($identificacion,$fechaIni,$fechaFinal,$direccionCliente,$nombre,$telefonoCliente,$email,$idpelicula, $idcedula_cliente){
      $sql ="UPDATE alquiler SET cedula_cliente='$identificacion', fecha_ini='$fechaIni', fecha_final='$fechaFinal', direccion='$direccionCliente',nombre_cliente='$nombre', telefono='$telefonoCliente',correo='$email',pelicula_tres='$idpelicula' WHERE cedula_cliente=$idcedula_cliente";
      if ($resul=mysqli_query($this->con,$sql)) {
         echo "excelente";
     } else {
         echo "Error updating record: " . mysqli_error($resul);
     }

   }

   public function delete($id){
      $sql = "DELETE FROM alquiler WHERE cedula_cliente=$id";
      if ($resul=mysqli_query($this->con,$sql)) {
         echo "excelente";
     } else {
         echo "Error updating record: " . mysqli_error($resul); 
     }
   }

}

?>