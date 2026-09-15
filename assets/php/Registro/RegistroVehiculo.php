<?php
header('Content-Type: application/json');

// 1. Conexión a la base de datos
$host = 'localhost';
$db   = 'parqueadero';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 2. Capturar datos del formulario
    //$placa   = $_POST['Placa'] ?? '';
   // $marca   = $_POST['Marca'] ?? '';
   // $id_tipo = $_POST['Tipo'] ?? '';
    // 2. Capturar datos del formulario
    $placa   = 'das';
    $marca   =  'asdfa';
    $id_tipo =  'asd';

    // Validar que no estén vacíos
    if (empty($placa) || empty($marca) || empty($id_tipo)) {
        echo json_encode(['status' => 'error', 'message' => 'Todos los campos son obligatorios']);
        exit;
    }

    // 3. Preparar e insertar en la tabla vehiculo
    $sql = "INSERT INTO vehiculo (Placa, Marca, Tipo) VALUES (:Placa, :Marca, :Tipo)";
    $stmt = $pdo->prepare($sql);
    
    $stmt->execute([
        ':Placa'   => $placa,
        ':Marca'   => $marca,
        ':Tipo' => $id_tipo
    ]);

    echo json_encode(['status' => 'success', 'message' => 'Vehículo guardado correctamente']);

} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => 'Error de base de datos: ' . $e->getMessage()]);
}
?>
