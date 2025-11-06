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

    if(isset($_POST["btnActualizarProducto"]))
    {
        $consecutivoProducto = $_POST["ConsecutivoProducto"];
        $nombre = $_POST["Nombre"];
        $descripcion = $_POST["Descripcion"];
        $precio = $_POST["Precio"];
        $imagen = '';

        if($_FILES["ImagenProducto"]["name"] != "")
        {
            $imagen = '../img/' . $_FILES["ImagenProducto"]["name"];
            $origen = $_FILES["ImagenProducto"]["tmp_name"];
            $destino = $_SERVER["DOCUMENT_ROOT"] . '/RepoMN/View/img/' . $_FILES["ImagenProducto"]["name"];
            copy($origen,$destino);
        }       

        $resultado = ActualizarProductoModel($consecutivoProducto,$nombre,$descripcion,$precio,$imagen);

        if($resultado)
        {
            header("Location: ../../View/Productos/Productos.php");
            exit;
        }
        else
        {
            $_POST["Mensaje"] = "La información no se actualizó correctamente";
        }        
    }

?>