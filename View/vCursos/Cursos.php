<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/RepoMN/Controller/CursoController.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/RepoMN/View/LayoutInterno.php';

    $datos = ConsultarCursosProfesor();
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
                            <h1 class="fs-4 mb-0 fw-semibold">Mis Cursos</h1>
                            <p class="text-muted mb-0 small">Aquí puedes ver los cursos que estás impartiendo</p>
                        </div>
                    </div>
                    <hr class="mt-3 mb-5">
                </div>
            </div>
            
            <div class="row g-4 justify-content-center">

                <!-- Formulario -->
                <div class="col-xl-10 col-lg-10 col-md-12">
                    
                    <?php
                        if(isset($_POST["Mensaje"]))
                        {
                            echo '<div class="alert alert-danger text-center">' 
                                . $_POST["Mensaje"] . '</div>';
                        }
                    ?>
                
                    <div class="card form-card">
                         <div class="card-header"></div>

                        <div class="card-body p-4">

                            <table class="table" id="tablaCursos">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre del curso</th>
                                        <th>Cantidad</th>
                                        <th>Fecha de inicio</th>
                                        <th>Fecha de fin</th>
                                        <th>Imagen</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                            <tbody>

                                <?php
                                    foreach($datos as $curso){
                                        echo '<tr>';
                                        echo '<td>' . $curso['ConsecutivoCurso'] . '</td>';
                                        echo '<td>' . $curso['Nombre'] . '</td>';
                                        echo '<td>' . $curso['Cantidad'] . '</td>';
                                        echo '<td>' . $curso['Inicio'] . '</td>';
                                        echo '<td>' . $curso['Fin'] . '</td>';
                                        echo '<td><img src="' . $curso['Imagen'] . '" alt="" width="50"></td>';
                                        echo '<td>' . $curso['Activo'] . '</td>';
                                        echo '<td>
                                                <a href="EditarCurso.php?id=' . $curso['ConsecutivoCurso'] . '" class="btn btn-sm btn-primary">Editar</a>
                                                <a href="EliminarCurso.php?id=' . $curso['ConsecutivoCurso'] . '" class="btn btn-sm btn-danger">Eliminar</a>
                                            </td>';
                                        echo '</tr>';
                                    }
                                ?>

                            </tbody>
                            </table>

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