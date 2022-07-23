<?php
session_start();
if (isset($_SESSION['username'])) {
  $sesicion_username = $_SESSION['username'];
}
include_once "../components/head.php";
require_once "conexion.php";

?>
<!DOCTYPE html>
<html lang="es">

<?php
cabecera("Registro-Login");
?>

<body>
  <?php
  include_once "../components/header.php";
  ?>
  <main class="container">
    <section class="d-flex flex-wrap justify-content-center align-items-center">
      <?php
      if (isset($_POST["btnAcceder"])) {
        $user = $_POST["user"];
        $pass = $_POST["pass"];
        $conn = conexion();
        $sql = "SELECT * FROM usuarios WHERE username ='" . $user . "'";
        $sentencia = $conn->prepare($sql);
        $sentencia->bind_param("s", $user);
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        # Obtenemos solo una fila, que será el usuario registrado
        $userOk = $resultado->fetch_assoc();
        if (!$userOk) {
          exit("El usuario o la contraseña son incorrectos");
        }
        $esPass = password_verify($pass, $userOk['password']);
        if ($esPass) {
          echo "El usuario es correcto.";
          $_SESSION["username"] = $userOk['nombre'];
          header("Location: ../index.php?registrado");
        }
      } else if (isset($_POST["btnCrear"])) {
        header("Location: ../pages/registrar.php");
      } else {
        header("Location: ../index.php");
      }
      ?>
    </section>
  </main>
  <footer>

  </footer>
</body>

</html>