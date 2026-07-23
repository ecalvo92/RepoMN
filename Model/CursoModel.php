<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/RepoMN/Model/UtilitarioModel.php';

    function ConsultarCursosProfesorModel($consecutivo)
    {
        try
        {
            $conn = OpenDB();

            $sql = "CALL spConsultarCursosProfesor('$consecutivo')";
            $response = $conn -> query($sql);

            //Se guarda el resultado en una variable nueva
            $datos = [];
            while($fila = $response -> fetch_assoc())
            {
                $datos[] = $fila;
            }

            CloseDB($conn);
            return $datos;
        }
        catch(Exception $e)
        {
            AddError($e, 'ConsultarCursosProfesorModel');
            return null;
        }
    }

    function RegistrarCursoModel($nombre, $cantidad, $fechaInicio, $fechaFin, $consecutivoUsuario, $imagen)
    {
        try
        {
            $conn = OpenDB();

            $sql = "CALL spRegistrarCurso('$nombre', '$cantidad', '$fechaInicio', '$fechaFin', '$consecutivoUsuario', '$imagen')";
            $response = $conn -> query($sql);

            CloseDB($conn);
            return $response;
        }
        catch(Exception $e)
        {
            AddError($e, 'RegistrarCursoModel');
            return false;
        }
    }
    