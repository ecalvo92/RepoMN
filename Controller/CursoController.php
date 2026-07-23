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

    if(isset($_POST["btnAgregarCurso"]))
    {
        $nombre = $_POST["nombre"];
        $cantidad = $_POST["cantidad"];
        $fechaInicio = $_POST["fechaInicio"];
        $fechaFin = $_POST["fechaFin"];
        $consecutivoUsuario = $_SESSION["ConsecutivoUsuario"];
        $imagen = '/RepoMN/View/Uploads/' . $_FILES["imagen"]["name"];

        $origen = $_FILES["imagen"]["tmp_name"];
        $destino = $_SERVER['DOCUMENT_ROOT'] . $imagen;
        copy($origen, $destino);
     
        $datos = RegistrarCursoModel($nombre, $cantidad, $fechaInicio, $fechaFin, $consecutivoUsuario, $imagen);

        if($datos)
        {
             header("Location: ../../View/vCursos/Cursos.php");
            exit();
        }

        $_POST["Mensaje"] = "No se ha podido registrar la información del curso";
    }

    