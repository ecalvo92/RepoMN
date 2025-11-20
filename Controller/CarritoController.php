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
    
    function ConsultarCarritos()
    {
        $consecutivoUsuario = $_SESSION["ConsecutivoUsuario"];
        return ConsultarCarritosModel($consecutivoUsuario);
    }

    function ConsultarResumenCarritos()
    {
        $consecutivoUsuario = $_SESSION["ConsecutivoUsuario"];
        $resultado = ConsultarResumenCarritosModel($consecutivoUsuario);

        $_SESSION["Cantidad"] = $resultado["Cantidad"];
        $_SESSION["Total"] = $resultado["Total"];
    }   

?>