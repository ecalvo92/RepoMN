<?php
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
            
            <div class="row">
                <div class="col-7 mx-auto">
                    <div class="card">
                        <div class="card-body p-4">
              
                            <form id="addProductForm">
                                <div class="row">
                                    <div class="col-md-12 mb-4">
                                        <label for="productName" class="form-label">Contraseña Nueva</label>
                                        <input type="text" class="form-control" id="productName">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-4">
                                        <label for="productPrice" class="form-label">Confirmar Contraseña</label>
                                        <input type="text" class="form-control" id="productPrice">
                                    </div>
                                </div>
                         
                                <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-primary">Procesar</button>
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

</body>

</html>