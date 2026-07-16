<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/RepoMN/Controller/UtilitarioController.php'; 
    include_once $_SERVER['DOCUMENT_ROOT'] . '/RepoMN/Model/UsuarioModel.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/RepoMN/Model/InicioModel.php';

     if(session_status() == PHP_SESSION_NONE){
        session_start();
    }

    if(isset($_POST["btnCambiarContrasenna"]))
    {
        $nuevaContrasenna = $_POST["nuevaContrasenna"];
        $consecutivo = $_SESSION["ConsecutivoUsuario"];
        $nombreUsuario = $_SESSION["NombreUsuario"];
        $correoElectronico = $_SESSION["CorreoElectronicoUsuario"];
     
        $actualizacion = ActualizarContrasennaModel($consecutivo, $nuevaContrasenna);

        if($actualizacion)
        {
            $plantilla = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/RepoMN/View/templates/CambioContrasenna.html');
            $plantilla = str_replace("{{NOMBRE}}", $nombreUsuario, $plantilla);
            date_default_timezone_set('America/Costa_Rica');
            $plantilla = str_replace("{{FECHA}}", date('d/m/Y h:i A'), $plantilla);
            
            EnviarCorreo("Cambio de contraseña", $plantilla, $correoElectronico);
            CerrarSesion();
        }

        $_POST["Mensaje"] = "No se ha podido cambiar su contraseña correctamente";
    }

    if(isset($_POST["btnCambiarPerfil"]))
    {
        $identificacion = $_POST["identificacion"];
        $nombre = $_POST["nombre"];
        $correoElectronico = $_POST["correoElectronico"];
        $consecutivo = $_SESSION["ConsecutivoUsuario"];
     
        $actualizacion = ActualizarPerfilModel($consecutivo, $identificacion, $nombre, $correoElectronico);

        if($actualizacion)
        {
            $_SESSION["IdentificacionUsuario"] = $identificacion;
            $_SESSION["NombreUsuario"] = $nombre;
            $_SESSION["CorreoElectronicoUsuario"] = $correoElectronico;

            $_POST["Mensaje"] = "Se ha cambiado su información personal correctamente";
        }
        else
        {
            $_POST["Mensaje"] = "No se ha podido cambiar su información personal correctamente";
        }
    }