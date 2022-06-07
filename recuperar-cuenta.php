<?php
$ExisteCuenta="";

if(isset($_POST['update_password'])){
  include_once("classes/classes.php");
  $id_usuario=$_POST['dato'];
  if($_POST['password']==$_POST['confirmacion']){
    $password=md5($_POST['password']);
  }else{
    header("location: recuperar-cuenta.php?pass=error");
  }


  $RegistrarPassword= new RestablecerPassword();
  $QueryRegistrarPassword=$RegistrarPassword->UpdatePassword($id_usuario, $password);

}





if(isset($_POST['restablecer_password'])){
  include_once("classes/classes.php");
  $correo=$_POST['correo'];
  $rfc=mb_strtoupper($_POST['rfc'], 'UTF-8');

  $ConsultaDatos= new RestablecerPassword();
  $QueryConsultaDatos=$ConsultaDatos->ConsultaDatos($correo, $rfc);
  $DatosCuenta=mysqli_fetch_array($QueryConsultaDatos);
  $ExisteCuenta=mysqli_num_rows($QueryConsultaDatos);

  if($ExisteCuenta==0){
    header("location: recuperar-cuenta.php?error=ok");
  }
}

 ?>
<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <title>Timbox | Restablecer password</title>
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





          <header id="page-topbar">
              <div class="navbar-header">
                  <div class="d-flex">
                      <!-- LOGO -->
                      <div class="navbar-brand-box">
                          <a href="index.html" class="logo logo-dark">
                              <span class="logo-sm">
                                  <img src="assets/images/authentication-bg.png" alt="logo-sm-dark" height="22">
                              </span>
                              <span class="logo-lg">
                                  <img src="assets/images/authentication-bg.png" alt="logo-dark" height="20">
                              </span>
                          </a>


                      </div>

                      <button type="button" class="btn btn-sm px-3 font-size-24 d-lg-none header-item" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                          <i class="ri-menu-2-line align-middle"></i>
                      </button>
                  </div>

                  <div class="d-flex">
                  </div>
              </div>
          </header>

              <div class="topnav">
                  <div class="container-fluid">
                      <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                          <div class="collapse navbar-collapse" id="topnav-menu-content">
                              <ul class="navbar-nav">
                                  <li class="nav-item">
                                  </li>

                              </ul>
                          </div>
                      </nav>
                  </div>
              </div>






            <?php //include('includes/menu-superior.php');?>
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
                                    <h4 class="mb-sm-0">RESTABLECER PASSWORD</h4>
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
                                                <h4 class="card-title">Rellena los campos solicitados. </h4>
                                          </div>
                                        </div>

                                        <br><br>


                                        <?php if(isset($_GET['passw']) AND $_GET['passw']=='error'){ ?>
                                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                              <i class="fas fa-exclamation-circle"></i>
                                              <b>¡Error!</b> Algo salio mal, intentalo de nuevo.
                                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                          </div>
                                        <?php } ?>

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

                                        <?php if(isset($_GET['error']) AND $_GET['error']=='ok'){ ?>
                                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                              <i class="fas fa-exclamation-circle"></i>
                                              <b>¡Error!</b> El rfc oh correo proporcionado no coinciden con los registros en el sistema.
                                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                          </div>
                                        <?php } ?>




<?php if($ExisteCuenta==''){ ?>

                                        <form class="" action="recuperar-cuenta.php"  method="post">
                                          <div class="row">


                                              <div class="col-sm-12 col-md-6 col-lg-6">
                                                <b>Correo electrónico</b><br>
                                                <input type="email" class="form-control" id="correo" name="correo" value="" autocomplete="off" required>
                                              </div>


                                              <div class="col-sm-12 col-md-6 col-lg-6">
                                                <b>RFC</b><br>
                                                <input type="text" class="form-control" id="rfc" maxlength="13" style="text-transform:uppercase;" name="rfc" value="" autocomplete="off" required>
                                              </div>


                                              <div class="col-12">

                                              </div>


                                              <div class="col-sm-12 col-md-6 col-lg-6">
                                                <br><br>
                                                <button  name="restablecer_password" onclick="return validar();"  class="btn btn-primary "><li class="fas fa-search"></li> Consultar</button>
                                              </div>

                                              <div class="col-sm-12 col-md-6 col-lg-6" align="right" style="font-size: 16px;">
                                                <br><br>
                                                <a href="index.php"> <li class="fas fa-angle-double-left"></li> Regresar</a>
                                              </div>

                                          </div>
                                        </form>


                                        <script type="text/javascript">
                                          function validar(){

                                            //VALIDAMOS SI EL CAMPO CORREO ESTA LLENO
                                            if(document.getElementById("correo").value.length==0 ){
                                                document.getElementById("correo").style.borderColor = "red";
                                            }else{
                                              document.getElementById("correo").style.borderColor = "blue";
                                            }


                                            //VALIDAMOS SI EL CAMPO RFC ESTA LLENO
                                            if(document.getElementById("rfc").value.length==0 ){
                                                document.getElementById("rfc").style.borderColor = "red";
                                            }else{
                                              document.getElementById("rfc").style.borderColor = "blue";
                                            }

                                          }
                                        </script>
<?php } ?>




                                    <?php if($ExisteCuenta>0){ ?>

                                      <form class="" action="recuperar-cuenta.php" method="post">
                                        <input type="hidden" name="dato" value="<?php echo $DatosCuenta['id_usuario']; ?>">
                                        <div class="row">
                                          <div class="col-sm-12 col-md-6 col-lg-6">
                                            <b>Password</b><br>
                                            <input type="password" class="form-control" id="password" name="password" value="" autocomplete="off" required>
                                          </div>

                                          <div class="col-sm-12 col-md-6 col-lg-6">
                                            <b>Confirmación del password</b><br>
                                            <input type="password" class="form-control" id="confirmacion" name="confirmacion" value="" autocomplete="off" required>
                                          </div>


                                          <div class="col-12">

                                          </div>


                                          <div class="col-sm-12 col-md-6 col-lg-6">
                                            <br><br>
                                            <button  name="update_password" onclick="return validar2();"  class="btn btn-primary "><li class="fas fa-save"></li> Registrar password</button>
                                          </div>
                                          <div class="col-sm-12 col-md-6 col-lg-6" align="right" style="font-size: 16px;">
                                            <br><br>
                                            <a href="index.php"> <li class="fas fa-angle-double-left"></li> Regresar</a>
                                          </div>


                                        </div>
                                      </form>

                                      <script type="text/javascript">
                                        function validar2(){

                                          //VALIDAMOS SI EL CAMPO PASSWORD ESTA LLENO
                                          if(document.getElementById("password").value.length==0 ){
                                              document.getElementById("password").style.borderColor = "red";
                                          }else{
                                            document.getElementById("password").style.borderColor = "blue";
                                          }

                                          //VALIDAMOS SI EL CAMPO CONFIRMACION ESTA LLENO
                                          if(document.getElementById("confirmacion").value.length==0 ){
                                              document.getElementById("confirmacion").style.borderColor = "red";
                                          }else{
                                            document.getElementById("confirmacion").style.borderColor = "blue";
                                          }



                                          if(document.getElementById("password").value.length>0 && document.getElementById("confirmacion").value.length>0){
                                            if(document.getElementById("password").value== document.getElementById("confirmacion").value){
                                              valor_final= true;
                                            }else{
                                              document.getElementById("confirmacion").style.borderColor = "red";
                                              document.getElementById("password").style.borderColor = "red";
                                              alert("Las contraseñas no coinciden");
                                              valor_final=false;
                                            }
                                          }
                                          return valor_final;
                                        }
                                      </script>


                                    <?php } ?>



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
