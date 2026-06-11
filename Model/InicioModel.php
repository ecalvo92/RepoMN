<?php

    function RegistrarUsuarioModel($identificacion,$nombre,$correoElectronico,$contrasenna)
    {
        $conn = new mysqli("127.0.0.1:3307", "root", "", "mn");

        $sql = "INSERT INTO tb_usuario
                (Identificacion,
                Nombre,
                CorreoElectronico,
                Contrasenna,
                Estado)
                VALUES
                ('$identificacion',
                 '$nombre',
                 '$correoElectronico',
                 '$contrasenna',
                 1);";

        $conn -> query($sql);
        $conn -> close();
    }