<?php
//para destruir toda informacion ingresada hacer
session_start();
session_destroy();

//para redirecciona despues de la destruccion
header("Location:login.php");
?>