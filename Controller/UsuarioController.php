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

?>