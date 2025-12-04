<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/RepoMN/View/LayoutInterno.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/RepoMN/Controller/UsuarioController.php';

  $resultado = ConsultarUsuarios();
?>

<!DOCTYPE html>
<html lang="en">

<?php
    ShowCSS();
  ?>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

            <?php ShowMenu(); ?>

            <div class="layout-page">

                <?php ShowNav(); ?>

                <div class="content-wrapper">

                    <div class="container-xxl flex-grow-1 container-p-y">

                        <div class="card mb-4 mt-4">

                            <div class="d-flex justify-content-between align-items-center mb-3 position-relative">
                                <h4 class="card-header mb-0 text-center flex-grow-1">Usuarios</h4>
                            </div>

                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <div class="card-body">

                                        <?php
                                            if(isset($_POST["Mensaje"]))
                                            {
                                                echo '<div class="alert alert-primary centrado">' . $_POST["Mensaje"] . '</div>';
                                            }
                                        ?>

                                        <table id="tProductos" class="table mb-4">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Identificación</th>
                                                    <th>Nombre</th>
                                                    <th>Correo Electrónico</th>
                                                    <th>Estado</th>
                                                    <th>Perfil</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php foreach ($resultado as $fila): ?>
                                                <tr>
                                                    <td><?= $fila['ConsecutivoUsuario'] ?></td>
                                                    <td><?= $fila['Identificacion'] ?></td>
                                                    <td><?= $fila['Nombre'] ?></td>
                                                    <td><?= $fila['CorreoElectronico'] ?></td>
                                                    <td><?= $fila['EstadoDescripcion'] ?></td>
                                                    <td><?= $fila['NombrePerfil'] ?></td>
                                                    <td>
                                                        <div style="display:flex; align-items:center; gap:10px;">

                                                            <!-- Formulario para cambiar estado -->
                                                            <form method="POST" action=""
                                                                style="margin:0; display:inline;">

                                                                <input type="hidden" name="ConsecutivoUsuario"
                                                                    value="<?= $fila['ConsecutivoUsuario'] ?>">

                                                                <button type="submit" name="btnCambiarEstado"
                                                                    style="background:none; border:none; color:#0d6efd; cursor:pointer; padding:0;">
                                                                    <i class="fa fa-refresh"
                                                                        style="font-size:22px;"></i>
                                                                </button>
                                                            </form>

                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>

                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <?php ShowFooter(); ?>

                    <div class="content-backdrop fade"></div>
                </div>
            </div>
        </div>
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>

    <?php
      ShowJS();
    ?>
    <script src="../js/VerProductos.js"></script>

</body>

</html>