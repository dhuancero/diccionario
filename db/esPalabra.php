<?php
include_once "../functions/functions.php";
if (isset($_POST["registrar"])) {
  include_once "conexion.php";
  $conn = conexion();
  $palabra = $_POST["palabra"];
  $descripcion = $_POST["descripcion"];
  $numPersonajes = $_POST['val-person'];
  $imagen_palabra = $_FILES["imagen_palabra"]["tmp_name"];
  // Creamos la consulta de insersión preparada
  if ($palabra === "" || $descripcion === "" || $numPersonajes === "") {
    exit(header("Location: ../pages/insertar-palabra.php?msj=errorReg"));
  }

  $imgContent = addslashes(file_get_contents($imagen_palabra));
  echo $_FILES["imagen_palabra"]["name"];

  // COMPROBAMOS Y CONVERTIMOS LA IMAGEN EN bITS -> lONGbLOB
  echo $imgContent . "-->";
  printf($imgContent);
  print_r($imgContent);
  /* $check = getimagesize($_FILES['imagen_palabra']['tmp_name']);

  if ($check !== false) {
    $imagen_final = $_FILES["imagen_palabra"]["tmp_name"];
  } else {
    echo "Please select an image file to upload.";
  }
 */



  //! PRIMERA CONSULTA: INSERTAR PALABRA.
  /*   $sql_palabra = "INSERT INTO `palabras`(`palabra`, `imagen`, `descripcion`) VALUES (?,?,?)";
  // $sql = "INSERT INTO `usuarios`(`nombre`, `email`, `username`, `password`, `re-password`) VALUES (?,?,?,?,?)";
  $sentencia = $conn->prepare($sql_palabra);
  $sentencia->bind_param('sbs', $palabra, $imgContent, $descripcion);
  $sentencia->execute();
  if ($sentencia) {
    echo "Todo ha salido bien";
    // header("Location: ../pages/insertar-palabra.php?msj=ok");
  } else {
    echo "No se ha podido insertar registro";
  }

  $stmt->close();
  $db->close();
 */
  //! PRIMERA CONSULTA: INSERTAR RELACIÓN.

  $sql_select_personaje = "SELECT `id`, `nombre` FROM `personaje` WHERE `id` =" . $numPersonajes;


  $sql_personaje = "INSERT INTO `personaje`(`id`, `nombre`, `imagen`, `id_palabra`) VALUES ()";

  $sql_relacion = "INSERT INTO `relacion`(`id_palabra`, `id_personaje`) VALUES ()";


  echo "Palabra: " . $palabra . "<br>";
  // echo "state: " . $state . "<br>";
  echo "Descripción: " . $descripcion . "<br>";
  echo "Imangen: " . $imgContent . "<br>";
  echo "Personajes(por ID):" . $numPersonajes . "<br>";
}
