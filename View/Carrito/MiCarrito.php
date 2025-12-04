<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/RepoMN/View/LayoutInterno.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/RepoMN/Controller/CarritoController.php';

  $resultado = ConsultarCarritos();
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
                                <h4 class="card-header mb-0 text-center flex-grow-1">Mi Carrito</h4>
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
                                                    <th>Nombre</th>
                                                    <th>Precio</th>
                                                    <th>Cantidad</th>
                                                    <th>SubTotal</th>
                                                    <th>Impuesto</th>
                                                    <th>Total</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php foreach ($resultado as $fila): ?>
                                                <tr>
                                                    <td><?= $fila['ConsecutivoProducto'] ?></td>
                                                    <td><?= htmlspecialchars($fila['Nombre']) ?></td>
                                                    <td>$ <?= number_format($fila['Precio'], 2) ?></td>
                                                    <td><?= $fila['Cantidad'] ?></td>
                                                    <td>$ <?= number_format($fila['SubTotal'], 2) ?></td>
                                                    <td>$ <?= number_format($fila['Impuesto'], 2) ?></td>
                                                    <td>$ <?= number_format($fila['Total'], 2) ?></td>
                                                    <td>

                                                        <form method="POST" action="" style="margin:0; display:inline;">
                                                            <input type="hidden" name="ConsecutivoProducto"
                                                                value="<?= $fila['ConsecutivoProducto'] ?>">

                                                            <button type="submit" name="btnRemoverProductoCarrito"
                                                                style="background:none; border:none; color:#0d6efd; cursor:pointer; padding:0;">
                                                                <i class="fa fa-trash" style="font-size:22px;"></i>
                                                            </button>

                                                        </form>

                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>

                                            </tbody>
                                        </table>

                                        <div class="row mt-5">
                                            <div class="col-4">
                                                <p class="mt-2">El monto a cancelar es de: <b>$
                                                        <?= number_format($_SESSION["Total"], 2)?> IVI</b></p>
                                            </div>
                                            <div class="col-8">
                                                <?php
                                                    if($_SESSION["Cantidad"] != 0)
                                                    {
                                                        echo '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                        Realizar Pago
                                                        </button>';
                                                    }
                                                ?>
                                            </div>
                                        </div>

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

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Confirmación de Pago</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form id="formRealizarPago" action="" method="POST">
                    <div class="modal-body">

                        <label class="form-label">Medio de Pago</label>
                        <input type="text" class="form-control" id="MedioPago" name="MedioPago" />

                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="btnRealizarPagoCarrito" name="btnRealizarPagoCarrito"
                            class="btn btn-primary">Procesar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <?php
      ShowJS();
    ?>
    <script src="../js/VerCarritos.js"></script>

</body>

</html>