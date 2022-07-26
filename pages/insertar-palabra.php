<?php
session_start();
if (isset($_SESSION['username'])) {
  $sesicion_username = $_SESSION['username'];
}
include_once "../components/head.php";
require_once "../db/conexion.php";
if (!isset($_GET["insert"])) {
  header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<?php cabecera("Insertar Palabra"); ?>

<body>
  <header>
    <nav class="navbar navbar-dark bg-dark ">
      <div class="container-fluid ">
        <a class="navbar-brand" href="../">MI PRIMER DICCIONARIO</a>
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link text-light" href="../">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="personajes.php">Personajes</a>
          </li>
        </ul>

        <?php include_once "../components/sesion.php"; ?>
        <!-- Aquí va inicio de sesion -->
      </div>
    </nav>
  </header>
  <main class="container my-5" style="width:50%;">
    <h1 class="text-center my-4">Insertar Palabra</h1>
    <?php
    if (isset($_GET['msj'])) {
      if ($_GET['msj'] == 'errorReg') {
        echo "Tiene que rellenar todos los campos";
      }
    }
    ?>
    <form action="../db/esPalabra.php" method="post" class="formRegis form">

      <div class="form-floating mb-3">
        <input type="text" name="palabra" class="form-control" id="floatingInput" placeholder="Nombre completo">
        <label for="floatingInput">Palabra:</label>
      </div>
      <div class="form-floating mb-3">
        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
        <label for="floatingTextarea2">Descripción</label>
      </div>

      <div class="input-group mb-3">
        <input type="file" class="form-control" name="images" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
        <button class="btn btn-outline-primary" type="button" id="inputGroupFileAddon04">Añadir</button>
      </div>

      <div class="form-control mb-3">
        <label for="floatingInput">Personaje:</label>
        <select class="form-select personaje-select" name="states[]" multiple="multiple" id="personaje-select" size="3">
          <!-- <option value="vacio">Selecciona personaje/s:</option> -->
          <?php
          $conn = conexion();
          $sql = "SELECT * FROM personaje";
          $resultado = $conn->query($sql);
          $personajes = $resultado->fetch_all(MYSQLI_ASSOC);
          foreach ($personajes as $personaje) { ?>
            <option value="<?php echo $personaje['id'] ?>"><?php echo $personaje['nombre'] ?></option>
          <?php
          }
          ?>
        </select>
      </div>
      <div class="d-grid gap-2 col-6 mx-auto">
        <input type="submit" class="btn btn-primary btn-lg text-center" name="registrar" value="REGISTRAR">
      </div>
    </form>
  </main>

  <script type="text/javascript">
    $(document).ready(function() {
      $('.personaje-select').select2();
    });
  </script>
</body>

</html>