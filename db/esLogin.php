<!DOCTYPE html>
<html lang="en">

<?php
include_once "../components/head.php";
cabecera("Registro-Login");
?>

<body>
  <?php
  include_once "../components/header.php";
  ?>
  <main class="container">
    <?php
    if (isset($_POST["btnAcceder"])) {
      echo "Acceder";
      $user = $_POST["user"];
      $pass = $_POST["pass"];
    } else if (isset($_POST["btnCrear"])) {
      header("Location: ../pages/registrar.php");
    } else {
      header("Location: ../index.php");
    }
    ?>
  </main>
  <footer>

  </footer>
</body>

</html>