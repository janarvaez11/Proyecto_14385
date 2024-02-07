<?php
session_start();
if (isset($_SESSION['usuario'])) {
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Pizzeria - SistemiWeb - Perfil</title>

        <head>
            <title>inicio</title>
            <?php require_once "menu.php"; ?>
        </head>
    </head>

    <body>
        <main class="contenedor principal container">
            <div class="contenido">
                <div class="perfil">
                    <div class="perfil-imagen">
                        <img id="perfil-avatar" src="../img/descargar.svg" alt="perfil">
                    </div>
                    <div class="perfil-datos">
                        <div class="perfil-datos-fila perfil-datos-nickname">
                            <h3 id="perfil-nickname"></h3>
                        </div>
                        <div class="perfil-datos-fila perfil-datos-nombres">
                            <strong>Nombre: </strong>
                            <?php echo $_SESSION['usuario']; ?>
                        </div>
                        <div class="perfil-datos-fila perfil-datos-rol">
                            <strong>rol: </strong>
                            <span id="perfil-rol">Vendedor</span>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <footer class="container">
            <div class="social"></div>
            <div class="marca-licencia">
                <p>© 2024 - Online - Store</p>
            </div>
        </footer>
    </body>

    </html>
    <?php
} else {
    header("location:../index.php");
}
?>