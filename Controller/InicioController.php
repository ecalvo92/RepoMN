<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/RepoMN/Controller/UtilitarioController.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/RepoMN/Model/InicioModel.php';

    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }

    if(isset($_POST["btnRegistrar"]))
    {
        $identificacion = $_POST["identificacion"];
        $nombre = $_POST["nombre"];
        $correoElectronico = $_POST["correoElectronico"];
        $contrasenna = $_POST["contrasenna"];

        $datos = RegistrarUsuarioModel($identificacion,$nombre,$correoElectronico,$contrasenna);

        if($datos)
        {
            header("Location: ../../View/vInicio/IniciarSesion.php");
            exit();
        }

        $_POST["Mensaje"] = "No se ha podido registrar su información correctamente";
    }

    if(isset($_POST["btnIniciarSesion"]))        
    {
        $identificacion = $_POST["identificacion"];
        $contrasenna = $_POST["contrasenna"];

        $datos = IniciarSesionModel($identificacion,$contrasenna);

        if($datos)
        {
            $_SESSION["NombreUsuario"] = $datos["Nombre"];
            $_SESSION["ConsecutivoUsuario"] = $datos["Consecutivo"];

            header("Location: ../../View/vInicio/Principal.php");
            exit();
        }

        $_POST["Mensaje"] = "No se ha podido autenticar su información correctamente";
    }

    if(isset($_POST["btnRecuperarAcceso"]))
    {
        $correoElectronico = $_POST["correoElectronico"];

        $datos = ValidarCorreoModel($correoElectronico);
        
        if($datos)
        {
            $temporal = generarContrasena();            
            $actualizacion = ActualizarContrasennaModel($datos['Consecutivo'], $temporal);

            if($actualizacion)
            {
                EnviarCorreo("Recuperación de acceso", "Su nueva contraseña temporal es: $temporal", $datos['CorreoElectronico']);

                header("Location: ../../View/vInicio/IniciarSesion.php");
                exit();
            }
        }

        $_POST["Mensaje"] = "No se ha podido recuperar su acceso correctamente";
    }