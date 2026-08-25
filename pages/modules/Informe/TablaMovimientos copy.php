<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Lista de Conductores</title>
    <style>
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
        }

        th,
        td {
            border: 1px solid #999;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>

    <h2 style="text-align:center;">Movimientos Registrados</h2>

    <table>
        <thead>
            <tr>
                <th>Oid</th>
                <th>Fecha Entrada</th>
                <th>Fecha Salida</th>
                <th>Id Vehiculo</th>
                <th>Id Conductor</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // 1. Conexión tradicional (mysqli_connect)
            $conexion = mysqli_connect("localhost", "root", "", "parqueadero");

            // Verificar si la conexión falló
            if (!$conexion) {
                die("Conexión fallida: " . mysqli_connect_error());
            }

            // 2. Consulta SQL con JOINs para traer los datos relacionados
// Nota: Ajusta 'nombre' y 'tipo' si tus columnas se llaman diferente en sus tablas
            $sql = "SELECT m.Oid, m.fecha_entrada, m.fecha_salida, m.IdVehiculo, m.IdConductor, 
               c.Nombre AS nombreConductor, 
               v.Medio AS tipoVehiculo 
        FROM movimiento m
        INNER JOIN conductor c ON m.IdConductor = c.IdConductor
        INNER JOIN vehiculo v ON m.IdVehiculo = v.Placa";

            $resultado = mysqli_query($conexion, $sql);

            // 3. Recorrer los datos con funciones tradicionales
            if (mysqli_num_rows($resultado) > 0) {
                while ($fila = mysqli_fetch_assoc($resultado)) {
                    echo "<tr>";
                    echo "<td>" . $fila["Oid"] . "</td>";
                    echo "<td>" . $fila["fecha_entrada"] . "</td>";
                    echo "<td>" . $fila["fecha_salida"] . "</td>";
                    echo "<td>" . $fila["IdVehiculo"] . "</td>"; // Esta es la placa
                    echo "<td>" . $fila["tipoVehiculo"] . "</td>"; // Nuevo dato en la tabla
                    echo "<td>" . $fila["IdConductor"] . "</td>";
                    echo "<td>" . $fila["nombreConductor"] . "</td>"; // Nuevo dato en la tabla
                    echo "</tr>";
                }
            } else {
                // Se cambió el colspan a '7' porque ahora imprimes más columnas en tu HTML
                echo "<tr><td colspan='7' style='text-align:center;'>No hay datos disponibles</td></tr>";
            }

            // 4. Cerrar la conexión
            mysqli_close($conexion);
            ?>

        </tbody>
    </table>

</body>

</html>