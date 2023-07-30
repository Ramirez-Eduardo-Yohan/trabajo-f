<?php 
//ME CONECTO A PHP PARA TRAER LA INFORMACION DE LA BASE DE DATO
session_start();
include_once("./PHP/bd.php");
$_SESSION["baseDatos"]="ofertas";
include("./PHP/llamarBaseDato/base.php");
//creo una url base
$url ="http://localhost/trabajo_final/";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRABAJO FINAL</title>
    
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--<script src="https://kit.fontawesome.com/2ef2adccc7.js" crossorigin="anonymous"></script>-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="./scrip.js"></script>
    <link rel="stylesheet" type="text/css" href="./estilo/style.css">

</head>
<body>
<!--CUERPO VISIBLE DE LA PAGINA-->
    <header>
        <div class="contenedor">
            <!--logo-->
            <div class="imagen">
                <img src="./IMAGENES/depositphotos_103986174-stock-illustration-spartan-helmet-sign.jpg" alt="spartan logo">
                <h2 class="nombreEmpresa">spartan</h2>
            </div>
            <!--navegacion fa-solid-->
            <div class="icono ">
                <!--<i class="bi bi-list"></i>-->
                <i class="bi bi-list espacio "></i>
            </div>
            <nav  class="nav ver">    
                <ul class="lista">
                    <li class="items mostar"><a href="<?php echo $url; ?>#promo">Promos del Dia</a></li>
                    <li class="items mostar"><a href="<?php echo $url; ?>#combos">Combos</a></li>
                    <li class="items mostar"><a href="<?php echo $url; ?>#comidas">Comidas</a></li>
                    <li class="items mostar"><a href="<?php echo $url; ?>#unitario">Botellas</a></li>
                    <li class="items mostar"><a href="<?php echo $url; ?>#tragos">Tragos</a></li>
                    <li class="items"><a href="<?php echo $url; ?>/eventos.php">Eventos</a></li>
                    <li class="items"><a href="<?php echo $url; ?>/infPersonal.php">¿Quienes somos?</a></li>
                    <li class="items salir">SALIR</li>
                    <?php 
                    //mediante esto puedo entrar y salir estando logeado 
                    //y ver como queda la pagina 
                    //en el momento que salgo se elimina esta opcion del nav
                    //session_start();
                    if(isset($_SESSION['permiso'])){ ?>
                    <a name="" id="" class="btn btn-primary" href="http://localhost/trabajo_final/PHP/index.php" role="button">VOLVER</a>
                    <?php } ?>
                </ul>
            </nav>
        </div>
        
    </header>
    
    <!--contenido principal-->
    <main>


            <div class="espacio"></div>
            
            <section class="evento">
                <h2>Fin de semana imperdible</h2>
                <h3>Para tu anticipada comunicate al whatsapp</h3>
            </section>
        <!--OFERTAS DEL DIA-->
        
            <section id="promo">
                <h2 class="titulosSeccion">Promos </h2>
                
                    <?php  
                    //LLAMO DE LA BASE DE DATOS LOS VALORES INVERTIDOS
                    //MUESTRA PRIMELO LO ULTIMO QUE INGRESO
                    for ($i=$_SESSION["TAMANO"]; $i >-1 ; $i--) { ?>
                        <h3 class="productoNombre"><?php echo $listaProductos[$i]['nombre']; ?></h3>
                        <div class="contenedorImagen">
                            <img  src="./PHP/partes/ofertas_web/IMGoferta/<?php echo $listaProductos[$i]['foto']; ?>" alt="">

                            <h3 class="costo"> $<?php echo $listaProductos[$i]["precio"]; ?></h3>
                        </div>
                        <div class="espacio"></div>

                    <?php }?>
                
            </section>
            
            <!--combos-->
            <section id="combos">
                <h2 class="titulosSeccion">Combos</h2>
                <?php 
                $_SESSION["baseDatos"]="tabla_combos";
                include("./PHP/llamarBaseDato/base.php");
                for ($i=$_SESSION["TAMANO"]; $i >-1 ; $i--) { ?>
                    <h3 class="productoNombre"><?php echo $listaProductos[$i]['nombre']; ?></h3>
                    <div class="contenedorImagen">
                    <img  src="./PHP/partes/combos/IMG/<?php echo $listaProductos[$i]['foto']; ?>" alt="">

                    <h3 class="costo"><?php echo $listaProductos[$i]["precio"]; ?></h3>
                    </div>
                    <div class="espacio"></div>
                    <?php }?>
                
            </section>
            <!--comidas-->
            <section id="comidas">
            <h2 class="titulosSeccion">Comidas</h2>
            <?php 
            $_SESSION["baseDatos"]="tabla_comidas";
            include("./PHP/llamarBaseDato/base.php");
            for ($i=$_SESSION["TAMANO"]; $i >-1 ; $i--) { ?>
                    <h3 class="productoNombre"><?php echo $listaProductos[$i]['nombre']; ?></h3>
                    <div class="contenedorImagen">
                        <img src="./PHP/partes/platos/IMG/<?php echo $listaProductos[$i]['foto']; ?>" alt="">

                        <h3 class="costo"><?php echo $listaProductos[$i]["precio"]; ?></h3> 
                    </div>
                    <div class="espacio"></div>
                        <?php }?>

            </section>
            <!--productos unitarios-->
            <section id="unitario">
                <h2 class="titulosSeccion">Productos</h2>
                <?php 
            $_SESSION["baseDatos"]="tabla_botella";
            include("./PHP/llamarBaseDato/base.php");
            for ($i=$_SESSION["TAMANO"]; $i >-1 ; $i--) { ?>
            
                    <h3 class="productoNombre"><?php echo $listaProductos[$i]['nombre']; ?></h3>
                    <div class="contenedorImagen">
                        <img  src="./PHP/partes/bebidas/IMG/<?php echo $listaProductos[$i]['foto']; ?>" alt="">

                        <h3 class="costo"><?php echo $listaProductos[$i]["precio"]; ?></h3>
                    </div>
                    <div class="espacio"></div>
            <?php }?>
            </section>
            
            <section id="tragos" class="ultimo">
            <h2 class="titulosSeccion">Tragos </h2>
            <?php 
            $_SESSION["baseDatos"]="tabla_tragos";
            include("./PHP/llamarBaseDato/base.php");
            for ($i=$_SESSION["TAMANO"]; $i >-1 ; $i--) { ?>
                    <h3 class="productoNombre"><?php echo $listaProductos[$i]['nombre']; ?></h3>
                    <div class="contenedorImagen">
                
                        <img  src="./PHP/partes/tragos/IMG/<?php echo $listaProductos[$i]['foto']; ?>" alt="">

                        <h3 class="costo"><?php echo $listaProductos[$i]["precio"]; ?></h3>
                    </div>
                    <div class="espacio"></div>
            <?php }?>
            </section>
    </main>
    <!--pie de paguina-->
    <footer>
        
            <h2 class="textoPie">Podes encontrarnos en nuestras redes sociales</h2>
            <div class="iconosPie">
                <i class="bi bi-facebook color"></i>
                <i class="bi bi-instagram color"></i>
                <a href="https://api.whatsapp.com/send?phone=5493584221392" class="btn-wsp" target="_blank">
                <i class="bi bi-whatsapp color"></i>
                </a>    
            </div>
            
        
    </footer>
    
</body>
</html>       
