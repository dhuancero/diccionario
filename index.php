<?php
session_start();
if (isset($_SESSION['username'])) {
  $sesicion_username = $_SESSION['username'];
}
include_once "./components/head.php";
require_once "db/conexion.php";
?>
<!DOCTYPE html>
<html lang="es">
<?php
cabecera("Diccionario Paula");
?>

<body>
  <?php
  // establecemos la conexión
  $db = conexion();
  $rutaLocal = "http://" . $_SERVER["HTTP_HOST"] . "/diccionario";
  ?>

  <!-- HEADER -->
  <header>
    <nav class="navbar navbar-dark bg-dark ">
      <div class="container-fluid ">
        <a class="navbar-brand" href="<?php echo $rutaLocal ?>">MI PRIMER DICCIONARIO</a>
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link text-light" href="<?php echo $rutaLocal ?>">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="<?php echo $rutaLocal ?>/pages/personajes.php">Personajes</a>
          </li>
        </ul>

        <?php include_once("./components/sesion.php"); ?>
        <!-- Aquí va inicio de sesion -->
      </div>
    </nav>
  </header>


  <!-- HEADER FIN -->
  <main class="container">

    <div class="row d-flex justify-content-center align-items-start mt-3 ">
      <div class="col-md-5 mt-3">
        <!-- Formulario -->
        <section class="buscador text-center m-5 ">
          <form method="post" class="">
            <div class="input-group container-md mb-4">
              <input type="text" name="word" class="form-control" placeholder="Buscar palabra..." aria-label="Buscar palabra..." aria-describedby="button-addon2">
              <button class="btn btn-outline-primary" name="btnBuscar" type="submit" id="button-addon2"> BUSCAR </button>
            </div>
          </form>
        </section>
        <div class="card border border-0 text-center ">
          <img src="<?php echo $rutaLocal ?>/img/titulo-diccionario.jpg" class="img-fluid rounded-top mt-3 img-titulo" style="height: 200px; " alt="Título: Mi Gran Diccionario Ilustrado">
        </div>
      </div>


      <!-- Mostrar Resultados -->
      <div class="col-md-5 mt-3">
        <section class=" contenedor-mostrar container mb-5">
          <div class="d-flex flex-wrap justify-content-center align-items-center">
            <?php
            if (isset($_POST["btnBuscar"])) {
              $word = $_POST['word'];
              if ($word === "") {
                exit("Tienes que escribir una palabra");
              } else {
                // $sql = "SELECT id, palabra, imagen, descripcion FROM palabras WHERE palabra LIKE CONCAT('%',?,'%')";
                $sql = "SELECT id, palabra, imagen, descripcion FROM palabras WHERE palabra = ?";
              }

              $sentencia = $db->prepare($sql);
              $sentencia->bind_param("s", $word);
              $sentencia->execute();
              $resultado = $sentencia->get_result();
              # Obtenemos solo una fila, que será la palabra a mostrar
              $palabra = $resultado->fetch_assoc();
              if (!$palabra) {
                exit("No hay resultados para esa palabra");
              }

            ?>
              <!-- <div class="col"> -->
              <div class="card tarjeta mb-4">
                <div class="card-body">
                  <img src="img/<?php echo $palabra['imagen'] ?>" width="500" class="card-img-top" alt="Aqu´i va una imagen relacionada con la palabra">
                  <!-- <p class="id-cod">ID:<?php $palabra['id'] ?></p> -->
                  <h2 class="card-title text-center fs-2 fw-bold text-danger"><?php echo $palabra['palabra'] ?></h2>
                  <p class="card-text text-secundary "><?php echo $palabra['descripcion'] ?></p>
                </div>
                <div>
                  <?php
                  include("components/verPersonajes.php");
                  verPersonaje($palabra['id']);
                  ?>
                </div>
                <!-- </div> -->
              </div>
            <?php

            } else {
              // echo "<p class='fallo'>Error: $mensaje <br>" . mysqli_error($db) . "</p>";
            }
            mysqli_close($db); ?>
          </div>
        </section>
      </div>
    </div>

  </main>

</body>

</html>