<?php 
    include_once("../../bd.php");
    include_once("../../templatePHP/header.php");
    if(isset($_SESSION['carpeta'])){
        switch ($_SESSION['carpeta']) {
            case 'bebidas':
                $numeroID =(isset($_GET["numeroID"])?$_GET["numeroID"]:"");
                //SENTENCIA PARA TRAER EL PUESTO DE REQUERIDO
                $sentencia = $conexion->prepare("SELECT * FROM `tabla_botella` WHERE id=:id");
                //LE ASIGNO EL VALOR A LA VARIABLE :id
                $sentencia->bindValue(":id",$numeroID);
                //EJECUTO LO ANTES ESCRITO
                $sentencia->execute();
                //FETCH PARA TRAER UN PUESTO SOLAMENTE
                //FETCH_LAZY: TRAE UN UNICO ARREGLO
                $registro = $sentencia->fetch(PDO::FETCH_LAZY);

                /*echo "<pre>";
                print_r($registro);
                echo "</pre>";*/

                $nombre = $registro['nombre'];
                $foto = $registro['foto'];
                $precio = $registro['precio'];
                //echo $nombre;
                //echo $foto;
                //echo $precio;
                $sentencia = $conexion->prepare("INSERT INTO `ofertas` (`id`, `nombre`, `foto`, `precio`) VALUES (NULL,:producto ,:foto ,:precio)");
                $sentencia->bindValue(":producto",$nombre);
                //funcion copiar para guardar la imagen de las ofertas
                    $origen = "../bebidas/IMG/$foto";
    
                    $destino = '../ofertas_web/IMGoferta/';
                    
                    
                        if (copy($origen, $destino."$foto")) { 
                            echo "SE COPIO CORECTAMENTE";
                        }
                        else{
                    
                            echo "No se copiado la imagen correctamente";
                    
                        }
                $sentencia->bindValue(":foto",$foto);
                $sentencia->bindValue(":precio",$precio);
                $sentencia->execute();
                        break;

            case 'combos':
                $numeroID =(isset($_GET["numeroID"])?$_GET["numeroID"]:"");
                //SENTENCIA PARA TRAER EL PUESTO DE REQUERIDO
                $sentencia = $conexion->prepare("SELECT * FROM `tabla_combos` WHERE id=:id");
                //LE ASIGNO EL VALOR A LA VARIABLE :id
                $sentencia->bindValue(":id",$numeroID);
                //EJECUTO LO ANTES ESCRITO
                $sentencia->execute();
                //FETCH PARA TRAER UN PUESTO SOLAMENTE
                //FETCH_LAZY: TRAE UN UNICO ARREGLO
                $registro = $sentencia->fetch(PDO::FETCH_LAZY);

                $nombre = $registro['nombre'];
                $foto = $registro['foto'];
                $precio = $registro['precio'];
                echo $nombre;
                echo $foto;
                echo $precio;
                $sentencia = $conexion->prepare("INSERT INTO `ofertas` (`id`, `nombre`, `foto`, `precio`) VALUES (NULL,:producto ,:foto ,:precio)");
                $sentencia->bindValue(":producto",$nombre);
                $sentencia->bindValue(":foto",$foto);

                $origen = "../combos/IMG/$foto";
    
                $destino = '../ofertas_web/IMGoferta/';
                
                
                    if (copy($origen, $destino."$foto")) {
                
                        echo "Se ha copiado correctamente la imagen";
                
                        }
                
                        else {
                
                        echo "No se copiado la imagen correctamente";
                
                    }
                $sentencia->bindValue(":precio",$precio);
                $sentencia->execute();
                        break;
            case 'platos':
                $numeroID =(isset($_GET["numeroID"])?$_GET["numeroID"]:"");
                //SENTENCIA PARA TRAER EL PUESTO DE REQUERIDO
                $sentencia = $conexion->prepare("SELECT * FROM `tabla_comidas` WHERE id=:id");
                //LE ASIGNO EL VALOR A LA VARIABLE :id
                $sentencia->bindValue(":id",$numeroID);
                //EJECUTO LO ANTES ESCRITO
                $sentencia->execute();
                //FETCH PARA TRAER UN PUESTO SOLAMENTE
                //FETCH_LAZY: TRAE UN UNICO ARREGLO
                $registro = $sentencia->fetch(PDO::FETCH_LAZY);

                $nombre = $registro['nombre'];
                $foto = $registro['foto'];
                $precio = $registro['precio'];
                echo $nombre;
                echo $foto;
                echo $precio;
                $sentencia = $conexion->prepare("INSERT INTO `ofertas` (`id`, `nombre`, `foto`, `precio`) VALUES (NULL,:producto ,:foto ,:precio)");
                $sentencia->bindValue(":producto",$nombre);
                $sentencia->bindValue(":foto",$foto);

                $origen = "../platos/IMG/$foto";
    
                $destino = '../ofertas_web/IMGoferta/';
                
                
                    if (copy($origen, $destino."$foto")) {
                
                        echo "Se ha copiado correctamente la imagen";
                
                        }
                
                        else {
                
                        echo "No se copiado la imagen correctamente";
                
                    }
                $sentencia->bindValue(":precio",$precio);
                $sentencia->execute();
                    break;
        case 'tragos':
                $numeroID =(isset($_GET["numeroID"])?$_GET["numeroID"]:"");
                //SENTENCIA PARA TRAER EL PUESTO DE REQUERIDO
                $sentencia = $conexion->prepare("SELECT * FROM `tabla_tragos` WHERE id=:id");
                //LE ASIGNO EL VALOR A LA VARIABLE :id
                $sentencia->bindValue(":id",$numeroID);
                //EJECUTO LO ANTES ESCRITO
                $sentencia->execute();
                //FETCH PARA TRAER UN PUESTO SOLAMENTE
                //FETCH_LAZY: TRAE UN UNICO ARREGLO
                $registro = $sentencia->fetch(PDO::FETCH_LAZY);

                $nombre = $registro['nombre'];
                $foto = $registro['foto'];
                $precio = $registro['precio'];
                echo $nombre;
                echo $foto;
                echo $precio;
                $sentencia = $conexion->prepare("INSERT INTO `ofertas` (`id`, `nombre`, `foto`, `precio`) VALUES (NULL,:producto ,:foto ,:precio)");
                $sentencia->bindValue(":producto",$nombre);
                $sentencia->bindValue(":foto",$foto);

                $origen = "../tragos/IMG/$foto";
    
                $destino = '../ofertas_web/IMGoferta/';
                
                
                    if (copy($origen, $destino."$foto")) {
                
                        echo "Se ha copiado correctamente la imagen";
                
                        }
                
                        else {
                
                        echo "No se copiado la imagen correctamente";
                
                    }
                $sentencia->bindValue(":precio",$precio);
                $sentencia->execute();
            default:
                echo "ALGO SALIO MAS";
            break;


        
        }
    }
    include_once("../../templatePHP/footer.php");
?>


