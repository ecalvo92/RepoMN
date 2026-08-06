    <?php
        include_once $_SERVER['DOCUMENT_ROOT'] . '/RepoMN/Model/CursoModel.php';

     if(session_status() == PHP_SESSION_NONE){
        session_start();
    }

    if(isset($_POST["ConsultarCursosProfesorCalendario"]))
    {
        $datos = ConsultarCursosProfesor();
        $eventos = [];

        foreach($datos as $curso)
        {
            $evento = [
                "title" => $curso["Nombre"],
                "start" => date('Y-m-d\TH:i:s', strtotime($curso["Inicio"])),
                "end" => date('Y-m-d\TH:i:s', strtotime($curso["Fin"]))
            ];

            array_push($eventos, $evento);
        }

        echo json_encode($eventos);
    }
    
    function ConsultarCursosProfesor()
    {
        $consecutivo = $_SESSION["ConsecutivoUsuario"];
        $datos = ConsultarCursosProfesorModel($consecutivo);
        return $datos;
    }

    function ConsultarCurso($consecutivo)
    {
        $datos = ConsultarCursoModel($consecutivo);
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
            $consecutivo = $consecutivoCurso["ID"];

            $imagen = '/RepoMN/View/Uploads/' . $consecutivo . '.png';
            $origen = $_FILES["imagen"]["tmp_name"];
            $destino = $_SERVER['DOCUMENT_ROOT'] . $imagen;
            copy($origen, $destino);

            ActualizarImagenCursoModel($consecutivo, $imagen);

            header("Location: ../../View/vCursos/Cursos.php");
            exit();
        }

        $_POST["Mensaje"] = "No se ha podido registrar la información del curso";
    }

    if(isset($_POST["btnEditarCurso"]))
    {
        $consecutivo = $_POST["consecutivo"];
        $nombre = $_POST["nombre"];
        $cantidad = $_POST["cantidad"];
        $fechaInicio = $_POST["fechaInicio"];
        $fechaFin = $_POST["fechaFin"];

        $actualizacion = ActualizarCursoModel($nombre, $cantidad, $fechaInicio, $fechaFin, $consecutivo);

        if($actualizacion)
        {
            if($_FILES["imagen"]["tmp_name"] != null)
            {
                $imagen = '/RepoMN/View/Uploads/' . $consecutivo . '.png';
                $origen = $_FILES["imagen"]["tmp_name"];
                $destino = $_SERVER['DOCUMENT_ROOT'] . $imagen;
                copy($origen, $destino);
            }
        
            header("Location: ../../View/vCursos/Cursos.php");
            exit();
        }

        $_POST["Mensaje"] = "No se ha podido actualizar la información del curso";
    }

    if(isset($_POST["InactivarCurso"]))
    {
        $consecutivo = $_POST["consecutivo"];

        $actualizacion = InactivarCursoModel($consecutivo);

        if($actualizacion)
        {       
           return json_encode(["status" => "Ok"]);
        }

        return json_encode(["status" => "Error"]);
    }
