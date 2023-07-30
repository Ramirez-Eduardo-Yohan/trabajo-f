<?php 
    include_once("../../bd.php");
    //elimino oferta
    if(isset($_GET["numeroID"])){
        $numeroID = (isset($_GET["numeroID"]) ? $_GET["numeroID"]:"");
        //se limina la foto tratamiento para la misma
        $sentencia = $conexion->prepare("SELECT foto FROM ofertas WHERE id=:id");
        $sentencia->bindValue(":id",$numeroID);
        $sentencia->execute();

        $datosObtenidos = $sentencia->fetch(PDO::FETCH_LAZY);
        //controlamos que tenga algo yno este vacio
        if(isset($datosObtenidos["foto"]) && $datosObtenidos["foto"] !=""){
            //eliminamos de la carpeta 
            if(file_exists("./IMGoferta/" .$datosObtenidos["foto"])){
                unlink("./IMGoferta" .$datosObtenidos["foto"]);
            }
        }

        //ahora eliminamos de la base de datos 
        $sentencia = $conexion->prepare("DELETE FROM ofertas WHERE id=:id");
        $sentencia->bindValue("id",$numeroID);
        $sentencia->execute();

        header("location:index.php");
    }


    include_once("../../templatePHP/header.php");

    $sentencia = $conexion->prepare("SELECT * FROM ofertas");

    $sentencia->execute();

    $listaOferta = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    
?>
<div class="card text-white bg-success mb-3" style="max-width: 18rem;">
  
  <div class="card-body">

    <h5 class="card-title">OFERTAS DEL SITIO WEP</h5>
  

<div class="table-responsive">
    <table class="table">
        
        <?php 
            $_SESSION['longitud']=count($listaOferta)-1;
            $i=0;
            
            while($i<=$_SESSION['longitud']){?>
            <tbody>
                <tr class="">
                    <td>    
                    <h5 class="card-title">Nombre: <?php echo $listaOferta[$_SESSION['longitud']]["nombre"];?></h5>
                    
                        
                        <br>
                        
                            <img width="200" src="./IMGoferta/<?php echo $listaOferta[$_SESSION['longitud']]['foto']; ?>" alt="">
                        
                        </td>
                    
                </tr>
                <tr>
                    <td scope="row">precio : <?php echo $listaOferta[$_SESSION['longitud']]['precio']; ?>
                        <a name="" id="" class="btn btn-danger" href="index.php?numeroID=<?php echo $listaOferta[$_SESSION['longitud']]['id'];?>" role="button">Borrar</a>
                        
                    </td>
                    
                </tr>
            </tbody>
            <?php $_SESSION['longitud']-- ; } ?>
        
    </table>
</div>
</div>
<?php 
    include_once("../../templatePHP/footer.php");
?>