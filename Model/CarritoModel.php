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

?>
