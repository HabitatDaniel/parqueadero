<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Conductores</title>
    <style>
        table { width: 80%; margin: 20px auto; border-collapse: collapse; font-family: Arial, sans-serif; }
        th, td { border: 1px solid #999; padding: 12px; text-align: left; }
        th { background-color: #333; color: white; }
        tr:nth-child(even) { background-color: #f2f2f2; }
    </style>
</head>
<body>

    <h2 style="text-align:center;">Conductores Registrados</h2>

    <table>
        <thead>
            <tr>
                <th>OID</th>
                <th>Cédula (ccConductor)</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // 1. Conexión tradicional sin usar flechas (mysqli_connect)
            $conexion = mysqli_connect("localhost", "root", "", "parqueadero");

            // Verificar si la conexión falló
            if (!$conexion) {
                die("Conexión fallida: " . mysqli_connect_error());
            }

            // 2. Consulta SQL tradicional
            $sql = "SELECT Oid, IdConductor, Nombre FROM conductor";
            $resultado = mysqli_query($conexion, $sql);

            // 3. Recorrer los datos con funciones tradicionales
            if (mysqli_num_rows($resultado) > 0) {
                while($fila = mysqli_fetch_assoc($resultado)) {
                    echo "<tr>";
                    echo "<td>" . $fila["Oid"] . "</td>";
                    echo "<td>" . $fila["IdConductor"] . "</td>";
                    echo "<td>" . $fila["Nombre"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3' style='text-align:center;'>No hay datos disponibles</td></tr>";
            }

            // 4. Cerrar la conexión
            mysqli_close($conexion);
            ?>
        </tbody>
    </table>

</body>
</html>
