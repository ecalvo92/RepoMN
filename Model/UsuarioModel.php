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

    function ConsultarUsuariosModel()
    {
        try
        {
            $context = OpenConnection();

            $sentencia = "CALL ConsultarUsuarios()";
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

    function ActualizarPerfilModel($consecutivo,$identificacion,$nombre,$correoElectronico)
    {
        try
        {
            $context = OpenConnection();

            $sentencia = "CALL ActualizarPerfil('$consecutivo', '$identificacion', '$nombre', '$correoElectronico')";
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

    function ActualizarSeguridadModel($consecutivo,$contrasenna)
    {
        try
        {
            $context = OpenConnection();

            $sentencia = "CALL ActualizarContrasenna('$consecutivo', '$contrasenna')";
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

    function CambiarEstadoUsuarioModel($consecutivoUsuario)
    {
        try
        {
            $context = OpenConnection();

            $sentencia = "CALL CambiarEstadoUsuario('$consecutivoUsuario')";
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