<?php
include_once("../db/conexion.php");
function verPersonaje($id)
{
  $rutaLocal = "http://" . $_SERVER["HTTP_HOST"] . "/diccionario";
?>
  <div class="card">
    <h4 class="text-secundary card-title text-center">Personajes:</h4>
    <div class="card-body">
      <?php
      $db = conexion();
      $id = addslashes($id);

      $sql = "SELECT P.id, P.nombre FROM personaje P INNER JOIN relacion R ON P.id = R.id_personaje WHERE R.id_palabra = $id";

      $resultado = $db->query($sql);
      $personaje = $resultado->fetch_all(MYSQLI_ASSOC);

      if (!$personaje) {
        exit("No hay resultados para ese palabra");
      }
      foreach ($personaje as $value) {
      ?>
        <a href="<?php echo $rutaLocal ?>/pages/palabras.php?id=<?php echo $value['id'] ?>" class="card-link text-decoration-none text-center"><?php echo $value['nombre'] ?></a>
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