<?php
    include_once '../../Model/UtilitarioModel.php';

    function RegistrarUsuarioModel($identificacion,$nombre,$correoElectronico,$contrasenna)
    {
        $conn = OpenDB();

        $sql = "CALL spRegistrarUsuario('$identificacion','$nombre','$correoElectronico','$contrasenna')";
        $conn -> query($sql);

        CloseDB($conn);
    }