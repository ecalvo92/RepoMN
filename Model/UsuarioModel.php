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
