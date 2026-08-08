
<?php
session_start();

$nombre = $_POST['usuario'];
$clave = $_POST['clave'];

$conn = new mysqli("Localhost", "root", "", "parqueadero");
 

$consulta = mysqli_query ($conn, "SELECT * FROM empleado WHERE ccEmpleado = '$nombre' AND Clave = '$clave' LIMIT 1");  

if(!$consulta){ 


	
 header("location: index.php");
    echo mysqli_error($mysqli);
	  
   
} 



if($usuario = mysqli_fetch_assoc($consulta)) {
	 $_SESSION['usuario'] = $_POST['usuario'];
    header("location: welcome.php");
} else {
	//header("location: index.html");
	// Código PHP
$mensaje = "Hola desde PHP";

// Imprimir bloque JS
echo "<script>
        alert('$mensaje');
      </script>";
    
	 header("location: error.php");
	
}
?>