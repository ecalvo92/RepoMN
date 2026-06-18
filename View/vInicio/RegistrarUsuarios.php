<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/RepoMN/Controller/InicioController.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/RepoMN/View/LayoutExterno.php';
?>

<!doctype html>
<html lang="en">

<?php
    ImportCSS();
?>

<body>
    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="card" style="max-width: 420px; width: 100%">
            <div class="card-body p-5">
                <div class="text-center mb-3">
                    <a href="index.html" class="mb-2 d-inline-block"><img src="../images/logo-fidelitas.png" alt=""
                            width="130" />
                    </a>
                    <h1 class="card-title mb-3 h5">Registrar Usuarios</h1>
                </div>

                <?php
                    if(isset($_POST["Mensaje"]))
                    {
                        echo $_POST["Mensaje"];
                    }
                ?>

                <form action="" method="post" class="needs-validation mt-3" id="formRegistrarUsuarios">

                    <div class="mb-3">
                        <label for="identificacion" class="form-label">Identificación</label>
                        <input id="identificacion" name="identificacion" type="text" class="form-control" />
                    </div>

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input id="nombre" name="nombre" type="text" class="form-control" />
                    </div>

                    <div class="mb-3">
                        <label for="correoElectronico" class="form-label">Correo Electrónico</label>
                        <input id="correoElectronico" name="correoElectronico" type="text" class="form-control" />
                    </div>

                    <div class="mb-3">
                        <label for="contrasenna" class="form-label">Contraseña</label>
                        <input id="contrasenna" name="contrasenna" type="password" class="form-control"/>
                    </div>

                    <button id="btnRegistrar" name="btnRegistrar" type="submit" class="btn btn-primary w-100">Procesar</button>
                </form>

                <div class="text-center mt-3 small text-muted">
                    ¿Ya tiene una cuenta?
                    <a href="IniciarSesion.php" class="link-primary">Inicie Sesión</a>
                </div>
            </div>
        </div>
    </div>

    <?php
        ImportJS();
    ?>
    <script src="../js/registro.js"></script>
</body>

</html>