<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/RepoMN/Model/CarritoModel.php';

    if(session_status() == PHP_SESSION_NONE)
    {
        session_start();
    }

    if(isset($_POST["btnAgregarProductoCarrito"]))
    {
        $consecutivoProducto = $_POST["ConsecutivoProducto"];
        $consecutivoUsuario = $_SESSION["ConsecutivoUsuario"];
        $cantidad = $_POST["Cantidad"];
        
        $resultado = RegistrarCarritoModel($consecutivoProducto, $consecutivoUsuario, $cantidad);

        if($resultado)
        {
            header("Location: ../../View/Inicio/Principal.php");
            exit;
        }
        else
        {
            $_POST["Mensaje"] = "La información no se agregó correctamente";
        }        
    }      

?>