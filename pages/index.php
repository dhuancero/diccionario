<?php
$rutaLocal = "http://" . $_SERVER["HTTP_HOST"] . "/diccionario";
header("Location: $rutaLocal");
