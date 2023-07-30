<?php 

  //sentencia para llamar las valores en la base de datos
  $sentencia = $conexion->prepare("SELECT * FROM $_SESSION[baseDatos]");

    $sentencia->execute();

    $listaProductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
  /* echo"<pre>";
  print_r($listaProductos);
  echo"<pre>";*/

  $_SESSION["TAMANO"]=count($listaProductos)-1;

    //echo $_SESSION["TAMANO"] ;
?>