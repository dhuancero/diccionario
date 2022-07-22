<?php session_start();
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
  <?php include_once "./components/header.php"; ?>
  <!-- HEADER FIN -->

  <main class="container-xl mt-5">
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
      <div class="d-flex flex-wrap justify-content-between align-items-stretch">
        <?php if (isset($_POST["btnBuscar"])) {
          $word = $_POST['word'];

          if ($word === "") {
            $sql = "SELECT * FROM palabras";
          } else {
            $sql = "SELECT id, palabra, descripcion FROM palabras WHERE palabra LIKE '%$word%'";
          }

          $resQuery = mysqli_query($conn, $sql);

          if ($resQuery) {
            while ($fila = mysqli_fetch_array($resQuery, MYSQLI_ASSOC)) {
        ?>
              <!-- <div class="col"> -->
              <div class="card tarjeta mb-4">
                <div class="card-body">
                  <img src="" class="card-img-top" alt="Aqu´i va una imagen relacionada con la palabra">
                  <p class="id-cod">ID:<?php echo $fila['id'] ?></p>
                  <h2 class="card-title"><?php echo $fila['palabra'] ?></h2>
                  <p class="card-text"><?php echo $fila['descripcion'] ?></p>
                </div>
                <div>
                  Personajes:
                  Aquí se muestra el personaje o los personajes que intervienen en la viñeta.
                </div>
                <!-- </div> -->
              </div>
        <?php
            }
          } else {
            echo "<p class='fallo'>Error: $mensaje <br>" . mysqli_error($conn) . "</p>";
          }
        }
        mysqli_close($conn); ?>
      </div>
    </section>
  </main>

</body>

</html>