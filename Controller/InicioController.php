<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/RepoMN/Model/InicioModel.php';

    if(isset($_POST["btnRegistrar"]))
    {
        $identificacion = $_POST["identificacion"];
        $nombre = $_POST["nombre"];
        $correoElectronico = $_POST["correoElectronico"];
        $contrasenna = $_POST["contrasenna"];

        RegistrarUsuarioModel($identificacion,$nombre,$correoElectronico,$contrasenna);
    }

    if(isset($_POST["btnIniciarSesion"]))        
    {
        $identificacion = $_POST["identificacion"];
        $contrasenna = $_POST["contrasenna"];

        $datos = IniciarSesionModel($identificacion,$contrasenna);

        if($datos)
        {
            header("Location: ../../View/vInicio/Principal.php");
            exit();
        }

        $_POST["Mensaje"] = "NO SE AUTENTICÓ CORRECTAMENTE";
    }