<?php
    include_once '../../Model/InicioModel.php';

    if(isset($_POST["btnRegistrar"]))
    {
        $identificacion = $_POST["identificacion"];
        $nombre = $_POST["nombre"];
        $correoElectronico = $_POST["correoElectronico"];
        $contrasenna = $_POST["contrasenna"];

        RegistrarUsuarioModel($identificacion,$nombre,$correoElectronico,$contrasenna);

    }