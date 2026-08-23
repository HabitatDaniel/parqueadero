<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/x-icon" href="../../../assets/img/IconoPrincipal.png">
    <title>Panel Vehiculo</title>
    <link rel="stylesheet" href="../../css/styles-bootstrap5.css">
    <link rel="stylesheet" href="../../css/styles-bootstrap5Registro.css">
</head>

<body>
    <!-- <div class="menud"> -->
    <div class="row col-12 col-sm-12 col-md-12 col-lg-12  contenedor ">
        <div class="row col-12 col-sm-12 col-md-12 col-lg-12  logo">
            <img src="../../../assets/img/logo_SDHT_n.png" class="imagen" alt="Imagen Portafolio" />
        </div>
        <div class="col-12 col-sm-2 col-md-12 col-lg-12 panelsuperior ">

            <?php
            $host = "localhost";
            $usuario = "root";
            $clave = "";
            $base_de_datos = "parqueadero";

            $conexion = new mysqli($host, $usuario, $clave, $base_de_datos);

            if ($conexion->connect_error) {
                die("Error de conexión: " . $conexion->connect_error);
            }

            if (isset($_GET['placa']) && !empty(trim($_GET['placa']))) {
                $placa_buscar = strtoupper(trim($_GET['placa']));

                // 1. PRIMERA CONSULTA: Buscar el vehículo de forma limpia
                $sql = "SELECT Oid, Placa, Medio, Tipo, Marca, Color, IdConductor FROM vehiculo WHERE placa = ?";
                $stmt = $conexion->prepare($sql);
                $stmt->bind_param("s", $placa_buscar);
                $stmt->execute();
                $resultado = $stmt->get_result();

                if ($vehiculo = $resultado->fetch_assoc()) {
                    $placa_mayuscula = strtoupper($vehiculo['Placa']);
                    $id_conductor_vehiculo = trim($vehiculo['IdConductor']); // Limpiamos espacios invisibles
            
                    // Variables por defecto si no se encuentra en la base de datos
                    $nombre_conductor = "No asignado / No encontrado en la tabla Conductor";
                    $telefono_conductor = "No disponible";

                    // 2. SEGUNDA CONSULTA: Buscar al conductor exacto usando su idConductor
                    if (!empty($id_conductor_vehiculo)) {
                        // Usamos "WHERE idConductor = ?" asegurando coincidencia exacta
                        $sql_conductor = "SELECT * FROM conductor WHERE IdConductor = ?";
                        $stmt_cond = $conexion->prepare($sql_conductor);

                        // Cambiado a "i" si tu documento/ID es puramente numérico. Si contiene letras, vuelve a cambiarlo a "s"
                        $stmt_cond->bind_param("i", $id_conductor_vehiculo);
                        $stmt_cond->execute();
                        $res_cond = $stmt_cond->get_result();

                        if ($conductor = $res_cond->fetch_assoc()) {
                            $nombre_conductor = $conductor['Nombre'];
                            $telefono_conductor = $conductor['Celular'];
                            $piso=$conductor['Piso'];
                            $area=$conductor['Area'];
                        }
                        $stmt_cond->close();
                    }

                    // 3. MOSTRAR DATOS DEL VEHÍCULO
            
                    echo "<h2>Secretaría del Habitat</h2>";
                    echo "<p><strong>Medio:</strong> " . htmlspecialchars($vehiculo['Medio']) . "</p>";


                    ?>
                </div>
                <div class="col-12 col-sm-2 col-md-12 col-lg-6 panelcentral">
                    <?php


                    // 4. MOSTRAR DATOS DEL CONDUCTOR REAL ENCONTRADO
                    //echo "<h2>Datos del Conductor</h2>";
                    //echo "<p><strong>Id Conductor Asociado:</strong> " . htmlspecialchars($id_conductor_vehiculo) . "</p>";
                    //echo "<p><strong>Nombre:</strong> " . htmlspecialchars($nombre_conductor) . "</p>";
                    //echo "<p><strong>Teléfono:</strong> " . htmlspecialchars($telefono_conductor) . "</p>";
            
                    $carpeta_fotos = "../../../Soportes/Vehiculo/" . $placa_mayuscula . "/";
                    //$nombre_foto =  "FotoFrente.JPG";
                    $nombre_fotoLateral = "FotoLateral.png";

                    if (empty($nombre_foto)) {
                        $nombre_foto = "default.jpg";
                    }

                    $ruta_completa_foto = $carpeta_fotos . $nombre_foto;
                    $ruta_completa_fotoLateral = $carpeta_fotos . $nombre_fotoLateral;
                    echo "<img src='" . htmlspecialchars($ruta_completa_fotoLateral) . "' alt='Foto del vehículo' class='imagenprincipal'>";
                    ?>
                </div>
                <div class="col-12 col-sm-2 col-md-12 col-lg-12 panelinferior ">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 panelinferiorizq">
                        <h3>Información Técnica</h3>
                        <?php
                        echo "<p><strong>Placa:</strong> " . htmlspecialchars($placa_mayuscula) . "</p>";
                        echo "<p><strong>Tipo:</strong> " . htmlspecialchars($vehiculo['Tipo']) . "</p>";
                        echo "<p><strong>Marca:</strong> " . htmlspecialchars($vehiculo['Marca']) . "</p>";
                        echo "<p><strong>Color:</strong> " . htmlspecialchars($vehiculo['Color']) . "</p>";
                        ?>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 panelinferiorder">
                        <?php
                        $id = $placa_mayuscula;


                        // 4. MOSTRAR DATOS DEL CONDUCTOR REAL ENCONTRADO
                        echo "<h3>Datos del Conductor</h3>";
                        echo "<p><strong>Id Conductor Asociado:</strong> " . htmlspecialchars($id_conductor_vehiculo) . "</p>";
                        echo "<p><strong>Nombre:</strong> " . htmlspecialchars($nombre_conductor) . "</p>";
                        echo "<p><strong>Teléfono:</strong> " . htmlspecialchars($telefono_conductor) . "</p>";

                        $carpeta_fotos = "../../../Soportes/Vehiculo/" . $placa_mayuscula . "/";
                        //$nombre_foto =  "FotoFrente.JPG";
                        $nombre_fotoLateral = "FotoLateral.png";

                        if (empty($nombre_foto)) {
                            $nombre_foto = "default.jpg";
                        }

                        $ruta_completa_foto = $carpeta_fotos . $nombre_foto;
                        $ruta_completa_fotoLateral = $carpeta_fotos . $nombre_fotoLateral;
                        ?>
                    </div>
                </div>
                <div class="row col-12 col-sm-12 col-md-12 col-lg-6 panelinferiorboton ">
                    <?php

                    //  echo "<button onclick='enviarDatos() class='btn btn-success'>Ir a la otra página</button>";
                    //  echo "<a href='editar.php?id=$id' style='padding: 8px 15px; background-color: #28a745; color: white; text-decoration: none; border-radius: 4px; margin-right: 10px;'> <button onclick='enviarDatos()'>Ir a la otra página</button></a>";
                    echo "<a href='../welcome.php'  style=' background-color: orange; color: white; text-decoration: none; border-radius: 4px;'>Cancelar</a>";
                    ?>
                    <button onclick="enviarDatos()" class="btn btn-success">Registrar Entrada</button>

                    <script>
                        function enviarDatos() {
                            const placaVehiculo = <?php echo json_encode($_GET['placa'] ?? ''); ?>;

                            // Redireccionamos pasando la placa en la URL a nuestro nuevo archivo PHP
                            window.location.href = "../Registro/Movimiento.php?placa=" + encodeURIComponent(placaVehiculo);
                        }

                    </script>
                </div>
                 <div class="row col-12 col-sm-12 col-md-12 col-lg-12 panelhooter border">
                         <?php
                    echo "Ubicación del conductor
                     <h3>". htmlspecialchars($area) ."</h3>
                     <h3>". htmlspecialchars($piso) ."</h3>"
                     ?>
                     </div>
                     <?php
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
    </div>
    </div>
</body>

</html>