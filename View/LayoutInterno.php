<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/RepoMN/Controller/InicioController.php';

if(session_status() == PHP_SESSION_NONE){
    session_start();
}

function ImportCSS()
{
    echo '
        <head>
        <meta charset="UTF-8" />
        <title>Proyecto Web MN</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
        <link rel="stylesheet" href="../css/main.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
        </head>
    ';
}

function ImportJS()
{
    echo '
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../js/sidebar.js"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.21.0/dist/jquery.validate.min.js"></script>
    ';
}

function Navbar()
{
    $nombreUsuario = "";
    $nombreRol = "";
    if(isset($_SESSION["NombreUsuario"]))
    {
        $nombreUsuario = $_SESSION["NombreUsuario"];
        $nombreRol = isset($_SESSION["NombreRol"]) ? $_SESSION["NombreRol"] : "";
    }
    else
    {
        header("Location: IniciarSesion.php");
        exit();
    }

    echo '
        <div id="overlay" class="overlay"></div>

        <nav id="topbar" class="navbar bg-white border-bottom fixed-top topbar px-3">
            <button id="toggleBtn" class="d-none d-lg-inline-flex btn btn-light btn-icon btn-sm ">
                <i class="ti ti-layout-sidebar-left-expand"></i>
            </button>

            <button id="mobileBtn" class="btn btn-light btn-icon btn-sm d-lg-none me-2">
                <i class="ti ti-layout-sidebar-left-expand"></i>
            </button>
            <div>
                <!-- Navbar nav -->
                <ul class="list-unstyled d-flex align-items-center mb-0 gap-1">
                    
                    <li class="ms-3 dropdown">
                        <a href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                           <h4 class="mb-0 small">' . $nombreUsuario . '</h4>
                           <span class="text-muted" style="font-size:0.75rem;">' . $nombreRol . '</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end p-0 mt-3" style="min-width: 200px;">
                            <div>
                            
                                <div class="p-2 d-flex flex-column gap-0 small">

                                    <a href="../vUsuario/CambiarPerfil.php" class="btn btn-sm text-start py-1 fs-6">
                                        <i class="fa-solid fa-user me-2"></i>
                                        Mi perfil
                                    </a>

                                    <a href="../vUsuario/CambiarContrasenna.php" class="btn btn-sm text-start py-1 fs-6">
                                        <i class="fa-solid fa-shield-halved me-2"></i>
                                        Seguridad
                                    </a>

                                    <form action="" method="POST">
                                        <button id="btnSalir" name="btnSalir" type="submit" class="btn btn-sm bg-transparent border-0 text-start py-1 fs-6">
                                            <i class="fa-solid fa-right-from-bracket me-2"></i>
                                            Salir
                                        </button>
                                    </form>

                                </div>

                            </div>
                        </div>
                    </li>
                </ul>
            </div>

        </nav>
    ';
}

function Sidebar()
{
    echo '
        <aside id="sidebar" class="sidebar">
        <div class="logo-area">
            <a href="../vInicio/Principal.php" class="d-inline-flex">
                <img src="../images/logo-fidelitas.png" alt="" width="100" class="logo-full" />
                <img src="../images/logo-fidelitas-letra.png" alt="" width="32" class="logo-collapsed" />
            </a>
        </div>
        <ul class="nav flex-column mt-5">
            <li><a class="nav-link active" href=""><i class="ti ti-home"></i><span
                        class="nav-text">Dashboard</span></a></li>
        </ul>
        </aside>
    ';
}

function Footer()
{
    echo '
        <div class="row">
            <div class="col-12">
                <footer class="text-center py-2 mt-6 text-secondary ">
                    <p class="mb-0">Copyright © 2026 InApp</p>
                </footer>
            </div>
        </div>
    ';
}