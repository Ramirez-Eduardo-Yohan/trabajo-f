<?php
    //me conecto a la base de datos
    require_once("../../bd.php");
    //condicion para ver el dato que queremos cambiar
    if ($_GET["numeroID"]) {

        $numeroID = (isset($_GET["numeroID"]) ? $_GET["numeroID"]:"");
        
        $sentencia = $conexion->prepare("SELECT * FROM tabla_botella WHERE id=:id");

        $sentencia->bindValue(":id",$numeroID);

        $sentencia->execute();

        $productoRecuperado = $sentencia->fetch(PDO::FETCH_LAZY);

        $nombreProducto = $productoRecuperado['nombre'];
        $foto = $productoRecuperado['foto'];
        $precio = $productoRecuperado['precio'];

    }

    //condicion para modificamos los datos recuperados anteriormente
    if($_POST){

        $numeroid = (isset($_POST["numeroID"]) ? $_POST["numeroID"]:"");
        $nombre = (isset($_POST["producto"]) ? $_POST["producto"]:"");


        $foto = (isset($_FILES["foto"]["name"])?$_FILES["foto"]["name"]:"");
        //condicion para eliminar la foto del archivo IMG
        if($foto !=""){
            $sentencia = $conexion->prepare("SELECT foto FROM tabla_botella WHERE id=:id");
            $sentencia->bindValue("id",$numeroid);
            $sentencia->execute();

            //guardo en esta variable el registro traido
            $registroTraido = $sentencia->fetch(PDO::FETCH_LAZY);

            //CONDICION PARA VER SI EL REGISTRO TIENE ALGO
            if(isset($registroTraido["foto"]) && $registroTraido["foto"]!=""){
                //condicon para ver si esta en esta ubicacion la foto
                if(file_exists("./IMG/" .$registroTraido["foto"])){
                    unlink("./IMG/" .$registroTraido["foto"]);
                }
            }
        }

        $precionuevo =(isset($_POST["precio"]) ? $_POST["precio"]:"");

        //--------se crea la sentencia para modificar la base de datos y archivos del programa
        $sentencia = $conexion->prepare("UPDATE tabla_botella SET nombre=:nombre,foto=:foto,precio=:precio WHERE id=:id");

        $sentencia->bindValue("nombre",$nombre);
        //preparamos la foto 
        $fecha = new DateTime();

        $nombreFoto =($foto !="") ? $fecha->getTimestamp() . "_" . $_FILES["foto"]["name"]:"";
        //ponemos la foto en el archivo IMG
        $tmp_FOTO = $_FILES["foto"]["tmp_name"];

        if($tmp_FOTO !=""){

            move_uploaded_file($tmp_FOTO, "./IMG/". $nombreFoto);
        }

        $sentencia->bindValue(":foto",$nombreFoto);
        $sentencia->bindValue(":precio",$precionuevo);
        $sentencia->bindValue(":id",$numeroid);


        $sentencia->execute();

        header("location:index.php");
    }


    include_once("../../templatePHP/header.php");
?>

<div class="card">
    <div class="card-header">
        AGREGAR PRODUCTO UNITARIO
    </div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="numeroID" class="form-label">n°</label>
                <input type="text" class="form-control" name="numeroID" id="numeroID" aria-describedby="helpId" value="<?php echo $numeroID; ?>" placeholder="" readonly>

                <label for="producto" class="form-label">Producto</label>
                <input type="text" class="form-control" name="producto" id="producto" aria-describedby="helpId" value="<?php echo $nombreProducto; ?>" >

                <label for="foto" class="form-label">Foto</label>

                <img width="60" src="./IMG/<?php echo $foto; ?>" alt="foto del producto">
                
                <input type="file" class="form-control" name="foto" id="foto" aria-describedby="helpId" value="<?php echo $foto; ?>" >

                <label for="precio" class="form-label">Precio</label>
                <input type="number" class="form-control" name="precio" id="precio" aria-describedby="helpId" value="<?php echo $precio;?>" >
                
            </div>
            <button type="submit" name="" id="" class="btn btn-primary" href="#" role="button">Editar Producto</button>
            <a name="" id="" class="btn btn-primary" href="./index.php" role="button">Cancelar</a>

        </form>
    </div>
    
</div>

<?php 
    include_once("../../templatePHP/footer.php");
?>