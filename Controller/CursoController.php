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

        $consecutivoCurso = RegistrarCursoModel($nombre, $cantidad, $fechaInicio, $fechaFin, $consecutivoUsuario);

        if($consecutivoCurso)
        {
            $imagen = '/RepoMN/View/Uploads/' . $consecutivoCurso . '.png';
            $origen = $_FILES["imagen"]["tmp_name"];
            $destino = $_SERVER['DOCUMENT_ROOT'] . $imagen;
            copy($origen, $destino);

            ActualizarImagenCursoModel($consecutivoCurso, $imagen);

            header("Location: ../../View/vCursos/Cursos.php");
            exit();
        }

        $_POST["Mensaje"] = "No se ha podido registrar la información del curso";
    }

    