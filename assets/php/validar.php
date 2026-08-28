<?php
session_start();

// 1. Cargar servidor desde txt
$archivo_ip = "../../enlace.txt";
$servidor = file_exists($archivo_ip) ? trim(file_get_contents($archivo_ip)) : "localhost";

$nombre = trim($_POST['usuario'] ?? '');
$clave = trim($_POST['clave'] ?? '');

if (empty($nombre) || empty($clave)) {
    header("Location: ../../pages/company/login.php?error=vacio");
    exit();
}

$conn = new mysqli($servidor, "root", "", "parqueadero");
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
$conn->set_charset("utf8mb4");

// 2. CONSULTA PREPARADA - Aquí se quita la inyección SQL
$sql = "SELECT Oid, ccEmpleado, Nombre, Tipo, Clave, CambioClave FROM empleado WHERE ccEmpleado = ? LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $nombre);
$stmt->execute();
$resultado = $stmt->get_result();
$usuario = $resultado->fetch_assoc();

$stmt->close();

// 3. Validar usuario y clave
// Si tus claves están en texto plano por ahora, esto funciona.
// Cuando las pases a hash, solo deja password_verify
$claveValida = false;
if ($usuario) {
    if (password_verify($clave, $usuario['Clave'])) {
        $claveValida = true; // Clave con hash
    } elseif ($clave === $usuario['Clave']) {
        $claveValida = true; // Clave en texto plano temporal
    }
}

if ($usuario && $claveValida) {

    // 4. ABRIR SESIÓN CORRECTAMENTE
    session_regenerate_id(true);
    $_SESSION['usuario_id'] = $usuario['Oid'];
    $_SESSION['usuario'] = $usuario['ccEmpleado'];
    $_SESSION['usuario_nombre'] = $usuario['Nombre'];
    $_SESSION['rol'] = $usuario['Tipo'];
    $_SESSION['login_time'] = time();

    // 5. Tu misma lógica de cambio de clave
    if ($usuario['CambioClave'] == 0 || $usuario['CambioClave'] == false) {
        header("Location: ../../pages/company/CambioClave.html?ccEmpleado=" . urlencode($nombre));
        exit();
    } else {
        if ($usuario['Tipo'] == "Estandar") {
            header("Location: MenuBasico.php"); // o MenuBasico.php como lo tenías
        } else {
            header("Location: ../../pages/company/MenuAdmin.html");
        }
        exit();
    }

} else {
    // Login fallido
    // No uses alert + header juntos, el header nunca se ejecuta después de un echo
    header("Location: ../../pages/company/login.php?error=datos");
    exit();
}
?>