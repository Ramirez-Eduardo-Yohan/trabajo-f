<?php  
session_start();
//creo una url base
$url ="http://localhost/trabajo_final/PHP/";

//si no inicializo el usuario no le va dejar entrar ni por url
if (!isset($_SESSION['usuario'])) {
    header("Location:". $url ."login.php");
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    
    </head>

    <body >
    <header>
        
        <nav class="card text-white bg-danger mb-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
            Spartan
            </a>
            <ul>
            
                <li><a class="nav-link" href="<?php echo $url?>index.php">INICIO</a></li>
                <li><a class="nav-link" href="<?php echo $url?>cerrar.php">SALIR</a></li>

            </ul>
            
        </div>
        </nav>
        <!--<nav class="navbar navbar-expand navbar-light bg-light">-->
        <nav class="card text-white bg-secondary mb-3">
        <div class="container-fluid">
            <ul>
                <li class="nav-item">

                <a class="nav-link active" aria-current="page" href="<?php echo $url?>partes/bebidas/index.php">Bebidas</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="<?php echo $url?>partes/combos/index.php">Combos</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="<?php echo $url?>partes/platos/index.php">Platos</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="<?php echo $url?>partes/tragos/index.php">Tragos</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="<?php echo $url?>partes/ofertas_web/index.php">ofertas web</a>
                </li>
                
            </ul>
            </div>
        </div>
    </nav>
    </header>
    <main class="bg-dark">