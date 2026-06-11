<?php

    function OpenDB()
    {
        return new mysqli("127.0.0.1:3307", "root", "", "mn");
    }

    function CloseDB($conn)
    {
        $conn -> close();
    }