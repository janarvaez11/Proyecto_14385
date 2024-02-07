<?php

require_once "clases/Conexion.php";
$obj = new conectar();
$conexion = $obj->conexion();

$sql = "SELECT * from usuarios where email='admin'";
$result = mysqli_query($conexion, $sql);
$validar = 0;
if (mysqli_num_rows($result) > 0) {
    $validar = 1;
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Login de usuario</title>
    <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
    <script src="librerias/jquery-3.2.1.min.js"></script>
    <script src="js/funciones.js"></script>
    <link rel="stylesheet" type="text/css" href="css/estilos_login.css">
    <link href="https://fonts.cdnfonts.com/css/source-sans-pro" rel="stylesheet">
</head>

<body>
    <br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <div class="panel  panel-succesful">
                    <div class="panel-heading">
                        <img class="logo" src="img/logo_new.png">
                    </div>
                    <div class="panel-body">
                        <p><strong>Sistema de ventas y almacen</strong></p>

                        <form id="frmLogin">
                            <!-- <label>Usuario</label> -->
                            <input type="text" class="form-control input-sm" name="usuario" id="usuario"
                                placeholder="Usuario">
                            <br>
                            <!-- <label>Password</label> -->
                            <input type="password" name="password" id="password" class="form-control input-sm"
                                placeholder="Contraseña">
                            <span class="btn" id="entrarSistema"><strong>Entrar</strong></span>
                            <?php if (!$validar): ?>
                                <a href="registro.php" class="btn btn-default btn-sm">Registrar</a>
                            <?php endif; ?>
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
        $('#entrarSistema').click(function () {

            vacios = validarFormVacio('frmLogin');

            if (vacios > 0) {
                alert("Debes llenar todos los campos!!");
                return false;
            }

            datos = $('#frmLogin').serialize();
            $.ajax({
                type: "POST",
                data: datos,
                url: "procesos/regLogin/login.php",
                success: function (r) {

                    if (r == 1) {
                        window.location = "vistas/inicio.php";
                    } else {
                        alert("No se pudo acceder :(");
                    }
                }
            });
        });
    });
</script>