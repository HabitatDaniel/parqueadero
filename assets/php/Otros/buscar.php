<?php
// 1. CONFIGURACIÓN DE LA BASE DE DATOS MYSQL
$host = 'localhost';
$db   = 'parqueadero'; // <-- Cambia esto por el nombre de tu base de datos
$user = 'root';           // <-- Cambia esto por tu usuario de MySQL
$pass = '';               // <-- Cambia esto por tu contraseña de MySQL
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

// Variables para almacenar las respuestas
$resultado = null;
$mensaje_error = null;

// 2. PROCESAR EL FORMULARIO CUANDO SE ENVÍA (MÉTODO POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id_buscar']) && trim($_POST['id_buscar']) !== '') {
        
        // Mantener como texto (String) para soportar letras y números de la placa
        $placa = trim($_POST['id_buscar']); 

        // Consulta preparada para MySQL usando la columna Placa
        $stmt = $pdo->prepare('SELECT * FROM vehiculo WHERE Placa = :placa');
        $stmt->execute(['placa' => $placa]);
        $resultado = $stmt->fetch(); 

        // Validar si MySQL encontró la Placa
        if (!$resultado) {
            $mensaje_error = "La placa " . htmlspecialchars($placa) . " no se encuentra registrada.";

        }
    } else {
        $mensaje_error = "Por favor, ingresa una placa válida.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscador de Vehículos</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background-color: #f4f4f9; }
        .container { max-width: 500px; background: white; padding: 20px; border-radius: 8px; box-shadow: 0px 0px 10px rgba(0,0,0,0.1); }
        input[type="text"] { width: 100%; padding: 10px; margin: 10px 0; box-sizing: border-box; text-transform: uppercase; }
        button { background-color: #28a745; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; width: 100%; font-size: 16px; }
        button:hover { background-color: #218838; }
        .error { color: #721c24; background-color: #f8d7da; padding: 10px; border-radius: 4px; margin-top: 15px; }
        .exito { color: #155724; background-color: #d4edda; padding: 15px; border-radius: 4px; margin-top: 15px; }
    </style>
</head>
<body>

<div class="container">
    <h2>Validar Placa de Vehículo</h2>
    
    <!-- FORMULARIO HTML -->
    <form method="POST" action="buscar.php">
        <label for="id_buscar">Introduce la Placa a consultar:</label>
        <!-- Cambiado a type="text" para permitir las letras de la placa -->
        <input type="text" id="id_buscar" name="id_buscar" placeholder="Ej: ABC123" required>
        <button type="submit">Buscar Vehículo</button>
    </form>

    <!-- 3. MOSTRAR RESULTADOS DE LA VALIDACIÓN -->
    <?php if ($resultado): ?>
        <div class="exito">
            <h3>¡Vehículo Encontrado!</h3>
            <!-- Cambia los nombres entre corchetes por las columnas reales de tu tabla -->
            <p><strong>Placa:</strong> <?php echo htmlspecialchars($resultado['Placa']); ?></p>
            <?php if (isset($resultado['Marca'])): ?>
                <p><strong>Marca:</strong> <?php echo htmlspecialchars($resultado['Marca']); ?></p>
            <?php endif; ?>
            <?php if (isset($resultado['Modelo'])): ?>
                <p><strong>Modelo:</strong> <?php echo htmlspecialchars($resultado['Modelo']); ?></p>
            <?php endif; ?>
        </div>
    <?php elseif ($mensaje_error): ?>
        <div class="error">
            <?php echo htmlspecialchars($mensaje_error); ?>
        </div>
         <form method="POST" action="buscar.php">
        <label for="id_buscar">Introduce la Placa a consultar:</label>
        <!-- Cambiado a type="text" para permitir las letras de la placa -->
        <input type="text" id="id_buscar" name="id_buscar" placeholder="Ej: ABC123" required>
        <button type="submit">Buscar Vehículo</button>
    </form>

    <?php endif; ?>
</div>

</body>
</html>
