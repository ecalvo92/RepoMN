<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/RepoMN/Model/ProductoModel.php';

    function ConsultarProductos()
    {
        return ConsultarProductosModel();
    }

?>