<?php
// 1. Cargamos la URL desde tu archivo .txt
//$url_base = trim(file_get_contents("../../enlace.txt")); 
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="../../../assets/img/IconoPrincipal.png">
    <!-- <link rel="stylesheet" href="../../../assets/css/bootstrap.css"> -->
    <link rel="stylesheet" href="../../../assets/css/styles-bootstrap5LoginRegistro.css">
</head>

<body>
    <!-- Contenedor  -->
    <div class="contenedor container-fluid-md ">
        <!-- ENCABEZADO -->
      
        <!-- DIV CENTRAL -->
        <!-- <section id="portafolio" class="row formulario"> -->
            <div class="form-Inicio border">
                <div class="row col-12 col-sm-12 col-md-12 col-lg-12 form-titulo">REGISTRO VEHICULO</div>
                <form action="../../php/registro/RegistroVehiculo.php" method="get" class="formato" autocomplete="off"  id="form-vehiculo">

                    <!-- DIV IZQUIERDO -->
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6" form-izq >
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12  form-label">
                            <label for="nombre" class="label">Placa:</label>
                            <input type="text" name="Placa" class="form-control" id="Placa"
                                placeholder="Usuario" oninput="this.value = this.value.toUpperCase()" required autofocus>
                        </div>
                        <!-- <div class="col-12 col-sm-12 col-md-12 col-lg-12  form-label">
                            <label for="Medio" class="label">Medio:</label>
                            <select name="Medio" id="Medio">
                                <option value="MOTOCICLETA">MOTOCICLETA</option>
                                <option value="MOTOCICLETA">AUTOMÓVIL</option>
                                <option value="MOTOCICLETA">CAMIONETA</option>
                            </select>
                        </div> -->
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12  form-label">
                            <label for="Tipo" class="label">Tipo:</label>
                            <select name="Tipo" id="Tipo">
                                <option value="MOTOCICLETA">COMBUSTIBLE</option>
                                <option value="MOTOCICLETA">ELÉCTRICO</option>
                                <option value="MOTOCICLETA">HÍBRIDO</option>
                            </select>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12  form-label">
                            <label for="Marca" class="label">Marca:</label>
                            <select name="Marca" id="Marca">
                                <option value="AKT">AKT</option>
                                <option value="AKT NKD 125">AKT NKD 125</option>
                                <option value="APACHE 180">APACHE 180</option>
                                <option value="APRILIA SR GT 200">APRILIA SR GT 200</option>
                                <option value="AUDI">AUDI</option>
                                <option value="AUDI Q3">AUDI Q3</option>
                                <option value="AUDI Q5">AUDI Q5</option>
                                <option value="AUTECO NKD">AUTECO NKD</option>
                                <option value="BAJAJ">BAJAJ</option>
                                <option value="BAJAJ DOMINAR">BAJAJ DOMINAR</option>
                                <option value="BAJAJ PULSAR 180 UG">BAJAJ PULSAR 180 UG</option>
                                <option value="BAJAJ PULSAR 180 UG GT">BAJAJ PULSAR 180 UG GT</option>
                                <option value="BENELLI">BENELLI</option>
                                <option value="BENELLI TNT 150I">BENELLI TNT 150I</option>
                                <option value="BMW">BMW</option>
                                <option value="BMW 525i">BMW 525i</option>
                                <option value="BMW IX1">BMW IX1</option>
                                <option value="BRONCO">BRONCO</option>
                                <option value="BYD">BYD</option>
                                <option value="BYD SEAGULL">BYD SEAGULL</option>
                                <option value="CHANGAN">CHANGAN</option>
                                <option value="CHERY">CHERY</option>
                                <option value="CHERY ICAR 03">CHERY ICAR 03</option>
                                <option value="CHERY TIGO">CHERY TIGO</option>
                                <option value="CHERY VAN">CHERY VAN</option>
                                <option value="CHEVROLET">CHEVROLET</option>
                                <option value="CHEVROLET AVEO">CHEVROLET AVEO</option>
                                <option value="CHEVROLET CAPTIVA">CHEVROLET CAPTIVA</option>
                                <option value="CHEVROLET JOY">CHEVROLET JOY</option>
                                <option value="CHEVROLET OPTRA">CHEVROLET OPTRA</option>
                                <option value="CHEVROLET SAIL">CHEVROLET SAIL</option>
                                <option value="CHEVROLET SONIC">CHEVROLET SONIC</option>
                                <option value="CHEVROLET SPARK">CHEVROLET SPARK</option>
                                <option value="CHEVROLET TRACKER">CHEVROLET TRACKER</option>
                                <option value="CHEVROLET WAGON">CHEVROLET WAGON</option>
                                <option value="CHEVROLETE TRACKER">CHEVROLETE TRACKER</option>
                                <option value="CITROËN">CITROËN</option>
                                <option value="CITROEN C3">CITROEN C3</option>
                                <option value="CREVROLET CRUZE TURBO">CREVROLET CRUZE TURBO</option>
                                <option value="CUPRA">CUPRA</option>
                                <option value="DISCOVER">DISCOVER</option>
                                <option value="DISCOVERY">DISCOVERY</option>
                                <option value="DODGE">DODGE</option>
                                <option value="DODGE JOURNEY">DODGE JOURNEY</option>
                                <option value="DOMINAR BAJAJ">DOMINAR BAJAJ</option>
                                <option value="DUSTER">DUSTER</option>
                                <option value="DUSTER 4x4">DUSTER 4x4</option>
                                <option value="FORD">FORD</option>
                                <option value="FORD EDGE">FORD EDGE</option>
                                <option value="FORD ESCAPE">FORD ESCAPE</option>
                                <option value="FORD ESCAPE TITANIUM">FORD ESCAPE TITANIUM</option>
                                <option value="FORD FIESTA">FORD FIESTA</option>
                                <option value="FORD SCAPE">FORD SCAPE</option>
                                <option value="FORD TERRITORY">FORD TERRITORY</option>
                                <option value="GEELY">GEELY</option>
                                <option value="GM">GM</option>
                                <option value="HERO">HERO</option>
                                <option value="HERO HUNK 125R">HERO HUNK 125R</option>
                                <option value="HERO HUNK 160R">HERO HUNK 160R</option>
                                <option value="HIUNDAY">HIUNDAY</option>
                                <option value="HONDA">HONDA</option>
                                <option value="HONDA CB 125F">HONDA CB 125F</option>
                                <option value="HONDA CRV">HONDA CRV</option>
                                <option value="HONDA HR-V">HONDA HR-V</option>
                                <option value="HONDA NAVI">HONDA NAVI</option>
                                <option value="HONDA XBLADE 160">HONDA XBLADE 160</option>
                                <option value="HUSQVARNA SVARTPILEN">HUSQVARNA SVARTPILEN</option>
                                <option value="HYUNDAI">HYUNDAI</option>
                                <option value="HYUNDAI i10">HYUNDAI i10</option>
                                <option value="JAC E30X">JAC E30X</option>
                                <option value="JEEP">JEEP</option>
                                <option value="JEEP RENAGADE">JEEP RENAGADE</option>
                                <option value="JEEP RENEGADE">JEEP RENEGADE</option>
                                <option value="JEEP WRANGLER">JEEP WRANGLER</option>
                                <option value="KAWASAKI">KAWASAKI</option>
                                <option value="KIA">KIA</option>
                                <option value="KIA CERATO FORTE">KIA CERATO FORTE</option>
                                <option value="KIA K3">KIA K3</option>
                                <option value="KIA MOHAVE EX">KIA MOHAVE EX</option>
                                <option value="KIA PICANTO">KIA PICANTO</option>
                                <option value="KIA RIO">KIA RIO</option>
                                <option value="KIA SPORTAGE">KIA SPORTAGE</option>
                                <option value="KIMCO">KIMCO</option>
                                <option value="KTM">KTM</option>
                                <option value="KTM DUKE 390">KTM DUKE 390</option>
                                <option value="KWID">KWID</option>
                                <option value="KYMCO">KYMCO</option>
                                <option value="MAZDA">MAZDA</option>
                                <option value="MAZDA 2">MAZDA 2</option>
                                <option value="MAZDA 3">MAZDA 3</option>
                                <option value="MAZDA 3 TOURING">MAZDA 3 TOURING</option>
                                <option value="MAZDA CX30">MAZDA CX30</option>
                                <option value="MAZDA CX50">MAZDA CX50</option>
                                <option value="MAZDA MATZURI">MAZDA MATZURI</option>
                                <option value="MERCEDES">MERCEDES</option>
                                <option value="MERCEDES BENZ">MERCEDES BENZ</option>
                                <option value="MG S5">MG S5</option>
                                <option value="MINI COOPER">MINI COOPER</option>
                                <option value="MITSUBISHI">MITSUBISHI</option>
                                <option value="NISSAN">NISSAN</option>
                                <option value="NISSAN FRONTIER">NISSAN FRONTIER</option>
                                <option value="NISSAN KICKS">NISSAN KICKS</option>
                                <option value="NISSAN MARCH">NISSAN MARCH</option>
                                <option value="NISSAN QASHQAI">NISSAN QASHQAI</option>
                                <option value="NISSAN QASHQAI 2017">NISSAN QASHQAI 2017</option>
                                <option value="NISSAN VERSA">NISSAN VERSA</option>
                                <option value="NISSAN XTRAIL">NISSAN XTRAIL</option>
                                <option value="OPEL">OPEL</option>
                                <option value="PEGOUT 2008">PEGOUT 2008</option>
                                <option value="PEUGEOT">PEUGEOT</option>
                                <option value="PEUGEOT 3008">PEUGEOT 3008</option>
                                <option value="PULSAR">PULSAR</option>
                                <option value="RENAULT">RENAULT</option>
                                <option value="RENAULT DUSTER">RENAULT DUSTER</option>
                                <option value="RENAULT FLUENCE">RENAULT FLUENCE</option>
                                <option value="RENAULT KWID">RENAULT KWID</option>
                                <option value="RENAULT LOGAN">RENAULT LOGAN</option>
                                <option value="RENAULT SANDERO">RENAULT SANDERO</option>
                                <option value="RENAULT SANDERO STEP WAY">RENAULT SANDERO STEP WAY</option>
                                <option value="RENAULT SCENIC">RENAULT SCENIC</option>
                                <option value="RENAULT STEPWAY">RENAULT STEPWAY</option>
                                <option value="RENAULT TWINGO">RENAULT TWINGO</option>
                                <option value="ROYAL ENFIEL SCRAM">ROYAL ENFIEL SCRAM</option>
                                <option value="ROYAL ENFIELD">ROYAL ENFIELD</option>
                                <option value="SANDERO">SANDERO</option>
                                <option value="SEAT ARONA">SEAT ARONA</option>
                                <option value="SEAT ATECA">SEAT ATECA</option>
                                <option value="STEPWAY">STEPWAY</option>
                                <option value="SUBARU">SUBARU</option>
                                <option value="SUBARU FORESTER">SUBARU FORESTER</option>
                                <option value="SUZUKI">SUZUKI</option>
                                <option value="SUZUKI FRONX">SUZUKI FRONX</option>
                                <option value="SUZUKI GIXER SF">SUZUKI GIXER SF</option>
                                <option value="SUZUKI GIXXER">SUZUKI GIXXER</option>
                                <option value="SUZUKI GIXXER 250">SUZUKI GIXXER 250</option>
                                <option value="SUZUKI GRAN VITARA">SUZUKI GRAN VITARA</option>
                                <option value="SUZUKI GS125">SUZUKI GS125</option>
                                <option value="SUZUKI SCROSS">SUZUKI SCROSS</option>
                                <option value="SUZUKI SWIFT HIBRIDO">SUZUKI SWIFT HIBRIDO</option>
                                <option value="SWIFT">SWIFT</option>
                                <option value="SYM">SYM</option>
                                <option value="SYM ADX 150">SYM ADX 150</option>
                                <option value="TESLA">TESLA</option>
                                <option value="TOYOTA">TOYOTA</option>
                                <option value="TOYOTA COROLLA">TOYOTA COROLLA</option>
                                <option value="TOYOTA CROSS">TOYOTA CROSS</option>
                                <option value="TOYOTA HILUX">TOYOTA HILUX</option>
                                <option value="TOYOYA YARIS CROSS">TOYOYA YARIS CROSS</option>
                                <option value="TRIUMPH">TRIUMPH</option>
                                <option value="TVS APACHE">TVS APACHE</option>
                                <option value="TVS RAIDER">TVS RAIDER</option>
                                <option value="VICTORY">VICTORY</option>
                                <option value="VICTORY-AUTECO">VICTORY-AUTECO</option>
                                <option value="VOG DS300">VOG DS300</option>
                                <option value="VOLKSWAGEN">VOLKSWAGEN</option>
                                <option value="VOLKSWAGEN AMAROK">VOLKSWAGEN AMAROK</option>
                                <option value="VOLKSWAGEN JETTA">VOLKSWAGEN JETTA</option>
                                <option value="VOLKSWAGEN T-CROSS">VOLKSWAGEN T-CROSS</option>
                                <option value="VOLKSWAGEN TIGUAN">VOLKSWAGEN TIGUAN</option>
                                <option value="VOLVO">VOLVO</option>
                                <option value="YAMAHA">YAMAHA</option>
                                <option value="YAMAHA FZ 250-A">YAMAHA FZ 250-A</option>
                                <option value="YAMAHA FZ25 3.0">YAMAHA FZ25 3.0</option>

                            </select>
                        </div>
                        <!-- <div class="col-12 col-sm-12 col-md-12 col-lg-12  form-label">
                            <label for="nombre" class="label">Color:</label>
                            <input type="text" name="Color" class="form-control" id="exampleFormControlInput1"
                                placeholder="Usuario" required autofocus>
                        </div> -->
                    </div>

                    <!-- DIV DERECHO -->
                    <!-- <div class="col-6 col-sm-6 col-md-6 col-lg-6" form-der >
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12  form-label">
                            <label for="nombre" class="label">Identificación:</label>
                            <input type="text" name="identificacion" class="form-control" id="exampleFormControlInput1"
                                placeholder="Usuario" required autofocus>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12  form-label">
                            <label for="nombre" class="label">Nombre:</label>
                            <input type="text" name="usuario" class="form-control" id="exampleFormControlInput1"
                                placeholder="Usuario" required autofocus>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12  form-label">
                            <label for="nombre" class="label">Area:</label>
                            <select name="Area" id="Tipo">
                                <option value="MOTOCICLETA">COMBUSTIBLE</option>
                                <option value="MOTOCICLETA">CAMIONETA</option>
                                <option value="MOTOCICLETA">AUTOMÓVIL</option>
                            </select>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12  form-label">
                            <label for="nombre" class="label">Correo Electronico:</label>
                            <select name="Correo" id="Tipo">
                                <option value="MOTOCICLETA">COMBUSTIBLE</option>
                                <option value="MOTOCICLETA">CAMIONETA</option>
                                <option value="MOTOCICLETA">AUTOMÓVIL</option>
                            </select>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12  form-label">
                            <label for="nombre" class="label">Vinculación:</label>
                            <input type="text" name="usuario" class="form-control" id="exampleFormControlInput1"
                                placeholder="Usuario" required autofocus>
                        </div>
                    </div> -->

                    <!-- DIV FINAL -->
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 form-footer">
                        <a class="text-blue  " href="">Olvido su clave?</a>
                        <a class="text-white  " href="menu.html"><button type="submit"
                                class="btn btn-success">Login</button></a>
                        <button type="button" onclick="mostrarOcultar(this)" class="btn btn-warning">
                            <span id="iconoEmoji">👁️</span> <span id="textoBoton">Mostrar</span>
                        </button>
                    </div>

                </form>
            </div>
        <!-- </section> -->






    </div>


    </div>
    <script>
        function mostrarOcultar(boton) {
            // Seleccionamos el único input por su ID
            var pass1 = document.getElementById("miPassword1");

            var texto = document.getElementById("textoBoton");
            var emoji = document.getElementById("iconoEmoji");

            // Evaluamos el estado de este único input
            if (pass1.type === "password") {
                pass1.type = "text";

                texto.textContent = "Ocultar";
                emoji.textContent = "🙈";
                boton.classList.replace("btn-warning", "btn-danger");
            } else {
                pass1.type = "password";

                texto.textContent = "Mostrar";
                emoji.textContent = "👁️";
                boton.classList.replace("btn-danger", "btn-warning");
            }
        }
    </script>

    <script type="text/javascript">
        // Al cargar la página, forzamos un nuevo estado en el historial
        history.pushState(null, null, location.href);
        window.onpopstate = function () {
            // Si el usuario presiona "Atrás", lo enviamos hacia adelante de nuevo
            history.go(1);
        };
    </script>
<script> 
document.getElementById('form-vehiculo').addEventListener('submit', function(e) {
    e.preventDefault(); // Evita que la página se recargue

    // Agrupa automáticamente todos los campos del formulario
    const formData = new FormData(this);

    fetch('RegistroVehiculo.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        const mensajeDiv = document.getElementById('mensaje');
        if (data.status === 'success') {
            mensajeDiv.innerHTML = `<p style="color:green;">${data.message}</p>`;
            this.reset(); // Limpia el formulario
        } else {
            mensajeDiv.innerHTML = `<p style="color:red;">Error: ${data.message}</p>`;
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
});

</script>
    <!-- <script src="assets/js/scripts.js"></script>  -->
    <!-- Enlace al script en la otra carpeta (js/) -->
    <!-- <script src="assets/js/bootstrap.bundle.js"></script> -->
    <!-- <script src="assets/js/scripts.js"></script> -->
</body>

</html>