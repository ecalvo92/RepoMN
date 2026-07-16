<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/RepoMN/Model/UtilitarioModel.php';
    
    function ActualizarPerfilModel($consecutivo, $identificacion, $nombre, $correoElectronico)
    {
        try
        {
            $conn = OpenDB();

            $sql = "CALL spActualizarPerfil('$consecutivo', '$identificacion', '$nombre', '$correoElectronico')";
            $response = $conn -> query($sql);

            CloseDB($conn);
            return $response;
        }
        catch(Exception $e)
        {
            AddError($e, 'ActualizarPerfilModel');
            return false;
        }
    }

    function ConsultarUsuarioModel($consecutivo)
    {
        try
        {
            $conn = OpenDB();

            $sql = "CALL spConsultarUsuario('$consecutivo')";
            $response = $conn -> query($sql);

            //Se guarda el resultado en una variable nueva
            $datos = null;
            while($fila = $response -> fetch_assoc())
            {
                $datos = $fila;
            }

            CloseDB($conn);
            return $datos;
        }
        catch(Exception $e)
        {
            AddError($e, 'ConsultarUsuarioModel');
            return null;
        }
    }