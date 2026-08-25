<?php
// 1. Buscamos el archivo de texto en la misma carpeta
$archivo_ip = "../../enlace.txt";

if (file_exists($archivo_ip)) {
    // Lee el archivo y trim() limpia espacios o saltos de línea invisibles
    $servidor = trim(file_get_contents($archivo_ip));
} else {
    // IP de respaldo por si el archivo .txt no existe o se borra
    $servidor = "localhost";
}

$usuario = "root";
$clave_db = ""; // Cambiado el nombre de la variable para no confundirla con la clave del empleado
$base_datos = "parqueadero";

// Crear conexión
$conexion = new mysqli($servidor, $usuario, $clave_db, $base_datos);

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Capturar el parámetro 'dato' de la URL. Si no existe, queda vacío.
$datoRecibido = $_GET['dato'] ?? '';
// Capturar el parámetro 'dato' de la URL. Si no existe, queda vacío.
$datoCedula = $_GET['ccEmpleado'] ?? '';
// Variables para la consulta
$clave_empleado = $datoRecibido; // Usamos el dato directo en la consulta preparada
$cambio = 1;
$ccEmpleado = $datoCedula; // Tu cédula objetivo

// CORRECCIÓN: Usamos UPDATE en lugar de INSERT INTO y marcamos con '?' los datos variables
$sql = "UPDATE empleado SET Clave = ?, CambioClave = ? WHERE ccEmpleado = ?";

// Preparamos la consulta en el servidor
$stmt = $conexion->prepare($sql);

if ($stmt) {
    // "sii" significa: Texto (string), Entero (integer), Entero (integer)
    // Esto vincula de forma segura tus variables a los '?' en la consulta SQL
    $stmt->bind_param("sii", $clave_empleado, $cambio, $ccEmpleado);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo "Datos guardados con éxito.";
  
        //     header("location: ../../../index.html");

        echo "<script>
    alert('Datos Guardados con éxito. ');
    window.location.href = '../../../index.php';
</script>";
        exit(); // Detiene el script PHP correctamente
    } else {
        echo "Error al ejecutar la consulta: " . $stmt->error;
    }

    // Cerrar la sentencia preparada
    $stmt->close();
} else {
    echo "Error en la preparación de la consulta: " . $conexion->error;
}

// Cerrar la conexión principal
$conexion->close();
?>