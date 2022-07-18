<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Diccionario Paula</title>

  <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

<link href="styles/index.css" rel="stylesheet" >

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</head>
<body class="text-center" >
  <main class="container">
  <header>
    <h1>EL DICCIONARIO DE PAULA</h1>
  </header>

  <!-- Formulario -->
    
    <section class="buscador content">
  
    <form method="post">
        <label for="palabra" class="search-txt">
          Buscar Palabra:
          <input type="text" name="word">
        </label>
        <div class="search-btn">
          <input type="submit" value="BUSCAR" name="btnBuscar">
        </div>
      </form>
    </section>  

    <!-- Mostrar Resultados -->
<br>
    <section  class="container d-flex justify-content-around">
    <?php 
    // establecemos la conexión
    require "db/conexion.php";
    $conn = conexion();
    ?>
    <?php if(isset($_POST[btnBuscar])){ 
    $word = $_POST['word'];
    if($word === ""){
      echo "No has introducido ningún valor";
      exit;
    }
    $sql = "SELECT id, palabra, descripcion FROM palabras WHERE palabra LIKE '%$word%'";
    $resQuery = mysqli_query($conn, $sql);

    if ($resQuery) {
      while ($fila = mysqli_fetch_array($resQuery, MYSQLI_ASSOC)) {
    ?>
      <div class="card">
        <div class="card-body">
          <p class="id-cod">ID:<?php echo $fila['id'] ?></p>
          <h2 class="card-title"><?php echo $fila['palabra'] ?></h2>
          <p class="card-text"><?php echo $fila['descripcion'] ?></p>
        </div>
        <div>
          Personajes:
            Aquí se muestra el personaje o los personajes que intervienen en la viñeta.
        </div>
      </div>

    <?php
          }    
        } else {
          echo "<p class='fallo'>Error: $mensaje <br>" . mysqli_error($conn) . "</p>";
        }
    ?>
    <?php } 
     mysqli_close($conn);?>
      
    </section>
  </main>
  
</body>
</html>