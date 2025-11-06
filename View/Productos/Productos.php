<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/RepoMN/View/LayoutInterno.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/RepoMN/Controller/ProductoController.php';

  $resultado = ConsultarProductos();
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
                            <h4 class="card-header">Productos</h4>

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
                                                    <th>Estado</th>
                                                    <th>Imagen</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                  foreach ($resultado as $fila)
                                                  {
                                                      echo "<tr>";
                                                      echo "<td>" . $fila["ConsecutivoProducto"] . "</td>";
                                                      echo "<td>" . $fila["Nombre"] . "</td>";
                                                      echo "<td>" . $fila["Precio"] . "</td>";
                                                      echo "<td>" . $fila["Estado"] . "</td>";
                                                      echo "<td>" . $fila["Imagen"] . "</td>";
                                                      echo "<td><a href='ActualizarProducto.php?id=" . $fila["ConsecutivoProducto"] . "'> Actualizar </td>";
                                                      echo "</tr>";
                                                  }
                                                ?>

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