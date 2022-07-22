<?php session_start();
if (isset($_SESSION['username'])) {
  $sesicion_username = $_SESSION['username'];
}
?>
<!DOCTYPE html>
<html lang="es">
<?php
include_once "./components/head.php";
cabecera("Diccionario Paula");
?>

<body>
  <?php
  // establecemos la conexión
  require_once "db/conexion.php";
  $conn = conexion();
  ?>
  <main>
    <?php include_once "./components/header.php"; ?>

    <!-- Formulario -->
    <section class="buscador container">
      <form method="post">
        <label for="palabra" class="search-txt form-label">
          Buscar Palabra:
          <input type="text" name="word" class="form-control">
        </label>
        <div class="search-btn">
          <input type="submit" class="btn btn-primary" value="BUSCAR" name="btnBuscar">
        </div>
      </form>
    </section>

    <!-- Mostrar Resultados -->
    <br>
    <section class="container contenedor-mostrar">
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
            <div class="card tarjeta">
              <div class="card-body">
                <img src="" alt="Aqu´i va una imagen relacionada con la palabra">
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
      mysqli_close($conn); ?>

    </section>
  </main>

</body>

</html>