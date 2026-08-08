<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/StyleMenuWelcome.css">

    <link rel="stylesheet" href="../css/styles-box.css">
<body>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="#">About</a>
  <a href="#">Services</a>
  <a href="#">Clients</a>
 
  
  
</div>


<div id="contenedor"> 
    <div id="cabecera1"> 
         
	<?php
			session_start();
			if (!isset($_SESSION['usuario'])) {
			header("Location: index.html"); // Volver si no hay sesión
			}
			echo "Bienvenido, " . $_SESSION['usuario'];?>
			<!-- Opción 1: Enlace a script de cierre (PHP)  <a href="#"><button onclick="cerrarSesion()">Cerrar Sesión</button></a> --></h1>
    </div> 
    <div id="cuerpo1"> 
       <div id="lateral1"> 
         <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
       </div> 
       <div id="otrolado1"> 
          <img src="bannerlateral.gif" width="120" height="20" alt=""> 
       </div> 
       <div id="principal1"> <H1>Proceso Ingresos - Activos Fijos </h1>
       </div> 
    </div> 
    <div id="pie1"> 
       © 2005 DesarrolloWeb.com 
    </div> 
	
	
	
	
	

 
  <div id="cuerpo"> 
       <div id="lateral" height="900"> 
          <ul> 
             <li><a href="#">Enlace 1</a> 
             <li><a href="#">Vínculo 2</a> 
             <li><a href="#">Otro enlace</a> 
             <li><a href="#">Link chulo</a> 
             <li><a href="#">Más enlaces</a> 
             <li><a href="#">Otro último</a> 
          </ul> 
       </div> 
       <div id="otrolado"> 
          <img src="bannerlateral.gif" width="120" height="20" alt=""> 
       </div> 
       <div id="principal"> 
          Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nulla condimentum commodo orci. Nulla eget purus nec massa 
          ... 
       </div> 
    </div> 
    <div id="pie"> 
       © 2005 DesarrolloWeb.com 
    </div> 

</div>

    <!-- Contenedor -->
     <div class="contenedor">
        <nav>
            <div class="logo borde">Logo</div>
            <div class="menu borde">Menu</div>
            <div class="login borde">Login</div>
        </nav>
        <header class="borde"></header>
        <div class="titulo borde">portafolio</div>
        <section class="portafolio">
            <div class="port-col-arr borde">arriba
               <a href="../../pages/modules/products/buscar.php">
                <img src="../img/vehiculo.jfif" alt="Girl in a jacket" style="width:100%;height:90%;">
		
                
               </a>
            </div>
            <div class="port-col borde">centro</div>
            <div class="port-col borde">abajo</div>
        </section>
        <div class="titulo borde" >NOSOTROS</div>
        <section class="nosotros">
            <div class="nos-fila borde">
                <div class="nos-fila-col-ext-izq borde">arriba izq</div>
                <div class="nos-fila-col-cnt borde">arriba centro</div>
                <div class="nos-fila-col-ext-der borde"></div>
            </div>
            <div class="nos-fila borde">
                <div class="nos-fila-col-ext-der borde"></div>
                <div class="nos-fila-col-cnt borde">centro centro</div>
                <div class="nos-fila-col-ext-izq borde">centro derecha</div>
            </div>
            <div class="nos-fila borde">
                <div class="nos-fila-col-ext-izq borde">abajo izq</div>
                <div class="nos-fila-col-cnt borde">abajo centro</div>
                <div class="nos-fila-col-ext-der borde"></div>
            </div>
        </section>
        <div class="titulo borde">Contáctenos</div>
        <section class="contacto">
            <div class="cont-col borde">formulario</div>
            <div class="cont-col borde">
                <div class="cont-col-fila-arr borde">mapa</div>
                <div class="cont-col-fila-cnt borde">contacto</div>
                <div class="cont-col-fila-abj borde">redes</div>
            </div>
        </section>
        <footer class="borde">footer</footer>
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
 

	

</body>
</html>
