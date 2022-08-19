<?php
$rutaLocal = "http://" . $_SERVER["HTTP_HOST"] . "/diccionario/admin";

session_start();
if (isset($_POST['cerrarSesion'])) {
  session_destroy();
  header("Location: $rutaLocal");
} else {
  header("Location: $rutaLocal");
}
