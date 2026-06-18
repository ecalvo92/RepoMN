<?php

function ImportCSS()
{
    echo '
        <head>
        <meta charset="UTF-8" />
        <title>Proyecto Web MN</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="../css/main.css" />
        </head>
    ';
}

function ImportJS()
{
    echo '
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.21.0/dist/jquery.validate.min.js"></script>
    ';
}