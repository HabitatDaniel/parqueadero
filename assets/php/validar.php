<?php
// 1. Buscamos el archivo de texto en la misma carpeta
$archivo_ip = "../../enlace.txt";

if (file_exists($archivo_ip)) {
    // Lee el archivo y trim() limpia espacios o saltos de línea invisibles
    $servidor = trim(file_get_contents($archivo_ip));
} else {
    // IP de respaldo por si el archivo .txt no existe o se borra
    $servidor = "192.168.17.86";
}



session_start();

$nombre = $_POST['usuario'];
$clave = $_POST['clave'];

$conn = new mysqli($servidor, "root", "", "parqueadero");


$consulta = mysqli_query($conn, "SELECT * FROM empleado WHERE ccEmpleado = '$nombre' AND Clave = '$clave' LIMIT 1");

if (!$consulta) {



    header("location: index.php");
    echo mysqli_error($mysqli);


}



if ($usuario = mysqli_fetch_assoc($consulta)) {
    $_SESSION['usuario'] = $_POST['usuario'];
    header("location: welcome.php");
} else {
    //header("location: index.html");
    // Código PHP
    $mensaje = "Hola desde PHP";

    // Imprimir bloque JS
    echo "<script>
        alert('$mensaje');
      </script>";

    header("location: error.php");

}
?>