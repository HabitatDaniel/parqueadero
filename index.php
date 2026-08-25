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
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Principal</title>
    <link rel="icon" type="image/x-icon" href="assets/img/IconoPrincipal.png">
    <!-- <link rel="stylesheet" href="assets/css/styles-box.css"> -->

    <!-- <link rel="stylesheet" href="assets/css/styles-flexbox.css"> -->
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/styles-bootstrap5.css">
</head>

<body>
    <!-- Contenedor  -->
    <div class="contenedor container-fluid-md ">
        <nav class="row nav">
            <div class="col-12 col-sm-12 col-md-2  col-lg-2 logo ">
                <img src="assets/img/logo.png" alt="Logo cargue" />
            </div>
            <div class="col-12 col-sm-10 col-md-8 col-lg-8 menu">
                <!-- Menú de navegación -->
                <!-- <nav class="nav row"> -->
                    <a class="text-white " href="#">Inicio</a>
                    <a class="text-white " href="#portafolio">Portafolio</a>
                    <a class="text-white " href="#nosotros">Nosotros</a>
                    <a class="text-white  " href="#contacto">Contáctenos</a> 
                <!-- </nav>  -->
            </div>
            <div class="col-12 col-sm-2 col-md-22 col-lg-2 login ">
            <?php
                echo "<a class='text-white' href=' http://".$servidor."/parqueadero/pages/company/login.html'><button type='button' class='btn btn-success ' href='pages/company/login.html'>"
                 ?>
                 Login </button>
                   </a>
            </div>
        </nav>

        <!-- HEADER ENCABEZADO DONDE ESTA LA IMAGEN PRINCIPAL -->
        <header class="row col-md-12 col-12 col-sm-12 border"></header>

        <div class="titulo row col-12 col-sd-12 col-md-12 col-lg-12 border">PORTAFOLIO</div>

        <section id="portafolio" class="row portafolio ">
            <div class="col-12 col-sm-12 col-md-6 col-lg-4 port-col ">
                <div class="row-4 dato"><a>PORTAFOLIO 1</a><br>
                    <img src="assets/img/portafolio-1.png" class="img-fluid border" alt="Imagen Portafolio" />
                    <div class="campo">Por esta razón, resulta necesario identificar los principales riesgos de
                        seguridad de la información presentes en UNIMINUTO y proponer medidas orientadas al
                        fortalecimiento de la protección de los datos. Asimismo, se busca promover una cultura de
                        ciberseguridad mediante la sensibilización y capacitación de la comunidad universitaria sobre
                        buenas prácticas en el manejo de la información.</div>
                    <button type="button" class="btn btn-secondary text-white">Gris Énfasis</button>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-4  port-col ">
                <div class="row-4 dato"><a>PORTAFOLIO 2</a><br>
                    <img src="assets/img/portafolio-2.png" class="img-fluid border" alt="Imagen Portafolio" />
                    <div class="campo">Por esta razón, resulta necesario identificar los principales riesgos de
                        seguridad de la información presentes en UNIMINUTO y proponer medidas orientadas al
                        fortalecimiento de la protección de los datos. Asimismo, se busca promover una cultura de
                        ciberseguridad mediante la sensibilización y capacitación de la comunidad universitaria sobre
                        buenas prácticas en el manejo de la información.</div>
                    <button type="button" class="btn btn-secondary text-white">Gris Énfasis</button>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-4  port-col  ">
                <div class="row-4 dato"><a>PORTAFOLIO 3</a><br>
                    <img src="assets/img/portafolio-3.png" class="img-fluid border" alt="Imagen Portafolio" />
                    <div class="campo">Por esta razón, resulta necesario identificar los principales riesgos de
                        seguridad de la información presentes en UNIMINUTO y proponer medidas orientadas al
                        fortalecimiento de la protección de los datos. Asimismo, se busca promover una cultura de
                        ciberseguridad mediante la sensibilización y capacitación de la comunidad universitaria sobre
                        buenas prácticas en el manejo de la información.</div>
                    <button type="button" class="btn btn-secondary text-white">Gris Énfasis</button>
                </div>
            </div>
        </section>

        <div class="row titulo ">QUIENES SOMOS</div>

        <section class="row col-sm-12 col-md-12 col-lg-12 nosotros " id="nosotros">

            <!-- QUIENES SOMOS UNO -->
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 nos-fila ">
                <div class="col-12 col-sm-12 col-md-9 col-lg-5 nos-fila-col-ext-der caja-2 border ">
                    <a>QUIENES SOMOS UNO</a>
                    <a>Por esta razón, resulta necesario identificar los principales riesgos de
                        seguridad de la información presentes en UNIMINUTO</a>
                </div>
                <div class=" col-12 col-sm-12 col-md-3 col-lg-2 nos-fila-col-cnt caja-1  ">
                    <img src="assets/img/somos-1.png" class="border" alt="Imagen Portafolio" />
                </div>
                <div class=" col-0 col-sm-0 col-md-0 col-lg-5 nos-fila-col-ext-izq  caja-3 "></div>
            </div>
            <!-- QUIENES SOMOS DOS -->
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 nos-fila ">
                <div class="col-0 col-sm-0 col-md-0 col-lg-5 nos-fila-col-ext-der  caja-3"> </div>
                <div class=" col-12 col-sm-12 col-md-3 col-lg-2 nos-fila-col-cnt ">
                    <img src="assets/img/somos-2.png" class="border" alt="Imagen Portafolio" />
                </div>
                <div class=" col-12 col-sm-12 col-md-9 col-lg-5 nos-fila-col-ext-izq border  ">
                    <div><a>QUIENES SOMOS DOS</a></div>
                    <div>Por esta razón, resulta necesario identificar los principales riesgos de
                        seguridad de la información presentes en UNIMINUTO</div>
                </div>

            </div> <!-- QUIENES SOMOS TRES -->
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 nos-fila ">
                <div class="col-12 col-sm-12 col-md-9 col-lg-5 nos-fila-col-ext-der caja-2 border ">
                    <div><a>QUIENES SOMOS TRES</a></div>
                    <div>Por esta razón, resulta necesario identificar los principales riesgos de
                        seguridad de la información presentes en UNIMINUTO</div>
                </div>
                <div class=" col-12 col-sm-12 col-md-3 col-lg-2 nos-fila-col-cnt caja-1  ">
                    <img src="assets/img/somos-3.png" class="border" alt="Imagen Portafolio" />
                </div>
                <div class=" col-0 col-sm-0 col-md-0 col-lg-5 nos-fila-col-ext-izq caja-3 "></div>
            </div>
        </section>

        <div class="row titulo  col-12 col-sd-12 col-md-12 col-lg-12 border text-center">CONTÁCTENOS</div>

        <section class="row  col-12 col-sd-12 col-md-12 col-lg-12 contacto" id="contacto">
            <div class="col-12 col-sd-12 col-md-6 col-lg-6  cont-col border">
                <form action="/enviar" method="post">
                    <label for="nombre">Nombre:</label><br>
                    <input type="text" id="nombre" name="nombre"><br><br>

                    <label for="email">Correo electrónico:</label><br>
                    <input type="email" id="email" name="email"><br><br>

                    <button type="submit">Enviar</button>
                </form>
            </div>
            <div class="col-12 col-sd-12 col-md-6 col-lg-6  cont-col border p-0">
                <div class="col-12 cont-col-fila-arr border">
                    <div class="mapa p-2 bg-light">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31813.9699775346!2d-74.10351112568361!3d4.639294599999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9a30819a6fdd%3A0x1079f02c2173c68f!2sSecretar%C3%ADa%20Distrital%20Del%20H%C3%A1bitat!5e0!3m2!1ses!2sco!4v1786302292131!5m2!1ses!2sco"
                            style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="strict-origin-when-cross-origin"></iframe>
                    </div>
                </div>
                <div class="col-12 cont-col-fila-abj border">
                    <img src="assets/img/whatsapp.png" class="img-fluid border" alt="Imagen Portafolio" />
                    <img src="assets/img/facebook.png" class="img-fluid border" alt="Imagen Portafolio" />
                    <img src="assets/img/twitter.png" class="img-fluid border" alt="Imagen Portafolio" />
                    <img src="assets/img/youtube.png" class="img-fluid border" alt="Imagen Portafolio" />
                </div>
            </div>
        </section>

        <footer class="row  col-12 col-sd-12 col-md-12 col-lg-12 border ">@Copyright - 2026<br>Todos los derechos
            reservados a Daniel Rojas</be>
        </footer>
    </div>

    <script src="assets/js/scripts.js"></script> <!-- Enlace al script en la otra carpeta (js/) -->
    <script src="assets/js/bootstrap.bundle.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>