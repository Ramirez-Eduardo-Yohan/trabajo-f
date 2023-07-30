<?php  
//creo una url base
$url ="http://localhost/trabajo_final/";

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

<body>
    <header>
    <nav class="navbar navbar-denger bg-dark">
    <nav>
        <ul>
        <button type="button" class="btn btn-danger "><li><a class="text-white" href="<?php echo$url; ?>/index.php">Principo</a></li></button>
            
        </ul>
    </nav>
 </nav>
    
    </header>
    <main>
            <div class="card bg-dark text-white">
        <img src="./IMAGENES/bebidas/fondo.webp" class="card-img" alt="foto de fiesta">
        <div class="card-img-overlay">
            <h5 class="card-title">Título de la tarjeta</h5>
            <p class="card-text">Esta es una tarjeta más amplia con texto de apoyo a continuación como introducción natural a contenido adicional. Este contenido es un poco más largo.</p>
            <p class="card-text">Última actualización hace 3 minutos</p>
        </div>
        </div>
    </main>
</body>
<!--estilos basicos-->
<style>
    li{
        list-style-type: none;
    }
</style>
</html>
