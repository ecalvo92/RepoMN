<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/RepoMN/View/LayoutInterno.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/RepoMN/Controller/InicioController.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/RepoMN/Controller/ProductoController.php';

  if($_SESSION["ConsecutivoPerfil"] != "1")
  {
    header("Location: Principal.php");
    exit;
  }

  $resultado = ConsultarIndicadores();
  $resultadoClientes = ConsultarMejorCliente();
  $resultadoProductos = ConsultarProductoMasVendido();

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


                        <!-- INDICADORES -->
                        <div class="container mt-4">
                            <div class="row g-4">
                                <?php foreach ($resultado as $fila): ?>

                                <div class="col-sm-6 col-md-4 col-lg-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-title d-flex align-items-start justify-content-between">
                                                <div class="avatar flex-shrink-0">
                                                    <img src="../img/chart-success.png" alt="chart success"
                                                        class="rounded">
                                                </div>
                                            </div>
                                            <span class="fw-semibold d-block mb-1"><?= $fila["Descripcion"] ?></span>
                                            <h3 class="card-title mb-2"><?= $fila["Cantidad"] ?> </h3>
                                        </div>
                                    </div>
                                </div>

                                <?php endforeach; ?>
                            </div>
                        </div>


                        <!-- TABLAS -->
                        <div class="row">
                            <div class="col-md-6">

                                <div class="card mb-4 mt-4 ">
                                    <div class="d-flex justify-content-between align-items-center position-relative">
                                        <h4 class="card-header mb-0 text-center flex-grow-1">MEJORES CLIENTES</h4>
                                    </div>
                                    <div class="card-body">
                                        <table class="table mb-4">
                                            <thead>
                                                <tr>
                                                    <th>Cliente</th>
                                                    <th>Cantidad</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php foreach ($resultadoClientes as $fila): ?>
                                                <tr>
                                                    <td><?= $fila['Nombre'] ?></td>
                                                    <td><?= $fila['Cantidad'] ?></td>
                                                </tr>
                                                <?php endforeach; ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card mb-4 mt-4">
                                    <div class="d-flex justify-content-between align-items-center position-relative">
                                        <h4 class="card-header mb-0 text-center flex-grow-1">PRODUCTOS MÁS VENDIDOS</h4>
                                    </div>
                                    <div class="card-body">
                                        <table class="table mb-4">
                                            <thead>
                                                <tr>
                                                    <th>Producto</th>
                                                    <th>Cantidad</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php foreach ($resultadoProductos as $fila): ?>
                                                <tr>
                                                    <td><?= $fila['Nombre'] ?></td>
                                                    <td><?= $fila['Cantidad'] ?></td>
                                                </tr>
                                                <?php endforeach; ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <!-- GRAFICO -->
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body px-0">
                                    <div class="tab-content p-0">
                                        <div class="tab-pane fade show active" id="navs-tabs-line-card-income"
                                            role="tabpanel">

                                            <div id="incomeChart"></div>
                                            
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

</body>

</html>