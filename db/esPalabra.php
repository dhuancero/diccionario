<?php
include_once "../functions/functions.php";
include_once "conexion.php";

if (isset($_POST["registrar"])) {

  //! Creamos la variable conexión
  $conn = conexion();

  //! Recuperamos las variables y su valor.
  $palabra = $_POST["palabra"];
  $descripcion = $_POST["descripcion"];
  $numPersonajes = $_POST['val-person'];
  $nombreImagen = addslashes($_FILES["imagen"]["name"]);
  echo $nombreImagen;

  //! Comprobamos que los campos tienen contenido
  if ($palabra === "" || $descripcion === "" || $numPersonajes === "") {
    exit(header("Location: ../pages/insertar-palabra.php?msj=errorReg"));
  }

  //! Comprobamos que la imagen ha sido cargada
  $nombreArchivo = ($nombreImagen !== "") ? $nombreImagen : "avatar_1.jpg";
  $tmpImagen = $_FILES['imagen']['tmp_name'];
  echo $tmpImagen . "<br>";
  if ($tmpImagen !== "") {
    move_uploaded_file(addslashes($tmpImagen), "../img/" . $nombreArchivo);
  }

  //! PRIMERA CONSULTA: INSERTAR PALABRA.
  $sql_palabra = "INSERT INTO palabras(palabra, imagen, descripcion) VALUES (?,?,?)";

  // $sql = "INSERT INTO `usuarios`(`nombre`, `email`, `username`, `password`, `re-password`) VALUES (?,?,?,?,?)";
  $sentencia = $conn->prepare($sql_palabra);
  $sentencia->bind_param('sss', $palabra, $nombreImagen, $descripcion);

  $sentencia->execute();
  if ($sentencia) {
    echo "Todo ha salido bien";
    // header("Location: ../pages/insertar-palabra.php?msj=ok");
  } else {
    echo "No se ha podido insertar registro";
  }

  $stmt->close();
  $db->close();

  //! SEGUNDA CONSULTA: INSERTAR RELACIÓN.

  $sql_select_personaje = "SELECT `id`, `nombre` FROM `personaje` WHERE `id` =" . $numPersonajes;


  $sql_personaje = "INSERT INTO `personaje`(`id`, `nombre`, `imagen`, `id_palabra`) VALUES ()";

  $sql_relacion = "INSERT INTO `relacion`(`id_palabra`, `id_personaje`) VALUES ()";

  echo "<br><hr><br>";

  echo "Palabra: " . $palabra . "<br>";
  echo "<br><hr><br>";

  // echo "state: " . $state . "<br>";
  echo "Descripción: " . $descripcion . "<br>";
  echo "<br><hr><br>";

  echo "Imangen: " . $imgContent . "<br>";
  echo "<br><hr><br>";

  echo "Personajes(por ID):" . $numPersonajes . "<br>";
  echo "<br><hr><br>";

  echo $_SERVER['DOCUMENT_ROOT'] . "<br>";
}
