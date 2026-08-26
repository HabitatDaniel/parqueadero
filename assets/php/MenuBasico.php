<?php
// 1. Buscamos el archivo de texto en la misma carpeta
$archivo_ip = "../../enlace.txt";

if (file_exists($archivo_ip)) {
    // Lee el archivo y trim() limpia espacios o saltos de línea invisibles
    $servidor = trim(file_get_contents($archivo_ip));
} else {
    // IP de respaldo por si el archivo .txt no existe o se borra
    $servidor = "localhost";
}

?>
<!DOCTYPE html>
<html>


<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Menú Basico</title>
<link rel="icon" type="image/x-icon" href="../img/IconoPrincipal.png">
<link rel="stylesheet" href="../css/StyleMenuWelcome.css">

<!-- <link rel="stylesheet" href="../css/styles-box.css"> -->
<link rel="stylesheet" href="../css/bootstrap.css">
<link rel="stylesheet" href="../css/styles-bootstrap5.css">

<body>

    <?php
    // 1. Conexión a la base de datos
    $pdo = new PDO('mysql:host=localhost;dbname=parqueadero', 'root', '');

    // 2. Consulta SQL con INNER JOIN para validar el tipo de vehículo por su placa
    $sql = "SELECT COUNT(*) 
        FROM movimiento m
        INNER JOIN vehiculo v ON m.IdVehiculo = v.placa
        WHERE m.fecha_salida IS NULL 
          AND v.Medio = 'MOTOCICLETA'";

    $stmt = $pdo->query($sql);
    $cupoMoto = 32;
    // 3. Obtener el resultado
    $totalMotos = $stmt->fetchColumn();

    // 4. Realizar la operación de diferencia (32 - total)
    $diferencia = ($cupoMoto - $totalMotos);



    // 2. Consulta SQL con INNER JOIN para validar el tipo de vehículo por su placa
    $sql = "SELECT COUNT(*) 
        FROM movimiento m
        INNER JOIN vehiculo v ON m.IdVehiculo = v.placa
        WHERE m.fecha_salida IS NULL 
       AND (v.Medio = 'AUTOMÓVIL' OR v.Medio = 'CAMIONETA')";

    $stmt = $pdo->query($sql);

    // 3. Obtener el resultado
    $totalVehiculos = $stmt->fetchColumn();
    $cupoVehiculo = 70;
    // 4. Realizar la operación de diferencia (32 - total)
    $diferenciaVehiculos = ($cupoVehiculo - $totalVehiculos);

    // Ejemplo para mostrar los resultados en tu diseño:
    // echo "Motos adentro: " . $totalMotos . "<br>";
    //echo "Cupos disponibles: " . $diferencia;
    ?>


    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="../../pages/modules/informe/TablaConductores.php">Conductores</a>
        <a href="../../pages/modules/informe/TablaMovimientos.php">Movimientos</a>
        <a href="#">Services</a>
        <a href="#">Clients</a>
    </div>



    <!-- Contenedor  -->
    <div class="contenedor container-fluid-md ">

        <div class="inicio row col-12 col-sd-12 col-md-12 col-lg-12 border">
            <div id="cabecera1">

                <?php
                session_start();
                if (!isset($_SESSION['usuario'])) {
                    header("Location: ../../index.html"); // Volver si no hay sesión
                }
                echo "Bienvenido, user" . $_SESSION['usuario']; ?>
                <!-- Opción 1: Enlace a script de cierre (PHP)  <a href="#"><button onclick="cerrarSesion()">Cerrar Sesión</button></a> -->
                </h1>
            </div>

            <div class="col-12 col-sd-12 col-md-12 col-lg-2 ">
                <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
            </div>
            <div class="col-12 col-sd-12 col-md-12 col-lg-8 ">
                <H1 style="color:white;">REGISTRO PARQUEADERO</h1>
            </div>
            <div class=" col-12 col-sd-12 col-md-12 col-lg-2">
                <a class="text-red  " href="../../assets/php/Otros/logout.php">
                    <button class="btn btn-danger"> Cerrar Sesión</button></a>
            </div>
        </div>

        <!-- HEADER ENCABEZADO DONDE ESTA LA IMAGEN PRINCIPAL -->
        <header class="row col-md-12 col-12 col-sm-12 border"></header>

        <div class="titulo row col-12 col-sd-12 col-md-12 col-lg-12 border">PORTAFOLIO</div>

        <section id="portafolio" class="row portafolio ">
            <div class="col-12 col-sm-12 col-md-6 col-lg-4 port-col">
                <div class="col row-4 dato"><strong>VEHÍCULOS</strong><br>
                    <img src="../../assets/img/portafolio-1.png" class="img-fluid border" alt="Imagen Portafolio" />
                    <!-- <div class="campo">Por esta razón, resulta necesario identificar los principales riesgos de
                        seguridad de la información presentes en UNIMINUTO y proponer medidas orientadas al
                        fortalecimiento de la protección de los datos. Asimismo, se busca promover una cultura de
                        ciberseguridad mediante la sensibilización y capacitación de la comunidad universitaria sobre
                        buenas prácticas en el manejo de la información.</div> -->
                    <?php
                    echo "<div class='row col-12 col-sm-12 col-md-12 col-lg-12 datodos'  >";
                    echo "<div class='col-6 col-sm-6 col-md-6 col-lg-6 datotres'><h3><strong>".$cupoMoto." Motos<br><h3>(<a style='color:red;'>" . $totalMotos . "</a>/<a style='color:green;'>" . $diferencia . "</a>)</strong></h3></div>";
                    echo "<div class='col-6 col-sm-6 col-md-6 col-lg-6 datotres' style='background-color:#6ECEAD; '><h3><strong>".$cupoVehiculo." Vehiculos<br>(<a style='color:red;'>" . $totalVehiculos . "</a>/<a style='color:green;'>" . $diferenciaVehiculos . "</a>)</strong></h3></div>";
                    echo "</div>";
                    ?>
                    <br>
                    <a href="../../pages/modules/vehiculo/Vehiculo.html"><button type="button"
                            class="btn btn-secondary text-white">Registrar</button></a>
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-6 col-lg-4  port-col ">
                <div class="col row-4 dato"><a>BICICLETAS</a><br>
                    <img src="../../assets/img/bicicleta.png" class="img-fluid border" alt="Imagen Portafolio" />
                    <!-- <div class="campo">Por esta razón, resulta necesario identificar los principales riesgos de
                        seguridad de la información presentes en UNIMINUTO y proponer medidas orientadas al
                        fortalecimiento de la protección de los datos. Asimismo, se busca promover una cultura de
                        ciberseguridad mediante la sensibilización y capacitación de la comunidad universitaria sobre
                        buenas prácticas en el manejo de la información.</div> -->
                    <br>
                    <a href="../../pages/modules/vehiculo/bicicleta.html"><button type="button"
                            class="btn btn-secondary text-white">Registrar</button></a>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-4  port-col  ">
                <div class="col row-4 dato"><a>PATINETAS</a><br>
                    <img src="../../assets/img/portafolio-3.png" class="img-fluid border" alt="Imagen Portafolio" />
                    <!-- <div class="campo">Por esta razón, resulta necesario identificar los principales riesgos de
                        seguridad de la información presentes en UNIMINUTO y proponer medidas orientadas al
                        fortalecimiento de la protección de los datos. Asimismo, se busca promover una cultura de
                        ciberseguridad mediante la sensibilización y capacitación de la comunidad universitaria sobre
                        buenas prácticas en el manejo de la información.</div> -->
                    <br>
                    <a href="../../pages/modules/vehiculo/patineta.html"><button type="button"
                            class="btn btn-secondary text-white">Registrar</button></a>
                </div>
            </div>
        </section>

        <footer class="row  col-12 col-sd-12 col-md-12 col-lg-12 border ">@Copyright - 2026<br>Todos los derechos
            reservados a Daniel Rojas</be>
        </footer>
    </div>

    <script src="assets/js/bootstrap.bundle.js"></script>
    <script src="assets/js/scripts.js"></script>

    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }


        function cerrarSesion() {
            sessionStorage.clear(); // Limpia almacenamiento local
            // 2. Redirigir y reemplazar en el historial
            window.location.replace("logout.php");
        }



    </script>

    <script>
        // Inserta un estado falso en el historial del navegador inmediatamente
        window.history.pushState(null, null, window.location.href);

        // Detecta si el usuario presiona el botón "Atrás"
        window.onpopstate = function () {
            // Al detectar el retroceso, vuelve a empujar el estado actual al frente
            window.history.go(1);
        };
    </script>


</body>

</html>