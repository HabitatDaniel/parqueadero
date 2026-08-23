<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/StyleMenuWelcome.css">

<link rel="stylesheet" href="../css/styles-box.css">


<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Menú Basico</title>
<link rel="icon" type="image/x-icon" href="../img/IconoPrincipal.png">
<link rel="stylesheet" href="../css/bootstrap.css">
<link rel="stylesheet" href="../css/styles-bootstrap5.css">

<body>

    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <table>
            <th>
                <td>hola</td>
                <td>hola</td>
                <td>hola</td>
            </th>
        </table>
        <a href="../../pages/modules/informe/TablaConductores.php">Conductores</a>
        <a href="../../pages/modules/informe/TablaMovimientos.php">Movimientos</a>
        <a href="#">Services</a>
        <a href="#">Clients</a>



    </div>


    <div id="contenedor">
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
        <div id="cuerpo1">
            <div id="lateral1">
                <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
            </div>
            <div id="otrolado1">
                                 <a class="text-red  " href="../../assets/php/Otros/logout.php">Cerrar Sesión</a>
            </div>
            <div id="principal1">
                <H1>Proceso Ingresos - Activos Fijos </h1>
            </div>
        </div>
        <div id="pie1">
            © 2005 DesarrolloWeb.com
        </div>








    </div>
    <!-- Contenedor  -->
    <div class="contenedor container-fluid-md ">


        <!-- HEADER ENCABEZADO DONDE ESTA LA IMAGEN PRINCIPAL -->
        <header class="row col-md-12 col-12 col-sm-12 border"></header>

        <div class="titulo row col-12 col-sd-12 col-md-12 col-lg-12 border">PORTAFOLIO</div>

        <section id="portafolio" class="row portafolio ">
            <div class="col-12 col-sm-12 col-md-6 col-lg-4 port-col ">
                <div class="col row-4 dato"><a>VEHÍCULOS</a><br>
                    <img src="../../assets/img/portafolio-1.png" class="img-fluid border" alt="Imagen Portafolio" />
                    <!-- <div class="campo">Por esta razón, resulta necesario identificar los principales riesgos de
                        seguridad de la información presentes en UNIMINUTO y proponer medidas orientadas al
                        fortalecimiento de la protección de los datos. Asimismo, se busca promover una cultura de
                        ciberseguridad mediante la sensibilización y capacitación de la comunidad universitaria sobre
                        buenas prácticas en el manejo de la información.</div> -->
                        <br>
                    <a href="../../pages/modules/vehiculo/Vehiculo.html"><button type="button"
                            class="btn btn-secondary text-white">Registrar</button></a>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-4 port-col ">
                <div class="col row-4 dato"><a>VEHÍCULOS</a><br>
                    <img src="../../assets/img/portafolio-1.png" class="img-fluid border" alt="Imagen Portafolio" />
                    <!-- <div class="campo">Por esta razón, resulta necesario identificar los principales riesgos de
                        seguridad de la información presentes en UNIMINUTO y proponer medidas orientadas al
                        fortalecimiento de la protección de los datos. Asimismo, se busca promover una cultura de
                        ciberseguridad mediante la sensibilización y capacitación de la comunidad universitaria sobre
                        buenas prácticas en el manejo de la información.</div> -->
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