<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Definimos la URL base del proyecto dinámicamente
$protocolo = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";
$url_base = $protocolo . $_SERVER['HTTP_HOST'] . "/parqueadero/";

// 1. ¿No hay sesión?
if (!isset($_SESSION['usuario_id'])) {
    header("Location: " . $url_base . "login.php?error=sesion");
    exit();
}

// 2. ¿Sesión vencida? (30 minutos de inactividad)
$tiempo_max = 30 * 60; // 1800 segundos
if (isset($_SESSION['login_time']) && (time() - $_SESSION['login_time'] > $tiempo_max)) {
    session_unset();
    session_destroy();
    header("Location: " . $url_base . "login.php?error=expirada");
    exit();
}
// Renovamos el tiempo de actividad del usuario
$_SESSION['login_time'] = time();

// 3. Evitar que se cachee la página después de cerrar sesión
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
?>
