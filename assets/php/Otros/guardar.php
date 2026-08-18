<?php
$servidor = "localhost";
$usuario = "root";
$clave = "";
$base_datos = "parqueadero";

// Crear conexión
$conexion = new mysqli($servidor, $usuario, $clave, $base_datos);

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Recibir datos del formulario
$nombre = $_POST['Placa'];
$correo = $_POST['Tipo'];

// Insertar datos
$sql = "INSERT INTO vehiculo (Placa, Tipo) VALUES ('$nombre', '$correo')";

if ($conexion->query($sql) === TRUE) {
    echo "Datos guardados con éxito.";
} else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
}

$conexion->close();
?>
