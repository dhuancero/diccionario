<?php
session_start();
if (isset($_SESSION['username'])) {
  $sesicion_username = $_SESSION['username'];
}
// include_once "../components/head.php";
require_once "../../db/conexion.php";
include_once "../components/header.php";
$rutaLocal = "http://" . $_SERVER["HTTP_HOST"] . "/diccionario/admin";

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
    header("Location: $rutaLocal");
  }
} else if (isset($_POST["btnCrear"])) {
  header("Location: $rutaLocal/seccion/registrar.php");
} else {
  header("Location: $rutaLocal");
}
