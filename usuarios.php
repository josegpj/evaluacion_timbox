<?php
include_once("classes/classes.php");
include_once("includes/verificar_sesion.php");

$id_usuario=$_SESSION["id_user"];

  if(isset($_POST['eliminar_user'])){
    $id_delete=$_POST['id_delete'];

    $Eliminar= new Usuarios();
    $QueryEliminar=$Eliminar->EliminarUsuario($id_delete);
  }

 ?>
<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <title>Timbox | Usuarios</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- DataTables -->
        <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css" rel="stylesheet" type="text/css" />

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
                                    <h4 class="mb-sm-0">Gestión de Usuarios</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="mis-clientes.php">Gestión</a></li>
                                            <li class="breadcrumb-item active">Usuarios</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="row">
                                          <div class="col-sm-10 col-sm-offset-10">
                                                <h4 class="card-title">Lista de usuarios registrados por <?php echo htmlspecialchars($_SESSION["nombre_completo"]); ?></h4>
                                          </div>
                                          <div class="col-sm-2">
                                                 <p class="card-title-desc">
                                                    <a href="registrar-usuario.php" class="btn btn-sm btn-danger waves-effect">
                                                        <i class="ri-error-danger-line align-middle me-2"></i> Registrar usuario
                                                    </a>
                                                </p>
                                          </div>
                                        </div>


                                  <?php if(isset($_GET['insert']) AND $_GET['insert']=='error'){ ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <i class="fas fa-exclamation-circle"></i>
                                        <b>¡Error!</b> Algo salio mal, intentalo de nuevo.
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                  <?php } ?>

                                  <?php if(isset($_GET['status']) AND $_GET['status']=='error'){ ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <i class="fas fa-exclamation-circle"></i>
                                        <b>¡Error!</b> Algo salio mal, intentalo de nuevo.
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                  <?php } ?>

                                  <?php if(isset($_GET['delete']) AND $_GET['delete']=='ok'){ ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <i class="fas fa-check-circle"></i>
                                        <b>Perfecto!</b> Solicitud ejecutada correctamente.
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                  <?php } ?>

                                  <?php if(isset($_GET['insert']) AND $_GET['insert']=='ok'){ ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <i class="fas fa-check-circle"></i>
                                        <b>Perfecto!</b> Solicitud ejecutada correctamente.
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                  <?php } ?>

                                  <?php if(isset($_GET['status']) AND $_GET['status']=='ok'){ ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <i class="fas fa-check-circle"></i>
                                        <b>Perfecto!</b> Solicitud ejecutada correctamente.
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                  <?php } ?>


                                  <?php if(isset($_GET['error']) AND $_GET['error']=='ok'){ ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <i class="fas fa-exclamation-circle"></i>
                                        <b>¡Error!</b> Algo salio mal intentalo de nuevo.
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                  <?php } ?>


                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>rfc</th>
                                                <th>Teléfono</th>
                                                <th>Website</th>
                                                <th>Dirección</th>
                                                <th style="text-align: center;">Eliminar</th>
                                                <th style="text-align: center;">Editar</th>
                                            </tr>
                                            </thead>


                                            <tbody>
                                              <?php
                                              $ConsultaUsuarios= new Usuarios();
                                              $QueryConsultaUsuarios=$ConsultaUsuarios->ConsultaUsuario($id_usuario);
                                              $TieneUsuarios=mysqli_num_rows($QueryConsultaUsuarios);
                                              if($TieneUsuarios>0){
                                              while($DatosUsuario=mysqli_fetch_array($QueryConsultaUsuarios)){
                                               ?>
                                              <tr>
                                                <td><?php echo htmlspecialchars($DatosUsuario['nombre']); ?></td>
                                                <td><?php echo htmlspecialchars($DatosUsuario['rfc']); ?></td>
                                                <td><?php echo htmlspecialchars($DatosUsuario['telefono']); ?></td>
                                                <td><?php echo htmlspecialchars($DatosUsuario['website']); ?></td>
                                                <td><?php echo htmlspecialchars($DatosUsuario['direccion']); ?></td>
                                                <td style="text-align: center;">
                                                  <form class="" action="usuarios.php" method="post">
                                                    <input type="hidden" name="id_delete" value="<?php echo $DatosUsuario['id_user']; ?>">
                                                    <button type="submit" onclick="return confirm('Deseas eliminar este usuario?');" class="btn btn-outline-danger btn-sm" name="eliminar_user"> <li class="fas fa-trash-alt"></li> </button>
                                                  </form>
                                                </td>
                                                <td style="text-align: center;">
                                                  <a href="editar-usuario.php?usr=<?php echo $DatosUsuario['id_user']; ?>" class="btn btn-sm btn-outline-warning"> <li class="fas fa-user-edit"></li> </a>
                                                </td>
                                              </tr>
                                            <?php } ?>
                                          <?php }else{ ?>
                                                <tr style="text-align: center">
                                                  <td colspan="7"><br><br> Todavia no tienes usuarios registrados. <br><br> </td>
                                                </tr>
                                          <?php } ?>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

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

        <!-- Required datatable js -->
        <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>

        <script src="assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
        <script src="assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>

        <!-- Responsive examples -->
        <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

        <!-- Datatable init js -->
        <script src="assets/js/pages/datatables.init.js"></script>

        <script src="assets/js/app.js"></script>

    </body>
</html>
