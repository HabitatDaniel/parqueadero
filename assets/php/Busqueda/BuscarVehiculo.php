

<?php
session_start();
//echo "Sesión: " . ($_SESSION['usuario'] ?? 'VACÍA');
?>
<?php
require_once  "../config/auth.php"; // <-- ESTA LÍNEA PRIMERO
require_once  "../config/config.php";

$placa_buscar = isset($_GET['placa']) ? strtoupper(trim($_GET['placa'])) : '';

if (empty($placa_buscar) || !preg_match("/^[A-Z0-9]{3,7}$/", $placa_buscar)) {
    die("<div class='alert alert-warning'>Placa no válida</div>");
}

// ... TODO TU CÓDIGO SIGUE IGUAL ABAJO ...


// 1. Buscar vehículo
$sql = "SELECT Oid, Placa, Medio, Tipo, Marca, Color, IdConductor 
        FROM vehiculo WHERE placa = ? LIMIT 1";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $placa_buscar);
$stmt->execute();
$resultado = $stmt->get_result();
$vehiculo = $resultado->fetch_assoc();

if (!$vehiculo) {
    echo "<div class='panelhooter border' style='background-color:red; color:white;'>No se encontró vehículo con placa: " . htmlspecialchars($placa_buscar) . "</div>";
    echo "<script>setTimeout(()=>{ window.location.replace('../Registro/Vehiculo.php'); }, 2000);</script>";
    exit;
}

$placa_mayuscula = strtoupper($vehiculo['Placa']);
$id_conductor_vehiculo = trim($vehiculo['IdConductor']);

// 2. Buscar conductor
$conductor = null;
if (!empty($id_conductor_vehiculo)) {
    $sql_cond = "SELECT Nombre, Celular, Correo, Piso, Area, Vinculacion FROM conductor WHERE IdConductor = ? LIMIT 1";
    $stmt_cond = $conexion->prepare($sql_cond);
    $stmt_cond->bind_param("s", $id_conductor_vehiculo); // s siempre para cédulas
    $stmt_cond->execute();
    $conductor = $stmt_cond->get_result()->fetch_assoc();
    $stmt_cond->close();
}

// Valores por defecto
$nombre_conductor = $conductor['Nombre'] ?? 'No asignado';
$telefono_conductor = $conductor['Celular'] ?? 'No disponible';
$correo_conductor = $conductor['Correo'] ?? '';
$piso = $conductor['Piso'] ?? '';
$area = $conductor['Area'] ?? '';
$vinculo = $conductor['Vinculacion'] ?? 'externo';

// 3. Clases y límites
$claseBtn = match (strtolower($vinculo)) {
    'contratista' => 'btn-warning',
    'funcionario' => 'btn-success',
    'externo' => 'btn-danger',
    default => 'btn-secondary',
};

$limite = match (mb_strtolower($vehiculo['Medio'], 'UTF-8')) {
    'motocicleta' => 32,
    'automóvil', 'automovil' => 70,
    'camioneta' => 70,
    default => 100,
};

// 4. Fotos
//$fotoVehiculo = obtenerFoto("C:/datos-seguro-sdht/soportes/vehiculo/", $placa_mayuscula, "FotoLateral.png");
$fotoVehiculo = obtenerFoto("C:/datos-seguro-sdht/soportes/vehiculo/","DFO36I","FotoLateral.png");
$fotoConductor = obtenerFoto(".C:/datos-seguro-sdht/soportes/conductor/", $id_conductor_vehiculo, "FotoFrente.png");

$stmt->close();
$conexion->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Vehiculo - <?php echo htmlspecialchars($placa_mayuscula); ?></title>
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/styles-bootstrap5Registro.css">
</head>
<body>
<div class="row col-12 contenedor">
    <div class="row logo"><img src="../../../assets/img/logo_SDHT_n.png" class="imagen" alt="Logo" /></div>
    
    <div class="col-12 panelsuperior">
        <h2>Secretaría del Hábitat</h2>
        <div class="row">
            <div class="col-6"><strong>Medio:</strong> <?php echo htmlspecialchars($vehiculo['Medio']); ?></div>
            <div class="col-6 tipoconductor"><button class="btn <?php echo $claseBtn; ?>"><?php echo htmlspecialchars($vinculo); ?></button></div>
        </div>
    </div>

    <div class="col-12 col-lg-6 panelcentral">
        <div class="row gx-2 text-center">
            <div><img src="<?php echo htmlspecialchars($fotoVehiculo); ?>" class="imagenprincipal" alt="Vehículo"></div>
            <strong>Datos Técnicos</strong>
            <div class="col-6"><div class="panellabel"><strong>Placa:</strong></div></div>
            <div class="col-6"><div class="panellabel"><strong>Tipo:</strong></div></div>
            <div class="col-6"><div class="panelinput"><?php echo htmlspecialchars($placa_mayuscula); ?></div></div>
            <div class="col-6"><div class="panelinput"><?php echo htmlspecialchars($vehiculo['Tipo']); ?></div></div>
            <div class="col-6"><div class="panellabel"><strong>Marca:</strong></div></div>
            <div class="col-6"><div class="panellabel"><strong>Color:</strong></div></div>
            <div class="col-6"><div class="panelinput"><?php echo htmlspecialchars($vehiculo['Marca']); ?></div></div>
            <div class="col-6"><div class="panelinput"><?php echo htmlspecialchars($vehiculo['Color']); ?></div></div>
        </div>
    </div>

    <div class="col-12 col-lg-6 panelinferiorder">
        <div class="row gx-2 text-center">
            <div><img src="<?php echo htmlspecialchars($fotoConductor); ?>" class="imagenprincipal" alt="Conductor"></div>
            <strong>Datos del Conductor</strong>
            <div class="col-6 caja-1"><div class="panellabel"><strong>Identificación:</strong></div></div>
            <div class="col-6 caja-2"><div class="panellabel"><strong>Nombre:</strong></div></div>
            <div class="col-6 caja-3"><div class="panelinput"><?php echo htmlspecialchars($id_conductor_vehiculo); ?></div></div>
            <div class="col-6 caja-4"><div class="panelinput"><?php echo htmlspecialchars($nombre_conductor); ?></div></div>
            
            <div class="col-6 caja-5"><div class="panellabel"><strong>Teléfono:</strong></div></div>
            <div class="col-6 caja-6"><div class="panellabel"><strong>Correo:</strong></div></div>
            <div class="col-6 caja-7"><div class="panelinput"><a href="https://api.whatsapp.com/send?phone=57<?php echo htmlspecialchars($telefono_conductor); ?>" target="_blank"><?php echo htmlspecialchars($telefono_conductor); ?></a></div></div>
            <div class="col-6 caja-8"><div class="panelinput texto-azul"><a href="mailto:<?php echo htmlspecialchars($correo_conductor); ?>"><?php echo htmlspecialchars($correo_conductor); ?></a></div></div>
        </div>
    </div>

    <div class="row col-12 col-lg-6 panelinferiorboton">
        <button onclick="enviarDatos()" class="btn btn-success">Registrar</button>
        <a href="../MenuBasico.php"><button class="btn btn-warning">Cancelar</button></a>
    </div>

    <div class="row col-12 panelhooter border">
        <div><strong>Ubicación: <?php echo htmlspecialchars($area . " (" . $piso . ")"); ?></strong></div>
    </div>
</div>

<script>
function enviarDatos() {
    const placa = <?php echo json_encode($placa_mayuscula); ?>;
    const idConductor = <?php echo json_encode($id_conductor_vehiculo); ?>;
    const medio = <?php echo json_encode($vehiculo['Medio']); ?>;
    const limite = <?php echo json_encode($limite); ?>;
    window.location.href = `../Registro/Movimiento.php?placa=${encodeURIComponent(placa)}&idConductor=${encodeURIComponent(idConductor)}&medio=${encodeURIComponent(medio)}&idlimite=${encodeURIComponent(limite)}`;
}
</script>
</body>
</html>