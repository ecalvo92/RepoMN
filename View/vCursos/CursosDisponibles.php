<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/RepoMN/Controller/CursoController.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/RepoMN/View/LayoutInterno.php';

    $datos = ConsultarCursosDisponibles();
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
            <div class="row mb-4 justify-content-center">
                <div class="col-xl-11 col-lg-11 col-md-12">
                    
                    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                        <div>
                            <h1 class="fs-4 mb-0 fw-semibold">Cursos Disponibles</h1>
                            <p class="text-muted mb-0 small">Aquí puedes ver los cursos disponibles para matricularte</p>
                        </div>
                    </div>
                    
                    <hr class="mt-3 mb-5">
                </div>
            </div>
            
            <div class="row g-4 justify-content-center">

                <div class="col-xl-11 col-lg-11 col-md-12">

                    <?php
                        if(isset($_POST["Mensaje"]))
                        {
                            echo '<div class="alert alert-danger text-center">' 
                                . $_POST["Mensaje"] . '</div>';
                        }
                    ?>

                    <?php if(empty($datos)): ?>
                        <div class="text-center py-5 text-muted">
                            <i class="ti ti-mood-empty fs-1 mb-3 d-block"></i>
                            <p class="fs-5">No hay cursos disponibles en este momento.</p>
                        </div>
                    <?php else: ?>

                    <div class="row g-4">
                        <?php foreach($datos as $curso):
                            $fechaInicio = date('d-m-Y g:i A', strtotime($curso['Inicio']));
                            $fechaFin    = date('d-m-Y g:i A', strtotime($curso['Fin']));
                            $activo      = $curso['Activo'] === 'Activo';
                        ?>
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="card h-100 shadow-sm card-curso">
                                <img src="<?php echo htmlspecialchars($curso['Imagen']); ?>"
                                     alt="<?php echo htmlspecialchars($curso['Nombre']); ?>"
                                     class="card-img-top mt-3"
                                     style="height:180px; object-fit:contain;">
                                <div class="card-body d-flex flex-column gap-2">
                                    <h4 class="card-title fw-semibold mb-1">
                                        <?php echo htmlspecialchars($curso['Nombre']); ?>
                                    </h4>
                                    <h6 class="card-title fw-semibold mb-1">
                                        <?php echo htmlspecialchars($curso['NombreProfesor']); ?>
                                    </h6>
                                    <div class="d-flex align-items-center gap-2 text-muted small">
                                        <i class="ti ti-users"></i>
                                        <span>Capacidad: <?php echo (int)$curso['Cantidad']; ?></span>
                                    </div>
                                    <div class="d-flex align-items-center gap-2 text-muted small">
                                        <i class="ti ti-calendar"></i>
                                        <span>Inicio: <?php echo $fechaInicio; ?></span>
                                    </div>
                                    <div class="d-flex align-items-center gap-2 text-muted small">
                                        <i class="ti ti-calendar-off"></i>
                                        <span>Fin: <?php echo $fechaFin; ?></span>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-between align-items-center">
                                    


                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>

                    <?php endif; ?>

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
    
</body>

</html>