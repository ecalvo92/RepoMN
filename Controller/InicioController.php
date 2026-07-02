<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/RepoMN/Model/InicioModel.php';

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
                //3. Enviar la contraseña temporal al correo electrónico

                header("Location: ../../View/vInicio/IniciarSesion.php");
                exit();
            }
        }

        $_POST["Mensaje"] = "No se ha podido recuperar su acceso correctamente";
    }

    function generarContrasena()
    {
        $caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $contrasena = '';
        $max = strlen($caracteres) - 1;

        for ($i = 0; $i < 8; $i++) {
            $contrasena .= $caracteres[random_int(0, $max)];
        }

        return $contrasena;
    }