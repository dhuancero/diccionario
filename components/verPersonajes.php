<?php
include_once("../db/conexion.php");
function verPersonaje($id)
{
  $rutaLocal = "http://" . $_SERVER["HTTP_HOST"] . "/diccionario";
  // echo $rutaLocal; 
?>
  <div class="card">
    <h4>Personajes:</h4>
    <div class="card-body">
      <?php
      $personaje = "Personaje";
      $db = conexion();

      $sql = "SELECT P.id, P.nombre FROM personaje P INNER JOIN relacion R ON P.id = R.id_personaje WHERE R.id_palabra = $id";
      /* $sentencia = $db->prepare($sql);
      $sentencia->bind_param("i", intval($id));
      $sentencia->execute();
      $resultado = $sentencia->get_result();
      # Obtenemos solo una fila, que será la palabra a mostrar
      $personaje = $resultado->fetch_assoc(); */
      $resultado = $db->query($sql);
      $personaje = $resultado->fetch_all(MYSQLI_ASSOC);

      if (!$personaje) {
        exit("No hay resultados para ese palabra");
      }
      foreach ($personaje as $value) {
      ?>
        <a href="<?php echo $rutaLocal ?>/pages/palabras.php?id=<?php echo $value['id'] ?>" class="card-link"><?php echo $value['nombre'] ?></a>
      <?php
      }
      $db->close();
      ?>
      <!-- <a href="#" class="card-link">Another link</a> -->
    </div>
  </div>

<?php
}
?>