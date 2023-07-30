<?php 
    //conecto a la base de datos
    include_once("../../bd.php");

    //eliminacion de productos
    if(isset($_GET["numeroID"])){
        $numeroID = (isset($_GET["numeroID"]) ? $_GET["numeroID"]:"");
        //elimino primero la foto
        //para eso llamano a la foto que esta en la base de datos
        $sentencia = $conexion->prepare("SELECT foto FROM tabla_comidas WHERE id=:id");
        $sentencia->bindValue(":id",$numeroID);
        $sentencia->execute();

        $datoRecuperada = $sentencia->fetch(PDO::FETCH_LAZY);
        //CONDICION PARA VER SI ESTA VACIO O NO
        if(isset($datoRecuperada["foto"]) && $datoRecuperada["foto"] !=""){
            //condicion para eliminar de la carpeta local la foto
            if (file_exists("./IMG/" .$datoRecuperada["foto"])) {
                unlink("./IMG/" .$datoRecuperada["foto"]);
            }
        }

        //eliminacion total de la base de datos
        $sentencia = $conexion->prepare("DELETE FROM tabla_comidas WHERE id=:id");
        $sentencia->bindValue("id",$numeroID);
        $sentencia->execute();
        
        //redirecciono al index
        header("location:index.php");
    }


    //sentencia para llamar las valores en la base de datos
    $sentencia = $conexion->prepare("SELECT * FROM tabla_comidas");

    $sentencia->execute();

    $listaProductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    //echo"<pre>";
    //print_r($listaProductos);
    //echo"<pre>";


    include_once("../../templatePHP/header.php");
    $_SESSION['carpeta']="platos";
?>
<div class="card text-dark bg-info mb-3" style="max-width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Platos</h5>
<table class="table">
    <thead>
        <tr>
        <th scope="col">n°</th>
        <th scope="col">nombre</th>
        </tr>
    </thead>
    <tbody>
        <!--recorro todos los productos que tengo la base de datos-->
        <?php foreach ($listaProductos as $productos) { ?>
        <tr>
        <th scope="row"><?php echo $productos['id']; ?></th>
        <td>
        <br>
            <h5 class="card-title"><?php echo $productos['nombre']; ?></h5>

            
            <br>
            <img width="150" src="./IMG/<?php echo $productos['foto']; ?>" alt="foto de los platos">
            <br>
            <span>$:</span><?php echo $productos['precio']; ?>
            <br>
            <a name="" id="" class="btn btn-primary" href="editar.php?numeroID=<?php echo $productos['id'];?>" role="button">Editar</a>
            <a name="" id="" class="btn btn-danger" href="index.php?numeroID=<?php echo $productos['id'];?>" role="button">Borrar</a>
            <br><br>
            <a name="" id="" class="btn btn-primary" href="../ofertas_web/crear.php?numeroID=<?php echo $productos['id'];?> " role="button">OFERTA</a>

        </td>
        <?php } ?>
    </tbody>
</table>
  </div>
<a name="" id="" class="btn btn-primary" href="./crear.php" role="button">agregar</a>


<?php 
    include_once("../../templatePHP/footer.php");
?>