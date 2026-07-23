<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/RepoMN/Controller/CursoController.php';
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
                            <h1 class="fs-4 mb-0 fw-semibold">Curso</h1>
                            <p class="text-muted mb-0 small">Completa la información del curso que deseas agregar</p>
                        </div>
                    </div>
                    <hr class="mt-3 mb-5">
                </div>
            </div>
            
            <div class="row g-4 justify-content-center">

                <!-- Formulario -->
                <div class="col-xl-8 col-lg-8 col-md-10">
                    
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
                                <i class="ti ti-book me-2"></i>Agregar información del curso
                            </h5>
                        </div>

                        <div class="card-body p-4">

                            <form id="formAgregarCurso" action="" method="POST" enctype="multipart/form-data">

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="nombre" class="form-label fw-medium">
                                            <i class="ti ti-id me-1 text-muted"></i>Nombre
                                        </label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="nombre" name="nombre">
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="cantidad" class="form-label fw-medium">
                                            <i class="ti ti-user me-1 text-muted"></i>Cantidad Permitida
                                        </label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="cantidad" name="cantidad">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="fechaInicio" class="form-label fw-medium">
                                            <i class="ti ti-calendar me-1 text-muted"></i>Fecha de Inicio
                                        </label>
                                        <div class="input-group">
                                            <input type="date" class="form-control" id="fechaInicio" name="fechaInicio">
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="fechaFin" class="form-label fw-medium">
                                            <i class="ti ti-calendar me-1 text-muted"></i>Fecha de Fin
                                        </label>
                                        <div class="input-group">
                                            <input type="date" class="form-control" id="fechaFin" name="fechaFin">
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="imagen" class="form-label fw-medium">
                                        <i class="ti ti-image me-1 text-muted"></i>Imagen
                                    </label>
                                    <div class="input-group">
                                        <input type="file" class="form-control" id="imagen" name="imagen" accept=".png,image/png">
                                    </div>
                                </div>  

                                <div class="d-grid gap-2">
                                    <button type="submit" id="btnAgregarCurso" name="btnAgregarCurso" class="btn btn-primary">
                                        <i class="ti ti-device-floppy me-2"></i>Procesar
                                    </button>
                                </div>

                            </form>

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
    <script src="../js/agregarCurso.js"></script>

</body>

</html>