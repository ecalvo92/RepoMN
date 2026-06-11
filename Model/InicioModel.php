<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/RepoMN/Model/UtilitarioModel.php';

    function RegistrarUsuarioModel($identificacion,$nombre,$correoElectronico,$contrasenna)
    {
        $conn = OpenDB();

        $sql = "CALL spRegistrarUsuario('$identificacion','$nombre','$correoElectronico','$contrasenna')";
        $conn -> query($sql);

        CloseDB($conn);
    }