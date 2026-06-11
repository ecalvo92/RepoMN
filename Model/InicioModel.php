<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/RepoMN/Model/UtilitarioModel.php';

    function RegistrarUsuarioModel($identificacion,$nombre,$correoElectronico,$contrasenna)
    {
        $conn = OpenDB();

        $sql = "CALL spRegistrarUsuario('$identificacion','$nombre','$correoElectronico','$contrasenna')";
        $response = $conn -> query($sql);

        CloseDB($conn);
    }

    function IniciarSesionModel($identificacion,$contrasenna)
    {
        $conn = OpenDB();

        $sql = "CALL spIniciarSesionUsuario('$identificacion','$contrasenna')";
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