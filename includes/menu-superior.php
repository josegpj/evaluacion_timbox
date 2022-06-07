            <header id="page-topbar" styl="background-color: #eee;">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="dashboard.php" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="assets/images/white.png" alt="logo-sm-dark" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/white.png" alt="logo-dark" height="20">
                                </span>
                            </a>

                            <a href="dashboard.php" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="assets/images/white.png" alt="logo-sm-light" height="100">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/white.png" alt="logo-light" height="100">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-24 d-lg-none header-item" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                            <i class="ri-menu-2-line align-middle"></i>
                        </button>
                    </div>

                    <div class="d-flex">

                        <div class="dropdown d-none d-lg-inline-block ms-1">
                            <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                                <i class="ri-fullscreen-line"></i>
                            </button>
                        </div>


                        <div class="dropdown d-inline-block user-dropdown">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="assets/images/timbox.png"
                                    alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ms-1"><?php echo htmlspecialchars($_SESSION["nombre_completo"]); ?></span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="includes/logout.php"><i class="ri-shut-down-line align-middle me-1 text-danger"></i> Cerrar Sesión</a>
                            </div>
                        </div>



                    </div>
                </div>
            </header>

                <div class="topnav">
                    <div class="container-fluid">
                        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                            <div class="collapse navbar-collapse" id="topnav-menu-content">
                                <ul class="navbar-nav">

                                    <li class="nav-item">
                                        <a class="nav-link" href="dashboard.php">
                                            <i class=" ri-home-3-line me-2"></i> Inicio
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="configuracion-cuenta.php">
                                            <i class="fas fa-cog"></i> Configuración de Cuenta
                                        </a>
                                    </li>


                                    <li class="nav-item">
                                        <a class="nav-link" href="algoritmo.php">
                                            <i class="fas fa-sitemap"></i> Algoritmos
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="usuarios.php">
                                            <i class="fas fa-users"></i> Usuarios
                                        </a>
                                    </li>


                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
