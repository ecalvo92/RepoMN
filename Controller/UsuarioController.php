<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/RepoMN/Model/UsuarioModel.php';

    if(session_status() == PHP_SESSION_NONE)
    {
        session_start();
    }

    function ConsultarUsuario()
    {
        $consecutivo = $_SESSION["ConsecutivoUsuario"];
        return ConsultarUsuarioModel($consecutivo);
    }

    function ConsultarUsuarios()
    {
        return ConsultarUsuariosModel();
    }

    if(isset($_POST["btnActualizarPerfil"]))
    {
        $consecutivo = $_SESSION["ConsecutivoUsuario"];
        $identificacion = $_POST["Identificacion"];
        $nombre = $_POST["Nombre"];
        $correoElectronico = $_POST["CorreoElectronico"];

        $resultado = ActualizarPerfilModel($consecutivo, $identificacion,$nombre,$correoElectronico);

        if($resultado)
        {
            $_SESSION["Nombre"] = $nombre;
            $_POST["Mensaje"] = "La información se actualizó correctamente";
        }
        else
        {
            $_POST["Mensaje"] = "La información no se actualizó correctamente";
        }        
    }

    if(isset($_POST["btnActualizarSeguridad"]))
    {
        $consecutivo = $_SESSION["ConsecutivoUsuario"];
        $contrasenna = $_POST["Contrasenna"];

        $resultado = ActualizarSeguridadModel($consecutivo, $contrasenna);

        if($resultado)
        {
            $_POST["Mensaje"] = "La información se actualizó correctamente";
        }
        else
        {
            $_POST["Mensaje"] = "La información no se actualizó correctamente";
        }        
    }   

    if(isset($_POST["btnCambiarEstado"]))
    {
        $consecutivoUsuario = $_POST["ConsecutivoUsuario"];
        
        $resultado = CambiarEstadoUsuarioModel($consecutivoUsuario);

        if($resultado)
        {
            header("Location: ../../View/Usuarios/Usuarios.php");
            exit;
        }
        else
        {
            $_POST["Mensaje"] = "La información no se actualizó correctamente";
        }        
    }   

?>