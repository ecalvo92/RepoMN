    <?php
        include_once $_SERVER['DOCUMENT_ROOT'] . '/RepoMN/Model/CursoModel.php';

     if(session_status() == PHP_SESSION_NONE){
        session_start();
    }
    
    function ConsultarCursosProfesor()
    {
        $consecutivo = $_SESSION["ConsecutivoUsuario"];
        $datos = ConsultarCursosProfesorModel($consecutivo);
        return $datos;
    }