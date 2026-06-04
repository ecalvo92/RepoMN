<?php
    include_once '../LayoutExterno.php';
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
                    <h1 class="card-title mb-5 h5">Iniciar Sesión</h1>
                </div>

                <form class="needs-validation mt-3" novalidate>
                    <div class="mb-3">
                        <label for="identificacion" class="form-label">Identificación</label>
                        <input id="identificacion" type="text" class="form-control" required autofocus />
                    </div>

                    <div class="mb-3">
                        <label for="contrasenna" class="form-label d-flex justify-content-between">
                            <span>Contraseña</span>
                            <a href="RecuperarAcceso.php" class="small link-primary">¿Olvidó su contraseña?</a>
                        </label>
                        <input id="contrasenna" type="password" class="form-control" required minlength="6" />
                    </div>

                    <button class="btn btn-primary w-100" type="submit">Procesar</button>
                </form>

                <div class="text-center mt-3 small text-muted">
                    ¿No tiene una cuenta?
                    <a href="RegistrarUsuarios.php" class="link-primary">Regístrese</a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
