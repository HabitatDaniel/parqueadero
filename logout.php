<?php
// 1. Iniciar la sesión para poder destruirla
session_start();

// 2. Limpiar todas las variables de sesión
$_SESSION = array();

// 3. Destruir la sesión del servidor
session_destroy();

// 4. Redirigir a la página de login o inicio
header("Location: index.html");
exit(); // Importante para asegurar que el script se detenga
?>