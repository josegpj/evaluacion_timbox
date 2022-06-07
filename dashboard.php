<?php
include_once("classes/classes.php");
include_once("includes/verificar_sesion.php");

 ?>
<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <title>Dashboard | Bienvenido nuevamente</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/timbox.png">

        <!-- jquery.vectormap css -->
        <link href="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />

        <!-- DataTables -->
        <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body data-topbar="dark" data-layout="horizontal">

        <!-- Begin page -->
        <div id="layout-wrapper">

            <?php include('includes/menu-superior.php');?>
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Panel de administración</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
<!--
                        <div class="row">
                            <div class="col-xl-8">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-1 overflow-hidden">
                                                        <p class="text-truncate font-size-14 mb-2">Clientes</p>
                                                        <h4 class="mb-0">1452</h4>
                                                    </div>
                                                    <div class="text-primary ms-auto">
                                                        <i class="ri-user-star-line font-size-24"></i>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-1 overflow-hidden">
                                                        <p class="text-truncate font-size-14 mb-2">Visitas</p>
                                                        <h4 class="mb-0">$ 38452</h4>
                                                    </div>
                                                    <div class="text-primary ms-auto">
                                                        <i class="ri-map-pin-line font-size-24"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-1 overflow-hidden">
                                                        <p class="text-truncate font-size-14 mb-2">Ventas</p>
                                                        <h4 class="mb-0">$ 15.4</h4>
                                                    </div>
                                                    <div class="text-primary ms-auto">
                                                        <i class="ri-coins-line font-size-24"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title mb-4">Resumen de ventas</h4>
                                        <div>
                                            <div id="line-column-chart" class="apex-charts" dir="ltr"></div>
                                        </div>
                                    </div>

                                    <div class="card-body border-top text-center">

                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title mb-4">Análisis de ventas</h4>

                                        <div id="donut-chart" class="apex-charts"></div>

                                        <div class="row">
                                            <div class="col-4">
                                                <div class="text-center mt-4">
                                                    <p class="mb-2 text-truncate"><i class="mdi mdi-circle text-primary font-size-10 me-1"></i> Servicio A</p>
                                                    <h5>42 %</h5>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="text-center mt-4">
                                                    <p class="mb-2 text-truncate"><i class="mdi mdi-circle text-success font-size-10 me-1"></i> Servicio B</p>
                                                    <h5>28 %</h5>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="text-center mt-4">
                                                    <p class="mb-2 text-truncate"><i class="mdi mdi-circle text-warning font-size-10 me-1"></i> Servicio C</p>
                                                    <h5>30 %</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Resumen de ventas</h4>
                                        <div class="text-center">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div>
                                                        <div class="mb-3">
                                                            <div id="radialchart-1" class="apex-charts"></div>
                                                        </div>

                                                        <p class="text-muted text-truncate mb-2">De la semana</p>
                                                        <h5 class="mb-0">$2,523</h5>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="mt-5 mt-sm-0">
                                                        <div class="mb-3">
                                                            <div id="radialchart-2" class="apex-charts"></div>
                                                        </div>

                                                        <p class="text-muted text-truncate mb-2">Del mes</p>
                                                        <h5 class="mb-0">$11,235</h5>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        -->
                        <!-- end row -->
                    </div>

                </div>
                <!-- End Page-content -->

                <?php include('includes/footer.php');?>

            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->


        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <!-- apexcharts -->
        <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

        <!-- jquery.vectormap map -->
        <script src="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js"></script>

        <!-- Required datatable js -->
        <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

        <!-- Responsive examples -->
        <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

        <script src="assets/js/pages/dashboard.init.js"></script>

        <script src="assets/js/app.js"></script>

    </body>
</html>
