<?php 
    include_once("./templatePHP/header.php");
    
?>

    <div class="card" style="width: 10rem;">
    <img src="../IMAGENES/depositphotos_103986174-stock-illustration-spartan-helmet-sign.jpg" class="card-img-top" alt="...">
    <div class="card-body">
        <p class="card-text">Bienvenido al Sistema...</p>
    </div>
    <a name="" id="" class="btn btn-primary" href="http://localhost/trabajo_final/" role="button">PAGINA WEB</a>
    </div>
    
<?php 
    $_SESSION['permiso'] = true;
    include_once("./templatePHP/footer.php");
?>