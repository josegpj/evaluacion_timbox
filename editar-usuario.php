<?php
include_once("classes/classes.php");
include_once("includes/verificar_sesion.php");

  $id_usuario=$_GET['usr'];

  if(isset($_POST['editar_usuario'])){
    $id_usuario=$_POST['id_usuario'];
    $nombre=$_POST['nombre'];
    $rfc=$_POST['rfc'];
    $telefono=$_POST['telefono'];
    $website=$_POST['website'];
    $direccion=$_POST['direccion'];

    $Editar= new Usuarios();
    $QueryEditar=$Editar->EditarUsuario($id_usuario, $nombre, $rfc, $telefono, $website, $direccion);
  }

  ///CONSULTAMOS LOS DATOS DEL USUARIO
  $ConsultaDatosUsuario= new Usuarios();
  $QueryConsultaDatosUsuario=$ConsultaDatosUsuario->ConsultaUser($id_usuario);
  $DatosUsuario=mysqli_fetch_array($QueryConsultaDatosUsuario);


 ?>
<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <title>Timbox | Editar usuario</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/timbox.png">

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
                                    <h4 class="mb-sm-0">EDITAR USUARIO</h4>
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
                                                <h4 class="card-title">Rellena todos los campos. </h4>
                                          </div>
                                        </div>

                                        <br><br>


                                        <?php if(isset($_GET['pass']) AND $_GET['pass']=='error'){ ?>
                                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                              <i class="fas fa-exclamation-circle"></i>
                                              <b>¡Error!</b> Las contraseñas no son identicas, intentalo de nuevo.
                                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                          </div>
                                        <?php } ?>

                                        <?php if(isset($_GET['email']) AND $_GET['email']=='error'){ ?>
                                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                              <i class="fas fa-exclamation-circle"></i>
                                              <b>¡Error!</b> El correo proporcionado ya ha sido registrado.
                                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                          </div>
                                        <?php } ?>

                                        <?php if(isset($_GET['rfc']) AND $_GET['rfc']=='error'){ ?>
                                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                              <i class="fas fa-exclamation-circle"></i>
                                              <b>¡Error!</b> El rfc proporcionado ya ha sido registrado.
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


                                        <form class="" action="editar-usuario.php"  method="post">
                                          <input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>">
                                          <div class="row">
                                              <div class="col-sm-12 col-md-6 col-lg-6">
                                                <b>Nombre Completo</b><br>
                                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo htmlspecialchars($DatosUsuario['nombre']); ?>" autocomplete="off" required>
                                              </div>


                                              <div class="col-sm-12 col-md-6 col-lg-6">
                                                <b>RFC</b><br>
                                                <input type="text" class="form-control" id="rfc" name="rfc" value="<?php echo htmlspecialchars($DatosUsuario['rfc']); ?>" autocomplete="off" required>
                                              </div>

                                              <div class="col-sm-12 col-md-6 col-lg-6">
                                                <b>Telefono</b><br>
                                                <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo htmlspecialchars($DatosUsuario['telefono']); ?>" autocomplete="off" required>
                                              </div>

                                              <div class="col-sm-12 col-md-6 col-lg-6">
                                                <b>Website</b><br>
                                                <input type="text" class="form-control" id="website" name="website" value="<?php echo htmlspecialchars($DatosUsuario['website']); ?>" autocomplete="off" required>
                                              </div>


                                              <div class="col-sm-12 col-md-12 col-lg-12">
                                                <b>Direccion</b><br>
                                                <textarea name="direccion" class="form-control" id="direccion" rows="4" cols="80" required><?php echo htmlspecialchars($DatosUsuario['direccion']); ?></textarea>
                                              </div>



                                              <div class="col-12">

                                              </div>


                                              <div class="col-sm-12 col-md-6 col-lg-6">
                                                <br><br>
                                                <button  name="editar_usuario" onclick="return validar();"  class="btn btn-primary "><li class="fas fa-save"></li> Editar usuario</button>
                                              </div>


                                          </div>
                                        </form>


                                        <script type="text/javascript">
                                          function validar(){

                                            //VALIDAMOS SI EL CAMPO NOMBRE ESTA LLENO
                                            if(document.getElementById("nombre").value.length==0 ){
                                                document.getElementById("nombre").style.borderColor = "red";
                                            }else{
                                              document.getElementById("nombre").style.borderColor = "blue";
                                            }



                                            //VALIDAMOS SI EL CAMPO RFC ESTA LLENO
                                            if(document.getElementById("rfc").value.length==0 ){
                                                document.getElementById("rfc").style.borderColor = "red";
                                            }else{
                                              document.getElementById("rfc").style.borderColor = "blue";
                                            }

                                            //VALIDAMOS SI EL CAMPO PASSWORD ESTA LLENO
                                            if(document.getElementById("telefono").value.length==0 ){
                                                document.getElementById("telefono").style.borderColor = "red";
                                            }else{
                                              document.getElementById("telefono").style.borderColor = "blue";
                                            }

                                            //VALIDAMOS SI EL CAMPO CONFIRMACION ESTA LLENO
                                            if(document.getElementById("website").value.length==0 ){
                                                document.getElementById("website").style.borderColor = "red";
                                            }else{
                                              document.getElementById("website").style.borderColor = "blue";
                                            }

                                            //VALIDAMOS SI EL CAMPO CONFIRMACION ESTA LLENO
                                            if(document.getElementById("direccion").value.length==0 ){
                                                document.getElementById("direccion").style.borderColor = "red";
                                            }else{
                                              document.getElementById("direccion").style.borderColor = "blue";
                                            }



                                          }
                                        </script>





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
