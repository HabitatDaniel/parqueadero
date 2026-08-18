<?php
// Define la función una sola vez
function obtenerUrl($complemento = "") {
    $archivo = "enlace.txt";
    
    if (file_exists($archivo)) {
        $url_base = trim(file_get_contents($archivo));
        return $url_base . $complemento;
    }
    
    return ""; // Devuelve vacío si el archivo no existe
}

// --- CÓMO USARLA EN TU CÓDIGO ---

// Ejemplo 1: Traer la URL limpia
$url_limpia = obtenerUrl(); 

// Ejemplo 2: Traer la URL concatenada con otra ruta
$url_contacto = obtenerUrl("/contacto");
$url_perfil = obtenerUrl("/perfil?id=5");
?>