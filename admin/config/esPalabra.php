<?php
// include_once "../functions/functions.php";
include_once "conexion.php";

if (isset($_POST["registrar"])) {

  //! Creamos la variable conexión
  $conn = conexion();

  //! Recuperamos las variables y su valor.
  $palabra = $_POST["palabra"];
  $descripcion = $_POST["descripcion"];
  $numPersonajes = $_POST['val-person'];
  $nombreImagen = addslashes($_FILES["imagen"]["name"]);
  echo $nombreImagen . "<br>";

  //! Comprobamos que los campos tienen contenido
  if ($palabra === "" || $descripcion === "" || $numPersonajes === "") {
    exit(header("Location: ../seccion/insertar-palabra.php?msj=errorReg"));
  }

  // TODO: Comprobar si la palabra ya ha sido intprducida. 
  // TODO: si ya ha sido introducida->msj:error_palabra-> no deja guardar palabra

  //TODO: Pendiente de realizar la inserción

  //! Comprobamos que la imagen ha sido cargada
  $nombreArchivo = ($nombreImagen !== "") ? $nombreImagen : "avatar_1.jpg";
  $tmpImagen = $_FILES['imagen']['tmp_name'];
  echo $tmpImagen . "<br>";
  $ruta = $_SERVER["DOCUMENT_ROOT"];
  echo "<br>" . $_SERVER["PHP_SELF"] . "<br>";
  echo "<br>" . $_SERVER["DOCUMENT_ROOT"] . "<br>";

  if (is_uploaded_file($tmpImagen)) {
    echo "si se ha guardado";
    move_uploaded_file(addslashes($tmpImagen), addslashes("img/" . $nombreArchivo));
    // copy(addslashes($tmpImagen), addslashes($ruta . "/diccionario/img/" . $nombreArchivo));
  } else {
    echo "NO se ha subido";
  }
  if ($tmpImagen !== "") {
    move_uploaded_file(addslashes($tmpImagen), addslashes($ruta . "/diccionario/img/" . $nombreArchivo));
  }

  //?----------------------------------------------------------------------
  //? PRIMERA CONSULTA: INSERTAR PALABRA e IMAGEN.
  //?----------------------------------------------------------------------

  $sql_palabra = "INSERT INTO palabras (palabra, imagen, descripcion) VALUES (?,?,?)";
  $insertarPalabra = $conn->prepare($sql_palabra);
  $insertarPalabra->bind_param('sss', $palabra, $nombreArchivo, $descripcion);
  $insertarPalabra->execute();
  if ($insertarPalabra) {
    echo "Todo ha salido bien";
    // header("Location: ../pages/insertar-palabra.php?msj=ok");
  } else {
    echo "No se ha podido insertar registro";
  }
  $insertarPalabra->close();

  //?----------------------------------------------------------------------
  //? SEGUNDA CONSULTA: Recuperar valores para(id) para palabra y personaje
  //?----------------------------------------------------------------------

  //!recupero la ID de la palabra introducida:
  //!----------------------------------------------------------------------

  $sql_nom_palabra = "SELECT id, palabra FROM palabras WHERE palabra = ?";
  // $sentencia = $conn->query($sql_nom_palabra);
  $sent_word = $conn->prepare($sql_nom_palabra);
  $sent_word->bind_param("s", $palabra);
  $sent_word->execute();
  $resultado = $sent_word->get_result();
  # Obtenemos solo una fila, que será la palabra a mostrar
  $word = $resultado->fetch_assoc();
  if (!$word) {
    exit("No hay resultados para ese palabra");
  }
  $sent_word->close();
  $valWord = $word['palabra'];
  $idWord = $word['id'];

  //! Recupero los ids de los personajes, dependiendo si han introducido uno o más personajes.
  //!----------------------------------------------------------------------

  $arrayPersonaje = explode(",", $numPersonajes);
  foreach ($arrayPersonaje as $idPersonaje) {
    echo "ID Personaje: " . $idPersonaje . "<br>";
    //? Creo la consulta de insersion por cada personaje y por
    //?----------------------------------------------------------------------
    $sql_relacion = "INSERT INTO relacion (id_palabra, id_personaje) VALUES (?,?)";
    $inser_relacion = $conn->prepare($sql_relacion);
    $inser_relacion->bind_param('ii', intval($idWord), intval($idPersonaje));
    $inser_relacion->execute();
    if ($inser_relacion) {
      echo "Todo ha salido bien <br>";
      header("Location: ../seccion/insertar-palabra.php?msj=ok");
    } else {
      echo "No se ha podido insertar registro";
    }
    $inser_relacion->close();
  };
}
