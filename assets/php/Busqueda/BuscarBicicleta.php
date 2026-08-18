<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="../../assets/img/IconoPrincipal.png">
    <!-- <link rel="stylesheet" href="../../assets/css/bootstrap.css"> -->
    <link rel="stylesheet" href="../../css/styles-bootstrap5Vehiculo.css">
</head>

<body>
    <div class="menud">
        hola
        <?php
        // 1. Configuración de la conexión a la base de datos
        $host = "localhost";
        $usuario = "root";
        $clave = "";
        $base_de_datos = "parqueadero";

        $conexion = new mysqli($host, $usuario, $clave, $base_de_datos);

        // Verificar la conexión
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }

        // 2. Validar y limpiar la placa recibida por HTML
        if (isset($_GET['placa']) && !empty(trim($_GET['placa']))) {
            $placa_buscar = trim($_GET['placa']);

            // 3. Consulta SQL seleccionando también la columna 'foto'
            $sql = "SELECT Oid,  Placa,Medio FROM vehiculo WHERE placa = ?";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("s", $placa_buscar);
            $stmt->execute();
            $resultado = $stmt->get_result();

            // 4. Procesar y desplegar los resultados
            if ($vehiculo = $resultado->fetch_assoc()) {
                echo "<h2>Información del Vehículo</h2>";
                echo "<p><strong>ID:</strong> " . htmlspecialchars($vehiculo['Oid']) . "</p>";
                echo "<p><strong>Modelo:</strong> " . htmlspecialchars($vehiculo['Placa']) . "</p>";
                echo "<p><strong>Placa:</strong> " . htmlspecialchars($vehiculo['Medio']) . "</p>";

                // Definir la ruta de la carpeta de imágenes
                $carpeta_fotos = "../../../Soportes/Vehiculo/" . $vehiculo['Placa'] . "/";
                $nombre_foto = $vehiculo['Placa'] . ".JPG";

                // Si la columna está vacía en la BD, asignamos la foto por defecto
                if (empty($nombre_foto)) {
                    $nombre_foto = "default.jpg";
                }

                $ruta_completa_foto = $carpeta_fotos . $nombre_foto;

                // 5. Mostrar la imagen en HTML
                echo "<h3>Fotografía del Vehículo:</h3>";
                echo "<img src='" . htmlspecialchars($ruta_completa_foto) . "' alt='Foto del vehículo' style='max-width: 400px; height: auto; border: 2px solid #ccc; border-radius: 8px;'>";
                // AGREGAR UN FORMULARIO O ENLACE CON EL ID DINÁMICO:
                $id = $vehiculo['Placa'];

                echo "<div style='margin-top: 15px;'>";
                // Botón de Editar (Envía el ID a otra página llamada editar.php)
                echo "<a href='editar.php?id=$id' style='padding: 8px 15px; background-color: #28a745; color: white; text-decoration: none; border-radius: 4px; margin-right: 10px;'>Editar Vehículo</a>";

                // Botón de Cancelar(Envía el ID a otra página llamada eliminar.php)
                echo "<a href='../welcome.php'  style='padding: 8px 15px; background-color: orange; color: white; text-decoration: none; border-radius: 4px;'>Cancelar</a>";

                echo "</div>";
            } else {
                echo "<p style='color: red;'>No se encontró ningún vehículo registrado con la placa: " . htmlspecialchars($placa_buscar) . "</p>";
            }

            $stmt->close();
        } else {
            echo "<p style='color: orange;'>Por favor, introduzca una placa válida en el formulario.</p>";
        }

        $conexion->close();
        ?>

    </div>
</body>

</html>