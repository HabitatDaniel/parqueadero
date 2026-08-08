<?php 
// 1. Cargamos la URL desde tu archivo .txt
$url_base = trim(file_get_contents("enlace.txt")); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Notificación y Redirección</title>
<style>
    /* Estilos básicos para la modal */
    dialog {
        padding: 20px;
        border-radius: 8px;
        border: none;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }
    dialog::backdrop {
        background-color: rgba(0, 0, 0, 0.5);
    }
</style>
</head>
<body>


<button id="abrirModal" onclick="miFuncion()"  hidden>Ejecutar</button >
<!-- Estructura de la notificación (Modal) -->
<dialog id="miNotificacion">
    <h2>¡Error!</h2>
    <p>El usuario y la clave no son correctas. Intente Nuevamente.</p>
    <button id="cerrarYRedirigir">Aceptar</button>
</dialog>

<script>
    const modal = document.getElementById('miNotificacion');
    const btnAbrir = document.getElementById('abrirModal');
    const btnCerrar = document.getElementById('cerrarYRedirigir');

    // Mostrar modal
    btnAbrir.addEventListener('click', () => {
        modal.showModal();
    });
	  function miFuncion() {
    //alert("Código ejecutado automáticamente");
	    modal.showModal();
  }

  // Ejecutar automáticamente al cargar
  window.onload = miFuncion;

    // Cerrar modal y abrir nueva ventana/pestaña
    btnCerrar.addEventListener('click', () => {
        modal.close();
		// header("location: index.html");
		 
       // window.open('https://www.google.com', '_blank'); // Abre en nueva pestaña
		window.open('/parqueadero/index.php', '_self'); // Abre en nueva pestaña
    });
</script>

</body>
</html>
