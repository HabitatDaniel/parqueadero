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



session_start();

$nombre = $_POST['usuario'];
$clave = $_POST['clave'];

$conn = new mysqli($servidor, "root", "", "parqueadero");


$consulta = mysqli_query($conn, "SELECT Oid,ccEmpleado,Nombre,Tipo,Clave,CambioClave FROM empleado WHERE ccEmpleado = '$nombre' AND Clave = '$clave' LIMIT 1");

if (!$consulta) {


    header("location: index.php");
    echo mysqli_error($mysqli);


}



if ($usuario = mysqli_fetch_assoc($consulta)) {

    // Extraer el tipo del arreglo de resultados
    $tipoUsuario = $usuario['Tipo'];
    $CambioClave = $usuario['CambioClave'];


    if ($usuario['CambioClave'] == false) {//Si no se ha hecho cambio de clave lo redirige a cambiarla
        //  var datoAEnviar = encodeURIComponent($User);
        header("location: ../../pages/company/CambioClave.html?ccEmpleado=" . $nombre);
      //  header("location: ../../pages/company/CambioClave.html");
    } else {
        $_SESSION['usuario'] = $_POST['usuario'];
        if ($usuario['Tipo'] == "Estandar") {//Si el usuario es estandar lo manda al menu basico
            header("location: MenuBasico.php");
        } else {
            header("location: ../../pages/company/MenuAdmin.html");
        }
    }

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