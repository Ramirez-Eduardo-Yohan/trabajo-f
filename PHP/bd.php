<?php
/*PREPARO LA CONECCION A LA BASE DE DATOS */

$servidor="localhost";
$nombreBaseDato="spartan";
$usuario="root";
$contrasena="";

try {

    $conexion = new PDO("mysql:host=$servidor;dbname=$nombreBaseDato", $usuario, $contrasena);
} catch(PDOException $e){

    echo $e->getMessage();
}

?>