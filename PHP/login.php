<?php 
//creo una url base
$url ="http://localhost/trabajo_final/";


    session_start();

    if($_POST){
        //conecto a la base de dato 
        require_once("./bd.php");
        //me traigo los valores
        $sentencia = $conexion->prepare("SELECT * FROM tabla_permitidos WHERE nombre=:usuario AND contrasena=:password");

        $sentencia->bindValue(":usuario",$_POST['usuario']);
        $sentencia->bindValue(":password",$_POST['contrasena']);
        $sentencia->execute();

        $usuario = $sentencia->fetch(PDO::FETCH_LAZY);

        //condicion para saber si el usuario existe
        if($usuario){

            $_SESSION['usuario'] = $usuario['nombre'];
            $_SESSION['logueado'] = true;
            header("location:./index.php");
        }
        
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

<body class="bg-dark">
    <header>
    
    </header>
    
    <main class="container">
        <div class="card">
            <div class="card-header text-white bg-dark">
                PERMISO
            </div>
            <div class="card-body text-white bg-danger">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="usuario" class="form-label">USUARIO</label>
                        <input type="text"
                            class="form-control" name="usuario" id="usuario" aria-describedby="helpId" placeholder="">
                        
                    </div>
                    <div class="mb-3">
                        <label for="contrasena" class="form-label">CONTRASEÑA</label>
                        <input type="password" class="form-control" name="contrasena" id="contrasena" placeholder="">
                    </div>
                    <button name="submit"  class="btn btn-primary">ENTRAR</button>
                </form>
        </div>
        </div> 
            <button class="btn btn-danger"><a class="text-white" href="<?php echo $url; ?>./index.php">Ir a la Pagina</a></button>
        
    </main>
    <footer>
    
    </footer>
    
    
</body>

</html>