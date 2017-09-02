<?php
require 'controllers/ControllerLibros.php'; 
$codigo = $_POST['codigo'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];

$libroControlador = new ControllerLibros();
$libroControlador->insertar_libro($codigo, $nombre, $descripcion);

 ?>