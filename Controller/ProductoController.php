<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/RepoMN/Model/ProductoModel.php';

    function ConsultarProductos()
    {
        return ConsultarProductosModel();
    }

    function ConsultarProducto($id)
    {
        return ConsultarProductoModel($id);
    }
    

?>