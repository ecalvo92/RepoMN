<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/RepoMN/View/LayoutInterno.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/RepoMN/Controller/ProductoController.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/RepoMN/Controller/CarritoController.php';

  if($_SESSION["ConsecutivoPerfil"] == "1")
  {
    header("Location: PrincipalAdmin.php");
    exit;
  }

  $resultado = ConsultarProductosPrincipal();
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

                        <div class="container mt-4">
                            <div class="row g-4">
                                <?php foreach ($resultado as $fila): ?>
                                <div class="col-sm-6 col-md-4 col-lg-3">
                                    <div class="card h-100 shadow-sm border-0">
                                        <img src="<?= htmlspecialchars($fila['Imagen']) ?>" class="card-img-top"
                                            alt="<?= htmlspecialchars($fila['Nombre']) ?>"
                                            style="height:170px; object-fit:contain;">

                                        <div class="card-body d-flex flex-column justify-content-between">
                                            <div>
                                                <h5 class="card-title"><?= htmlspecialchars($fila['Nombre']) ?></h5>
                                                <p class="card-text mb-2">
                                                    <strong>Precio:</strong> $<?= number_format($fila['Precio'], 2) ?>
                                                </p>
                                                <p class="card-text mb-2">
                                                    <strong>Disponibles:</strong> <?=$fila['Cantidad'] ?>
                                                </p>
                                            </div>

                                            <form method="POST" action="" class="mt-2 d-flex align-items-center gap-2">
                                                
                                                <input type="hidden" id="ConsecutivoProducto" name="ConsecutivoProducto"
                                                    value="<?= $fila['ConsecutivoProducto'] ?>">

                                                <input type="text" id="Cantidad" name="Cantidad" class="form-control" value="1" style="max-width:80px;">

                                                <button type="submit" id="btnAgregarProductoCarrito" name="btnAgregarProductoCarrito" class="btn btn-primary flex-grow-1">
                                                    <i class="fa fa-cart-plus me-1"></i> Agregar
                                                </button>

                                            </form>

                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
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

</body>

</html>