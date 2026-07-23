<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/RepoMN/Controller/UsuarioController.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/RepoMN/View/LayoutInterno.php';

    $datos = ConsultarUsuario();
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
                            <h1 class="fs-4 mb-0 fw-semibold">Información personal</h1>
                            <p class="text-muted mb-0 small">Actualiza tu información personal para mantener tu cuenta al día</p>
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
                                <i class="ti ti-user me-2"></i>Cambiar información personal
                            </h5>
                        </div>

                        <div class="card-body p-4">

                            <form id="formCambiarPerfil" action="" method="POST">

                                <div class="mb-3">
                                    <label for="identificacion" class="form-label fw-medium">
                                        <i class="ti ti-id me-1 text-muted"></i>Identificación
                                    </label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="identificacion" name="identificacion"
                                        value="<?php echo $datos['Identificacion']; ?>"
                                        onkeyup="ConsultarNombreAPI();">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="nombre" class="form-label fw-medium">
                                        <i class="ti ti-user me-1 text-muted"></i>Nombre
                                    </label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="nombre" name="nombre"
                                        value="<?php echo $datos['Nombre']; ?>">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="correoElectronico" class="form-label fw-medium">
                                        <i class="ti ti-mail me-1 text-muted"></i>Correo Electrónico
                                    </label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="correoElectronico" name="correoElectronico"
                                        value="<?php echo $datos['CorreoElectronico']; ?>">
                                    </div>
                                </div>

                                <div class="d-grid gap-2">
                                    <button type="submit" id="btnCambiarPerfil" name="btnCambiarPerfil" class="btn btn-primary">
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

                            <h6 class="fw-semibold mb-3">
                                <i class="ti ti-info-circle me-2"></i>Recomendaciones
                            </h6>

                            <div class="security-tip">
                                <i class="ti ti-id"></i>
                                <div>Asegúrate de que tu identificación sea válida y esté actualizada.</div>
                            </div>
                            <div class="security-tip">
                                <i class="ti ti-sparkles"></i>
                                <div>El nombre se completará automáticamente al ingresar la identificación.</div>
                            </div>
                            <div class="security-tip">
                                <i class="ti ti-mail-check"></i>
                                <div>Verifica que tu correo electrónico sea válido, ya que se usará para notificaciones.</div>
                            </div>
                            <div class="security-tip">
                                <i class="ti ti-alert-triangle"></i>
                                <div>Cualquier cambio en tu información quedará registrado en el sistema.</div>
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
    <script src="../js/cambiarPerfil.js"></script>
    <script src="../js/nombresApi.js"></script>

</body>

</html>