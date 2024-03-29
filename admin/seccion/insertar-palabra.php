<?php
$rutaLocal = "http://" . $_SERVER["HTTP_HOST"] . "/diccionario/admin";

session_start();
if (isset($_SESSION['username'])) {
  $sesicion_username = $_SESSION['username'];
} else {
  header("Location: ../index.php");
}
include_once "../components/head.php";
require_once "../config/conexion.php";
?>
<!DOCTYPE html>
<html lang="es">
<?php cabecera("Insertar Palabra"); ?>

<body>
  <?php include_once("../components/header.php") ?>
  <main class="container my-5" style="width:50%;">
    <h1 class="text-center my-4">Insertar Palabra</h1>
    <?php
    if (isset($_GET['msj'])) {
      if ($_GET['msj'] == 'errorReg') {
        echo "Tiene que rellenar todos los campos";
      } else if ($_GET['msj'] == 'ok') {
        echo "Los campos han sido añadidos correctamente";
      }
    }
    ?>
    <form action="../config/esPalabra.php" method="post" class="formRegis form" enctype="multipart/form-data">

      <div class="form-floating mb-3">
        <input type="text" name="palabra" class="form-control" id="floatingInput" placeholder="Nombre completo">
        <label for="floatingInput">Palabra:</label>
      </div>
      <div class="form-floating mb-3">
        <textarea class="form-control" name="descripcion" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
        <label for="floatingTextarea2">Descripción</label>
      </div>

      <div class="input-group mb-3">
        <input type="file" class="form-control" name="imagen" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
        <!-- <button class="btn btn-outline-primary" type="button" id="inputGroupFileAddon04">Añadir</button> -->
      </div>

      <div class="form-control mb-3">
        <label for="id_label_multiple">Personaje:</label>
        <select class="form-select personaje-select" name="states[]" multiple="multiple" id="id_label_multiple">
          <!-- <option value="vacio">Selecciona personaje/s:</option> -->
          <?php
          $db = conexion();
          $sql = "SELECT * FROM personaje";
          $resultado = $db->query($sql);
          $personajes = $resultado->fetch_all(MYSQLI_ASSOC);
          foreach ($personajes as $personaje) { ?>
            <option value="<?php echo $personaje['id'] ?>"><?php echo $personaje['nombre'] ?></option>
          <?php
          }
          ?>
        </select>
        <input type="hidden" id="val-person" name="val-person" value="">
        <script defer src="../js/select-personajes.js" type="text/javascript">
        </script>
      </div>
      <div class="d-grid gap-2 col-6 mx-auto">
        <input type="submit" class="btn btn-primary btn-lg text-center" name="registrar" value="REGISTRAR">
      </div>
    </form>
  </main>
</body>

</html>