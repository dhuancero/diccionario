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
  $conn = conexion();
  ?>
  <!-- HEADER -->
  <header>
    <nav class="navbar navbar-dark bg-dark ">
      <div class="container-fluid ">
        <a class="navbar-brand" href="./">MI PRIMER DICCIONARIO</a>
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link text-light" href="./">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="./pages/personajes.php">Personajes</a>
          </li>
        </ul>

        <?php include_once "./components/sesion.php"; ?>
        <!-- Aquí va inicio de sesion -->
      </div>
    </nav>
  </header>


  <!-- HEADER FIN -->

  <main class="container">
    <!-- Formulario -->
    <section class="buscador text-center m-5 ">
      <form method="post" class="">
        <div class="input-group container-md mb-4">
          <input type="text" name="word" class="form-control" placeholder="Buscar palabra..." aria-label="Buscar palabra..." aria-describedby="button-addon2">
          <button class="btn btn-outline-primary" name="btnBuscar" type="submit" id="button-addon2"> BUSCAR </button>
        </div>
      </form>
    </section>

    <!-- Mostrar Resultados -->
    <br>
    <section class=" contenedor-mostrar container mb-5">
      <div class="d-flex flex-wrap justify-content-center align-items-center">
        <?php
        if (isset($_POST["btnBuscar"])) {
          $word = $_POST['word'];
          if ($word === "") {
            exit("Tienes que escribir una palabra");
          } else {
            $sql = "SELECT id, palabra, descripcion FROM palabras WHERE palabra LIKE CONCAT('%',?,'%')";
          }

          $sentencia = $conn->prepare($sql);
          $sentencia->bind_param("s", $word);
          $sentencia->execute();
          $resultado = $sentencia->get_result();
          # Obtenemos solo una fila, que será la palabra a mostrar
          $palabra = $resultado->fetch_assoc();
          if (!$palabra) {
            exit("No hay resultados para ese palabra");
          }
        ?>
          <!-- <div class="col"> -->
          <div class="card tarjeta mb-4">
            <div class="card-body">
              <img src="" class="card-img-top" alt="Aqu´i va una imagen relacionada con la palabra">
              <p class="id-cod">ID:<?php echo $palabra['id'] ?></p>
              <h2 class="card-title"><?php echo $palabra['palabra'] ?></h2>
              <p class="card-text"><?php echo $palabra['descripcion'] ?></p>
            </div>
            <div>
              Personajes:
              Aquí se muestra el personaje o los personajes que intervienen en la viñeta.
            </div>
            <!-- </div> -->
          </div>
        <?php

        } else {
          // echo "<p class='fallo'>Error: $mensaje <br>" . mysqli_error($conn) . "</p>";
        }
        mysqli_close($conn); ?>
      </div>
    </section>
  </main>

</body>

</html>