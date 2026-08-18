<?php
$servidor = "172.24.50.58";
$usuario = "root";
$password = "";
$basedatos = "helpdesk";

// 1. Crear conexión
$conn = mysqli_connect($servidor, $usuario, $password, $basedatos);

// 2. Verificar conexión
if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

// 3. Recibir datos del formulario
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];

// 4. Insertar datos

$sql = "INSERT INTO usuarios (nombre, correo) VALUES ('$nombre', '$correo')";

if (mysqli_query($conn, $sql)) {
    echo "Datos registrados correctamente";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	
// Redirección temporal (302)
//header('Location: /helpdesk/');
//exit(); // Es crucial para asegurar que el script se detenga
}



// 5. Cerrar conexión
mysqli_close($conn);
?>