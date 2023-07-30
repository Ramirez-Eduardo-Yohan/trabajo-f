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
    <div class="card text-white bg-danger mb-3" style="max-width: 100vw;">
  <div class="card-header">Spartan
  </div>
  <div class="card-body">
    <h5 class="card-title">¿Quienes somos?</h5>
    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero cumque blanditiis reiciendis quibusdam ipsa quos et nemo voluptatem sapiente quidem velit a, minus impedit. Enim qui, esse voluptatum asperiores quia consequuntur, mollitia suscipit, velit eligendi obcaecati corrupti dignissimos. Necessitatibus dicta quis officia labore ducimus soluta minima ipsum illum consequuntur commodi, quae ad. Illo ipsum enim eaque expedita eligendi obcaecati accusamus minima aut, harum cum repellat repudiandae accusantium optio ad cupiditate debitis tenetur. Non, delectus. Nam dolores saepe est officiis placeat, animi impedit nihil? In dolores recusandae sit quasi corporis, optio inventore ducimus numquam, repellendus impedit autem labore velit doloremque qui.</p>
  </div>
    </main>
    <footer>
    <!-- place footer here -->
    </footer>
  
</body>
<!--estilos basicos-->
<style>
    li{
        list-style-type: none;
    }
    main{
      height: 100vh;
      background-color:  rgb(114, 79, 79);
    }
</style>
</html>


<?php //include_once("./template/header.php");  ?>
<!--<div class="espacio"></div>
<div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
  <div class="card-header">Spartan
  </div>
  <div class="card-body">
    <h5 class="card-title">¿Quienes somos?</h5>
    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero cumque blanditiis reiciendis quibusdam ipsa quos et nemo voluptatem sapiente quidem velit a, minus impedit. Enim qui, esse voluptatum asperiores quia consequuntur, mollitia suscipit, velit eligendi obcaecati corrupti dignissimos. Necessitatibus dicta quis officia labore ducimus soluta minima ipsum illum consequuntur commodi, quae ad. Illo ipsum enim eaque expedita eligendi obcaecati accusamus minima aut, harum cum repellat repudiandae accusantium optio ad cupiditate debitis tenetur. Non, delectus. Nam dolores saepe est officiis placeat, animi impedit nihil? In dolores recusandae sit quasi corporis, optio inventore ducimus numquam, repellendus impedit autem labore velit doloremque qui.</p>
  </div>
</div>-->

<?php //include_once("./template/footer.php");  ?>
