<?php
session_start();
include_once "../components/head.php";
?>
<!DOCTYPE html>
<html lang="es">
<?php
cabecera("Registrar");
$rutaLocal = "http://" . $_SERVER["HTTP_HOST"] . "/diccionario";

?>

<body>
  <!-- HEADER -->
  <header>
    <nav class="navbar navbar-dark bg-dark ">
      <div class="container-fluid ">
        <a class="navbar-brand" href="<?php echo $rutaLocal ?>/">MI PRIMER DICCIONARIO</a>
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link text-light" href="<?php echo $rutaLocal ?>/">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="<?php echo $rutaLocal ?>/personajes.php">Personajes</a>
          </li>
        </ul>

        <?php include_once("../components/sesion.php"); ?>
        <!-- Aquí va inicio de sesion -->
      </div>
    </nav>
  </header>
  <!-- HEADER FIN -->


  <main class="container-sm my-5" style="width:50%;">
    <h2 class="text-center py-2">Darse de alta</h2>

    <?php
    if (isset($_GET['msj'])) {
      if ($_GET['msj'] == 'errorReg') {
        echo "Tiene que rellenar todos los campos";
      }
    }
    ?>
    <form action="../db/esRegistar.php" method="post" class="formRegis form-sm">

      <div class="form-floating mb-3">
        <input type="text" name="name" class="form-control" id="floatingInput" placeholder="Nombre completo">
        <label for="floatingInput">Nombre:</label>
      </div>

      <div class="form-floating mb-3">
        <input type="email" name="email" class="form-control" id="floatingInputValue" placeholder="nombre@correo.com">
        <label for="floatingPassword">Correo electrónico:</label>
      </div>

      <div class="form-floating mb-3">
        <input type="text" name="userName" class="form-control" id="floatingInput" placeholder="Nombre de usuario">
        <label for="floatingInput">Nombre de usuario:</label>
      </div>

      <div class="form-floating mb-3">
        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Contraseña">
        <label for="floatingPassword">Contraseña:</label>
      </div>

      <div class="form-floating mb-3">
        <input type="password" name="re-pass" class="form-control" id="floatingPassword" placeholder="Repite Contraseña">
        <label for="floatingPassword">Repite Contraseña:</label>
      </div>
      <div class="d-grid gap-2 col-6 mx-auto">
        <input type="submit" class="btn btn-primary btn-lg text-center" name="registrar" value="REGISTRAR">
      </div>
    </form>
  </main>

</body>

</html>