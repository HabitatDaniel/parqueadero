<?php
// 1. Configuración de la conexión a XAMPP (MySQL)
$servidor = "localhost";
$usuario = "root";       // Usuario por defecto de XAMPP
$password = "";           // Contraseña por defecto de XAMPP (vacía)
$base_datos = "parqueadero"; // Reemplaza con el nombre real de tu BD

// Crear la conexión
$conexion = new mysqli($servidor, $usuario, $password, $base_datos);

// Verificar si la conexión falló
if ($conexion->connect_error) {
  die("Error de conexión: " . $conexion->connect_error);
}

// 2. Capturar los datos enviados
// Evaluamos si llega por la URL (GET) o si lo manejas por formulario (POST)
$placa = $_GET['placa'] ?? $_POST['placa'] ?? '';

// Si la placa no está vacía, procedemos a guardarla en la tabla 'movimientos'
if (!empty($placa)) {

  // Usamos Prepared Statements para evitar inyecciones SQL (Seguridad)
  // Asumimos que tu tabla tiene una columna llamada 'placa' y opcionalmente 'fecha' (TIMESTAMP automático)
  $sql = "INSERT INTO movimiento (IdVehiculo) VALUES (?)";

  $stmt = $conexion->prepare($sql);
  $stmt->bind_param("s", $placa); // "s" significa que el parámetro es un String

  if ($stmt->execute()) {
    echo "<div class='alert alert-success'>Movimiento registrado con éxito en XAMPP.</div>";
    // Imprime la etiqueta meta que fuerza la redirección en 5 segundos
   // echo '<meta http-equiv="refresh" content="2;url=../Welcome.php">';
    ?>
    
<script> let segundos = 2;
  const elementoContador = document.getElementById('contador');

  // Actualiza el número en pantalla cada 1 segundo
  const intervalo = setInterval(function() {
      segundos--;
      elementoContador.textContent = segundos;
      
      if (segundos <= 0) {
          clearInterval(intervalo);
          
          // CRUCIAL: .replace() elimina esta página del historial del navegador
          window.location.replace("../welcome.php"); 
      }
  }, 1000);
</script>
    
    <?php
  } else {
    echo "<div class='alert alert-danger'>Error al registrar: " . $stmt->error . "</div>";
  }

  $stmt->close();
} else {
  echo "<div class='alert alert-warning'>No se recibió ninguna placa para registrar.</div>";
}

$conexion->close();
?>

<!-- Aquí continúa el resto de tu diseño HTML/Bootstrap de la página destino -->