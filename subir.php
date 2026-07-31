<?php
if (isset($_POST['enviar'])) {
    $nombre_archivo = basename($_FILES["archivo_usuario"]["name"]);
    
    // Lista de archivos del sistema que no se pueden reemplazar por seguridad
    $archivos_protegidos = ['index.html', 'subir.php'];

    if (in_array(strtolower($nombre_archivo), $archivos_protegidos)) {
        echo "<div style='font-family:Arial; margin:40px;'>";
        echo "<h3 style='color:red;'>Error: No está permitido reemplazar los archivos del sistema.</h3>";
        echo "<a href='index.html'>Volver a intentarlo</a>";
        echo "</div>";
        exit;
    }

    // Al dejar la ruta vacía, se guarda en la carpeta actual
    $archivo_destino = $nombre_archivo; 

    echo "<div style='font-family:Arial; margin:40px;'>";
    // Mueve el archivo de la memoria temporal a la carpeta actual
    if (move_uploaded_file($_FILES["archivo_usuario"]["tmp_name"], $archivo_destino)) {
        echo "<h3 style='color:green;'>¡Archivo subido con éxito!</h3>";
        echo "<p>Guardado como: <strong>" . htmlspecialchars($nombre_archivo) . "</strong></p>";
        echo "<a href='index.html'>Subir otro archivo</a>";
    } else {
        echo "<h3 style='color:red;'>Hubo un error al subir el archivo.</h3>";
        echo "<a href='index.html'>Volver a intentarlo</a>";
    }
    echo "</div>";
} else {
    // Si intentan entrar a subir.php directamente, los regresa al formulario
    header("Location: index.html");
    exit;
}
?>