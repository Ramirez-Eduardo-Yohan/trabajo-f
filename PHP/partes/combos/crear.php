<?php 
    require_once("../../bd.php");
    //controlo si viene algo por el metodo POST
    if($_POST){
        //agragamos en variables los valores del formulario
        $producto =(isset($_POST["producto"])?$_POST["producto"]:"");

        $foto =(isset($_FILES["foto"]["name"]) ? $_FILES["foto"]["name"]:"");

        $precio =(isset($_POST["precio"]) ? $_POST["precio"]:"");
        
        //genero la sentencia a la base de datos

        $sentencia = $conexion->prepare("INSERT INTO `tabla_combos` (`id`, `nombre`, `foto`, `precio`) VALUES (NULL,:producto ,:foto ,:precio)");

        $sentencia->bindValue(":producto",$producto);
        //tartamiento para la foto y su guardado
        $fecha = new DateTime();

        $archivoNombreFoto=($foto !='') ? $fecha->getTimestamp() . "_" . $_FILES["foto"]["name"]:"";

        //mover la foto al archivo de nombre IMG
        $tmp_foto = $_FILES["foto"]["tmp_name"];

        if($tmp_foto !=''){
            move_uploaded_file($tmp_foto, "./IMG/" . $archivoNombreFoto);
        }
        $sentencia->bindValue(":foto",$archivoNombreFoto);

        $sentencia->bindValue(":precio",$precio);

        $sentencia->execute();

        header("location:index.php");
    }
    include_once("../../templatePHP/header.php");
?>
<!--creo una carta para poder acceder los producto foto y precio -->
<div class="card">
    <div class="card-header">
        AGREGAR PRODUCTO UNITARIO
    </div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="producto" class="form-label">Producto</label>
                <input type="text" class="form-control" name="producto" id="producto" aria-describedby="helpId" placeholder="">

                <label for="foto" class="form-label">Foto</label>
                <input type="file" class="form-control" name="foto" id="foto" aria-describedby="helpId" placeholder="">

                <label for="precio" class="form-label">Precio</label>
                <input type="number" class="form-control" name="precio" id="precio" aria-describedby="helpId" placeholder="">
                
            </div>
            <button type="submit" name="" id="" class="btn btn-primary" href="#" role="button">Agregar Producto</button>
            <a name="" id="" class="btn btn-primary" href="./index.php" role="button">Cancelar</a>

        </form>
    </div>
    
</div>

<?php 
    include_once("../../templatePHP/footer.php");
?>