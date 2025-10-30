<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/RepoMN/Model/UtilesModel.php';

    function ConsultarProductosModel()
    {
        try
        {
            $context = OpenConnection();

            $sentencia = "CALL ConsultarProductos()";
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

?>