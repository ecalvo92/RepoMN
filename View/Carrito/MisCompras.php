<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/RepoMN/View/LayoutInterno.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/RepoMN/Controller/CarritoController.php';

  $resultado = ConsultarCompras();
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
                                <h4 class="card-header mb-0 text-center flex-grow-1">Mis Compras</h4>
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
                                                    <th>Factura</th>
                                                    <th>Fecha</th>
                                                    <th>Cantidad Unidades</th>
                                                    <th>Total Cancelado</th>
                                                    <th>Medio de Pago</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php foreach ($resultado as $fila): ?>
                                                <tr>
                                                    <td># <?= $fila['ConsecutivoFactura'] ?></td>
                                                    <td><?= $fila['Fecha'] ?></td>
                                                    <td><?= $fila['CantidadUnidades'] ?></td>
                                                    <td>$ <?= number_format($fila['TotalUnidades'], 2) ?></td>
                                                    <td><?= $fila['MedioPago'] ?></td>
                                                    <td>

                                                        <a
                                                            href="DetalleCompra.php?id=<?= $fila['ConsecutivoFactura'] ?>">
                                                            <i class="fa fa-eye" style="font-size:22px;"></i>
                                                        </a>

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
    <script src="../js/VerCarritos.js"></script>

</body>

</html>