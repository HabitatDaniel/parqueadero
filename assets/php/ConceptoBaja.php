<html>
<head>
	<link rel="stylesheet" href="Style/styleWelcome.css">
</head>
<body>



<style>
  .panel {  background-color:red; 	  position: absolute;
    top: 40px; /* Posición desde arriba */
	float:left; padding: 10px;
	width:82%;
	height:85%; border: 1px solid #ccc; }
	
	table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

<script>
  function showPanel(panelId) {
    // Ocultar todos los paneles
    document.querySelectorAll('.panel').forEach(p => p.style.display = 'none');
    // Mostrar el panel seleccionado
    document.getElementById(panelId).style.display = 'block';
  }
</script>

	<div class="contenedor">
		<div class="caja-pequena">CONCEPTO DE BAJAS
		<menu>
		<button  onclick="showPanel('panel1')"class="btn-outlineItem">SOLICITUDES</button>
		<button  onclick="showPanel('panel2')"class="btn-outlineItem">VALIDACIÓN</button>
		<button class="btn-outlineItem">PRESENTACIÓN</button>
		<a href="CB/ConceptoBaja.php" ><button class="btn-outlineItem">FORMATO</button></a>
		<a href="ConceptoBaja.php" target="_blank"><button class="btn-outlineItem">CONCEPTOS BAJA</button></a>
		</menu>
		
		
		</div>
		<div class="caja-grande">
			<div id="panel1" class="panel">Contenido del Panel 1
			<table>
  <tr>
    <th>ID</th>
    <th>Fecha</th>
    <th>Área Emisora</th>
	<th>Descripción</th>
	<th>Placa Principal</th>
	<th>Otras Placas</th>
	<th>Marca</th>
	<th>Modelo</th>
	<th>Serie</th>
	<th>Unidad</th>
	<th>Concepto</th>
	
	
	
	
	
  </tr>
  <tr>
    <td>Alfreds Futterkiste</td>
    <td>Maria Anders</td>
    <td>Germany</td>
  </tr>
  <tr>
    <td>Centro comercial Moctezuma</td>
    <td>Francisco Chang</td>
    <td>Mexico</td>
  </tr>
  <tr>
    <td>Ernst Handel</td>
    <td>Roland Mendel</td>
    <td>Austria</td>
  </tr>
  <tr>
    <td>Island Trading</td>
    <td>Helen Bennett</td>
    <td>UK</td>
  </tr>
  <tr>
    <td>Laughing Bacchus Winecellars</td>
    <td>Yoshi Tannamuri</td>
    <td>Canada</td>
  </tr>
  <tr>
    <td>Magazzini Alimentari Riuniti</td>
    <td>Giovanni Rovelli</td>
    <td>Italy</td>
  </tr>
</table>

			</div>
			
			<div id="panel2" class="panel" style="display:none;">Contenido del Panel 2
			<img src="https://subredeintenorte-my.sharepoint.com/personal/activosfijos_subrednorte_gov_co/Documents/Aplicaciones/Microsoft%20Forms/SOLICITUD%20DE%20CONCEPTO%20DE%20%20BAJAS/Pregunta%203/1739221554223365593838020583178_Javier%20Aristizabal%20B.jpg" alt="alternatetext"></div>
		</div>

	



</body>
</html>
