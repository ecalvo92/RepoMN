<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/RepoMN/Model/UtilesModel.php';

    function RegistrarCarritoModel($consecutivoProducto,$consecutivoUsuario,$cantidad)
    {
        try
        {
            $context = OpenConnection();

            $sentencia = "CALL RegistrarCarrito('$consecutivoProducto','$consecutivoUsuario','$cantidad')";
            $resultado = $context -> query($sentencia);

            CloseConnection($context);

            return $resultado;
        }
        catch(Exception $error)
        {
            SaveError($error);
            return false;
        }
    } 

    function RemoverProductoCarritoModel($consecutivoProducto,$consecutivoUsuario)
    {
        try
        {
            $context = OpenConnection();

            $sentencia = "CALL RemoverProductoCarrito('$consecutivoProducto','$consecutivoUsuario')";
            $resultado = $context -> query($sentencia);

            CloseConnection($context);

            return $resultado;
        }
        catch(Exception $error)
        {
            SaveError($error);
            return false;
        }
    }

    function ConsultarCarritosModel($consecutivoUsuario)
    {
        try
        {
            $context = OpenConnection();

            $sentencia = "CALL ConsultarCarritos('$consecutivoUsuario')";
            $resultado = $context -> query($sentencia);

            $datos = [];
            while ($row = $resultado->fetch_assoc()) {
                $datos[] = $row;
            }

            $resultado->free();
            CloseConnection($context);

            return $datos;
        }
        catch(Exception $error)
        {
            SaveError($error);
            return null;
        }
    }

    function ConsultarResumenCarritosModel($consecutivoUsuario)
    {
        try
        {
            $context = OpenConnection();

            $sentencia = "CALL ConsultarResumenCarritos('$consecutivoUsuario')";
            $resultado = $context -> query($sentencia);

            $datos = null;
            while ($row = $resultado->fetch_assoc()) {
                $datos = $row;
            }

            $resultado->free();
            CloseConnection($context);

            return $datos;
        }
        catch(Exception $error)
        {
            SaveError($error);
            return null;
        }
    }

    

    

?>
