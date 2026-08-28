<?php
$host = "localhost";
$usuario = "root";
$clave = "";
$base_de_datos = "parqueadero";

$conexion = new mysqli($host, $usuario, $clave, $base_de_datos);
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
$conexion->set_charset("utf8mb4");

// Función reutilizable para fotos



function obtenerFoto($carpetaBase, $subcarpeta, $nombreFoto) {
    $ruta = $carpetaBase . $subcarpeta . "/" . $nombreFoto;
  // echo "<script> alert('Datos Guardados con éxito. ".$ruta."');</script>";
    $porDefecto = "../../../assets/img/portafolio-1.png";
    return file_exists($ruta) ? $ruta : $porDefecto;
}

?>