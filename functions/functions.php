<?php
function insertar_imagen($imagen)
{
  $check = getimagesize($imagen);
  // $check = getimagesize($_FILES["image"]["tmp_name"]);
  echo $check;
  if ($check !== false) {
    $image = $imagen;
    $imgContent = addslashes(file_get_contents($image));
  } else {
    echo "Please select an image file to upload.";
  }
  return $imgContent;
}
