<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/RepoMN/Model/UtilesModel.php';

    function ConsultarUsuarioModel($consecutivo)
    {
        try
        {
            $context = OpenConnection();

            $sentencia = "CALL ConsultarUsuario('$consecutivo')";
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