<?php
// 1. Buscamos el archivo de texto en la misma carpeta
$archivo_ip = "../../enlace.txt";

if (file_exists($archivo_ip)) {
    $servidor = trim(file_get_contents($archivo_ip));
} else {
    $servidor = "localhost";
}

// Configuración de la conexión a MySQL
$usuario = "root";       
$password = "";           
$base_datos = "parqueadero"; 

$conexion = new mysqli($servidor, $usuario, $password, $base_datos);

if ($conexion->connect_error) {
  die("Error de conexión: " . $conexion->connect_error);
}

$placa = $_GET['placa'] ?? $_POST['placa'] ?? '';

// Estilos CSS embebidos para asegurar el diseño responsivo y la estética moderna
echo "
<style>
    body {
        background-color: #f4f7f6;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        margin: 0;
        padding: 20px;
    }
    .card-notificacion {
        background: #ffffff;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        padding: 40px 30px;
        text-align: center;
        max-width: 480px;
        width: 100%;
        border-top: 6px solid #6c757d;
        transition: all 0.3s ease;
    }
    .card-success { border-top-color: #2ec4b6; }
    .card-info { border-top-color: #007bff; }
    .card-danger { border-top-color: #e71d36; }
    .card-warning { border-top-color: #ff9f1c; }
    
    .icon-wrapper {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        font-size: 32px;
    }
    .icon-success { background: #e6f9f7; color: #2ec4b6; }
    .icon-info { background: #e6f2ff; color: #007bff; }
    .icon-danger { background: #ffebeb; color: #e71d36; }
    .icon-warning { background: #fff5e6; color: #ff9f1c; }

    .titulo-alerta {
        font-size: 22px;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 12px;
    }
    .texto-alerta {
        font-size: 16px;
        color: #718096;
        line-height: 1.6;
        margin-bottom: 25px;
    }
    .badge-placa {
        background: #edf2f7;
        color: #4a5568;
        padding: 4px 10px;
        border-radius: 6px;
        font-family: monospace;
        font-weight: bold;
        font-size: 17px;
    }
    .contador-regresivo {
        font-size: 14px;
        color: #a0aec0;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }
    .spinner-circular {
        width: 16px;
        height: 16px;
        border: 2px solid #e2e8f0;
        border-top-color: #cbd5e0;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }
    .btn-regresar {
        display: inline-block;
        background: #4a5568;
        color: white;
        text-decoration: none;
        padding: 12px 24px;
        border-radius: 8px;
        font-weight: 600;
        transition: background 0.2s;
    }
    .btn-regresar:hover { background: #2d3748; }
    @keyframes spin { to { transform: rotate(360deg); } }
</style>
";

if (!empty($placa)) {

  // PASO A: Contar vehículos activos
  $sql_contar = "SELECT COUNT(*) as total_adentro FROM movimiento WHERE fecha_salida IS NULL";
  $resultado_contar = $conexion->query($sql_contar);
  $fila_contar = $resultado_contar->fetch_assoc();
  $total_adentro = (int)$fila_contar['total_adentro'];

  // PASO B: Buscar si la placa ya está adentro
  $sql_buscar = "SELECT * FROM movimiento WHERE IdVehiculo = ? AND fecha_salida IS NULL LIMIT 1";
  $stmt_buscar = $conexion->prepare($sql_buscar);
  $stmt_buscar->bind_param("s", $placa);
  $stmt_buscar->execute();
  $resultado_buscar = $stmt_buscar->get_result();
  $movimiento_activo = $resultado_buscar->fetch_assoc();
  $stmt_buscar->close();

  $proceso_exitoso = false;
  $html_notificacion = "";

  if (!$movimiento_activo) {
      
      if ($total_adentro >= 32) {
          $html_notificacion = "
          <div class='card-notificacion card-danger'>
              <div class='icon-wrapper icon-danger'>❌</div>
              <div class='titulo-alerta'>Capacidad Máxima</div>
              <div class='texto-alerta'>No se puede registrar el ingreso. El parqueadero ya alcanzó el límite estricto de 32 vehículos adentro.</div>
              <a href='../MenuBasico.php' class='btn-regresar'>Volver al Menú</a>
          </div>";
      } else {
          $sql_insertar = "INSERT INTO movimiento (IdVehiculo, fecha_entrada) VALUES (?, NOW())";
          $stmt_accion = $conexion->prepare($sql_insertar);
          $stmt_accion->bind_param("s", $placa);
          
          if ($stmt_accion->execute()) {
              $proceso_exitoso = true;
              $cupo_restante = 32 - ($total_adentro + 1);
              $html_notificacion = "
              <div class='card-notificacion card-success'>
                  <div class='icon-wrapper icon-success'>🚨</div>
                  <div class='titulo-alerta'>Entrada Registrada</div>
                  <div class='texto-alerta'>Vehículo con placa <span class='badge-placa'>$placa</span> ingresado correctamente.<br><small>Cupos restantes: $cupo_restante</small></div>
                  <div class='contador-regresivo'><div class='spinner-circular'></div> Redireccionando en <span id='contador'>2</span>s...</div>
              </div>";
          } else {
              $html_notificacion = "
              <div class='card-notificacion card-danger'>
                  <div class='icon-wrapper icon-danger'>⚠️</div>
                  <div class='titulo-alerta'>Error del Sistema</div>
                  <div class='texto-alerta'>Ocurrió un fallo al intentar procesar la consulta de inserción: " . $stmt_accion->error . "</div>
                  <a href='../MenuBasico.php' class='btn-regresar'>Volver al Menú</a>
              </div>";
          }
          $stmt_accion->close();
      }

  } else {
      $id_movimiento = $movimiento_activo['Oid']; 
      
      $sql_actualizar = "UPDATE movimiento SET fecha_salida = NOW() WHERE Oid = ?";
      $stmt_accion = $conexion->prepare($sql_actualizar);
      $stmt_accion->bind_param("i", $id_movimiento);
      
      if ($stmt_accion->execute()) {
          $proceso_exitoso = true;
          $html_notificacion = "
          <div class='card-notificacion card-info'>
              <div class='icon-wrapper icon-info'>✅</div>
              <div class='titulo-alerta'>Salida Registrada</div>
              <div class='texto-alerta'>El vehículo con placa <span class='badge-placa'>$placa</span> ha salido de forma exitosa. Cupo liberado.</div>
              <div class='contador-regresivo'><div class='spinner-circular'></div> Redireccionando en <span id='contador'>2</span>s...</div>
          </div>";
      } else {
          $html_notificacion = "
          <div class='card-notificacion card-danger'>
              <div class='icon-wrapper icon-danger'>⚠️</div>
                  <div class='titulo-alerta'>Error del Sistema</div>
                  <div class='texto-alerta'>No se pudo procesar la actualización de la salida: " . $stmt_accion->error . "</div>
                  <a href='../MenuBasico.php' class='btn-regresar'>Volver al Menú</a>
          </div>";
      }
      $stmt_accion->close();
  }

  // Renderizar la tarjeta estética correspondiente
  echo $html_notificacion;

  if ($proceso_exitoso) {
    echo '<meta http-equiv="refresh" content="2;url=../MenuBasico.php">';
    ?>
    <script> 
      let segundos = 10;
      const elementoContador = document.getElementById('contador');

      const intervalo = setInterval(function () {
        segundos--;
        if(elementoContador) elementoContador.textContent = segundos;

        if (segundos <= 0) {
          clearInterval(intervalo);
          window.location.replace("../MenuBasico.php");
        }
      }, 1000);
    </script>
    <script>
      window.history.pushState(null, null, window.location.href);
      window.onpopstate = function () {
        window.history.go(1);
      };
    </script>
    <?php
  }

} else {
  echo "
  <div class='card-notificacion card-warning'>
      <div class='icon-wrapper icon-warning'>❓</div>
      <div class='titulo-alerta'>Datos Incompletos</div>
      <div class='texto-alerta'>No se detectó el parámetro de la placa para realizar la evaluación del estado en el sistema.</div>
      <a href='../MenuBasico.php' class='btn-regresar'>Volver al Menú</a>
  </div>";
}

$conexion->close();
?>
