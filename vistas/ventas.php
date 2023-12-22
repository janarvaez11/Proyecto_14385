<?php 
	session_start();
	if(isset($_SESSION['usuario'])){
		
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Ventas</title>
	<?php require_once "menu.php"; ?>
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
	<style>
		body {
			background-color: #f8f9fa; /* Fondo gris claro */
		}
		.container {
			margin-top: 50px;
			text-align: center; /* Centrar el contenido del contenedor */
		}
		h1 {
			margin-bottom: 20px;
		}
		.btn {
			margin: 5px;
			transition: background-color 0.3s ease; /* Transición suave del color de fondo */
		}
		.btn:hover {
			background-color: #343a40; /* Color de fondo oscuro al pasar el ratón */
		}
	</style>
</head>
<body>

	<div class="container">
		 <h1>Venta de productos</h1>
		 <div class="row">
		 	<div class="col-sm-12">
				
		 		<span class="btn btn-danger" id="ventaProductosBtn">Vender producto</span>
		 		<span class="btn btn-info" id="ventasHechasBtn">Ventas hechas</span>
				
		 	</div>
		 </div>
		 <div class="row">
		 	<div class="col-sm-12">
		 		<div id="ventaProductos"></div>
		 		<div id="ventasHechas"></div>
		 	</div>
		 </div>
	</div>
</body>
</html>

	
	<script type="text/javascript">
		$(document).ready(function(){
			$('#ventaProductosBtn').click(function(){
				esconderSeccionVenta();
				$('#ventaProductos').load('ventas/ventasDeProductos.php');
				$('#ventaProductos').show();
			});
			$('#ventasHechasBtn').click(function(){
				esconderSeccionVenta();
				$('#ventasHechas').load('ventas/ventasyReportes.php');
				$('#ventasHechas').show();
			});
		});

		function esconderSeccionVenta(){
			$('#ventaProductos').hide();
			$('#ventasHechas').hide();
		}

	</script>

<?php 
	}else{
		header("location:../index.php");
	}
 ?>