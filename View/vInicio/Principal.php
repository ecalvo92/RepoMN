<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Proyecto Web MN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/main.css" />
</head>

<body>
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
                        <img src="../images/avatar-1.jpg" alt="" class="avatar avatar-sm rounded-circle" />
                    </a>
                    <div class="dropdown-menu dropdown-menu-end p-0" style="min-width: 200px;">
                        <div>
                            <div class="d-flex gap-3 align-items-center border-dashed border-bottom px-3 py-3">
                                <img src="../images/avatar-1.jpg" alt="" class="avatar avatar-md rounded-circle" />
                                <div>
                                    <h4 class="mb-0 small">Shrina Tesla</h4>
                                    <p class="mb-0  small">@imshrina</p>
                                </div>
                            </div>
                            <div class="p-3 d-flex flex-column gap-1 small lh-lg">
                                <a href="#!" class="">

                                    <span>Home</span>
                                </a>
                                <a href="#!" class="">

                                    <span> Inbox</span>
                                </a>
                                <a href="#!" class="">

                                    <span> Chat</span>
                                </a>
                                <a href="#!" class="">

                                    <span> Activity</span>
                                </a>
                                <a href="#!" class="">

                                    <span> Account Settings</span>
                                </a>
                            </div>

                        </div>
                    </div>
                </li>
            </ul>
        </div>

    </nav>

    <aside id="sidebar" class="sidebar">
        <div class="logo-area">
            <a href="index.html" class="d-inline-flex"><img src="../images/logo-fidelitas.png" alt="" width="130">
        </div>
        <ul class="nav flex-column">
            <li><a class="nav-link active" href="index.html"><i class="ti ti-home"></i><span
                        class="nav-text">Dashboard</span></a></li>
        </ul>

    </aside>

    <main id="content" class="content py-10">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="">
                            <h1 class="fs-3 mb-1">Inventory</h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <footer class="text-center py-2 mt-6 text-secondary ">
                        <p class="mb-0">Copyright © 2026 InApp</p>
                    </footer>
                </div>

            </div>

        </div>
    </main>

    <script src="../js/sidebar.js"></script>

</body>

</html>