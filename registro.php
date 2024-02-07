<?php

require_once "clases/Conexion.php";
$obj = new conectar();
$conexion = $obj->conexion();

$sql = "SELECT * from usuarios where email='admin'";
$result = mysqli_query($conexion, $sql);
$validar = 0;
if (mysqli_num_rows($result) > 0) {
	header("location:index.php");
}
?>


<!DOCTYPE html>
<html>

<head>
	<title>Registro</title>
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
	<script src="librerias/jquery-3.2.1.min.js"></script>
	<script src="js/funciones.js"></script>
	<link href="https://fonts.cdnfonts.com/css/source-sans-pro" rel="stylesheet">
	<style>
		body {
			background-color: withe;
			/* Fondo gris */
		}

		.panel {
			border: 1px solid #000;
		}

		.btn {
			border: 1px solid #000;
		}

		.container {
			margin-top: 50px;
		}

		.panel-heading {
			text-align: center;
		}

		.panel-body {
			text-align: center;
		}

		label {
			text-align: left;
		}

		#registro,
		.btn-default {
			display: block;
			margin: 10px auto;
		}
	</style>
</head>

<body>
	<br><br><br>
	<div class="container">
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<div class="panel">
					<div class="panel-heading">
						<img class="logo" src="img/logo_new.png">
					</div>
					<div class="panel-body">
						<p><strong>Registrar vendedor</strong></p>
						<form id="frmRegistro">
							<!-- <label>Nombre</label>-->
							<input type="text" class="form-control input-sm" name="nombre" id="nombre"
								placeholder="Nombre">
							<br>
							<!-- <label>Apellido</label> -->
							<input type="text" class="form-control input-sm" name="apellido" id="apellido"
								placeholder="Apellido">
							<br>
							<!-- <label>Usuario</label> -->
							<input type="text" class="form-control input-sm" name="usuario" id="usuario"
								placeholder="Usuario">
							<br>
							<!-- <label>Password</label> -->
							<input type="text" class="form-control input-sm" name="password" id="password"
								placeholder="Password">
							<br>
							<p></p>
							<span class="btn" id="registro"><strong>Registrar</strong></span>
							<a href="index.php" class="btn btn-default btn-sm">Regresar al login</a>
						</form>
					</div>
				</div>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
</body>

</html>


<script type="text/javascript">
	$(document).ready(function () {
		$('#registro').click(function () {

			vacios = validarFormVacio('frmRegistro');

			if (vacios > 0) {
				alert("Debes llenar todos los campos!!");
				return false;
			}

			datos = $('#frmRegistro').serialize();
			$.ajax({
				type: "POST",
				data: datos,
				url: "procesos/regLogin/registrarUsuario.php",
				success: function (r) {
					alert(r);

					if (r == 1) {
						alert("Agregado con exito");
					} else {
						alert("Fallo al agregar :(");
					}
				}
			});
		});
	});
</script>