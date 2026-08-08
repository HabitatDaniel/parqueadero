<!-- <html>
<meta http-equiv="refresh" content="0;url=http://127.0.0.1/index.html">
</html> -->
<?php
// Lee la ruta o URL desde el archivo de texto
$url = file_get_contents("enlace.txt");

// Limpia espacios o saltos de línea invisibles
$url = trim($url);

// Verifica si la URL no está vacía antes de redirigir
if (!empty($url)) {
    
    //Texto que añade a la url
    $complemento ="/parqueadero/index.html" ;
    header("Location: " . $url . $complemento);
    exit;
} else {
    echo "El archivo de texto está vacío o no contiene una URL válida.";
}
?>