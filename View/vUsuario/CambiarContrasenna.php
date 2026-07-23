<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/RepoMN/Controller/UsuarioController.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/RepoMN/View/LayoutInterno.php';
?>

<!DOCTYPE html>
<html lang="en">

<?php
    ImportCSS();
?>

<body>
    
    <?php
        Navbar();
        Sidebar();
    ?>

    <main id="content" class="content py-10">
        <div class="container-fluid">

            <!-- Page Header -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="d-flex align-items-center gap-3">
                        <div>
                            <h1 class="fs-4 mb-0 fw-semibold">Seguridad de cuenta</h1>
                            <p class="text-muted mb-0 small">Actualiza tu contraseña para mantener tu cuenta protegida</p>
                        </div>
                    </div>
                    <hr class="mt-3 mb-5">
                </div>
            </div>
            
            <div class="row g-4 justify-content-center">

                <!-- Formulario -->
                <div class="col-xl-6 col-lg-6 col-md-8">

                    <?php
                        if(isset($_POST["Mensaje"]))
                        {
                            echo '<div class="alert alert-danger text-center">' 
                                 . $_POST["Mensaje"] . '</div>';
                        }
                    ?>

                    <div class="card form-card">
                        <div class="card-header">
                            <h5 class="mb-0 text-white fw-semibold">
                                <i class="ti ti-lock me-2"></i>Cambiar contraseña
                            </h5>
                        </div>

                        <div class="card-body p-4">

                            <form id="formCambiarContrasenna" action="" method="POST">

                                <!-- Nueva contraseña -->
                                <div class="mb-3">
                                    <label for="nuevaContrasenna" class="form-label fw-medium">
                                        <i class="ti ti-key me-1 text-muted"></i>Contraseña nueva
                                    </label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="nuevaContrasenna" name="nuevaContrasenna" placeholder="Ingresa tu nueva contraseña" autocomplete="new-password">
                                    </div>
                                </div>

                                <!-- Confirmar contraseña -->
                                <div class="mb-3">
                                    <label for="confirmarContrasenna" class="form-label fw-medium">
                                        <i class="ti ti-lock me-1 text-muted"></i>Confirmar contraseña
                                    </label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="confirmarContrasenna" name="confirmarContrasenna" placeholder="Repite tu nueva contraseña" autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="d-grid gap-2">
                                    <button type="submit" id="btnCambiarContrasenna" name="btnCambiarContrasenna" class="btn btn-primary">
                                        <i class="ti ti-device-floppy me-2"></i>Procesar
                                    </button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>

                <!-- Panel de consejos de seguridad -->
                <div class="col-xl-3 col-lg-4 col-md-8">
                    <div class="card security-info-card h-100">
                        <div class="card-body p-4">
                                       
                            <div class="security-tip">
                                <i class="ti ti-ban"></i>
                                <div>No uses contraseñas que hayas utilizado anteriormente.</div>
                            </div>
                            <div class="security-tip">
                                <i class="ti ti-user-shield"></i>
                                <div>No compartas tu contraseña con nadie.</div>
                            </div>
                            <div class="security-tip">
                                <i class="ti ti-refresh"></i>
                                <div>Cambia tu contraseña cada 3 a 6 meses.</div>
                            </div>
                            <div class="security-tip">
                                <i class="ti ti-dice-5"></i>
                                <div>Combina letras, números y símbolos para mayor seguridad.</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <?php
                Footer();
            ?>

        </div>
    </main>

    <?php
        ImportJS();
    ?>
    <script src="../js/cambiarContrasenna.js"></script>

</body>

</html>